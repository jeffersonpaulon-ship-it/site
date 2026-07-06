<footer class="site-footer">
    <div class="site-footer__top">
        <div class="container">
            <div class="site-footer__top-inner">
                <div class="site-footer__top-left">
                    <div class="site-footer__top-logo">
                        <a href="<?= base_url() ?>">
                            <img src="<?= base_url('assets/images/brand/logo-credenciamento-sem-fila.svg') ?>" class="logo" alt="Credenciamento Sem Fila - CSF - Logotipo">
                        </a>
                    </div>
                    <div class="site-footer__top-title-box">
                        <h3 class="site-footer__top-title">Vamos trabalhar juntos? Mande um e-mail para nós! <a href="mailto:comercial@credenciamentosemfila.com.br" target="_blank">comercial@credenciamentosemfila.com.br</a></h3>
                    </div>
                </div>
                <div class="site-footer__top-right">
                    <div class="site-footer__top-right-social">
                        <a href="https://www.facebook.com/credenciamentosemfila" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/credenciamentosemfila/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/credenciamentosemfila" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__middle">
        <div class="site-footer-shape" style="background-image: url(<?= base_url('assets/images/shapes/site-footer-shape.png') ?>)"></div>
        <div class="container">
            <div class="site-footer__middle-inner">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="100ms">
                        <div class="footer-widget__column footer-widget__about">
                            <h3 class="footer-widget__title">Quem Somos</h3>
                            <div class="footer-widget__about-text-box">
                                <p class="footer-widget__about-text">Transforme a primeira impressão em uma experiência memorável com o Credenciamento Sem Fila.</p>
                            </div>
                            <ul class="footer-widget__about-contact">
                                <li>
                                    <div class="icon">
                                        <i class="fab fa-whatsapp-square"></i>
                                    </div>
                                    <div class="text">
                                        <a href="https://api.whatsapp.com/send?phone=5511914974980" target="_blank">11 91497-4980</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="text">
                                        <a href="mailto:comercial@credenciamentosemfila.com.br" target="_blank">comercial@credenciamentosemfila.com.br</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="text">
                                        <p>Av. das Nações Unidas, 14.171 - Morumbi - São Paulo - SP</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="site-footer__bottom-inner">
                            <div class="site-footer__bottom-left">
                                <p class="site-footer__bottom-text">© Copyrights, <?= date('Y') ?> <a href="https://www.gridetotal.com.br" target="_blank">GrideTotal</a></p>
                            </div>
                            <div class="site-footer__bottom-right">
                                <ul class="list-unstyled site-footer__bottom-menu">
                                    <li><a href="#">Termos e Condições</a></li>
                                    <li><a href="#">Política de Privacidade</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div><div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="<?= base_url() ?>" aria-label="logo image"><img src="<?= base_url('assets/images/brand/logo-credenciamento-sem-fila.svg') ?>" width="155" alt="Credenciamento Sem Fila - CSF - Logotipo"></a>
        </div>
        <div class="mobile-nav__container"></div>

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:contato@credenciamentosemfila.com.br" target="_blank">contato@credenciamentosemfila.com.br</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="https://api.whatsapp.com/send?phone=5511914974980" target="_blank">11 91497.4980</a>
            </li>
        </ul>
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="https://www.facebook.com/credenciamentosemfila" class="fab fa-facebook-square" target="_blank"></a>
                <a href="https://www.instagram.com/credenciamentosemfila/" class="fab fa-instagram" target="_blank"></a>
                <a href="https://www.linkedin.com/company/credenciamentosemfila" class="fab fa-linkedin" target="_blank"></a>
            </div>
        </div>
    </div>
</div>

<div class="whatsapp-button" id="whatsapp-button">
    <i class="fab fa-whatsapp"></i>
</div>
<div class="whatsapp-tooltip" id="whatsapp-tooltip">Fale conosco agora!</div>

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

<div id="cookieConsent" class="cookie-consent">
    <div class="cookie-message">
        <p>Este site utiliza cookies para melhorar sua experiência. Ao continuar navegando, você concorda com o uso de cookies. <a href="<?= base_url('politica-de-privacidade') ?>">Saiba mais</a>.</p>
        <button id="acceptCookies" class="btn-cookie">Aceitar</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var cookieConsent = document.getElementById('cookieConsent');
        var acceptCookies = document.getElementById('acceptCookies');

        if (!localStorage.getItem('cookieConsentAccepted')) {
            cookieConsent.style.display = 'block';
        }

        acceptCookies.addEventListener('click', function() {
            localStorage.setItem('cookieConsentAccepted', 'true');
            cookieConsent.style.display = 'none';
        });
    });
</script>

<script>
    document.getElementById('whatsapp-button').addEventListener('click', function() {
        window.location.href = 'https://wa.me/5511914974980';
    });

    document.getElementById('whatsapp-button').addEventListener('mouseenter', function() {
        document.getElementById('whatsapp-tooltip').style.display = 'block';
    });

    document.getElementById('whatsapp-button').addEventListener('mouseleave', function() {
        document.getElementById('whatsapp-tooltip').style.display = 'none';
    });
</script>

<script src="<?= base_url('assets/vendors/jquery/jquery-3.6.0.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/jquery-appear/jquery.appear.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/jquery-validate/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/odometer/odometer.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/swiper/swiper.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/wow/wow.js') ?>"></script>
<script src="<?= base_url('assets/vendors/owl-carousel/owl.carousel.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/timepicker/timePicker.js') ?>"></script>
<script src="<?= base_url('assets/vendors/isotope/isotope.js') ?>"></script>
<script src="<?= base_url('assets/js/qutiiz.js') ?>"></script>