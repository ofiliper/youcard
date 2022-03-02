
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function create_user($args)
    {
        if ($this->db->insert('user', $args)) {
            return $this->create_user_page($this->db->insert_id());
        } else {
            return 0;
        }
    }

    public function create_user_page($id)
    {
        $args = array(
            'user_id' => $id,
        );
        if ($this->db->insert('user_page', $args)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function select_user($selector, $value)
    {
        $this->db->select('*')->from('user')->where("$selector = '$value'");
        return $this->db->get()->result();
    }

    public function select_user_by_token($email, $token)
    {
        $this->db->select('*')->from('user')->where("email = '$email' AND token_recover = '$token'");
        return $this->db->get()->result();
    }

    public function update_user($selector, $user_id, $args)
    {
        $this->db->where("$selector = '$user_id'");
        $this->db->update('user', $args);
        return 1;
    }

    public function update_user_by_token($email, $token, $config)
    {
        $this->db->where("email = '$email' AND token_recover = '$token'");
        $this->db->update('user', $config);
        return 1;
    }
}
