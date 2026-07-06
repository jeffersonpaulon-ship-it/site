<?= $this->include('partials/header') ?>
<div class="page-wrapper">
    <header class="main-header clearfix">
        <?= $this->include('partials/menu') ?>
    </header>
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div>
    </div>

    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(<?= base_url('assets/images/backgrounds/cases-sucesso-solucoes-eventos-bg.jpg') ?>)">
        </div>
        <div class="page-header-border"></div>
        <div class="page-header-border page-header-border-two"></div>
        <div class="page-header-border page-header-border-three"></div>
        <div class="page-header-border page-header-border-four"></div>
        <div class="page-header-border page-header-border-five"></div>
        <div class="page-header-border page-header-border-six"></div>

        <div class="page-header-shape-1"></div>
        <div class="page-header-shape-2"></div>
        <div class="page-header-shape-3"></div>

        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li class="active">Blog</li>
                </ul>
                <h1><?= !empty($page['title_menu']) ? esc($page['title_menu']) : 'Blog & Novidades' ?></h1>
            </div>
        </div>
    </section>

    <section class="blog-one pb-5">
        <?= $this->include('blog/index') ?>
    </section>

</div>
<?= $this->include('partials/footer') ?>