<div class="testimonial-one__inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="testimonial-one__left">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">Alguns feedbacks</span>
                        <h2 class="section-title__title">O que falam do Credenciamento Sem Fila?</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonial-one__right">
        <div class="testimonial-one__carousel owl-theme owl-carousel">
            <?php if (!empty($testimonials)): ?>
                <?php foreach ($testimonials as $testimonial): ?>
                    <?php if (!empty($testimonial['video_url'])): ?>
                        <!-- Testimonial de Vídeo -->
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__video">
                                <iframe src="<?= $testimonial['video_url'] ?>" width="560" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                            </div>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-details">
                                    <h4 class="testimonial-one__client-name"><?= $testimonial['client_name'] ?></h4>
                                    <p class="testimonial-one__client-title"><?= $testimonial['company_name'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Testimonial de Texto -->
                        <div class="testimonial-one__single">
                            <p class="testimonial-one__text"><?= $testimonial['testimonial_text'] ?></p>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-img">
                                    <img src="<?= base_url('assets/images/testimonial/' . $testimonial['client_photo']) ?>" alt="<?= $testimonial['client_name'] ?>">
                                    <div class="testimonial-one__quote">
                                        <img src="<?= base_url('assets/images/testimonial/testimonial-one-quote.png') ?>" alt="">
                                    </div>
                                </div>
                                <div class="testimonial-one__client-details">
                                    <h4 class="testimonial-one__client-name"><?= $testimonial['client_name'] ?></h4>
                                    <p class="testimonial-one__client-title"><?= $testimonial['company_name'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Não há depoimentos no momento.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="owl-theme">
        <div class="owl-controls">
            <div class="custom-nav owl-nav"></div>
        </div>
    </div>
</div>
