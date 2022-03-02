<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<section class="sidebar">
    <div class="is_desktop">
        <img src="<?= base_url('/assets/img/cardyo_logo.svg'); ?>" alt="">
    </div>

    <ul>
        <a href="<?= base_url('dashboard') ?>" class="<?= $route == '' ? 'active' : ''; ?>">
            <li>
                <i class="fas fa-paint-brush"></i> <?= $language['sidebar']['page_maker']; ?>
            </li>
        </a>
        <a href="<?= base_url('dashboard/divulgation') ?>" class="<?= $route == 'divulgation' ? 'active' : ''; ?>">
            <li>
                <i class="fas fa-bullhorn"></i> <?= $language['sidebar']['divulgation']; ?>
            </li>
        </a>
        <a href="<?= base_url('dashboard/account') ?>" class="<?= $route == 'account' ? 'active' : ''; ?>">
            <li>
                <i class="fas fa-user"></i> <?= $language['sidebar']['account']; ?>
            </li>
        </a>
        <!-- <a href="<?= base_url('dashboard/premium') ?>" class="<?= $route == 'premium' ? 'active' : 'premium'; ?>">
            <li>
                <i class="fas fa-star"></i> <?= $language['sidebar']['premium']; ?>
            </li>
        </a> -->
        <a href="<?= base_url('dashboard/logout') ?>">
            <li>
                <i class="fas fa-sign-out-alt"></i> <?= $language['sidebar']['exit']; ?>
            </li>
        </a>
    </ul>
    <div class="language col-1">

        <label for=""><?= $language['sidebar']['lang']; ?></label>
        <div class="sm-col-1">
            <div id="basic" class="select-lang" data-input-name="country" data-selected-country="<?= isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'BR' ?>">
            </div>
        </div>

    </div>
</section>