<?php
defined('BASEPATH') or exit('No direct script access allowed');


if (!function_exists('escape_post')) {

    function escape_post($post, $connection)
    {
        $array = [];
        foreach ($post as $key => $p) {
            $array[$key] = isset($post[$key]) ?
                htmlspecialchars(mysqli_real_escape_string($connection, $post[$key])) : '';
        };
        return $array;
    }

    function validate_cookie($cookie)
    {
    }
}
