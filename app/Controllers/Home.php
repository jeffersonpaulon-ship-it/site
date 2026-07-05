<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\SliderModel;
use App\Models\ClientLogoModel;
use App\Models\CaseModel;
use App\Models\TeamModel;
use App\Models\TestimonialModel;
use App\Models\BlogModel;

class Home extends BaseController
{
    public function index()
    {
        // Carregar o MenuModel
        $menuModel = new MenuModel();
        $menuItems = $menuModel->orderBy('order', 'ASC')->findAll();
        $menuTree = $this->buildMenuTree($menuItems);

        // Carregar o SliderModel
        $sliderModel = new SliderModel();
        $sliders = $sliderModel->getSliders();

        // Carregar os logotipos dos clientes
        $clientLogoModel = new ClientLogoModel();
        $clientLogos = $clientLogoModel->getClientLogos();

        // Carregar os Cases de Sucesso (mesma tabela usada em /cases e /case/{slug})
        $caseModel = new CaseModel();
        $galleryItems = $caseModel->orderBy('id', 'DESC')
                             ->findAll(6);

        // Carregar o TeamModel (Equipe)
        $teamModel = new TeamModel();
        $teamItems = $teamModel->getTeamMembers();

        // Carregar o TestimonialModel (Depoimentos)
        $testimonialModel = new TestimonialModel();
        $testimonials = $testimonialModel->getTestimonials();

        // Carregar o BlogModel (Posts do Blog)
        $blogModel = new BlogModel();
        $recentPosts = $blogModel->getRecentPosts();

        // SEO Data para a página inicial
        $seoData = [
            'title' => 'Credenciamento para Eventos Rápido e Eficiente | Credenciamento Sem Fila',
            'description' => 'Soluções inovadoras de credenciamento para eventos. Agilidade e eficiência para seu evento sem filas, com locação de equipamentos e suporte completo.',
            'keywords' => 'credenciamento para eventos, credenciamento sem fila, locação de equipamentos para eventos, controle de acesso para eventos, eventos sem fila',
            'image' => 'assets/images/brand/logo-credenciamento-sem-fila.svg',
            'canonical' => base_url('/'),
        ];

        // Passar todos os dados para a view principal
        return view('index', [
            'menuTree'     => $menuTree,
            'sliders'      => $sliders,
            'clientLogos'  => $clientLogos,
            'isHome'       => true,
            'galleryItems' => $galleryItems,
            'teamItems'    => $teamItems,
            'testimonials' => $testimonials,
            'recentPosts'  => $recentPosts,
            'seoData'      => $seoData, // Dados de SEO
        ]);
    }
}