<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">

    <!-- FontAwesome (para ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Botão para colapsar o menu -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Opções de usuário (logout) -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/admin/logout">
                    <i class="fas fa-sign-out-alt"></i> Sair
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin/dashboard" class="brand-link">
            <span class="brand-text font-weight-light">Admin Panel</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        
        <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>Painel de Controle</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="/admin/menus" class="nav-link">
                <i class="nav-icon fas fa-bars-staggered"></i>
                <p>Gerenciar Menus</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="/admin/blog" class="nav-link">
                <i class="nav-icon fas fa-blog"></i>
                <p>Gerenciar Blog</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="/admin/cases" class="nav-link">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>Gerenciar Cases</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="/admin/projetos" class="nav-link">
                <i class="nav-icon fas fa-rocket"></i>
                <p>Gerenciar Projetos</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="/admin/users" class="nav-link">
                <i class="nav-icon fas fa-users-gear"></i>
                <p>Gerenciar Usuários</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="/admin/clients" class="nav-link">
                <i class="nav-icon fas fa-handshake"></i>
                <p>Gerenciar Clientes</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="/admin/photo" class="nav-link">
                <i class="nav-icon fas fa-images"></i>
                <p>Gerenciar Fotos</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="/admin/depoiment" class="nav-link">
                <i class="nav-icon fas fa-comment-dots"></i>
                <p>Gerenciar Depoimentos</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="/admin/pages" class="nav-link">
                <i class="nav-icon fas fa-file-code"></i>
                <p>Gerenciar Páginas</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="/admin/casting" class="nav-link">
                <i class="nav-icon fas fa-id-card"></i>
                <p>Gerenciar Casting</p>
            </a>
        </li>
        
    </ul>
</nav>
        </div>
    </aside>