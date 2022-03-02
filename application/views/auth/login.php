<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<section class="login">

    <div class="form">

        <div>
            <div class="header">
                <div class="logo">
                    <img src="<?= base_url('/assets/img/cardyo_logo.svg'); ?>" alt="">
                </div>
                <div class="title">
                    <h2><?= $content['title']; ?></h2>
                </div>
            </div>
            <div class="form_input">
                <form action="">
                    <input type="email" name="" class="user_email" id="" placeholder="<?= $content['email_input']; ?>">
                    <input type="password" name="" class="user_pass" id="" placeholder="<?= $content['pass_input']; ?>">
                    <span class="alert"></span>
                    <a href="<?= base_url('recover') ?>"><?= $content['forgot_pass']; ?></a>
                    <input type="submit" class="submit_login" value="Login">
                </form>
                <div>
                    <?= $content['new_user'];?> <a href="<?= base_url('register'); ?>"><?= $content['new_user_btn'];?> </a>
                </div>
            </div>
            <div class="sm-col-1">
                <div id="basic" class="select-lang" data-input-name="country" data-selected-country="<?= isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'BR' ?>">
                </div>
            </div>
        </div>

    </div>

    <div class="background" style="background-image: url('<?= base_url('/assets/img/login.svg'); ?>'), linear-gradient(141.5deg, #1c4bf3 2.54%, #085ec6 96.23%)">




    </div>

</section>