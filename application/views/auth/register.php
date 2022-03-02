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
                    <h2><?= $content['title'];?></h2>
                </div>
            </div>
            <div class="form_input">
                <form action="">
                    <input type="text" class="_name" placeholder="<?= $content['name_input'];?>" required>
                    <input type="email" class="_email_1" placeholder="<?= $content['email_input'];?>" required>
                    <input type="email" class="_email_2" placeholder="<?= $content['email_input_2'];?>" required>
                    <input type="password" class="_pass" placeholder="<?= $content['pass_input'];?>" required>
                    <span class="alert"></span>
                    <input type="submit" class="submit_register" value="<?= $content['register_btn'];?>" disabled>
                </form>
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