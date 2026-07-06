<div class="swiper-container thm-swiper__slider" data-swiper-options='{
            "slidesPerView": 1,
            "loop": true,
            "effect": "fade",
                "pagination": {
                    "el": "#main-slider-pagination",
                    "type": "bullets",
                    "clickable": true
                },
                "navigation": {
                    "nextEl": "#main-slider__swiper-button-next",
                    "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                    "delay": 5000
                }
            }'>
    <div class="swiper-wrapper">
        <?php foreach ($sliders as $index => $slider): ?>
            <div class="swiper-slide">
                <!-- Concatenar o caminho base com o nome da imagem -->
                <div class="image-layer" style="background-image: url(<?= base_url('assets/images/backgrounds/' . $slider['image']) ?>);">
                </div>
                <!-- /.image-layer -->
                <div class="main-slider-border"></div>
                <div class="main-slider-border main-slider-border-two"></div>
                <div class="main-slider-border main-slider-border-three"></div>
                <div class="main-slider-border main-slider-border-four"></div>
                <div class="main-slider-border main-slider-border-five"></div>
                <div class="main-slider-border main-slider-border-six"></div>

                <div class="main-slider-shape-1"></div>
                <div class="main-slider-shape-2"></div>
                <div class="main-slider-shape-3"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-slider__content">
                                <p><?= $slider['subtitle'] ?></p>
                                
                                <?php if ($index === 0): ?>
                                    <h1><?= $slider['title'] ?></h1>
                                <?php else: ?>
                                    <h2><?= $slider['title'] ?></h2>
                                <?php endif; ?>
                                
                                <a href="<?= $slider['button_link'] ?>" class="thm-btn"><?= $slider['button_text'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination" id="main-slider-pagination"></div>
    <div class="main-slider__nav">
        <div class="swiper-button-prev" id="main-slider__swiper-button-next">
            <i class="icon-right-arrow icon-left-arrow"></i>Anterior
        </div>
        <div class="swiper-button-next" id="main-slider__swiper-button-prev">
            Próximo <i class="icon-right-arrow"></i>
        </div>
    </div>
</div>