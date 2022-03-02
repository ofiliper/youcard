<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<div class="confirm-page">
    <div class="confirm-box">
        <div class="logo">
            <img src="<?= base_url(); ?>/assets/img/cardyo_logo.svg" alt="">
        </div>
        <div>
            <h2><?= $content['title']; ?></h2>
            <span><?= $content['redirect']; ?> <span class="count-sec">5</span> <?= $content['time']; ?></span>
        </div>
    </div>
</div>