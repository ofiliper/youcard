<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<section class="main">
    <div class="container">
        <div class="ads"></div>
        <div class="img">
            <div class="cover" style="background-image: url('<?= base_url("assets/upload/$cover") ?>')">
            </div>
        </div>
        <div class="bg" style="background-image: url('<?= base_url('assets/img/bg.svg') ?>')">
            <div class="profile" style="background-image: url('<?= base_url("assets/upload/$profile") ?>')"></div>
        </div>
        <div class="content">
            <div class="bio">
                <h2><?= isset($title) && $title != '' ? $title : 'Nome padrão' ?></h2>
                <span><?= isset($description) && $description != '' ? $description : 'Esta é uma descrição padrão, acesse o painel para alterá-la.'; ?></span>
            </div>
            <?php
            if (isset($content)) :
                foreach ($content as $k => $c) :
                    if (!$premium) {
                        if ($k <= 7) {
                            if (isset($c->content) && $c->content != '') {
                                display_element($c->type, $c, $conn);
                            }
                        }
                    } else {
                        if (isset($c->content) && $c->content != '') {
                            display_element($c->type, $c, $conn);
                        }
                    }
                endforeach;
            endif;
            ?>
        </div>
        <div class="social">
            <ul>
                <?php
                if (isset($social_content)) :
                    foreach ($social_content as $k => $s) {
                ?>
                        <li>
                            <?php
                            if ($k == 'whatsapp') {
                            ?>
                                <a href="https://api.whatsapp.com/send?phone=<?= $s->phone; ?>&text=<?= $s->msg ?>"><i class="<?= $social[$k] ?>"></i></a>
                            <?php
                            } else {
                            ?>
                                <a rel="nofollow noopenner" target="_blank" href="<?= $s; ?>"><i class="<?= $social[$k] ?>"></i></a>
                            <?php
                            }
                            ?>
                        </li>
                <?php
                    }
                endif;
                ?>
            </ul>
        </div>
        <div class="copyright">
            <img src="<?= base_url('assets/img/cardyo_logo.svg'); ?>" alt="">
        </div>
    </div>
</section>