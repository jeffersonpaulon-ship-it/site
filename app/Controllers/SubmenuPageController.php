<?php
namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\ClientLogoModel;
use App\Models\TeamModel;
use App\Models\TestimonialModel;

class SubmenuPageController extends BaseController
{
    public function index($slug = null)
    {
        // Carregar o MenuModel
        $menuModel = new MenuModel();
        $menuItems = $menuModel->orderBy('order', 'ASC')->findAll();
        $menuTree = $this->buildMenuTree($menuItems);

        // Obter informações de SEO com base no slug
        $pageSeo = $menuModel->where('slug', $slug)->first();

        if (!$pageSeo) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Carregar o ClientLogoModel (Logotipos de Clientes)
        $clientLogoModel = new ClientLogoModel();
        $clientLogos = $clientLogoModel->getClientLogos();

        // Carregar o TeamModel (Equipe)
        $teamModel = new TeamModel();
        $teamItems = $teamModel->getTeamMembers();

        // Carregar o TestimonialModel (Depoimentos)
        $testimonialModel = new TestimonialModel();
        $testimonials = $testimonialModel->getTestimonials();

        // Dados de SEO
        $seoData = [
            'title'       => $pageSeo['title'],
            'description' => $pageSeo['description'],
            'keywords'    => $pageSeo['keywords'],
            'image'       => $pageSeo['image'], // Agora carrega da base de dados
            'canonical'   => base_url($slug),
        ];

        // Verificar se a view correspondente existe
        $viewPath = 'pages/' . $slug;
        if (!is_file(APPPATH . 'Views/' . $viewPath . '.php')) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        try {
            return view($viewPath, [
                'menuTree'    => $menuTree,
                'seoData'     => $seoData,
                'teamItems'   => $teamItems,
                'testimonials' => $testimonials,
                'clientLogos' => $clientLogos,
                'isHome'      => false
            ]);
        } catch (\InvalidArgumentException $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}