<div class="container">
    <div class="section-title text-center">
        <span class="section-title__tagline">Nosso blog</span>
        <h2 class="section-title__title">Novidades do mercado de eventos</h2>
    </div>
    <div class="row">
        <?php if (!empty($recentPosts)): ?>
            <?php foreach ($recentPosts as $post): ?>
                <div class="col-xl-4 col-lg-4">
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="<?= base_url('uploads/' . $post['main_image']) ?>" alt="<?= $post['title'] ?>">
                            <a href="<?= base_url('blog/' . $post['slug']) ?>">
                                <span class="blog-one__plus"></span>
                            </a>
                        </div>
                        <div class="blog-one__content">
                            <h1 class="blog-one__title">
                                <a href="<?= base_url('blog/' . $post['slug']) ?>"><?= $post['title'] ?></a>
                            </h1>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum post de blog disponível no momento.</p>
        <?php endif; ?>
    </div>
</div>
