<?= $this->include('admin/partials/headeradmin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Conteúdo principal -->
    <section class="content">
        <div class="container-fluid">
            <!-- Título da Página -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <h1>Bem-vindo ao Painel Administrativo</h1>
                </div>
            </div>

            <!-- Cards de Estatísticas -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- Total de Usuários -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $totalUsers ?></h3>
                            <p>Total de Usuários</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="/admin/users" class="small-box-footer">
                            Mais informações <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- Total de Posts no Blog -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $totalBlogs ?></h3>
                            <p>Total de Posts no Blog</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-blog"></i>
                        </div>
                        <a href="/admin/blog" class="small-box-footer">
                            Mais informações <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- Total de Cases -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $totalCases ?></h3>
                            <p>Total de Cases</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <a href="/admin/cases" class="small-box-footer">
                            Mais informações <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- Total de Clientes -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $totalClients ?></h3>
                            <p>Total de Clientes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <a href="/admin/clients" class="small-box-footer">
                            Mais informações <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>
