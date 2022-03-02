<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config extends CI_Controller
{
    private $user;
    private $token;
    private $siteUrl;
    private $page;

    function __construct()
    {
        parent::__construct();

        $this->siteUrl = base_url();

        if (isset($_COOKIE['usr'])) {

            $this->user = $_COOKIE['usr'];
            $this->token = $_COOKIE['tkn'];
            $this->load->model('User_login', '', TRUE);

            $user = new User_login();
            $result =  $user->validate_hash($this->user, $this->token);


            if (!$result) {
                $user->unset_cookie($_COOKIE);
                header("Location: {$this->siteUrl}/login");
                exit;
            }
        } else {
            header("Location: {$this->siteUrl}/login");
            exit;
        }
    }
    function social()
    {
        if ($this->input->is_ajax_request()) {
            $social = isset($_POST['social']) ? $_POST['social'] : die();

            $final = [];
            $post = [];
            $this->load->helper('escape');

            foreach ($social as $c) {
                while ($f = current($c)) {
                    if (key($c) == 'c') {
                        if ($c['midia'] == 'whatsapp') {
                            foreach ($c['c'] as $k => $wpp) {
                                if ($k == 'phone' && $wpp != '') {
                                    $post[$c['midia']]['phone'] = htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $wpp), ENT_QUOTES);
                                } else {
                                    $post[$c['midia']]['msg'] = htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $wpp), ENT_QUOTES);
                                }
                            }
                        } else {
                            $post[$c['midia']] =  htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $c['c']), ENT_QUOTES);
                        }
                    }
                    next($c);
                }
            }
            array_push($final, $post);

            $config = array(
                'user_id' => $this->user,
                'social' => json_encode($final),
            );
            $this->db->where("user_id = $this->user");
            $this->db->update('user_page', $config);
            echo 1;
        }
    }
    function uri() // ATUALIZAR URI
    {
        if ($this->input->is_ajax_request()) {

            $this->load->helper('escape');
            $this->load->model('Page_model', '', TRUE);

            $page = new Page_model();
            $elements = escape_post($_POST, $this->db->conn_id);
            $results = $page->select_page('url', $elements['url']);

            if (!$results) {
                $args = array(
                    'url' => $elements['url'],
                );
                if ($page->update_page('user_id', $this->user, $args)) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                if ($results[0]->url == $elements['url']) {
                    echo 'user';
                } else {
                    echo 0;
                }
            }
        }
    }
    function update()
    {
        if ($this->input->is_ajax_request()) {

            $this->load->helper('escape');
            $elements = escape_post($_POST, $this->db->conn_id);
            $pass  = isset($_POST['pass']) && $_POST['pass'] != '' ? md5($elements['pass']) :  '';

            if ($pass != '') {

                $config = array(
                    'name'  => $elements['name'],
                    'pass' => $pass,
                );
            } else {
                $config = array(
                    'name'  => $elements['name'],
                );
            }

            $this->load->model('User_model', '', TRUE);
            $user = new User_model();
            if ($user->update_user('id', $this->user, $config)) {
                echo json_encode(array('res' => true));
            } else {
                die();
            }
        }
    }
    function delete()
    {
        if ($this->input->is_ajax_request()) {

            $this->load->helper('escape');
            $elements = escape_post($_POST, $this->db->conn_id);
            $pass  = isset($_POST['pass']) && $_POST['pass'] != '' ? md5($elements['pass']) :  '';

            $this->load->model('User_model', '', TRUE);
            $user = new User_model();

            $this->db->select('*')->from('user')
                ->join("user_page", "user.id = user_page.user_id")
                ->where("user.id = '$this->user' && user.pass = '$pass'");
            $result = $this->db->get()->result();

            if (!empty($result)) {

                $account = $result[0];
                $path = FCPATH . 'assets/upload/';

                $profile = isset($account->profile) ? $path . $account->profile : '';
                $cover   = isset($account->cover)   ? $path . $account->cover   : '';

                if (file_exists($profile)) {
                    unlink($profile);
                }
                if (file_exists($cover)) {
                    unlink($cover);
                }

                $this->db->where("user_id = $this->user");
                if ($this->db->delete('user_page')) {
                    $this->db->where("id = $this->user");
                    if ($this->db->delete('user')) {
                        echo json_encode(array('res' => 1));
                    }
                }
            } else {
                echo json_encode(array('res' => 0));
            }
        }
    }
    public function modal()
    {
        if ($this->input->is_ajax_request()) {
            $data['default'] = '';
            echo $this->load->view('admin/template/icons', $data, TRUE);
        }
    }
}
