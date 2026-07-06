<?= $this->include('partials/header') ?>
    <div class="page-wrapper">
    <header class="main-header clearfix">
        <?= $this->include('partials/menu') ?>
    </header>
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->

<section class="page-header">
    <div class="page-header-bg" style="background-image: url(<?= base_url('assets/images/cases/' . $case['image_banner']) ?>)">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="<?= base_url('/') ?>">Home</a></li>
                <li class="active"><?= esc($case['title']) ?></li>
            </ul>
            <h1><?= esc($case['title']) ?></h1>
        </div>
    </div>
</section>

<!-- Detalhes do case -->
<section class="project-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="">
                    <img src="<?= base_url('assets/images/cases/' . $case['featured_image']) ?>" alt="<?= esc($case['title']) ?>">
                </div>
            </div>
        </div>
        <div class="project-details__content">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="project-details__content-left">
                        <h3 class="project-details__content-title"><?= esc($case['title']) ?></h3>
                        <p class="project-details__content-text-1"><?= $case['description'] ?></p>

                        <p class="project-details__content-text-2"><?= $case['description2'] ?></p>
                        <ul class="list-unstyled project-details__points">
                            <li>
                                <div class="icon">
                                    <span class="icon-increment"></span>
                                </div>
                                <div class="text">
                                    <h4><?= esc($case['titulo2']) ?></h4>
                                    <p><?= $case['description3'] ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-checking"></span>
                                </div>
                                <div class="text">
                                    <h4><?= esc($case['titulo3']) ?></h4>
                                    <p><?= $case['description4'] ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="project-details__content-right">
                        <div class="project-details__details-box">
                            <div class="project-details__details-info">
                                <div class="project-details__details-info-single">
                                    <h5 class="project-details__details-info-client">Cliente:</h5>
                                    <p class="project-details__details-info-name"><?= esc($case['client']) ?></p>
                                </div>
                                <div class="project-details__details-info-single">
                                    <h5 class="project-details__details-info-client">Serviço:</h5>
                                    <p class="project-details__details-info-name"><?= esc($case['category']) ?></p>
                                </div>
                                <div class="project-details__details-info-single">
                                    <h5 class="project-details__details-info-client">Data:</h5>
                                    <p class="project-details__details-info-name"><?= date('d/m/Y', strtotime($case['project_date'])) ?></p>
                                </div>
                            </div>
                            <div class="project-details__details-social-list">
                                <a href="https://www.instagram.com/<?= esc($case['instagram']) ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="similar-work">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Imagens deste evento</span>
            <h2 class="section-title__title"><?= esc($case['title']) ?> - <?= esc($case['client']) ?></h2>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <!--Portfolio One Single-->
                <div class="project-one__single">
                    <img src="<?= base_url('assets/images/cases/' . esc($case['carousel_image_1'])) ?>" alt="<?= esc($case['title']) ?>">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <!--Portfolio One Single-->
                <div class="project-one__single">
                    <img src="<?= base_url('assets/images/cases/' . esc($case['carousel_image_2'])) ?>" alt="<?= esc($case['title']) ?>">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <!--Portfolio One Single-->
                <div class="project-one__single">
                    <img src="<?= base_url('assets/images/cases/' . esc($case['carousel_image_3'])) ?>" alt="<?= esc($case['title']) ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <!--Portfolio One Single-->
                <div class="project-one__single">
                    <img src="<?= base_url('assets/images/cases/' . esc($case['carousel_image_4'])) ?>" alt="<?= esc($case['title']) ?>">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <!--Portfolio One Single-->
                <div class="project-one__single">
                    <img src="<?= base_url('assets/images/cases/' . esc($case['carousel_image_5'])) ?>" alt="<?= esc($case['title']) ?>">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <!--Portfolio One Single-->
                <div class="project-one__single">
                    <img src="<?= base_url('assets/images/cases/' . esc($case['carousel_image_6'])) ?>" alt="<?= esc($case['title']) ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('partials/footer') ?>