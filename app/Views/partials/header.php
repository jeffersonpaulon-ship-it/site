<?php 
    $canonicalUrl = !empty($seoData['canonical']) ? esc($seoData['canonical']) : current_url(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?= esc($seoData['title']) ?></title>
    <meta name="description" content="<?= esc($seoData['description']) ?>">
    <meta name="keywords" content="<?= esc($seoData['keywords']) ?>">
    <link rel="canonical" href="<?= $canonicalUrl ?>">
    <meta name="robots" content="index, follow">

    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/images/favicons/apple-touch-icon.png')?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/images/favicons/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicons/favicon-16x16.png')?>">
    <link rel="manifest" href="<?= base_url('assets/images/favicons/site.webmanifest')?>">

    <meta property="og:title" content="<?= esc($seoData['title']) ?>">
    <meta property="og:description" content="<?= esc($seoData['description']) ?>">
    <meta property="og:image" content="<?= !empty($seoData['image']) ? base_url('assets/images/' . esc($seoData['image'])) : base_url('assets/images/default-image.jpg') ?>">
    <meta property="og:url" content="<?= esc($canonicalUrl) ?>">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:site_name" content="Credenciamento Sem Fila">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/animate/animate.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/animate/custom-animate.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/fontawesome/css/all.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/odometer/odometer.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/swiper/swiper.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/qutiiz-icons/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/qutiiz-icons-two/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/owl-carousel/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/owl-carousel/owl.theme.default.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/jquery-ui/jquery-ui.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/timepicker/timePicker.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/qutiiz.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/qutiiz-responsive.css')?>">
</head>