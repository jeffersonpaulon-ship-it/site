<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\MenuModel;

abstract class BaseController extends Controller
{
    protected $request;
    protected $menuTree;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        // Registrar uma mensagem no log para garantir que a sessão foi iniciada
        log_message('info', 'Sessão iniciada com sucesso.');

        // Carregar o MenuModel
        $menuModel = new MenuModel();
        $menuItems = $menuModel->orderBy('order', 'ASC')->findAll();

        $this->menuTree = $this->buildMenuTree($menuItems);
    }

    // Função para construir a árvore de menu com submenus
    protected  function buildMenuTree($menuItems, $parentId = null)
    {
        $branch = [];

        foreach ($menuItems as $menuItem) {
            if ($menuItem['parent_id'] == $parentId) {
                $children = $this->buildMenuTree($menuItems, $menuItem['id']);
                if (!empty($children)) {
                    $menuItem['children'] = $children;
                }
                $branch[] = $menuItem;
            }
        }

        return $branch;
    }
}