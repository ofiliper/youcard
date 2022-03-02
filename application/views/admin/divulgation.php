<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<section class="content">
    <div class="custom_config">

        <div class="header">
            <h2>
                <?= $language['custom_config']['page_header']; ?>
            </h2>
            <p>
                <?= $language['custom_config']['page_header_description']; ?>
            </p>
        </div>
        <div class="custom_url">
            <div class="inner_title">
                <h3><?= $language['custom_config']['page_url']; ?></h3>
            </div>
            <div class="custom_url_field">
                <!-- <p><?= $language['custom_config']['page_url_title']; ?></p> -->
                <div class="col-2-min-left">
                    <span for="">cardyo.link/</span>
                    <input type="text" class="unique_url" value="<?= isset($url) && $url != '' ? $url : ''; ?>" placeholder="<?= $language['custom_config']['url_length']; ?>">
                    <button class="find_url" disabled><?= $language['custom_config']['find_btn']; ?></button>
                </div>
                <div class="alert_url">
                <a target="_blank" href="https://cardyo.link/<?= isset($url) && $url != '' ? $url : ''; ?>"><i class="fas fa-external-link-alt"></i> Visit your page</a>
                </div>
            </div>
        </div>

        <div class="qrcode">
            <div>

                <div>
                    <?php
                    if (isset($premium) && !$premium) {
                    ?>
                        <span>
                            <i class="fas fa-exclamation-triangle"></i> <?= $language['custom_config']['premium'] ?>
                        </span>
                    <?php
                    }
                    ?>
                    <p><?= $language['custom_config']['qr_code']; ?></p>
                    <button class="<?= isset($premium) && !$premium ? 'qr-free' : 'qr-btn'; ?>">
                        <?= $language['custom_config']['download']; ?>
                    </button>
                </div>
                <?php
                if (isset($premium) && !$premium) {
                ?>
                    <div class="qr-code-empty">
                        <img src="<?= base_url('assets/img/qr-code.png'); ?>" alt="">
                    </div>
                <?php
                } else {
                ?>
                    <div class="qr-code-generated">
                        <canvas>
                        </canvas>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="social_media">

            <div class="inner_title">
                <h3><?= $language['custom_config']['social_media']; ?></h3>
                <p><?= $language['custom_config']['social_media_text']; ?></p>
            </div>

            <?php
            foreach ($social as $k => $s) {
            ?>
                <div class="col-2-min">
                    <?php
                    if ($k == 'whatsapp') {
                    ?>
                        <span><i class="<?= $s; ?>"></i> <?= $k; ?></span>
                        <div class="wpp_input">
                            <div>
                                <span><?= $language['custom_config']['label_whatsapp']; ?></span>
                                <input type="text" data-type='<?= $k; ?>' class="phone" value="<?= isset($social_content->$k->phone) && $social_content->$k->phone != '' ? $social_content->$k->phone : ''; ?>" placeholder="<?= $language['custom_config']['input_whatsapp']; ?>">
                            </div>
                            <div>
                                <span><?= $language['custom_config']['label_whatsapp_msg']; ?></span>
                                <input type="text" data-type='<?= $k; ?>' class="wpp_msg" value="<?= isset($social_content->$k->msg) && $social_content->$k->msg != '' ? $social_content->$k->msg : ''; ?>" placeholder="<?= $language['custom_config']['input_whatsapp_msg']; ?>">
                            </div>
                        </div>

                    <?php
                    } else {
                    ?>
                        <span><i class="<?= $s; ?>"></i> <?= $k; ?></span>
                        <input type="text" data-type='<?= $k; ?>' value="<?= isset($social_content->$k) && $social_content->$k != '' ? $social_content->$k : ''; ?>" placeholder="<?= $language['custom_config']['page_input']; ?>">
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>

        </div>
        <div class="save_btn">
            <input type="submit" class="save_media" value="<?= $language['custom_page']['save_btn']; ?>" disabled='disabled'>
        </div>
    </div>
</section>