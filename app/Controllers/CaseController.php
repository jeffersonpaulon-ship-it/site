<?php

namespace App\Controllers;

use App\Models\CaseModel;
use App\Models\MenuModel;

class CaseController extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        // Inicializar o MenuModel
        $this->menuModel = new MenuModel();
    }

    /**
     * Lista todos os cases aplicando o bloco institucional dinâmico (menu_id = 4)
     */
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session()->start();
        }

        // CARREGA O HELPER DE TEXTO PREVENTIVAMENTE
        helper('text');

        $caseModel = new CaseModel();
        $db        = \Config\Database::connect();

        // 1. Busca todos os cases cadastrados para renderizar o grid de portfólio
        $cases = $caseModel->findAll();

        // 2. BUSCA DA INFRAESTRUTURA DE TEXTO SEO: Puxa a linha da tabela pages correspondente aos Cases (menu_id = 4)
        $pageData = $db->table('pages')->where('menu_id', 4)->get()->getRowArray();

        // 3. BUSCA DAS CONFIGURAÇÕES DE METADADOS DO MENU: Puxa o título/descrição cadastrado para a aba do Google
        $menuSEO = $db->table('menus')->where('id', 4)->get()->getRowArray();

        // 4. Monta a inteligência de SEO com fallbacks caso o banco esteja em branco
        $title       = !empty($menuSEO['title']) ? $menuSEO['title'] : 'Cases de Sucesso em Soluções para Eventos | CSF';
        $description = !empty($menuSEO['description']) ? $menuSEO['description'] : 'Conheça nossos cases de sucesso e veja como ajudamos eventos a atingir máxima eficiência no credenciamento.';
        $keywords    = !empty($menuSEO['keywords']) ? $menuSEO['keywords'] : 'cases, feiras, eventos, soluções, credenciamento';

        $seoData = [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'image'       => !empty($menuSEO['image']) ? $menuSEO['image'] : 'default-image.jpg',
            'canonical'   => base_url('cases'),
        ];

        // 5. Carregar e estruturar a árvore de menus dinâmica do cabeçalho
        $menuItems = $this->menuModel->orderBy('order', 'ASC')->findAll();
        $menuTree  = $this->buildMenuTree($menuItems);

        // 6. Agrupa tudo e envia com as chaves exatas esperadas pelo seu novo HTML
        return view('pages/cases', [
            'cases'    => $cases,
            'pageData' => $pageData,
            'menuTree' => $menuTree,
            'seoData'  => $seoData,
        ]);
    }

    /**
     * Exibe o detalhe de um case específico
     */
    public function viewCase($slug)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session()->start();
        }

        // CORREÇÃO CRÍTICA: Carrega o helper de texto para que a função character_limiter() na linha 92 funcione!
        helper('text');

        $caseModel = new CaseModel();

        // Busca o case com base no slug único de URL
        $case = $caseModel->where('slug', $slug)->first();

        // Se o case não for encontrado, exibe uma página de erro 404 limpa
        if (!$case) {
            throw \Config\Exceptions\PageNotFoundException::forPageNotFound("Case não encontrado.");
        }

        // Carregar os itens do menu
        $menuItems = $this->menuModel->orderBy('order', 'ASC')->findAll();
        $menuTree  = $this->buildMenuTree($menuItems);

        // Dados de SEO para a página de detalhes do case
        $seoData = [
            'title'       => !empty($case['title']) ? $case['title'] : $case['client'] . ' | Case de Sucesso',
            'description' => !empty($case['description']) ? character_limiter(strip_tags($case['description']), 150) : 'Confira os detalhes operacionais aplicados.',
            'keywords'    => !empty($case['keywords']) ? $case['keywords'] : 'credenciamento, controle de acesso, rfid',
            'image'       => !empty($case['image_site']) ? $case['image_site'] : 'default-image.jpg',
            'canonical'   => base_url('case/' . $case['slug']),
        ];

        return view('pages/case-details', [
            'case'     => $case,
            'menuTree' => $menuTree,
            'seoData'  => $seoData,
        ]);
    }

    /**
     * Construtor recursivo de submenus dinâmicos
     */
    protected function buildMenuTree($menuItems, $parentId = null)
    {
        $branch = [];
        foreach ($menuItems as $menuItem) {
            $itemParentId = !empty($menuItem['parent_id']) ? (int)$menuItem['parent_id'] : null;
            $searchId     = !empty($parentId) ? (int)$parentId : null;

            if ($itemParentId === $searchId) {
                $children = $this->buildMenuTree($menuItems, $menuItem['id']);
                if ($children) {
                    $menuItem['children'] = $children;
                }
                $branch[] = $menuItem;
            }
        }
        return $branch;
    }
}