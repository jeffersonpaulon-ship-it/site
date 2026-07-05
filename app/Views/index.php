<?= $this->include('partials/header') ?>
<body>
<div class="preloader">
    <img class="preloader__image" src="assets/images/loader.png" alt="CSF - Credenciamento Sem Fila">
</div>
<!-- /.preloader -->
<div class="page-wrapper">
    <header class="main-header clearfix">
        <?= $this->include('partials/menu') ?>
    </header>

    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->

    <!--Main Slider Start-->
    <section class="main-slider">
        <?= $this->include('partials/slider') ?>
    </section>
    <!--Main Slider End-->

    <!--Services One Start-->
    <section class="services-one">
        <div class="services-one-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"><img class="float-bob-x" src="assets/images/shapes/services-one-shape.png" alt=""></div>
        <div class="container">
            <div class="services-one__top">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="services-one__top-left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Principais Serviços</span>
                                <h2 class="section-title__title">O que nós oferecemos</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="services-one__top-text-box">
                            <p class="services-one__top-text">Temos uma gama repleta de soluções para seus eventos. Seja um credenciamento normal até um serviço com pagamento.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services-one__bottom">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="list-unstyled services-one__list">
                            <li class="services-one__single wow fadeInUp" data-wow-delay="100ms">
                                <div class="services-one__icon">
                                    <span class="icon-online-shopping"></span>
                                </div>
                                <div class="services-one__count"></div>
                                <h3 class="services-one__title"><a href="credenciamento-para-eventos">Credenciamento <br>
                                        para eventos</a></h3>
                                <a class="services-one__arrow" href="credenciamento-para-eventos"><span class="icon-right-arrow"></span></a>
                            </li>
                            <li class="services-one__single wow fadeInUp" data-wow-delay="200ms">
                                <div class="services-one__icon">
                                    <span class="icon-growth"></span>
                                </div>
                                <div class="services-one__count"></div>
                                <h3 class="services-one__title"><a href="controle-acesso">Controle  <br> de Acesso</a></h3>
                                <a class="services-one__arrow" href="controle-acesso"><span class="icon-right-arrow"></span></a>
                            </li>
                            <li class="services-one__single wow fadeInUp" data-wow-delay="300ms">
                                <div class="services-one__icon">
                                    <span class="icon-webpage"></span>
                                </div>
                                <div class="services-one__count"></div>
                                <h3 class="services-one__title"><a href="manual-expositor-caex">Manual do <br>
                                        Expositor</a></h3>
                                <a class="services-one__arrow" href="manual-expositor-caex"><span class="icon-right-arrow"></span></a>
                            </li>
                            <li class="services-one__single wow fadeInUp" data-wow-delay="400ms">
                                <div class="services-one__icon">
                                    <span class="icon-front-end"></span>
                                </div>
                                <div class="services-one__count"></div>
                                <h3 class="services-one__title"><a href="games-para-eventos">Games para <br>
                                        eventos</a></h3>
                                <a class="services-one__arrow" href="games-para-eventos"><span class="icon-right-arrow"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="services-one__find-solutions">
                <div class="row">
                    <div class="col-xl-12">
                        <p class="services-one__find-solutions-text">Somos especialistas em software para eventos. <a href="quem-somos">Conheça um pouco mais do Credenciamento Sem Fila</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Services One End-->

    <!--Get To Know Start-->
    <section class="get-to-know" style="position: relative; display: block; overflow: hidden; margin-top: 3%">
        <div class="container">
            <div class="row align-items-center"> <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="get-to-know__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms" style="position: relative; display: block; width: 100%;">
                        <div class="get-to-know__img" style="position: relative; display: block; width: 100%; overflow: hidden; border-radius: 8px;">
                            
                            <img src="assets/images/resources/get-to-know-img.jpg" alt="Somos especialistas em credenciamento" style="display: block; width: 100% !important; height: auto !important; max-width: 100% !important; object-fit: cover;">
                            
                            <div class="get-to-know__video-link">
                                <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                    <div class="get-to-know__video-icon">
                                        <span class="icon-play-button"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="get-to-know__right" style="position: relative; display: block; padding-left: 20px; z-index: 1;">
                        <div class="get-to-know-big-text">CSF</div>
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Credenciamento Sem Fila</span>
                            <h2 class="section-title__title">Somos especialistas em credenciamento</h2>
                        </div>
                        <p class="get-to-know__text-1">Faça o credenciamento de seu evento, ser uma experiência inesquecível!</p>
                        <p class="get-to-know__text-2">Agilidade, simpatia e muita tecnologia. Nós da Credenciamento Sem Fila, temos diversas soluções personalizadas e tecnológicas. Possuímos o convite personalizado via WhatsApp, além do e-mail e também do portal do cliente, onde é 100% personalizado com layout único para cada cliente. Levando a melhor experiência para cada usuário.</p>
                        <div style="margin-top: 5%">
                            <a href="quem-somos" class="btn-lg btn-primary">Conheça-nos</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Get To Know End-->

    <!--Brand One Start-->
    <section class="brand-one">
        <?= $this->include('partials/client_logos') ?>
    </section>
    <!--Brand One End-->

    <!--Project One Start-->
    <section class="project-one">
        <?= $this->include('partials/gallery') ?>
    </section>
    <!--Project One End-->

    <!--Counter One Start-->
    <?= $this->include('partials/numbers') ?>
    <!--Counter One End-->

    <!--Why Choose One Start-->
    <section class="why-choose-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="why-choose-one__left wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="why-choose-one__img">
                            <img src="assets/images/resources/why-choose-one-img.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="why-choose-one__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Benefícios do Credenciamento Sem Fila</span>
                            <h2 class="section-title__title">Por que escolher o Credenciamento Sem Fila?</h2>
                        </div>
                        <p class="why-choose-one__text">Uma empresa repleta de soluções para qualquer evento. Seja uma solução integrada com outras plataformas como Eduzz e Sympla, ou com nossas soluções repletas de novidades, inclusive com biometria facial.</p>
                        <div class="why-choose-one__bottom">
                            <div class="why-choose-one__bottom-img">
                                <img src="assets/images/resources/why-choose-one-bottom-img.jpg" alt="">
                            </div>
                            <ul class="list-unstyled why-choose-one__points">
                                <li>
                                    <div class="icon">
                                        <span class="icon-draw-check-mark"></span>
                                    </div>
                                    <div class="text">
                                        <p>Credenciamento para eventos</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-draw-check-mark"></span>
                                    </div>
                                    <div class="text">
                                        <p>Controle de acesso</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-draw-check-mark"></span>
                                    </div>
                                    <div class="text">
                                        <p>Sistemas responsivos</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-draw-check-mark"></span>
                                    </div>
                                    <div class="text">
                                        <p>Sistemas personalizados</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose One End-->

    <!--Team One Start-->
    <section class="team-one">
        <?= $this->include('partials/team') ?>
    </section>
    <!--Team One End-->

    <!--Testimonial One Start-->
    <section class="testimonial-one">
        <?= $this->include('partials/testimonials') ?>
    </section>
    <!--Testimonial One End-->

    <!--Qutiiz Ready Start-->
    <section class="qutiiz-ready">
        <div class="qutiiz-ready-bg-box">
            <div class="qutiiz-ready-bg jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/images/backgrounds/qutiiz-ready-bg.jpg)"></div>
        </div>
        <div class="container">
            <div class="qutiiz-ready__inner">
                <div class="qutiiz-ready__icon">
                    <span class="icon-wealth"></span>
                </div>
                <h2 class="qutiiz-ready__title">Credenciamento Sem Fila leva muita <br> <span>tecnologia</span> para seus eventos</h2>
            </div>
        </div>
    </section>
    <!--Qutiiz Ready End-->

    <!--Financial Advice Start-->
    <section class="financial-advice">
        <div class="financial-advice-bg" style="background-image: url(assets/images/shapes/financial-advice-shape.png)"></div>
        <div class="container">
            <div class="financial-advice__tab-box tabs-box">
                <ul class="tab-buttons clearfix list-unstyled">
                    <li data-tab="#business" class="tab-btn"><span>Manual do Expositor</span></li>
                    <li data-tab="#financial" class="tab-btn active-btn"><span>Credenciamento</span></li>
                    <li data-tab="#soltution" class="tab-btn"><span>Controle de Acesso</span></li>
                </ul>
                <div class="tabs-content">
                    <!--tab-->
                    <div class="tab" id="business">
                        <div class="tabs-content__inner">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="tabs-content__left">
                                        <ul class="list-unstyled tabs-content__points">
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-draw-check-mark"></span>
                                                </div>
                                                <div class="text">
                                                    <h4>CAEX Online</h4>
                                                    <p>Temos áreas específicas para cada setor: Expositores, Montadoras, Serviços, Fiscais e Promotora. </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-draw-check-mark"></span>
                                                </div>
                                                <div class="text">
                                                    <h4>Pagamentos</h4>
                                                    <p>Todas as taxas são geradas e de forma automática gera o boleto de cobrança e após o pagamento é emitido o recibo com o valor.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="tabs-content__right">
                                        <div class="tabs-content__experience-box">
                                            <div class="tabs-content__experience-content">
                                                <div class="tabs-content__experience-icon">
                                                    <span class="icon-consulting"></span>
                                                </div>
                                                <h3 class="tabs-content__experience-title">Venha conhecer um pouco mais</h3>
                                                <a href="manual-expositor-caex" class="tabs-content__experience-btn">Caex Online</a>
                                            </div>
                                            <div class="tabs-content__experience-img">
                                                <img src="assets/images/resources/tabs-content-experience-img.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tab-->
                    <div class="tab active-tab" id="financial">
                        <div class="tabs-content__inner">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="tabs-content__left">
                                        <ul class="list-unstyled tabs-content__points">
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-draw-check-mark"></span>
                                                </div>
                                                <div class="text">
                                                    <h4>Credenciamento</h4>
                                                    <p>Temos um credenciamento super ágil e customizável, fazendo desde a busca por qualquer campo, até com biometria facial.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-draw-check-mark"></span>
                                                </div>
                                                <div class="text">
                                                    <h4>Soluções 100% personalizadas</h4>
                                                    <p>Temos soluções para totens com imagem e vídeo, landing page e tudo personalizado.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="tabs-content__right">
                                        <div class="tabs-content__experience-box">
                                            <div class="tabs-content__experience-content">
                                                <div class="tabs-content__experience-icon">
                                                    <span class="icon-consulting"></span>
                                                </div>
                                                <h3 class="tabs-content__experience-title">Apenas 3 segundos</h3>
                                                <a href="credenciamento-para-eventos" class="tabs-content__experience-btn">Saiba mais</a>
                                            </div>
                                            <div class="tabs-content__experience-img">
                                                <img src="assets/images/resources/tabs-content-experience-img.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tab-->
                    <div class="tab " id="soltution">
                        <div class="tabs-content__inner">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="tabs-content__left">
                                        <ul class="list-unstyled tabs-content__points">
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-draw-check-mark"></span>
                                                </div>
                                                <div class="text">
                                                    <h4>Se enquadra a seu orçamento</h4>
                                                    <p>Nosso controle de acesso possui diversas formas sendo através: foto ou biometria facial, leitura de qrcode ou código de barras, ou ainda, catracas.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-draw-check-mark"></span>
                                                </div>
                                                <div class="text">
                                                    <h4>Garantia</h4>
                                                    <p>Nosso controle de acesso possui a garantia de que somente pessoas liberadas passarão nos acessos permitidos.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="tabs-content__right">
                                        <div class="tabs-content__experience-box">
                                            <div class="tabs-content__experience-content">
                                                <div class="tabs-content__experience-icon">
                                                    <span class="icon-consulting"></span>
                                                </div>
                                                <h3 class="tabs-content__experience-title">Qualidade, Eficiência, Tecnologia...</h3>
                                                <a href="controle-acesso" class="tabs-content__experience-btn">Conheça-nos</a>
                                            </div>
                                            <div class="tabs-content__experience-img">
                                                <img src="assets/images/resources/tabs-content-experience-img.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="financial-advice__bottom">
                <p class="financial-advice__bottom-text">Quer uma solução mais específica? <a href="contato">Entre em contato.</a></p>
            </div>
        </div>
    </section>
    <!--Financial Advice End-->

    <!--Blog One Start-->
    <section class="blog-one">
        <?= $this->include('blog/index') ?>
    </section>
    <!--Blog One End-->

    <!--CTA One Start-->
    <section class="cta-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cta-one__inner wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="cta-one-shape-1"></div>
                        <div class="cta-one-shape-2"></div>
                        <div class="cta-one-shape-3"></div>
                        <div class="cta-one__left">
                            <h2 class="cta-one__title">Credenciamento eficaz e em 3 segundos <br>  sua credencial esta entregue.</h2>
                        </div>
                        <div class="cta-one__right">
                            <a href="contato" class="cta-one__btn thm-btn">Entre em contato</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CTA One End-->
    <?= $this->include('partials/footer') ?>
</body>

</html>