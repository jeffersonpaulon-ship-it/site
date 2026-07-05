<?php

namespace Config;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\HotReloader\HotReloader;
use App\Models\MenuModel;

Events::on('pre_system', function () {
    $routes = service('routes');
    $menuModel = new MenuModel();

    // Buscar todos os submenus que têm parent_id diferente de NULL
    $submenus = $menuModel->where('parent_id !=', null)->findAll();

    // Para cada submenu, crie uma rota dinamicamente, apontando para PageController
    foreach ($submenus as $submenu) {
        $slug = $submenu['slug'];  // O slug deve ser único e descritivo
        $routes->get($slug, 'PageController::index/' . $slug);
        log_message('debug', "Evento: Rota dinâmica criada para submenu com slug '{$slug}' apontando para PageController.");
    }
});