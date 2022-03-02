<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    private $siteUrl;
    private $userClass;
    private $language;

    function __construct()
    {
        parent::__construct();
        $this->siteUrl = base_url();
        $this->load->helper('language');
        $this->language = language_selected(get_language(isset($_COOKIE['lang']) ? $_COOKIE['lang'] : ''));

        if (isset($_COOKIE['usr'])) {

            $this->user = $_COOKIE['usr'];
            $this->token = $_COOKIE['tkn'];
            $this->load->model('User_login', '', TRUE);

            $user = new User_login();
            $result =  $user->validate_hash($this->user, $this->token);


            if (!$result) {
                $user->unset_cookie($_COOKIE);
                header("Location: {$this->siteUrl}login");
                exit;
            } else {
                header("Location: {$this->siteUrl}dashboard");
                exit;
            }
        }
    }

    public function index()
    {
        $data['language'] = $this->language['login']['alert'];
        $data['content'] = $this->language['login'];
        $this->load->view('auth/common/header');
        $this->load->view('auth/login', $data);
        $this->load->view('auth/common/footer');
    }

    public function signin()
    {
        $data['language'] = $this->language['login']['alert'];
        $data['content'] = $this->language['register'];
        $this->load->view('auth/common/header');
        $this->load->view('auth/register', $data);
        $this->load->view('auth/common/footer', $data);
    }

    public function recover()
    {
        $data['language'] = $this->language['recover']['alert'];
        $data['content'] = $this->language['recover'];
        $this->load->view('auth/common/header');
        $this->load->view('auth/recover', $data);
        $this->load->view('auth/common/footer', $data);
    }

    public function register()
    {
        if ($this->input->is_ajax_request()) {

            $this->load->helper('escape');

            $this->load->model('User_model', '', TRUE);
            $this->userClass = new User_model();

            $el = escape_post($_POST, $this->db->conn_id);
            $password = md5($el['pass']);

            if ($el['email'] != $el['email2']) {
                echo json_encode(array('login' => false));
                die();
            } else {
                $result = $this->userClass->select_user('email', $el['email']);
            }

            if (empty($result)) {

                $dateTime = date("Y-m-d H:i:s");
                $numRandom = md5(rand());


                $config = array(
                    'name'          => $el['name'],
                    'pass'         => $password,
                    'email'         => $el['email'],
                    'approved'      => 0,
                    'initial_date'  => $dateTime,
                    'token_recover' => $numRandom,
                );

                if ($this->userClass->create_user($config)) {

                    $this->load->library('Emails');

                    $data['email'] = $el['email'];
                    $data['site']  = $this->siteUrl;
                    $data['token'] = $numRandom;
                    $data['language'] = $this->language['email']['register'];

                    $assunto = $this->language['email']['register']['topic'];
                    $mensagem = $this->load->view('auth/template/email/register', $data, TRUE);

                    if ($this->emails->enviar($assunto, $mensagem, $el['email'])) {
                        echo json_encode(array('login' => 1));
                    } else {

                        echo json_encode(array('login' => 0));
                    }
                }
            } else {

                echo json_encode(array('login' => 2));
            }
        }
    }

    public function validate()
    {
        if ($this->input->is_ajax_request()) {

            $this->load->helper('escape');
            $el = escape_post($_POST, $this->db->conn_id);
            $password = md5($el['pass']);

            $this->load->model('User_login', '', TRUE);
            $user = new User_login();
            $result =  $user->validate_login($el['email'], $password);

            if (!empty($result)) {
                if ($result[0]->approved) {
                    $user->create_hash($el['email'], $password, $result[0]);
                    echo json_encode(array('res' => 1));
                } else {
                    echo json_encode(array('res' => 2));
                }
            } else {
                echo json_encode(array('res' => 0));
            }
        } else {
            echo json_encode(array('res' => 0));
        }
    }
}
