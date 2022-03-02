<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!function_exists('display_element')) {
    function display_element($el, $content, $conn)
    {
        switch ($el) {
            case 'title':
                get_title($content, $conn);
                break;
            case 'text':
                get_text($content, $conn);
                break;
            case 'icon':
                get_icon($content, $conn);
                break;
            case 'button':
                get_button($content, $conn);
                break;
        }
    }
}

if (!function_exists('get_title')) {
    function get_title($c, $conn)
    {
?>
        <div style="text-align: <?= isset($c->align) && $c->align != '' ? $c->align : ''; ?>">
            <h1><?= $c->content;  ?></h1>
        </div>
    <?php
    }
}
if (!function_exists('get_text')) {
    function get_text($c, $conn)
    {
    ?>
        <p style="text-align: <?= isset($c->align) && $c->align != '' ? $c->align : ''; ?>"><?= str_replace("\'", "'", $c->content); ?> </p>
    <?php
    }
}
if (!function_exists('get_icon')) {
    function get_icon($c, $conn)
    {
    ?>
        <div class="icon">
            <span>
                <i class="<?= $c->icon; ?>"></i>
                <span><?= $c->content;   ?></span>
            </span>
        </div>
    <?php
    }
}
if (!function_exists('get_button')) {
    function get_button($c, $conn)
    {
    ?>
        <div class="button">
            <a target="_blank" rel="nofollow noopener" href="<?= $c->content ?>"><?= $c->title; ?></a>
        </div>
<?php
    }
}
