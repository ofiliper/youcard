<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<section class="content">

    <div class="widgets">
        <div>
        </div>
        <div class="add_title">
            <button class="is_mobile close_widgets"><i class="fas fa-times"></i> <?= $language['custom_page']['close_widgets'] ?></button>
            <h2><i class="fas fa-th-large"></i> Widgets</h2>
        </div>
        <div class="add_field">
            <button value="title"><i class="fas fa-font"></i> <span><?= $language['custom_page']['widgets']['title']; ?></span></button>
            <button value="text"><i class="fas fa-align-left"></i> <span><?= $language['custom_page']['widgets']['text']; ?></span></button>
            <button value="icon"><i class="fas fa-icons"></i> <span><?= $language['custom_page']['widgets']['icons']; ?></span></button>
            <button value="link"><i class="fas fa-link"></i> <span><?= $language['custom_page']['widgets']['link']; ?></span></button>
        </div>
        <div class="add_config">
            <div class="title">
                <h4> <i class="fas fa-cog"></i> <span><?= $language['custom_page']['config']; ?></span></h4>
            </div>
            <div class="options">
                <div class="options_label">
                    <?= get_select_options($language['custom_page']['title_font_selector'], 'title_font', isset($config->title) ? $config->title : '') ?>
                </div>
                <div class="options_label">
                    <?= get_select_options($language['custom_page']['text_font_selector'], 'text_font', isset($config->text) ? $config->text : '') ?>
                </div>
                <div class="options_label options_col-2">
                    <?= get_color_picker($language['custom_page']['title_color'], 'title_color', isset($config->title_color) ? $config->title_color : ''); ?>
                </div>
                <div class="options_label options_col-2">
                    <?= get_color_picker($language['custom_page']['button_color'], 'button_color', isset($config->button) ? $config->button : ''); ?>
                </div>
                <div class="options_label options_col-2">
                    <?= get_color_picker($language['custom_page']['icon_color'], 'icon_color', isset($config->icon) ? $config->icon : ''); ?>
                </div>
                <div>
                    <input type="submit" class="save_config" value="<?= $language['custom_page']['save_btn']; ?>" disabled='disabled'>
                </div>
            </div>
        </div>
    </div>
    <div class="custom_page">

        <div class="header">
            <h2>
                <?= $language['custom_page']['page_header']; ?>
            </h2>
            <p>
                <?= $language['custom_page']['page_header_description']; ?>
            </p>
        </div>
        <div class="img">

            <div class="cover img-type">

                <?php
                if (isset($cover) && $cover != '') :
                ?>

                    <div class="upload-file">
                        <span class="del-img"><i class="fas fa-trash"></i> <?= $language['custom_page']['delete_btn']; ?></span>
                    </div>

                    <div class="display display-cover" style="background-image: url(<?= base_url("assets/upload/$cover") ?>);">
                        <input type='hidden' value="<?= $cover; ?>" class='temp-cover temp'>
                    </div>

                <?php
                else :
                ?>

                    <div class="upload-file">
                        <span><i class="fas fa-arrow-circle-up"></i> <?= $language['custom_page']['send_btn']; ?></span>
                        <input class='cover-input' id="files" type='file'>
                    </div>

                    <div class="display display-cover" style="background-image: url(<?= base_url('assets/img/default_cover.png') ?>);">
                        <input type='hidden' class='temp-cover temp'>
                    </div>

                <?php
                endif;
                ?>

            </div>

            <div class="profile img-type">

                <?php
                if (isset($profile) && $profile != '') :
                ?>
                    <div class="upload-file">
                        <span class="del-img"><i class="fas fa-trash"></i></span>
                    </div>
                    <div class="display display-profile" style="background-image: url('<?= base_url("assets/upload/$profile"); ?>');">
                        <input type='hidden' value="<?= $profile; ?>" class='temp-profile temp'>
                    </div>

                <?php
                else :
                ?>
                    <div class="upload-file">
                        <span><i class="fas fa-arrow-circle-up"></i></span>
                        <input class='profile-input' id="files" type='file'>
                    </div>
                    <div class="display display-profile" style="background-image: url(<?= base_url('assets/img/default_profile.png') ?>);">
                        <input type='hidden' class='temp-profile temp'>
                    </div>
                <?php
                endif;
                ?>

            </div>

        </div>
        <div class="box bio">
            <div class="box_label">
                <label class="<?= isset($title) && $title != '' ? 'active' : ''; ?>" for=""><?= $language['custom_page']['page_title']; ?></label>
                <span class="in_len"><span class="count"><?= isset($title) && !empty($title) ? strlen($title) : '0'; ?></span>/50</span>
                <input class="input input_len" type="text" placeholder="<?= $language['custom_page']['page_title']; ?>" value="<?= isset($title) && !empty($title) ? htmlspecialchars(mysqli_real_escape_string($conn, $title)) : ''; ?>">
            </div>
            <div class="box_label">
                <label class="<?= isset($description) && $description != '' ? 'active' : ''; ?>" for=""><?= $language['custom_page']['page_description']; ?></label>
                <span class="in_len"><span class="count"><?= isset($description) && !empty($description) ? strlen($description) : '0'; ?></span>/50</span>
                <input class="input input_len" type="text" placeholder="<?= $language['custom_page']['page_description']; ?>" value="<?= isset($description) && !empty($description) ? htmlspecialchars(mysqli_real_escape_string($conn, $description)) : ''; ?>">
            </div>
        </div>

        <?php
        if (isset($url) && $url == '') {
        ?>
            <div class="alert-danger">
                <span><i class="fas fa-exclamation-triangle"></i> <?= $language['custom_page']['url_alert']; ?></span>
                <a href="<?= base_url('dashboard/divulgation'); ?>"><?= $language['custom_page']['url_alert_msg']; ?></a>
            </div>
        <?php
        }

        ?>

        <form id="sortable" draggable="true" class="group <?= isset($premium) && $premium != '1' ? 'free_account' : ''; ?> draggable ui-widget-content ">
            <?php
            if (isset($content) && $content != '') {
                foreach ($content as $c) :
                    get_element($c->type, $c, $conn, $language['custom_page']['elements']);
                endforeach;
            }
            ?>
        </form>
        <div class="modal_icon"></div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Icons</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        foreach ($icons as $key => $i) {
                        ?>
                            <button value="<?= $key ?>"><?= $i ?></button>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary select-icon">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" class="save_page" value="<?= $language['custom_page']['save_page_btn']; ?>" disabled>
    </div>

</section>

<script>
    const icon = {
        'fab fa-facebook': '&#xf09a;',
        'fab fa-instagram': '&#xf16d;',
        'fab fa-twitter': '&#xf099;',
        'fab fa-whatsapp': '&#xf232;',
        'fas fa-wrench': '&#xf0ad;',
        'fab fa-apple': '&#xf179;',
        'fas fa-balance-scale': '&#xf24e;',
        'fas fa-bell': '&#xf0f3;',
        'fas fa-bus': '&#xf207;',
        'far fa-calendar-alt': '&#xf073;',
        'far fa-clock': '&#xf017;',
        'far fa-comment': '&#xf075;',
        'fas fa-music': '&#xf001;',
        'fas fa-star': '&#xf005;',
        'fas fa-anchor': '&#xf13d;',
        'fas fa-camera': '&#xf030;',
        'fas fa-bus': '&#xf207;',
        'fas fa-cut': '&#xf0c4;',
        'far fa-futbol': '&#xf1e3;',
        'fa fa-film': '&#xf008;',
        'fas fa-heart': '&#xf004;'
    }
</script>