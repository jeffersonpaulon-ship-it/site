<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credenciamento Sem Fila | Orçamento Rápido</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="<?= base_url('assets/vendors/animate/animate.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/qutiiz-icons/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/qutiiz.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/qutiiz-responsive.css')?>">

    <script>
        function gtag_report_conversion(url) {
            var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } };
            // gtag('event', 'conversion', { 'send_to': 'AW-SEU_CODIGO_AQUI', 'event_callback': callback });
            window.location = url; 
            return false;
        }
    </script>

    <style>
        /* --- ESTILOS GERAIS DA LP --- */
        body { 
            font-family: 'DM Sans', sans-serif; 
            background-color: #ffffff; 
            color: #333; /* Texto padrão escuro para áreas brancas */
        }

        /* LOGOS - AJUSTE DE TAMANHO */
        .lp-header .navbar-brand img {
            height: 75px; /* Bem maior no topo */
            width: auto;
            transition: 0.3s;
        }
        @media (max-width: 768px) {
            .lp-header .navbar-brand img { height: 50px; } /* Ajuste mobile */
        }

        /* HEADER */
        .lp-header {
            background-color: rgba(14, 26, 53, 0.98); /* Mais opaco para leitura */
            padding: 10px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 9999;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
        }

        /* HERO SECTION */
        .lp-hero {
            background: linear-gradient(rgba(14, 26, 53, 0.92), rgba(14, 26, 53, 0.85)), url('<?= base_url("assets/images/backgrounds/main-slider-1-1.jpg") ?>');
            background-size: cover;
            background-position: center;
            padding-top: 160px;
            padding-bottom: 80px;
            text-align: center;
        }

        /* CORREÇÃO DE TEXTO EM FUNDO ESCURO */
        .section-dark {
            background-color: #0e1a35;
            color: #fff !important;
        }
        /* Força todos os textos dentro da section-dark a serem brancos */
        .section-dark h1, .section-dark h2, .section-dark h3, .section-dark h4, .section-dark p, .section-dark span, .section-dark small {
            color: #fff !important;
        }
        .section-dark .text-muted {
            color: #aaa !important; /* Cinza claro em vez de escuro */
        }

        /* --- CORREÇÃO DOS LOGOS (Mantendo branco no Hover) --- */
        .client-grid-item img {
            max-height: 55px;
            max-width: 100%;
            /* Deixa o logo totalmente branco */
            filter: brightness(0) invert(1);
            opacity: 0.6; 
            transition: all 0.3s ease;
        }
        .client-grid-item:hover img { 
            /* MANTÉM BRANCO, mas aumenta opacidade e tamanho */
            filter: brightness(0) invert(1) drop-shadow(0 0 5px rgba(255,255,255,0.5)); 
            opacity: 1; 
            transform: scale(1.15); 
        }

        /* BOTÃO WHATSAPP PULSANTE */
        .btn-pulse {
            background-color: #25d366;
            color: #fff !important;
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            animation: pulse-green 2s infinite;
            display: inline-block;
            text-decoration: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .btn-pulse:hover { background-color: #128c7e; transform: translateY(-3px); }
        @keyframes pulse-green {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { box-shadow: 0 0 0 20px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        /* ÁREA BRANCA (GET TO KNOW) */
        .get-to-know {
            padding: 100px 0;
            background-color: #fff;
        }
        /* Garante que o texto na área branca seja escuro e legível */
        .get-to-know p, .get-to-know li {
            color: #333 !important; 
        }
        .get-to-know h2 {
            color: #0e1a35 !important;
        }
        .get-to-know .text-muted {
            color: #666 !important;
        }

        /* CONTADORES (Corrigido para não sumir) */
        .counter-one { background-color: #081020; padding: 80px 0; margin:0; }
        .counter-one h3 { color: #fff !important; }
        .counter-one p { color: #ccc !important; }
        .counter-one__icon span { color: #00d4ff !important; font-size: 3rem; }

        /* VÍDEOS */
        .video-wrapper {
            position: relative; padding-bottom: 56.25%; height: 0; border-radius: 12px; overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1);
        }
        .video-wrapper iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }

        /* FOOTER */
        .lp-footer { background-color: #000; color: #ccc; padding: 50px 0; font-size: 0.95rem; }
        .lp-footer img {
            height: 60px; /* Aumentado no Footer */
            width: auto;
            opacity: 1; /* Removida transparência */
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <header class="lp-header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="#" class="navbar-brand">
                <img src="https://www.credenciamentosemfila.com.br/assets/images/brand/logo-credenciamento-sem-fila.svg" alt="Credenciamento Sem Fila">
            </a>
            <a href="https://wa.me/5511914974980" class="btn btn-outline-light rounded-pill btn-sm px-4 fw-bold border-2">
                <i class="fab fa-whatsapp me-2"></i> FALAR AGORA
            </a>
        </div>
    </header>

    <section class="lp-hero section-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <span class="d-block text-uppercase text-info mb-2 fw-bold ls-2" style="letter-spacing: 2px;">Tecnologia para Eventos</span>
                    <h1 class="display-3 fw-bold mb-4" style="font-family: 'Barlow Condensed', sans-serif;">CREDENCIAMENTO <br><span style="color:#00d4ff">SEM FILA</span></h1>
                    <p class="lead mb-5 px-md-5">
                        Biometria Facial, Totens de Autoatendimento e Controle de Acesso.<br>
                        A solução usada por <strong>Uber, Adidas e Lollapalooza</strong>.
                    </p>
                    <a href="https://wa.me/5511914974980?text=Ol%C3%A1%2C%20vim%20pelo%20Google%20e%20gostaria%20de%20um%20or%C3%A7amento" 
                       onclick="return gtag_report_conversion('https://wa.me/5511914974980');"
                       class="btn-pulse">
                       <i class="fab fa-whatsapp me-2"></i> FAZER COTAÇÃO RÁPIDA
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section style="background-color: #050a14;" class="section-dark">
        <div class="container pt-5 pb-4" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
            <p class="text-center text-uppercase text-muted small fw-bold mb-4" style="letter-spacing: 1px;">Confiança de gigantes</p>
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-4 col-md-2 p-3 client-grid-item"><img src="https://www.credenciamentosemfila.com.br/uploads/clientes/1728851518_1e968388a58f920f370c.png" alt="Adidas"></div>
                <div class="col-4 col-md-2 p-3 client-grid-item"><img src="https://www.credenciamentosemfila.com.br/uploads/clientes/1728851268_620310997caa63c966ea.png" alt="Uber"></div>
                <div class="col-4 col-md-2 p-3 client-grid-item"><img src="https://www.credenciamentosemfila.com.br/uploads/clientes/1728851784_56a1e7fb8209ba4700c7.png" alt="SAE Brasil"></div>
                <div class="col-4 col-md-2 p-3 client-grid-item"><img src="https://www.credenciamentosemfila.com.br/uploads/clientes/1728851633_636ffa8b4da5c4e44be9.png" alt="BTFF"></div>
                <div class="col-4 col-md-2 p-3 client-grid-item"><img src="https://www.credenciamentosemfila.com.br/uploads/clientes/1728851045_0a48a0643488c4056488.png" alt="ABCasa"></div>
                <div class="col-4 col-md-2 p-3 client-grid-item"><img src="https://www.credenciamentosemfila.com.br/uploads/clientes/1728852367_582d93df5371fed20eee.png" alt="MM Eventos"></div>
            </div>
        </div>
        <div class="counter-one">
            <div class="container">
                <ul class="list-unstyled counter-one__list d-flex justify-content-between flex-wrap text-center">
                    <li class="counter-one__single wow fadeInUp" data-wow-delay="100ms" style="flex: 1; min-width: 150px;">
                        <div class="counter-one__icon mb-3"><span class="icon-checking"></span></div>
                        <h3 class="odometer">1884</h3>
                        <p class="counter-one__text">Eventos realizados</p>
                    </li>
                    <li class="counter-one__single wow fadeInUp" data-wow-delay="200ms" style="flex: 1; min-width: 150px;">
                        <div class="counter-one__icon mb-3"><span class="icon-recommend"></span></div>
                        <h3 class="odometer">327</h3>
                        <p class="counter-one__text">Clientes</p>
                    </li>
                    <li class="counter-one__single wow fadeInUp" data-wow-delay="300ms" style="flex: 1; min-width: 150px;">
                        <div class="counter-one__icon mb-3"><span class="icon-consulting"></span></div>
                        <h3 class="odometer">978k</h3>
                        <p class="counter-one__text">Participantes</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="get-to-know">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="get-to-know__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="get-to-know__img">
                            <img src="<?= base_url('assets/images/resources/get-to-know-img.jpg') ?>" alt="Equipe CSF" class="img-fluid rounded-4 shadow-lg">
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
                <div class="col-xl-6">
                    <div class="get-to-know__right ps-lg-5">
                        <div class="get-to-know-big-text" style="opacity: 0.05; color: #000;">CSF</div>
                        <div class="section-title text-left">
                            <span class="section-title__tagline text-primary fw-bold ls-1">Credenciamento Sem Fila</span>
                            <h2 class="section-title__title display-5 fw-bold" style="font-family: 'Barlow Condensed'; color: #0e1a35;">Somos especialistas em tecnologia para eventos</h2>
                        </div>
                        <p class="get-to-know__text-1 lead fw-bold mb-3" style="color: #000;">Faça do credenciamento do seu evento uma experiência inesquecível!</p>
                        <p class="get-to-know__text-2 mb-4" style="color: #555;">Agilidade, simpatia e muita tecnologia. Nós da Credenciamento Sem Fila temos soluções personalizadas, desde o convite via WhatsApp até o portal do cliente 100% personalizado. Levando a melhor experiência para cada usuário.</p>
                        
                        <a href="https://wa.me/5511914974980?text=Ol%C3%A1%2C%20vi%20a%20tecnologia%20de%20voc%C3%AAs%20e%20quero%20sabber%20mais" 
                           onclick="return gtag_report_conversion('https://wa.me/5511914974980');"
                           class="btn-pulse" style="margin-top:0; box-shadow: none;">
                           <i class="fab fa-whatsapp me-2"></i> QUERO ESSA EXPERIÊNCIA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 section-dark">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="font-family: 'Barlow Condensed', sans-serif;">Veja na prática</h2>
                <p class="text-muted">O que dizem sobre a nossa agilidade.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/SEU_VIDEO_ID?controls=1&rel=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/SEU_VIDEO_ID_2?controls=1&rel=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background: linear-gradient(to bottom, #0e1a35, #000);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center p-5 rounded-4 border border-secondary" style="background: rgba(255,255,255,0.03); backdrop-filter: blur(10px);">
                        <h2 class="text-white fw-bold mb-3" style="font-family: 'Barlow Condensed', sans-serif;">VAMOS ORGANIZAR SEU EVENTO?</h2>
                        <p class="mb-4 text-white">Nossa assistente virtual inicia seu atendimento agora mesmo.</p>

                        <a href="https://wa.me/5511914974980?text=Ol%C3%A1%2C%20vim%20pelo%20Google%20e%20quero%20fechar%20meu%20evento" 
                           onclick="return gtag_report_conversion('https://wa.me/5511914974980');"
                           class="btn btn-success btn-lg rounded-pill px-5 py-3 fw-bold w-100 btn-pulse"
                           style="background-color: #25d366; border:none; box-shadow: none; animation: none;">
                            <i class="fab fa-whatsapp me-2"></i> CHAMAR NO WHATSAPP
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="lp-footer text-center">
        <div class="container">
            <img src="https://www.credenciamentosemfila.com.br/assets/images/brand/logo-credenciamento-sem-fila.svg" alt="CSF">
            <p class="mb-0">Av. das Nações Unidas, 14.171 - Morumbi - São Paulo - SP</p>
            <small>© 2026 Credenciamento Sem Fila.</small>
        </div>
    </footer>

    <script src="<?= base_url('assets/vendors/jquery/jquery-3.6.0.min.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/vendors/wow/wow.js')?>"></script>
    <script src="<?= base_url('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')?>"></script>
    <script>
        $(document).ready(function () {
            if ($(".wow").length) {
                var wow = new WOW({ boxClass: "wow", animateClass: "animated", offset: 20, mobile: true, live: true });
                wow.init();
            }
            if ($(".video-popup").length) {
                $(".video-popup").magnificPopup({ type: "iframe", mainClass: "mfp-fade", removalDelay: 160, preloader: true, fixedContentPos: false });
            }
        });
    </script>
</body>
</html>