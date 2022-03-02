<?php
defined('BASEPATH') or exit('No direct script access allowed');


if (!function_exists('get_color_picker')) {
    function get_color_picker($title, $class, $config = '')
    {
?>
        <label for="">
            <?= $title; ?>
        </label>
        <span class="color-picker">
            <label for="colorPicker">
                <input type="color" value="<?= isset($config) ? $config : '#1DB8CE'; ?>" id="colorPicker_2" class="<?= $class; ?>">
            </label>
        </span>
    <?php
    }
}


if (!function_exists('get_select_options')) {
    function get_select_options($title, $class, $config = '')
    {
        $font = array(
            'Nunito' => 'Nunito',
            'Open Sans' => 'Open Sans',
            'Playfair Display' => 'Playfair',
            'Roboto' => 'Roboto',
            'Source Serif Pro' => 'Source Serif Pro',
        )
    ?>
        <label for="">
            <?= $title; ?>
        </label>
        <select name="" id="" class="<?= $class; ?>">
            <?php
            foreach ($font as $k => $f) {
            ?>
                <option value="<?= $k; ?>" class="<?= strtolower(str_replace(' ', '_', $k)) ?>" <?= $config == $k ? 'selected' : ''; ?>><?= $f; ?></option>
            <?php
            }
            ?>
        </select>
    <?php
    }
}
if (!function_exists('get_element')) {
    function get_element($type, $c, $conn, $language)
    {
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
                get_icon($icons, $c, $conn, $language);
                break;
            case 'button':
                get_button($c, $conn, $language);
                break;
            case 'text':
                get_textarea($c, $conn, $language);
                break;
            case 'title':
                get_title($c, $conn, $language);
                break;
        }
    }
}

if (!function_exists('get_icon')) {
    function get_icon($icons, $c, $conn, $language)
    {
    ?>
        <div class="box box-drag box_icon ui-widget-header">
            <?php get_control($language['icon']); ?>
            <div class="col-2">
                <button type="button" value="<?= $c->icon ?>" class="icon-selector" data-toggle="modal" data-target="#exampleModal">
                    <i class="<?= isset($c->icon) && $c->icon != '' ? $c->icon : 'fas fa-star'; ?>"></i>
                </button>
                <!-- <select name="" id="">
                    <?php
                    foreach ($icons as $key => $i) {
                    ?>
                        <option value="<?= $key ?>" <?= $c->icon == $key ? 'selected' : ''; ?>><?= $i ?></option>
                    <?php
                    }
                    ?>
                </select> -->
                <div class="box_label">
                    <span class="in_len"><span class="count"><?= isset($c->content) && !empty($c->content) ? strlen($c->content) : '0'; ?></span>/50</span>
                    <label class="<?= isset($c->content) && $c->content != '' ? 'active' : ''; ?>" for=""><?= $language['icon_label']; ?></label>
                    <input class="input input_len" type="text" value="<?= isset($c->content) && !empty($c->content) ? $c->content : ''; ?>">
                </div>
            </div>
        </div>
    <?php
    }
}

if (!function_exists('get_button')) {
    function get_button($c, $conn, $language)
    {
    ?>
        <div class="box box-drag box_button ui-widget-header">
            <?php get_control($language['button']); ?>
            <div class="box_label">
                <span class="in_len"><span class="count"><?= isset($c->title) && !empty($c->title) ? strlen($c->title) : '0'; ?></span>/50</span>
                <label class="<?= isset($c->content) && $c->content != '' ? 'active' : ''; ?>" for=""><?= $language['button_label']; ?></label>
                <input class="input input_len" type="text" value="<?= isset($c->content) && !empty($c->title) ? $c->title : ''; ?>">
            </div>
            <div class="box_label">
                <label class="<?= isset($c->content) && $c->content != '' ? 'active' : ''; ?>" for=""><?= $language['link_label']; ?></label>
                <input class="input" type="text" placeholder="https://youcard.link/" value="<?= isset($c->content) && !empty($c->content) ? $c->content : ''; ?>">
            </div>
        </div>
    <?php
    }
}

if (!function_exists('get_textarea')) {
    function get_textarea($c, $conn, $language)
    {
    ?>
        <div class="box box-drag box_textarea ui-widget-header">
            <?php get_control($language['text'], $c, true); ?>
            <div class="box_label">
                <label class="<?= isset($c->content) && $c->content != '' ? 'active' : ''; ?>" for=""><?= $language['text_label']; ?></label>
                <span class="ta_len"><span class="count"><?= isset($c->content) && !empty($c->content) ? strlen($c->content) : '0'; ?></span>/320</span>
                <textarea class="input" name="" id="" cols="30" rows="10"><?= isset($c->content) && !empty($c->content) ? str_replace("\'", "'", $c->content) : ''; ?></textarea>
            </div>
        </div>
    <?php
    }
}
if (!function_exists('get_title')) {
    function get_title($c, $conn, $language)
    {
    ?>
        <div class="box box-drag-drag box_title ui-widget-header">
            <?php get_control($language['title'], $c, true); ?>
            <div class="box_label">
                <span class="in_len"><span class="count"><?= isset($c->content) && !empty($c->content) ? strlen($c->content) : '0'; ?></span>/50</span>
                <label class="<?= isset($c->content) && $c->content != '' ? 'active' : ''; ?>" for=""><?= $language['title_label']; ?></label>
                <input class="input input_len" type="text" value="<?= isset($c->content) && !empty($c->content) ? $c->content : ''; ?>">
            </div>
        </div>
    <?php
    }
}


if (!function_exists('get_control')) {
    function get_control($widget, $c = '', $options = false)
    {
        $align = array(
            "left"   => "fas fa-align-left",
            "center" => "fas fa-align-center",
            "right"  => "fas fa-align-right"
        )
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
                    <?php
                    if (isset($align) && $align != '') {
                        foreach ($align as $key => $a) {
                    ?>
                            <button value="<?= $key ?>" class="<?= isset($c->align) && $c->align == $key ? 'active' : ''; ?>"><i class="<?= $a ?>"></i></option>
                        <?php
                        }
                    }
                        ?>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }
}

// $social_media = array(

// );

if (!function_exists('get_social_media')) {
    function get_social_media($language)
    {
    ?>
        <div class="col-2-min">
            <span><i class="fab fa-facebook"></i></span>
            <input type="text" placeholder="<?= $language['custom_config']['page_input']; ?>">
        </div>
<?php
    }
}
