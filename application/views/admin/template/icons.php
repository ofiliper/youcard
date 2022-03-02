<?php
defined('BASEPATH') or exit('No direct script access allowed');


$icons = array(
    'fab fa-facebook' => '&#xf09a;',
    'fab fa-instagram' => '&#xf16d;',
    'fab fa-twitter' => '&#xf099;',
    'fab fa-whatsapp' => '&#xf232;',
    'fas fa-wrench' => '&#xf0ad;',
    'fab fa-apple' => '&#xf179;',
    'fas fa-balance-scale' => '&#xf24e;',
    'fas fa-bell' => '&#xf0f3;',
    'fas fa-bus' => '&#xf207;',
    'far fa-calendar-alt' => '&#xf073;',
    'far fa-clock' => '&#xf017;',
    'far fa-comment' => '&#xf075;',
    'fas fa-music' => '&#xf001;',
    'fas fa-star'  => '&#xf005;',
    'fas fa-anchor'  => '&#xf13d;',
    'fas fa-camera'  => '&#xf030;',
    'fas fa-bus'  => '&#xf207;',
    'fas fa-cut'  => '&#xf0c4;',
    'far fa-futbol'  => '&#xf1e3;',
    'fa fa-film'  => '&#xf008;',
    'fas fa-heart'  => '&#xf004;',
);
?>
<h2>Choose the icon</h2>
<div>
    <?php
    foreach ($icons as $k => $i) {
    ?>
        <button><i class="<?= $k; ?>"></i></button>
    <?php
    }
    ?>
</div>