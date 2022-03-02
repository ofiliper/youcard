<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/home/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/flags.css'); ?>">
    <link href="<?= base_url('/assets/css/all.min.css'); ?>" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.png'); ?>" type="image/png" sizes="16x16" />

    <title>Cardyo</title>

</head>



<body>
    <section class="top_header">
        <div class="container">
            <div>
                <div class="sm-col-1">
                    <div id="basic" class="select-lang" data-input-name="country" data-selected-country="<?= isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'BR' ?>">
                    </div>
                </div>
            </div>
            <div>
                <span><i class="far fa-envelope"></i> hi@Cardyo.link</span>
            </div>
        </div>
    </section>


    <section class="main">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <a href="<?= base_url(); ?>" rel="nofollow noopener">
                        <img src="<?= base_url('assets/img/cardyo_logo.svg') ?>" alt="">
                    </a>
                    <div>
                        <div class="menu-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="menu">
                    <ul>
                        <a href="<?= base_url(); ?>">
                            <li><?= $header_menu['about']; ?></li>
                        </a>
                        <a href="<?= base_url('prices'); ?>">
                            <li><?= $header_menu['prices']; ?></li>
                        </a>
                        <a href="<?= base_url('register'); ?>" class="signup">
                            <li><?= $header_menu['register']; ?></li>
                        </a>
                        <a href="<?= base_url('login'); ?>" class="login">
                            <li><i class="far fa-user"></i> <?= $header_menu['login']; ?></li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="title">
                <h3>
                    <?= $title; ?>
                </h3>
            </div>
        </div>
    </section>