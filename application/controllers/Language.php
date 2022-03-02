<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Language extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function change()
    {
        if (isset($_COOKIE['lang']) && $_COOKIE['lang'] != '') {
            unset($_COOKIE['lang']);
            setcookie('lang', $_POST['lang'], time() + 604800, '/');
        } else {
            setcookie('lang', $_POST['lang'], time() + 604800, '/');
        }
        echo 1;
    }
}
