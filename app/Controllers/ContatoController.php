<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
use App\Models\MenuModel;
use App\Models\ContactModel;

class ContatoController extends BaseController
{
    public function index()
    {
        session()->start();

        // Carregar o MenuModel
        $menuModel = new MenuModel();
        $menuItems = $menuModel->orderBy('order', 'ASC')->findAll();
        $menuTree = $this->buildMenuTree($menuItems);

        // Defina os dados de SEO manualmente, pois $pageSeo não está definido no seu código
        $seoData = [
            'title'       => 'Entre em Contato com a Credenciamento Sem Fila',
            'description' => 'Fale com a nossa equipe e solicite um orçamento para credenciamento, controle de acesso e locação de equipamentos para o seu evento.',
            'keywords'    => 'contato, fale conosco, orçamento credenciamento para eventos',
            'image'       => base_url('assets/images/brand/logo-credenciamento-sem-fila.svg'),
            'canonical'   => base_url('contato'),
        ];

        // Carregar a view de contato
        return view('pages/contato', [
            'menuTree'    => $menuTree,
            'seoData'     => $seoData,
            'isHome'      => false,
            'slimAssets'  => true, // Página não usa Owl Carousel/Swiper/Odometer/Magnific Popup
        ]);
    }

    public function submit()
    {
        session()->set('teste_sessao', 'Sessão funcionando corretamente em Contato!');

        log_message('info', 'Iniciando validação de formulário de contato.');

        // Regras de validação
        $rules = [
            'nome' => 'required|alpha_space|min_length[3]',
            'email' => 'required|valid_email',
            'empresa' => 'required|min_length[3]',
            'cargo' => 'required|min_length[3]',
            'telefone' => 'required|regex_match[/^\(?\d{2}\)?[\s-]?[\d\s-]{8,9}$/]',
            'site' => 'required',
            'mensagem' => 'required|min_length[20]|max_length[2000]'
        ];

        // Validação
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }

        log_message('info', 'Validação bem-sucedida, inserindo dados no banco de dados.');

        // Validação do reCAPTCHA
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        $secretKey = '6LdnDYgqAAAAAPKI9XSaPI-FL0HRzg3pGTe9oXjZ';
        $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}");
        $responseData = json_decode($verifyResponse);

        if (!$responseData->success) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => ['captcha' => 'Falha na validação do reCAPTCHA.']
            ]);
        }

        // Inserir dados no banco de dados
        $contactModel = new ContactModel();
        $contactModel->insert([
            'nome'     => $this->request->getPost('nome'),
            'empresa'  => $this->request->getPost('empresa'),
            'cargo'    => $this->request->getPost('cargo'),
            'email'    => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            'site'     => $this->request->getPost('site'),
            'mensagem' => $this->request->getPost('mensagem'),
        ]);

        log_message('info', 'Dados inseridos com sucesso no banco.');

        // Configuração do e-mail
        $email = \Config\Services::email();
        $email->setFrom('noreply@credenciamentosemfila.com.br', 'Credenciamento Sem Fila');
        $email->setTo($this->request->getPost('email')); // Enviar e-mail para o usuário
        $email->setBCC('jefferson@credenciamentosemfila.com.br'); // Enviar cópia oculta para o administrador

        // Assunto do e-mail
        $email->setSubject('Confirmação de envio de formulário');

        // Corpo do e-mail
        $message = "
        <h1>Confirmação de Envio de Formulário</h1>
        <p>Olá, <strong>{$this->request->getPost('nome')}</strong>,</p>
        <p>Obrigado por entrar em contato conosco. Recebemos os seguintes dados:</p>
        <ul>
            <li><strong>Nome:</strong> {$this->request->getPost('nome')}</li>
            <li><strong>Empresa:</strong> {$this->request->getPost('empresa')}</li>
            <li><strong>Cargo:</strong> {$this->request->getPost('cargo')}</li>
            <li><strong>E-mail:</strong> {$this->request->getPost('email')}</li>
            <li><strong>Telefone:</strong> {$this->request->getPost('telefone')}</li>
            <li><strong>Site:</strong> {$this->request->getPost('site')}</li>
            <li><strong>Mensagem:</strong> {$this->request->getPost('mensagem')}</li>
        </ul>
        <p>Entraremos em contato o mais breve possível.</p>
        <p>Atenciosamente,</p>
        <p><strong>Equipe Credenciamento Sem Fila</strong></p>
    ";

        $email->setMessage($message);

        // Tenta enviar o e-mail
        if ($email->send()) {
            log_message('info', 'E-mail enviado com sucesso.');
        } else {
            log_message('error', 'Falha no envio do e-mail.');
            log_message('error', $email->printDebugger(['headers']));
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Dados enviados com sucesso! Verifique seu e-mail para confirmação.'
        ]);
    }
}
