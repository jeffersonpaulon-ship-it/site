<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    
    // CORREÇÃO: Adicionados todos os campos periféricos usados pelo AuthController para evitar o DataException
    protected $allowedFields = [
        'username', 
        'email', 
        'password', 
        'perfil',
        'reset_token', 
        'reset_token_expires_at',
        'reset_attempts',
        'last_login',
        'created_at', 
        'updated_at'
    ];
    
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    // Método para encontrar um usuário pelo username
    public function getUserByUsername($username)
    {
        log_message('debug', "Buscando usuário: {$username}");
        $user = $this->where('username', $username)->first();
        log_message('debug', "Resultado da busca: " . ($user ? "Usuário encontrado" : "Usuário não encontrado"));
        return $user;
    }

    // Método para encontrar um usuário pelo email
    public function findByEmail($email)
    {
        log_message('debug', "Buscando usuário por email: {$email}");
        $user = $this->where('email', $email)->first();
        log_message('debug', "Resultado da busca por email: " . ($user ? "Usuário encontrado" : "Usuário não encontrado"));
        return $user;
    }

    // Método para atualizar o token de reset
    public function updateResetToken($userId, $token, $expiration)
    {
        log_message('debug', "Atualizando token de reset para o usuário ID: {$userId}");
        $result = $this->update($userId, [
            'reset_token' => $token,
            'reset_token_expires_at' => $expiration
        ]);
        log_message('debug', "Resultado da atualização do token: " . ($result ? "Sucesso" : "Falha"));
        return $result;
    }

    // CORREÇÃO CRÍTICA: Evita re-criptografar senhas que já são Hashes válidos do banco de dados
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $password = $data['data']['password'];

            // Se a string NÃO começar com o padrão de hash do Bcrypt ($2y$), significa que é uma senha nova limpa
            if (strpos($password, '$2y$') !== 0) {
                $data['data']['password'] = password_hash($password, PASSWORD_BCRYPT);
                log_message('debug', "Nova senha limpa detectada. Hash Bcrypt gerado com sucesso.");
            } else {
                log_message('debug', "A senha já é um Hash Bcrypt válido. Ignorando re-criptografia.");
            }
        }

        return $data;
    }
}