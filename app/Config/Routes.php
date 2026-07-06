<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Desativa o roteamento automático global para impedir que controladores do Admin interceptem URLs do front-end
$routes->setAutoRoute(false);

// ==========================================================
// A. GRUPO ADMINISTRATIVO: VISITANTES (noauth)
// ==========================================================
$routes->group('admin', ['filter' => 'noauth'], function($routes) {
    $routes->get('/', 'AuthController::loginPage');
    $routes->post('login', 'AuthController::login');
    $routes->get('set-new-password', 'AuthController::setNewPassword');
    $routes->get('forgot-password', 'AuthController::forgotPassword');
    $routes->post('process-forgot-password', 'AuthController::processForgotPassword');
    $routes->get('reset-password/(:segment)', 'AuthController::resetPassword/$1');
    $routes->post('process-reset-password', 'AuthController::processResetPassword');
});
    
// ==========================================================
// B. GRUPO ADMINISTRATIVO: AUTENTICADOS (auth)
// ==========================================================
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('logout', 'AuthController::logout');
    $routes->get('performance', 'AdminController::performanceDashboard');
    
    // Gerenciamento de Menus e Estruturas
    $routes->get('menus', 'AdminController::manageMenus');
    $routes->get('menus/create', 'AdminController::createMenus');
    $routes->post('menus/store', 'AdminController::storeMenus');
    $routes->get('menus/edit/(:num)', 'AdminController::editMenus/$1');
    $routes->post('menus/update/(:num)', 'AdminController::updateMenus/$1');
    $routes->get('menus/delete/(:num)', 'AdminController::deleteMenus/$1');

    // Gerenciamento do Blog Institucional
    $routes->get('blog', 'AdminController::manageBlog');
    $routes->get('blog/delete/(:num)', 'AdminController::deleteBlog/$1');
    $routes->get('blog/create', 'AdminController::createBlog');
    $routes->post('blog/store', 'AdminController::storeBlog');
    $routes->get('blog/edit/(:num)', 'AdminController::editBlog/$1');
    $routes->post('blog/update/(:num)', 'AdminController::updateBlog/$1');
    $routes->get('admin/blog/create', 'BlogController::create');
    $routes->post('admin/blog/store', 'BlogController::store');

    // Gerenciamento de Cases Antigos
    $routes->get('cases', 'AdminController::manageCases');
    $routes->get('cases/create', 'AdminController::createCases');
    $routes->post('cases/store', 'AdminController::storeCases');
    $routes->get('cases/edit/(:num)', 'AdminController::editCases/$1');
    $routes->post('cases/update/(:num)', 'AdminController::updateCases/$1');
    $routes->get('cases/delete/(:num)', 'AdminController::deleteCases/$1');

    // Segurança: Controle de Usuários Administrativos
    $routes->get('users', 'AdminController::manageUsers');
    $routes->get('users/create', 'AdminController::createUsers');
    $routes->post('users/store', 'AdminController::storeUsers');
    $routes->get('users/edit/(:num)', 'AdminController::editUsers/$1');
    $routes->post('users/update/(:num)', 'AdminController::updateUsers/$1');
    $routes->get('users/delete/(:num)', 'AdminController::deleteUsers/$1');

    // Módulos Auxiliares: Clientes, Fotos e Depoimentos
    $routes->get('clients', 'AdminController::manageClients');
    $routes->get('client/create', 'ClientLogoController::create');
    $routes->post('client/store', 'ClientLogoController::store');
    $routes->get('client/edit/(:num)', 'ClientLogoController::edit/$1');
    $routes->post('client/update/(:num)', 'ClientLogoController::update/$1');
    $routes->get('client/delete/(:num)', 'ClientLogoController::delete/$1');

    $routes->get('photo', 'AdminController::managePhotos');
    $routes->get('photo/create', 'AdminController::createPhotos');
    $routes->post('photo/store', 'AdminController::storePhotos');
    $routes->get('photo/edit/(:num)', 'AdminController::editPhotos/$1');
    $routes->post('photo/update/(:num)', 'AdminController::updatePhotos/$1');
    $routes->get('photo/delete/(:num)', 'AdminController::deletePhotos/$1');

    $routes->get('depoiment', 'AdminController::manageDepoiments');
    $routes->get('depoiment/create', 'AdminController::createDepoiments');
    $routes->post('depoiment/store', 'AdminController::storeDepoiments');
    $routes->get('depoiment/edit/(:num)', 'AdminController::editDepoiments/$1');
    $routes->post('depoiment/update/(:num)', 'AdminController::updateDepoiments/$1');
    $routes->get('depoiment/delete/(:num)', 'AdminController::deleteDepoiments/$1');

    // Gerenciamento de Conteúdo Dinâmico das Páginas
    $routes->get('pages', 'PagesController::index');
    $routes->get('pages/create', 'PagesController::create');
    $routes->post('pages/store', 'PagesController::store');
    $routes->get('pages/edit/(:num)', 'PagesController::edit/$1');
    $routes->post('pages/update/(:num)', 'PagesController::update/$1');
    $routes->get('pages/delete/(:num)', 'PagesController::delete/$1');
    
    // Recursos Comerciais: Casting, Propostas e Produtos
    $routes->get('casting', 'AdminController::manageCasting');
    $routes->get('casting/view/(:num)', 'AdminController::viewCasting/$1');
    $routes->get('casting/edit/(:num)', 'AdminController::editCasting/$1');
    $routes->get('casting/delete/(:num)', 'AdminController::deleteCasting/$1');
    
    $routes->get('propostas', 'PropostaController::index');
    $routes->get('propostas/create', 'PropostaController::create');
    $routes->post('propostas', 'PropostaController::store');
    $routes->get('propostas/edit/(:num)', 'PropostaController::edit/$1');
    $routes->post('propostas/update/(:num)', 'PropostaController::update/$1');
    $routes->get('propostas/delete/(:num)', 'PropostaController::delete/$1');
    
    $routes->get('produtos-servicos', 'ProdutoServicoController::index');
    $routes->get('produtos-servicos/create', 'ProdutoServicoController::create');
    $routes->post('produtos-servicos/store', 'ProdutoServicoController::store');
    $routes->get('produtos-servicos/edit/(:num)', 'ProdutoServicoController::edit/$1');
    $routes->post('produtos-servicos/update/(:num)', 'ProdutoServicoController::update/$1');
    $routes->get('produtos-servicos/delete/(:num)', 'ProdutoServicoController::delete/$1');
    
    // Módulo Otimizado: Gerenciar Projetos Avançados (Cases de Sucesso)
    $routes->get('projetos', 'AdminProjetosController::index');
    $routes->get('projetos/editar/(:num)', 'AdminProjetosController::editar/$1');
    $routes->post('projetos/atualizar/(:num)', 'AdminProjetosController::atualizar/$1');
});

// ==========================================================
// C. ROTAS PÚBLICAS DO CORE DO SITE (FRONT-END)
// ==========================================================
$routes->get('/', 'MenuController::index');

// 🔥 PRIORIDADE MÁXIMA DE PORTFÓLIO: Força a chamada do CaseController legítimo para a URL pública /cases
$routes->get('cases', 'CaseController::index');

// Detalhes internos estruturados de Cases e Projetos Avançados
$routes->get('case/(:segment)', 'CaseController::viewCase/$1');
$routes->get('projeto', 'DetalhesProjeto::index');
$routes->get('projeto/(:segment)', 'DetalhesProjeto::index/$1');
$routes->get('lp', 'LandingPageController::index');

// Rotas auxiliares de componentes internos do template
$routes->get('menu', 'MenuController::index');
$routes->get('slider', 'SliderController::index');
$routes->get('client-logos', 'ClientLogoController::index');
$routes->get('gallery', 'GalleryController::index');
$routes->get('team', 'TeamController::index');
$routes->get('testimonials', 'TestimonialController::index');

// Canal de Notícias (Blog) - Detalhe interno específico
$routes->get('blog/(:segment)', 'BlogController::viewBlog/$1');

// Formulários e Captação de Leads Comercial
$routes->get('contato', 'ContatoController::index');
$routes->post('contato/submit', 'ContatoController::submit');
$routes->get('trabalhe-conosco', 'TrabalheConoscoController::index');
$routes->post('trabalhe-conosco/submit', 'TrabalheConoscoController::submit');

// CONTINGÊNCIA: Limpeza de cache de disco
$routes->get('limpar-sistema', function() {
    \Config\Services::cache()->clean();
    $cachePath = WRITEPATH . 'cache/';
    if (is_dir($cachePath)) {
        $files = glob($cachePath . '*');
        foreach ($files as $file) {
            if (is_file($file) && !strpos($file, 'index.html')) {
                @unlink($file);
            }
        }
    }
    return "Cache limpo fisicamente com absoluto sucesso! Os novos metadados de SEO reais do banco estão ativos.";
});

// ==========================================================
// D. RESOLUÇÃO DINÂMICA DE ROTAS COM MENU-CORINGA (ORDEM DE CRITICIDADE)
// ==========================================================
$routes->get('sitemap.xml', 'SitemapController::index');
$routes->get('^(?!assets|uploads)([^.]+)', 'MenuController::index/$1');

// Captura qualquer URL amigável final de primeiro nível (ex: /quem-somos, /locacao-totem),
// mas ignora estritamente se o início da requisição for o caminho físico das pastas 'assets' ou 'uploads'
$routes->get('^(?!assets|uploads)(:segment)', 'MenuController::index/$1');