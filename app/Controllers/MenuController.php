<?php

namespace App\Controllers;

use App\Models\MenuModel;
use CodeIgniter\Controller;
use Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;

class MenuController extends Controller
{
    public function index($slug = null)
    {
        $cache = Services::cache();
        
        // 1. IDENTIFICAÇÃO ABSOLUTA DA HOME
        $isRoot = (empty($slug) || $slug === '/' || $slug === 'main' || $slug === 'home');
        $pageSlug = $isRoot ? 'home' : trim($slug);
        
        // Chave de cache exclusiva baseada no slug da página para performance máxima
        $cacheKey = 'menu_page_seo_v2_' . $pageSlug;

        // Tenta recuperar a página renderizada do cache para economizar banco e acelerar o site
        if (! $data = $cache->get($cacheKey)) {
            $model = new MenuModel();
            $db    = \Config\Database::connect();
            
            // 2. FLUXO SEGURO PARA A PÁGINA INICIAL (EVITA ERRO 404)
            if ($isRoot) {
                $page = $db->table('menus')
                           ->where('slug', 'home')
                           ->orWhere('slug', '/')
                           ->orWhere('slug', '')
                           ->orWhere('link', '/')
                           ->get()->getRowArray();
                
                // Fallback de Segurança se a Home não estiver cadastrada de forma exata no banco
                if (!$page) {
                    $page = [
                        'id' => 1,
                        'title' => 'Credenciamento para Eventos e Controle de Acesso | CSF',
                        'title_menu' => 'Home',
                        'slug' => 'home',
                        'description' => 'Sistemas modernos de credenciamento sem filas, autoatendimento por QR Code e controle de acesso com foto para feiras e congressos corporativos.',
                        'keywords' => 'credenciamento para eventos, controle de acesso, totens de autoatendimento, locação de coletores',
                        'image' => 'backgrounds/cases-sucesso-solucoes-eventos-bg.jpg'
                    ];
                }
            } else {
                // Busca padrão para as demais páginas internas (quem-somos, contato, etc)
                $page = $db->table('menus')->where('slug', $pageSlug)->get()->getRowArray();

                if (!$page) {
                    $page = $db->table('menus')->where('link', $pageSlug)->get()->getRowArray();
                }
            }

            // Dispara erro 404 legítimo apenas se NÃO for a Home e NÃO constar na tabela de menus
            if (!$page) {
                throw PageNotFoundException::forPageNotFound("Página não encontrada para o termo: " . $pageSlug);
            }

            // Obtém dados de conteúdo estendido da tabela 'pages'
            $pageData = $db->table('pages')->where('menu_id', $page['id'])->get()->getRowArray();

            // Carrega componentes dinâmicos para a montagem das seções globais do template
            $clientLogos  = $db->table('client_logos')->orderBy('order', 'ASC')->get()->getResultArray();
            $testimonials = $db->table('testimonials')->orderBy('id', 'DESC')->get()->getResultArray();
            $blogPosts    = $db->table('blog')->orderBy('created_at', 'DESC')->get()->getResultArray();
            $casesRecords = $db->table('cases')->orderBy('id', 'DESC')->get()->getResultArray();
            
            // 🔥 BUSCA DOS SLIDERS: Recupera os banners ativos para alimentar o index.php e evitar o erro Undefined Variable
            $slidersRecords = $db->table('sliders')->get()->getResultArray();

            // 3. ENGENHARIA DE METADADOS AVANÇADOS DE SEO E OPEN GRAPH
            $resolvedSeo = $this->getAdvancedSeoData($page);

            // Consolida a árvore de variáveis para injeção limpa na View
            $data = [
                'seoData'      => $resolvedSeo, 
                'menuTree'     => $this->buildMenuTree($model->orderBy('order', 'ASC')->findAll()),
                'page'         => $page, 
                'pageData'     => $pageData,
                'clientLogos'  => $clientLogos,
                'testimonials' => $testimonials,
                'recentPosts'  => $blogPosts,
                'blogs'        => $blogPosts,
                'cases'        => $casesRecords,   // Alimenta o loop de portfólio na view 'cases.php'
                'sliders'      => $slidersRecords, // Alimenta o carrossel de banners na view 'index.php'
                'isHome'       => $isRoot
            ];

            // Salva a estrutura tratada em cache por 1 hora (3600 segundos) para velocidade máxima de carregamento
            $cache->save($cacheKey, $data, 3600);
        }

        // ==========================================================
        // 4. SELETOR E RENDERIZADOR DINÂMICO DE VIEW DO TEMPLATE
        // ==========================================================
        if ($isRoot) {
            $targetView = 'index'; // Aponta com precisão cirúrgica para app/Views/index.php
        } 
        elseif (is_file(APPPATH . 'Views/pages/' . $pageSlug . '.php')) {
            $targetView = 'pages/' . $pageSlug;
        } 
        elseif (is_file(APPPATH . 'Views/pages/dynamic.php')) {
            $targetView = 'pages/dynamic';
        } 
        else {
            throw new \RuntimeException("Erro Crítico de Roteamento: O arquivo 'pages/{$pageSlug}.php' não foi localizado no servidor.");
        }

        return view($targetView, $data);
    }

    /**
     * Monta a árvore hierárquica do menu de navegação baseando-se no parent_id
     */
    public function buildMenuTree(array $menuItems, $parentId = null): array
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

    /**
     * MOTOR TÉCNICO DE SEO: Higieniza títulos, trata descrições e injeta JSON-LD estruturado
     */
    private function getAdvancedSeoData(array $page): array
    {
        $rawTitle    = !empty($page['title']) ? trim($page['title']) : trim($page['title_menu']);
        $description = !empty($page['description']) ? trim($page['description']) : '';
        $keywords    = !empty($page['keywords']) ? trim($page['keywords']) : 'credenciamento para eventos, controle de acesso, totens de autoatendimento, crachás para eventos';
        $slug        = $page['slug'] ?? '';

        // OTIMIZAÇÃO DE TÍTULOS CURTOS: Força cauda longa amigável ao robô do Google se tiver menos de 45 caracteres
        if (strlen($rawTitle) < 45) {
            if ($slug === 'home' || empty($slug)) {
                $title = "Credenciamento para Eventos e Controle de Acesso | CSF";
            } else {
                $title = $rawTitle . " | Sistema de Credenciamento Sem Fila";
            }
        } else {
            $title = $rawTitle;
        }

        // PREVENÇÃO DE META DESCRIPTIONS DUPLICADAS: Aplica fallbacks corporativos exclusivos por página
        if (empty($description) || strpos($description, 'Soluções completas') !== false) {
            switch ($slug) {
                case 'quem-somos':
                    $description = 'Conheça a Credenciamento Sem Fila (CSF). Somos especialistas em engenharia de fluxo para eventos, oferecendo sistemas próprios de check-in rápido e tecnologia estável.';
                    break;
                case 'cases':
                    $description = 'Explore nosso portfólio e cases de sucesso. Veja como aplicamos tecnologia de controle de acesso, autoatendimento e impressão de etiquetas sob demanda em grandes eventos.';
                    break;
                case 'blog':
                    $description = 'Acompanhe as principais tendências de tecnologia para feiras, congressos e bastidores operacionais das maiores produções do setor com a equipe CSF.';
                    break;
                case 'contato':
                    $description = 'Solicite um orçamento sob medida para o seu próximo evento. Fale com nossos especialistas em credenciamento, controle de acesso e locação de hardware.';
                    break;
                default:
                    $titleMenu   = $page['title_menu'] ?? 'Tecnologia';
                    $description = 'Soluções avançadas em ' . trim($titleMenu) . '. Potencialize a organização do seu evento corporativo com a infraestrutura e suporte especializado da CSF.';
                    break;
            }
        }

        // GENERATION DA URL CANONICAL ABSOLUTA E CAPTURA DA IMAGEM OPEN GRAPH
        $canonical = !empty($page['canonical']) ? trim($page['canonical']) : base_url($slug);
        
        if (!empty($page['image'])) {
            $imageUrl = base_url('assets/images/' . trim($page['image']));
        } else {
            $imageUrl = base_url('assets/images/backgrounds/cases-sucesso-solucoes-eventos-bg.jpg');
        }

        // INJEÇÃO AUTOMÁTICA DE DADOS ESTRUTURADOS (SCHEMA.ORG JSON-LD)
        $schemaData = [
            "@context" => "https://schema.org",
            "@type"    => ($slug === 'home' || empty($slug)) ? "Organization" : "WebPage",
            "name"     => $title,
            "description" => $description,
            "url"      => $canonical,
            "logo"     => base_url('assets/images/resources/logo-1.png'),
            "image"    => $imageUrl
        ];

        // Expande os dados semânticos se for a página inicial (SEO Local e Corporativo)
        if ($slug === 'home' || empty($slug)) {
            $schemaData["legalName"] = "Credenciamento Sem Fila";
            $schemaData["sameAs"] = [
                "https://www.instagram.com/credenciamentosemfila" 
            ];
            $schemaData["contactPoint"] = [
                "@type" => "ContactPoint",
                "telephone" => "+55-11-91497-4980",
                "contactType" => "sales",
                "areaServed" => "BR",
                "availableLanguage" => "Portuguese"
            ];
        }

        return [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'canonical'   => $canonical,
            'image'       => $imageUrl,
            'schema'      => json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        ];
    }
}