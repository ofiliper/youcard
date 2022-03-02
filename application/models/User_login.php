<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_login extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function validate_login($email, $pass)
    {

        $this->db->select('*')->from('user')->where("`email` = '$email' AND `pass` = '$pass'");
        return $this->db->get()->result();
    }

    public function validate_hash($id, $token)
    {

        $this->db->select('*')->from('user')->where("`id` = '$id' AND `token` = '$token'");
        return $this->db->get()->result();
    }

    public function logout($id, $token)
    {
        $random_tkn = substr(md5(rand()), 0, 6);
        $config = array(
            'token' => $random_tkn,
        );
        $this->db->where("`id` = '$id' AND `token` = '$token'");
        $this->db->update('user', $config);
    }

    public function create_hash($email, $pass, $user)
    {

        $random_tkn = md5(rand());
        $config = array(
            'token' => $random_tkn,
        );

        $this->db->where("`email` = '$email' AND `pass` = '$pass'");
        $this->db->update('user', $config);

        if (isset($_COOKIE)) {
            $this->unset_cookie($_COOKIE);
        }

        $this->set_cookie('tkn', $random_tkn);
        $this->set_cookie('usr', $user->id);
    }

    public function set_cookie($el, $val)
    {
        setcookie($el, $val, time() + 604800, '/');
    }

    public function unset_cookie($cookie)
    {
        foreach ($cookie as $key => $el) {
            if($key != 'lang'){
                unset($_COOKIE[$key]);
                setcookie($key, null, -1, '/');
            }
        }
    }
}
