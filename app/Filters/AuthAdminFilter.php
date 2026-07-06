<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Verificar se o usuário está logado
        if (!$session->get('isLoggedIn')) {
            // Se não estiver logado, redirecionar para a página de login
            return redirect()->to('/admin')->with('error', 'Você deve estar logado para acessar esta página.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Não faz nada após a requisição
    }
}