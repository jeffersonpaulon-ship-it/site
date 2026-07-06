<?php 
helper('text'); 
?>

<?= $this->include('partials/header') ?>

<div class="page-wrapper">
    <header class="main-header clearfix">
        <?= $this->include('partials/menu') ?>
    </header>
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div>
    </div>

    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(<?= !empty($pageData['background']) ? base_url('uploads/pages/' . esc($pageData['background'])) : base_url('assets/images/backgrounds/cases-sucesso-solucoes-eventos-bg.jpg') ?>)">
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
                    <li class="active">Cases</li>
                </ul>
                <h1><?= !empty($pageData['title_destaque1']) ? esc($pageData['title_destaque1']) : 'Cases de Sucesso em Eventos' ?></h1>
            </div>
        </div>
    </section>

    <section class="cases-introduction pt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-title text-start"> 
                        <span class="section-title__tagline">Portfólio & Performance</span>
                        <h2 class="section-title__title" style="font-size: 2.5rem; margin-bottom: 20px;">
                            Nossos Cases: Projetos de Credenciamento e Controle de Acesso
                        </h2>
                    </div>
                    <?php if (!empty($pageData['text1'])): ?>
                        <div class="cases-intro-text text-muted text-start" style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 40px;">
                            <?= $pageData['text1'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="projects-page pt-3 pb-5">
        <div class="container">
            <div class="row filter-layout">
                <?php if (!empty($cases) && is_array($cases)): ?>
                    <?php foreach ($cases as $case): ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item bra photo web">
                            <div class="project-one__single">
                                <div class="project-one__img">
                                    
                                    <?php if (!empty($case['image_site'])): ?>
                                        <img src="<?= base_url('assets/images/cases/' . esc($case['image_site'])) ?>" alt="Case de Sucesso: <?= esc($case['title']) ?> - Credenciamento Sem Fila">
                                    <?php else: ?>
                                        <img src="<?= base_url('assets/images/resources/default-image.jpg') ?>" alt="Soluções em tecnologia para eventos corporativos">
                                    <?php endif; ?>

                                    <div class="project-one__hover">
                                        <p class="project-one__tagline"><?= esc($case['category'] ?? 'Case de Sucesso') ?></p>
                                        <h3 class="project-one__title">
                                            <a href="<?= base_url('case/' . esc($case['slug'])) ?>">
                                                <?= esc($case['client'] ?? $case['title']) ?>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p class="alert alert-info">Nenhum evento em portfólio indexado no momento.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if (!empty($pageData['title_destaque2'])): ?>
    <section class="service-details bg-light py-5" style="border-top: 1px solid #eee;">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="service-details__sidebar" style="margin-bottom: 30px;">
                        <div class="service-details__need-help" style="padding: 40px 35px;">
                            <div class="service-details__need-help-bg" style="background-image: url(<?= base_url('assets/images/backgrounds/service-details-need-help-bg.jpg') ?>)">
                            </div>
                            <div class="service-details__need-help-icon">
                                <span class="icon-chatting"></span>
                            </div>
                            <h3 class="service-details__need-help-title">Sistemas & Serviços <br> de Qualidade</h3>
                            <div class="service-details__need-help-contact">
                                <p>Entre em contato</p>
                                <a href="https://api.whatsapp.com/send?phone=5511914974980" target="_blank">11 91497.4980</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-8 col-lg-7">
                    <div class="service-details__right">
                        <div class="service-details__content">
                            <h2 class="service-details__title" style="font-size: 2rem; font-weight: 700; margin-bottom: 20px;">
                                <?= esc($pageData['title_destaque2']) ?>
                            </h2>
                            <div class="service-details__text-1" style="line-height: 1.8; color: #666;">
                                <?= $pageData['text2'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
</div>

<?= $this->include('partials/footer') ?>