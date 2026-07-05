<?php

namespace App\Controllers;

use App\Models\MenuModel;
use CodeIgniter\Controller;
use Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;

class PageController extends Controller
{
    public function index($slug = 'home')
    {
        $cache = Services::cache();
        
        // Sanitiza o slug recebido pela URL amigável
        $pageSlug = (empty($slug) || $slug === '/' || $slug === 'home') ? 'home' : trim($slug);
        
        // Força o descarte do cache antigo para atualização em tempo real
        $data = null; 

        if (!$data) {
            $model = new MenuModel();
            $db    = \Config\Database::connect();
            
            // 1. Busca direta na tabela menus da produção
            $page = $db->table('menus')->where('slug', $pageSlug)->get()->getRowArray();

            if (!$page) {
                $page = $db->table('menus')->where('link', $pageSlug)->get()->getRowArray();
            }

            // Se o slug não existir de fato na tabela menus, dispara o erro 404 estável
            if (!$page) {
                throw PageNotFoundException::forPageNotFound("Página não encontrada para o termo: " . $pageSlug);
            }

            // 2. Junção com os dados institucionais internos da tabela pages
            $pageData = $db->table('pages')->where('menu_id', $page['id'])->get()->getRowArray();

            // 3. Processamento manual e direto dos metadados de SEO
            $dbTitle       = !empty($page['title']) ? trim($page['title']) : trim($page['title_menu']) . ' | Credenciamento Sem Fila';
            $dbDescription = !empty($page['description']) ? trim($page['description']) : '';
            $dbKeywords    = !empty($page['keywords']) ? trim($page['keywords']) : 'credenciamento para eventos, controle de acesso, locação de informática';

            // Fallback de segurança caso as descrições sumam no banco de dados
            if (empty($dbDescription) || strpos($dbDescription, 'Soluções completas') !== false) {
                if (strpos($pageSlug, 'impressoras') !== false) {
                    $dbDescription = 'Evite dores de cabeça! Alugue impressoras térmicas de alta velocidade para emissão instantânea de crachás e etiquetas no local do seu evento. Saiba mais.';
                } elseif (strpos($pageSlug, 'notebooks') !== false) {
                    $dbDescription = 'Monte a secretaria do seu evento sem investir na compra de equipamentos. Aluguel de notebooks rápidos e configurados com os sistemas que você precisa.';
                } elseif (strpos($pageSlug, 'caex') !== false) {
                    $dbDescription = 'Facilite a gestão das suas feiras e exposições. Nosso sistema CAEX centraliza pedidos de serviços, submissão de projetos, ART e pagamentos dos expositores.';
                } else {
                    $dbDescription = 'Procurando por ' . trim($page['title_menu']) . '? A Credenciamento Sem Fila oferece soluções de ponta com tecnologia própria e equipamentos modernos.';
                }
            }

            $canonical = !empty($page['canonical']) ? trim($page['canonical']) : base_url($page['slug'] ?? '');
            $image     = !empty($page['image']) ? trim($page['image']) : 'default-image.jpg';

            $schemaData = [
                "@context"    => "https://schema.org",
                "@type"       => "WebPage",
                "name"        => $dbTitle,
                "description" => $dbDescription,
                "url"         => $canonical,
                "image"       => base_url('assets/images/' . $image)
            ];

            $resolvedSeo = [
                'title'       => $dbTitle,
                'description' => $dbDescription,
                'keywords'    => $dbKeywords,
                'canonical'   => $canonical,
                'image'       => $image,
                'schema'      => json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
            ];

            // 4. Carrega os componentes e parciais globais do ecossistema
            $clientLogos  = $db->table('client_logos')->orderBy('order', 'ASC')->get()->getResultArray();
            $testimonials = $db->table('testimonials')->orderBy('id', 'DESC')->get()->getResultArray();
            $blogPosts    = $db->table('blog')->orderBy('created_at', 'DESC')->get()->getResultArray();

            // 5. Injeção explícita garantindo que a View receba as variáveis preenchidas
            $data = [
                'seoData'      => $resolvedSeo, 
                'page'         => $page, 
                'pageData'     => $pageData,
                'menuTree'     => $this->buildMenuTree($model->orderBy('order', 'ASC')->findAll()),
                'clientLogos'  => $clientLogos,
                'testimonials' => $testimonials,
                'recentPosts'  => $blogPosts,
                'blogs'        => $blogPosts,
                'isHome'       => ($pageSlug === 'home')
            ];

            $cacheKey = 'page_seo_' . $pageSlug;
            $cache->save($cacheKey, $data, 3600);
        }

        // Roteamento interno estável de Views
        $targetView = (is_file(APPPATH . 'Views/pages/' . $pageSlug . '.php')) ? 'pages/' . $pageSlug : 'pages/dynamic';

        return view($targetView, $data);
    }

    private function buildMenuTree(array $menuItems, $parentId = null): array
    {
        $branch = [];
        foreach ($menuItems as $item) {
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
}