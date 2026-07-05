<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DetalhesProjeto extends Controller
{
    public function index($slug = null)
    {
        // Se o slug estiver vazio (ex: /projeto), redireciona para a listagem
        if (empty($slug)) {
            return redirect()->to(base_url('cases'), 301);
        }

        // Carrega o helper de texto necessário para usar o character_limiter()
        helper('text');

        $db = \Config\Database::connect();

        // ==========================================================
        // 1. CARREGAMENTO DO MENU DINÂMICO
        // ==========================================================
        $menuBuilder = $db->table('menus');
        $allMenuItems = $menuBuilder->get()->getResultArray();
        $menuTree = [];
        
        if (!empty($allMenuItems)) {
            foreach ($allMenuItems as $item) {
                $parentId = !empty($item['parent_id']) ? $item['parent_id'] : 0;
                if ($parentId == 0) {
                    $item['children'] = [];
                    $menuTree[$item['id']] = $item;
                }
            }
            foreach ($allMenuItems as $item) {
                $parentId = !empty($item['parent_id']) ? $item['parent_id'] : 0;
                if ($parentId > 0 && isset($menuTree[$parentId])) {
                    $menuTree[$parentId]['children'][] = $item;
                }
            }
        }

        // ==========================================================
        // 2. BUSCA DO PROJETO ATUAL NA TABELA GALLERIES
        // ==========================================================
        $builder = $db->table('galleries');
        $projeto = $builder->where('slug', $slug)->get()->getRowArray();

        if (!$projeto) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // ==========================================================
        // 3. BUSCA DE PROJETOS COMPLEMENTARES (SOLUÇÃO DO ERRO DA LINHA 128)
        // ==========================================================
        $similarCasesRaw = $db->table('galleries')->where('id !=', $projeto['id'])->limit(3)->get()->getResultArray();
        $similarCases = [];
        foreach ($similarCasesRaw as $sim) {
            $sim['title']         = $sim['project_name'];
            $sim['category_name'] = $sim['category'];
            
            // RESOLUÇÃO DO ÍNDICE: Define o nome puro do arquivo que a View vai usar na linha 128
            // Se houver uma nova imagem de destaque, usa ela; senão, cai na antiga da home
            $sim['image'] = !empty($sim['image_destaque']) ? $sim['image_destaque'] : (!empty($sim['images']) ? $sim['images'] : 'project-details-img.jpg');
            
            $similarCases[] = $sim;
        }

        // Busca o projeto anterior e próximo com base no ID para alimentar as setas do template
        $previousCase = $db->table('galleries')->where('id <', $projeto['id'])->orderBy('id', 'DESC')->limit(1)->get()->getRowArray();
        if ($previousCase) {
            $previousCase['title'] = $previousCase['project_name'];
        }

        $nextCase = $db->table('galleries')->where('id >', $projeto['id'])->orderBy('id', 'ASC')->limit(1)->get()->getRowArray();
        if ($nextCase) {
            $nextCase['title'] = $nextCase['project_name'];
        }

        // ==========================================================
        // 4. CONFIGURAÇÃO AVANÇADA DE SEO (Meta Tags Magnéticas)
        // ==========================================================
        $title = !empty($projeto['seo_title']) ? $projeto['seo_title'] : $projeto['project_name'] . ' | Credenciamento para Eventos';
        $description = !empty($projeto['seo_description']) ? $projeto['seo_description'] : character_limiter(strip_tags($projeto['content_html'] ?? 'Confira os resultados obtidos no evento ' . $projeto['project_name'] . ' pela Credenciamento Sem Fila.'), 150);
        $keywords = !empty($projeto['seo_keywords']) ? $projeto['seo_keywords'] : 'credenciamento, controle de acesso, caex, eventos';

        // Definição das Imagens com seus respectivos caminhos lógicos
        $bgImage  = !empty($projeto['image_bg']) ? $projeto['image_bg'] : 'page-header-bg.jpg';
        
        // Determina qual imagem principal e URL de SEO usar
        if (!empty($projeto['image_destaque'])) {
            $destaqueImage = $projeto['image_destaque'];
            $seoImageUrl   = base_url('uploads/projects/' . $destaqueImage);
        } else {
            $destaqueImage = !empty($projeto['images']) ? $projeto['images'] : 'project-details-img.jpg';
            $seoImageUrl   = base_url('assets/images/resources/' . $destaqueImage);
        }
        
        // Processamento da galeria interna (salvas como JSON no banco)
        $galeriaInterna = [];
        if (!empty($projeto['galeria_fotos'])) {
            $galeriaInterna = json_decode($projeto['galeria_fotos'], true);
        }

        $canonicalUrl = base_url('projeto/' . $slug);

        // Rich Snippet JSON-LD para o Google
        $schemaData = [
            "@context"    => "https://schema.org",
            "@type"       => "Article", 
            "headline"    => $title,
            "description" => $description,
            "image"       => $seoImageUrl,
            "url"         => $canonicalUrl
        ];

        $seoData = [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'canonical'   => $canonicalUrl,
            'image'       => $destaqueImage,
            'schema'      => json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        ];

        // ==========================================================
        // 5. COMPATIBILIDADE E MAPEAMENTO DA VIEW PRINCIPAL
        // ==========================================================
        $projeto['title']            = !empty($projeto['seo_h1']) ? $projeto['seo_h1'] : $projeto['project_name']; 
        $projeto['image']            = $destaqueImage; 
        $projeto['image_bg']         = $bgImage;
        $projeto['content']          = !empty($projeto['content_html']) ? $projeto['content_html'] : (!empty($projeto['description']) ? $projeto['description'] : '<p>' . $description . '</p>');
        $projeto['galeria_interna']  = $galeriaInterna;
        
        $projeto['category_name']    = $projeto['category'];     
        $projeto['tecnologia_usada'] = !empty($projeto['category']) ? $projeto['category'] . ' Avançado' : 'Tecnologia Credenciamento Sem Fila'; 
        $projeto['date']             = !empty($projeto['created_at']) ? $projeto['created_at'] : date('Y-m-d'); 

        // Agrupa todas as variáveis exigidas pela View final
        $data = [
            'case'          => $projeto,
            'seoData'       => $seoData,
            'menuTree'      => $menuTree,
            'canonicalUrl'  => $canonicalUrl,
            'similarCases'  => $similarCases,
            'previousCase'  => $previousCase,
            'nextCase'      => $nextCase      
        ];

        return view('pages/project-details', $data);
    }
}