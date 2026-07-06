<?= $this->include('partials/header') ?>

<div class="page-wrapper">
    <header class="main-header clearfix">
        <?= $this->include('partials/menu') ?>
    </header>
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div></div><section class="page-header">
        <div class="page-header-bg" style="background-image: url(<?= base_url('uploads/pages/' . esc($pageData['background'])) ?>)">
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
                    <li class="active"><?= !empty($page['title_menu']) ? esc($page['title_menu']) : esc($pageData['title_destaque1']) ?></li>
                </ul>
                <h1><?= !empty($page['title_menu']) ? esc($page['title_menu']) : esc($pageData['title_destaque1']) ?></h1>
            </div>
        </div>
    </section>
    <section class="service-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="service-details__sidebar">
                        <div class="service-details__need-help">
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
                        <div class="service-details__img">
                            <img src="<?= base_url('uploads/pages/' . esc($pageData['photo_destaque'])) ?>" alt="<?= esc($pageData['title_destaque1']) ?>">
                        </div>
                        <div class="service-details__content">
                            <h2 class="service-details__title"><?= esc($pageData['title_destaque1']) ?></h2>
                            <div class="service-details__text-1" style="line-height: 1.8; color: #666; font-size: 16px; text-align: left;">
                                <?= $pageData['content'] ?>
                            </div>
                            <?php if (!empty($pageData['title_destaque2'])): ?>
                                <h3 class="service-details__title mt-4" style="font-size: 22px; font-weight: 700; text-align: left; color: #1c1c1c;">
                                    <?= esc($pageData['title_destaque2']) ?>
                                </h3>
                            <?php endif; ?>
                            <div class="service-details__text-3" style="line-height: 1.8; color: #666; font-size: 16px; text-align: left;">
                                <?= $pageData['text2'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <?php if (!empty($pageData['text3'])): ?>
                        <div class="service-details__bottom">
                            <ul class="list-unstyled service-details__bottom-list">
                                <li class="service-details__bottom-single">
                                    <div class="service-details__bottom-icon">
                                        <span class="icon-front-end"></span>
                                        <h4 class="service-details__bottom-title">Infraestrutura</h4>
                                        <p class="service-details__bottom-text"><?= esc($pageData['text3']) ?></p>
                                    </div>
                                </li>
                                <li class="service-details__bottom-single">
                                    <div class="service-details__bottom-icon">
                                        <span class="icon-investigation"></span>
                                        <h4 class="service-details__bottom-title">Planejamento</h4>
                                        <p class="service-details__bottom-text"><?= esc($pageData['text4']) ?></p>
                                    </div>
                                </li>
                                <li class="service-details__bottom-single">
                                    <div class="service-details__bottom-icon">
                                        <span class="icon-increment"></span>
                                        <h4 class="service-details__bottom-title">100% Personalizado</h4>
                                        <p class="service-details__bottom-text"><?= esc($pageData['text5']) ?></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($pageData['title_beneficios'])): ?>
                        <div class="service-details__benefits">
                            <div class="row">
                                <div class="col-xl-8 text-start">
                                    <div class="service-details__benefits-content">
                                        <h3 class="service-details__benefits-title"><?= esc($pageData['title_beneficios']) ?></h3>
                                        <div class="service-details__benefits-text" style="line-height: 1.8; color: #666; font-size: 16px; text-align: left;">
                                            <?= $pageData['text_beneficios'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="service-details__benefits-img">
                                        <img src="<?= base_url('uploads/pages/' . esc($pageData['photo_beneficios'])) ?>" alt="<?= esc($pageData['title_beneficios']) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($pageData['partials1'])): ?>
        <section class="brand-three">
            <?= $this->include('partials/' . $pageData['partials1']) ?>
        </section>
    <?php endif; ?>

    <?php if (!empty($pageData['partials2'])): ?>
        <div style="margin-top: 5%"></div>
        <?= $this->include('partials/' . $pageData['partials2']) ?>
    <?php endif; ?>

    <?php if (!empty($pageData['partials3'])): ?>
        <div style="margin-top: 5%"></div>
        <?= $this->include('partials/' . $pageData['partials3']) ?>
    <?php endif; ?>

    <?= $this->include('partials/footer') ?>