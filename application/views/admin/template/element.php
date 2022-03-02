<?php
defined('BASEPATH') or exit('No direct script access allowed');

// global $language;
// var_dump($language);

switch ($type) {
    case 'icon':
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
        get_icon($language, $icons);
        break;
    case 'link':
        get_button($language);
        break;
    case 'text':
        get_textarea($language);
        break;
    case 'title':
        get_title($language);
        break;
}


function get_icon($language, $icons)
{
?>
    <div class="box box-drag box_icon ui-widget-header">
        <?php get_control($language['icon']); ?>
        <div class="col-2">
            <button type="button" class="icon-selector" data-toggle="modal" data-target="#exampleModal">
                &#xf005;
            </button>
            <!-- <button class="choose_icon">Icon</button> -->
            <!-- <select name="" id="">
                <?php
                foreach ($icons as $key => $i) {
                ?>
                    <option value="<?= $key ?>"><?= $i ?></option>
                <?php
                }
                ?>
            </select> -->
            <div class="box_label">
                <span class="in_len"><span class="count"><?= isset($c->content) && !empty($c->content) ? strlen($c->content) : '0'; ?></span>/50</span>
                <label for=""><?= $language['icon_label']; ?></label>
                <input class="input input_len" type="text">
            </div>
        </div>
    </div>
<?php
}
function get_button($language)
{
?>
    <div class="box box-drag box_button ui-widget-header">
        <?php get_control($language['button']); ?>
        <div class="box_label">
            <span class="in_len"><span class="count"><?= isset($c->content) && !empty($c->content) ? strlen($c->content) : '0'; ?></span>/50</span>
            <label for=""><?= $language['button_label']; ?></label>
            <input class="input input_len" type="text">
        </div>
        <div class="box_label">
            <label for=""><?= $language['link_label']; ?></label>
            <input class="input" type="text" placeholder="https://youcard.link/">
        </div>
    </div>
<?php
}
function get_textarea($language)
{
?>
    <div class="box box-drag box_textarea ui-widget-header">
        <?php get_control($language['text'], true); ?>
        <div class="box_label">
            <label for=""><?= $language['text_label']; ?></label>
            <span class="ta_len"><span class="count">0</span>/320</span>
            <textarea class="input" name="" id="" cols="30" rows="10"></textarea>
        </div>
    </div>
<?php
}
function get_title($language)
{
?>
    <div class="box box-drag box_title ui-widget-header">
        <?php get_control($language['title'], true); ?>
        <div class="box_label">
            <span class="in_len"><span class="count"><?= isset($c->content) && !empty($c->content) ? strlen($c->content) : '0'; ?></span>/50</span>
            <label for=""><?= $language['title_label']; ?></label>
            <input class="input input_len" type="text">
        </div>
    <?php
}


function get_control($widget, $options = false)
{
    ?>
        <div class="control">
            <div>
                <i class="fas fa-arrows-alt-v"></i>
                <span><?= $widget; ?></span>
                <div class="delete_widget">
                    <i class="fas fa-trash"></i>
                </div>
            </div>
            <?php
            if ($options) {
            ?>
                <div class="text-options">
                    <button value="align-left" class="active"><i class="fas fa-align-left"></i></button>
                    <button value="align-center"><i class="fas fa-align-center"></i></button>
                    <button value="align-right"><i class="fas fa-align-right"></i></button>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
}
