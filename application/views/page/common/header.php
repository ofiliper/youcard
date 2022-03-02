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
    <link rel="stylesheet" href="<?= base_url('assets/css/page/style.css'); ?>">
    <link href="<?= base_url('/assets/css/all.min.css'); ?>" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.png'); ?>" type="image/png" sizes="16x16" />

    <title>Cardyo</title>

    <style>
        .content h1 {
            font-family: <?= isset($title_font) && $title_font != ''  ?  "$title_font" . ' !important' : ''; ?>;
            color: <?= isset($title_color) && $title_color != ''  ? $title_color . ' !important' : ''; ?>;
        }

        .content p {
            font-family: <?= isset($text_font) && $text_font != ''  ? "$text_font" . ' !important' : ''; ?>;
        }

        .content .icon span i,
        .main .social ul > li >a {
            color: <?= isset($icon_color) && $icon_color != ''  ? $icon_color . ' !important' : ''; ?>;
        }

        .content .button a {
            background: <?= isset($button_color) && $button_color != ''  ? $button_color . ' !important' : ''; ?>;
        }
    </style>
</head>



<body>


    <section class="main">