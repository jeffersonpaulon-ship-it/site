<?= $this->include('partials/header') ?>
    <div class="page-wrapper">
        <header class="main-header clearfix">
            <?= $this->include('partials/menu') ?>
        </header>
        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>

        <section class="page-header">
            <div class="page-header-bg" style="background-image: url(<?= base_url('uploads/projects/' . esc($case['image_bg'])) ?>)">
            </div>
            <div class="page-header-border"></div>

            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li><a href="<?= base_url('cases') ?>">Cases de Sucesso</a></li>
                        <li class="active"><?= esc($case['title']) ?></li>
                    </ul>
                    <h1><?= esc($case['title']) ?></h1>
                </div>
            </div>
        </section>
        <section class="project-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project-details__img">
                            <img src="<?= base_url('uploads/projects/' . esc($case['image'])) ?>" alt="<?= esc($case['title']) ?> - Credenciamento Sem Fila">
                        </div>
                    </div>
                </div>
                <div class="project-details__content">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="project-details__content-left">
                                <h2 class="project-details__content-title">O Desafio no <?= esc($case['title']) ?></h2>
                                
                                <div class="project-details__content-text">
                                    <?= $case['content'] // Renderiza o HTML vindo do banco ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="project-details__content-right">
                                <div class="project-details__details-box">
                                    <div class="project-details__details-info">
                                        <div class="project-details__details-info-single">
                                            <h5 class="project-details__details-info-client">Cliente:</h5>
                                            <p class="project-details__details-info-name"><?= esc($case['client_name']) ?></p>
                                        </div>
                                        <div class="project-details__details-info-single">
                                            <h5 class="project-details__details-info-client">Categoria:</h5>
                                            <p class="project-details__details-info-name"><?= esc($case['category_name']) ?></p>
                                        </div>
                                    </div>
                                    <div class="project-details__details-social-list">
                                        <a href="https://www.linkedin.com/company/credenciamentosemfila" target="_blank"><i class="fab fa-linkedin"></i></a>
                                        <a href="https://www.facebook.com/credenciamentosemfila" target="_blank"><i class="fab fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/credenciamentosemfila/" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a href="https://api.whatsapp.com/send/?phone=5511914974980&text&type=phone_number&app_absent=0" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if (!empty($case['galeria_interna'])): ?>
                <div class="row mt-5">
                    <div class="col-xl-12">
                        <h3 class="mb-4">Galeria de Fotos do Evento</h3>
                    </div>
                    <?php foreach ($case['galeria_interna'] as $foto): ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                        <div class="project-gallery__single">
                            <img src="<?= base_url('uploads/projects/' . esc($foto)) ?>" alt="Foto extra de <?= esc($case['title']) ?>" class="img-fluid" style="width: 100%; height: 440px; object-fit: cover; border-radius: 8px;">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <div class="row mt-5">
                    <div class="col-xl-12">
                        <div class="project-details__pagination-box">
                            <ul class="project-details__pagination list-unstyled">
                                <?php if (!empty($previousCase)): ?>
                                <li class="previous">
                                    <p class="project-details__pagination-sub-title">Case Anterior</p>
                                    <a href="<?= base_url('projeto/' . $previousCase['slug']) ?>" aria-label="Previous">
                                        <span class="project-details__pagination-title"><?= esc($previousCase['title']) ?></span>
                                        <i class="icon-right-arrow"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                                
                                <li class="count"><a href="<?= base_url('cases') ?>"><i class="fas fa-th"></i></a></li>
                                
                                <?php if (!empty($nextCase)): ?>
                                <li class="next">
                                    <p class="project-details__pagination-sub-title">Próximo Case</p>
                                    <a href="<?= base_url('projeto/' . $nextCase['slug']) ?>" aria-label="Next">
                                        <span class="project-details__pagination-title"><?= esc($nextCase['title']) ?></span>
                                        <i class="icon-right-arrow"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="similar-work">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Mais Projetos</span>
                    <h2 class="section-title__title">Conheça alguns eventos realizados</h2>
                </div>
                <div class="row">
                    <?php if(!empty($similarCases)): foreach($similarCases as $similar): ?>
                    <div class="col-xl-4 col-lg-4">
                        <div class="project-one__single">
                            <div class="project-one__img">
                                <img src="<?= base_url('uploads/projects/' . esc($similar['image'])) ?>" alt="Evento <?= esc($similar['title']) ?>">
                                <div class="project-one__hover">
                                    <p class="project-one__tagline"><?= esc($similar['category_name']) ?></p>
                                    <h3 class="project-one__title">
                                        <a href="<?= base_url('projeto/' . esc($similar['slug'])) ?>">
                                            <?= esc($similar['title']) ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>
        </div>
<?= $this->include('partials/footer') ?>