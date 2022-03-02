<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<section class="price">
    <div class="container">
        <div class="text">
            <p><?= $content['paragraph']; ?> </p>
        </div>
        <div class="bundle">
            <?php
            foreach ($content['bundle'] as $box) :
            ?>
                <div class="box">
                    <div>
                        <h4><?= $box['title']; ?></h4>
                    </div>
                    <div class="value">
                        <span><?= $box['currency']; ?></span>
                        <h4><?= $box['value']; ?></h4>
                        <span><?= $box['month']; ?></span>
                    </div>
                    <ul>
                        <?php
                        foreach ($box['list'] as $list) :
                        ?>
                            <li><?= $list; ?></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                    <div class="btn">
                        <a href="<?= base_url('register'); ?>">
                            <?= $box['button']; ?>
                        </a>
                    </div>
                </div>
            <?php
            endforeach;
            ?>

        </div>
    </div>
</section>