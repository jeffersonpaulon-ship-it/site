<?php

namespace App\Controllers;

use App\Models\MenuModel;
use CodeIgniter\Controller;
use Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;

class MenuController extends Controller
{
    public function index($slug = 'home')
    {
        $cache = Services::cache();
        
        // Trata slugs vazios ou barras como a página Home
        $pageSlug = (empty($slug) || $slug === 'home' || $slug === '/') ? 'home' : $slug;
        $cacheKey = 'menu_page_' . $pageSlug;

        // Se não houver cache, processa a página
        if (!($data = $cache->get($cacheKey))) {
            $model = new MenuModel();
            
            // 1. Busca a página pelo slug atual (ignora os que são NULL, buscando apenas a página interna correta)
            $page = $model->where('slug', $pageSlug)->first();

            // 2. Se não achar pelo slug, tenta buscar pelo campo 'link'
            if (!$page) {
                $page = $model->where('link', $pageSlug)->first();
            }

            // 3. Se mesmo assim não achar (ou se o usuário tentou acessar um menu container como pai), joga 404
            if (!$page) {
                throw PageNotFoundException::forPageNotFound("Página não encontrada.");
            }

            // 4. Carrega todos os itens de menu para montar a árvore do cabeçalho
            $allMenus = $model->orderBy('order', 'ASC')->findAll();
            
            // Monta o menu dinâmico respeitando os parent_id (com suporte a submenus onde o pai tem slug NULL)
            $menuTree = $this->buildMenuTree($allMenus);

            // 5. Monta o pacote de dados com a inteligência de SEO exclusiva por página
            $data = [
                'seoData'  => $this->getSeoData($page),
                'menuTree' => $menuTree,
                'page'     => $page
            ];

            // Guarda no cache por 1 hora para o site voar de rápido
            $cache->save($cacheKey, $data, 3600);
        }

        return view('pages/default', $data);
    }

    /**
     * Monta a árvore do menu aceitando parent_id nulos ou numéricos sem quebrar o HTML
     */
    public function buildMenuTree(array $menuItems, $parentId = null): array
    {
        $branch = [];
        foreach ($menuItems as $item) {
            // Normaliza os IDs para comparação segura (evita erro de tipo int vs null string do banco)
            $itemParentId = !empty($item['parent_id']) ? (int)$item['parent_id'] : null;
            $searchId     = !empty($parentId) ? (int)$parentId : null;

            if ($itemParentId === $searchId) {
                $children = $this->buildMenuTree($menuItems, $item['id']);
                if ($children) {
                    $item['children'] = $children;
                }
                $branch[] = $item;
            }
        }
        return $branch;
    }

    /**
     * Cria metadados de SEO únicos baseados no nome do menu se os campos do banco estiverem em branco
     */
    public function getSeoData(array $page): array
    {
        // Se o título estiver vazio no banco, gera um automático usando o nome amigável do menu
        $title = !empty($page['title']) ? $page['title'] : $page['title_menu'] . ' | Credenciamento Sem Fila';
        
        // SOLUÇÃO DAS 15 PÁGINAS REPETIDAS: 
        // Se a descrição estiver vazia na tabela, cria um texto único contextualizado para aquela solução específica
        if (!empty($page['description'])) {
            $description = $page['description'];
        } else {
            $description = 'Procurando por ' . $page['title_menu'] . '? A Credenciamento Sem Fila oferece soluções de ponta em tecnologia, equipamentos e sistemas para seu evento.';
        }
        
        $keywords  = !empty($page['keywords']) ? $page['keywords'] : 'credenciamento para eventos, controle de acesso, locação de informática';
        $canonical = !empty($page['canonical']) ? $page['canonical'] : base_url($page['slug'] ?? '');
        $image     = !empty($page['image']) ? $page['image'] : 'default-image.jpg';

        // Estrutura o JSON-LD para o Google ranquear melhor cada página individualmente
        $schemaData = [
            "@context"    => "https://schema.org",
            "@type"       => "WebPage",
            "name"        => $title,
            "description" => $description,
            "url"         => $canonical,
            "image"       => base_url('assets/images/' . $image)
        ];

        return [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'canonical'   => $canonical,
            'image'       => $image,
            'schema'      => json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        ];
    }
}