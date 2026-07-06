<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class SitemapController extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        // 1. Puxa as páginas institucionais legítimas
        $menus = $db->table('menus')
                    ->where('show_in_menu', 1)
                    ->orWhere('slug', 'politica-de-privacidade')
                    ->get()
                    ->getResultArray();

        // 2. Puxa as postagens do Blog
        $blogs = $db->table('blog')->get()->getResultArray();

        // 3. Puxa as galerias de projetos (Cases de Sucesso)
        $cases = $db->table('galleries')->get()->getResultArray();

        // Monta a estrutura XML limpa exigida pelos robôs
        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // URL da Home
        $xml[] = '  <url>';
        $xml[] = '    <loc>' . base_url() . '</loc>';
        $xml[] = '    <priority>1.00</priority>';
        $xml[] = '  </url>';

        // Insere as páginas institucionais
        foreach ($menus as $m) {
            if (empty($m['slug']) || $m['slug'] === 'home') continue;
            $xml[] = '  <url>';
            $xml[] = '    <loc>' . base_url($m['slug']) . '</loc>';
            $xml[] = '    <priority>0.90</priority>';
            $xml[] = '  </url>';
        }

        // Insere as postagens do blog
        foreach ($blogs as $b) {
            $xml[] = '  <url>';
            $xml[] = '    <loc>' . base_url('blog/' . $b['slug']) . '</loc>';
            $xml[] = '    <priority>0.80</priority>';
            $xml[] = '  </url>';
        }

        // Insere os cases de portfólio
        foreach ($cases as $c) {
            $xml[] = '  <url>';
            $xml[] = '    <loc>' . base_url('projeto/' . $c['slug']) . '</loc>';
            $xml[] = '    <priority>0.85</priority>';
            $xml[] = '  </url>';
        }

        $xml[] = '</urlset>';

        // Força a saída do cabeçalho HTTP como XML puro para leitura do Google
        return $this->response
                    ->setHeader('Content-Type', 'application/xml; charset=utf-8')
                    ->setBody(implode("\n", $xml));
    }
}