<div class="container">
    <div class="thm-swiper__slider swiper-container" data-swiper-options='{
                "spaceBetween": 100,
                "slidesPerView": 5,
                "autoplay": { "delay": 5000 },
                "breakpoints": {
                    "0": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "375": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "575": {
                        "spaceBetween": 30,
                        "slidesPerView": 3
                    },
                    "767": {
                        "spaceBetween": 50,
                        "slidesPerView": 4
                    },
                    "991": {
                        "spaceBetween": 50,
                        "slidesPerView": 5
                    },
                    "1199": {
                        "spaceBetween": 100,
                        "slidesPerView": 5
                    }
                }
            }'>
        <div class="swiper-wrapper">
            <!-- Verifica se há logotipos para exibir -->
            <?php foreach ($clientLogos as $logo): ?>
                <div class="swiper-slide">
                    <!-- Verifica se está na Home ou página interna -->
                    <?php if ($isHome): ?>
                        <img src="<?= base_url('uploads/clientes/' . $logo['logo_image']) ?>" alt="<?= $logo['client_name'] ?>" class="img-fluid">
                    <?php else: ?>
                        <img src="<?= base_url('uploads/clientes/' . $logo['logo_image_white']) ?>" alt="<?= $logo['client_name'] ?>" class="img-fluid">
                    <?php endif; ?>
                </div><!-- /.swiper-slide -->
            <?php endforeach; ?>
        </div>
    </div>
</div>
