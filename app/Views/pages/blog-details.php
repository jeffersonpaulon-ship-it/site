<?= $this->include('partials/header') ?>
    <div class="page-wrapper">
        <header class="main-header clearfix">
            <?= $this->include('partials/menu') ?>
        </header>
        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url('<?= base_url('assets/images/backgrounds/contato-csf-bg.jpg') ?>')">
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
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Blog</li>
                    </ul>
                    <h1><?= esc($blog['title']) ?></h1>
                </div>
            </div>
        </section>
        <!--Page Header End-->
    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="<?= base_url('uploads/' . $blog['main_image']) ?>" alt="<?= esc($blog['title']) ?>">
                            <div class="blog-details__date-box">
                                <p>Criado em: <?= date('d/m/Y', strtotime($blog['created_at'])) ?></p>
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <ul class="list-unstyled blog-details__meta">
                                <li><a href="#"><i class="far fa-user-circle"></i> <?= esc($blog['author']) ?></a></li>
                                <li><a href="#"><i class="far fa-folder-open"></i> <?= esc($blog['category']) ?></a></li>
                            </ul>
                            <h3 class="blog-details__title"><?= esc($blog['title']) ?></h3>
                            <p class="blog-details__text-1"><?= $blog['content'] ?></p>
                        </div>
                        <div class="blog-details__bottom">
                            <p class="blog-details__tags">
                                <span>Tags</span>
                                <!-- Se houver tags específicas, você pode exibir aqui -->
                                <div class="sidebar__tags-list">
                                    <?php foreach ($tags as $tag): ?>
                                        <a href="#"><?= esc(trim($tag)) ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </p>
                            <div class="blog-details__social-list">
                                <a href="https://twitter.com/intent/tweet?text=<?= urlencode($blog['title']) ?>&url=<?= urlencode(current_url()) ?>" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>" target="_blank">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode(current_url()) ?>" target="_blank">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Últimas postagens</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                <?php if (!empty($latestPosts)): ?>
                                    <?php foreach ($latestPosts as $post): ?>
                                        <li>
                                            <div class="sidebar__post-image">
                                                <img src="<?= base_url('uploads/' . $post['main_image']) ?>" alt="<?= esc($post['title']) ?>">
                                            </div>
                                            <div class="sidebar__post-content">
                                                <h3>
                                                    <a href="<?= base_url('blog/' . $post['slug']) ?>">
                                                        <?= esc($post['title']) ?>
                                                    </a>
                                                </h3>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <li>
                                        <p>Nenhum post recente disponível.</p>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <!-- Adicionar outras seções do sidebar, como categorias e tags -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->include('partials/footer') ?>