<?php

namespace Config;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\HotReloader\HotReloader;
use App\Models\MenuModel;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Events allow you to tap into the execution of the program without
 * modifying or extending core files. This file provides a central
 * location to define your events, though they can always be added
 * at run-time, also, if needed.
 *
 * You create code that can execute by subscribing to events with
 * the 'on()' method. This accepts any form of callable, including
 * Closures, that will be executed when the event is triggered.
 *
 * Example:
 *      Events::on('create', [$myInstance, 'myMethod']);
 */

Events::on('pre_system', function () {
    $routes = service('routes');
    $menuModel = new MenuModel();

    // Buscar todos os submenus que têm parent_id diferente de NULL
    $submenus = $menuModel->where('parent_id !=', null)->findAll();

    // Para cada submenu, crie uma rota dinamicamente
    foreach ($submenus as $submenu) {
        $slug = $submenu['slug'];  // O slug deve ser único e descritivo
        $routes->get($slug, 'SubmenuController::view/$1');
    }
});
