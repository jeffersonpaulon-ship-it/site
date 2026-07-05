<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class PasswordController extends Controller
{
    protected $userModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Exibe o formulário de solicitação de reset
    public function showRequestForm()
    {
        return view('password/request');
    }

    // Processa a solicitação de reset
    public function requestReset()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => [
                'required',
                'valid_email'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $email = $this->request->getPost('email');
        $user = $this->userModel->where('email', $email)->first();

        if ($user) {
            // Gera token seguro
            $token = bin2hex(random_bytes(32));
            
            // Define expiração para 1 hora
            $expires = new Time('+1 hour');

            // Atualiza dados do usuário
            $this->userModel->update($user['id'], [
                'reset_token' => $token,
                'reset_expires' => $expires->toDateTimeString(),
                'reset_attempts' => 0
            ]);

            // Envia e-mail
            $this->sendResetEmail($email, $token);
        }

        // Mensagem genérica por segurança
        return redirect()->back()->with('message', 
            'Se o e-mail estiver cadastrado, você receberá as instruções para redefinição de senha.');
    }

    // Envia e-mail com link de recuperação
    private function sendResetEmail(string $email, string $token)
    {
        $email = \Config\Services::email();

        $email->setFrom('noreply@seusite.com', 'Nome do Site');
        $email->setTo($email);
        $email->setSubject('Recuperação de Senha');

        $resetLink = site_url("password/reset/{$token}");
        
        $message = view('emails/password_reset', [
            'resetLink' => $resetLink,
            'expirationTime' => '1 hora'
        ]);

        $email->setMessage($message);
        $email->send();
    }

    // Exibe formulário de reset de senha
    public function showResetForm(string $token)
    {
        if (!$this->userModel->validateResetToken($token)) {
            return redirect()->to('/login')->with('error', 
                'Link de recuperação inválido ou expirado.');
        }

        return view('password/reset', ['token' => $token]);
    }

    // Processa o reset de senha
    public function updatePassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $passwordConfirm = $this->request->getPost('password_confirm');

        // Validação
        $validation = \Config\Services::validation();
        $validation->setRules([
            'password' => [
                'required',
                'min_length[8]',
                'matches[password_confirm]'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $user = $this->userModel->where('reset_token', $token)
                               ->where('reset_expires >', date('Y-m-d H:i:s'))
                               ->first();

        if (!$user) {
            $this->userModel->incrementResetAttempts($token);
            return redirect()->to('/login')->with('error', 
                'Link de recuperação inválido ou expirado.');
        }

        // Atualiza a senha
        $this->userModel->update($user['id'], [
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'reset_token' => null,
            'reset_expires' => null,
            'reset_attempts' => 0
        ]);

        return redirect()->to('/login')->with('success', 
            'Senha atualizada com sucesso! Você já pode fazer login.');
    }
}