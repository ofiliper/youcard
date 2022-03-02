<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($fonts) && $fonts) : ?>
        <link rel="stylesheet" href="<?= base_url('assets/css/fonts.css'); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/admin/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/admin/mobile.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/flags.css'); ?>">
    <link href="<?= base_url('/assets/css/all.min.css'); ?>" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.png'); ?>" type="image/png" sizes="16x16" />

    <title>Cardyo</title>

</head>



<body>

    <section class="mobile">
        <div>
            <button class="menu_btn">Menu</button>
        </div>
        <div class="logo_mobile">
            <img src="<?= base_url('/assets/img/cardyo_logo.svg'); ?>" alt="">
        </div>
        <div>
            <?php
            if (isset($page_builder)) {
            ?>
                <button class="widget_btn"><i class="fas fa-th-large"></i> Widgets</button>
            <?php
            }
            ?>
        </div>
    </section>
    <main class="main">