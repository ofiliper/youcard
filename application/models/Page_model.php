<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function update_page($selector, $value, $args)
    {

        $this->db->where("$selector = $value");
        if ($this->db->update('user_page', $args)) {

            return 1;
        };
    }

    public function select_page($selector, $value)
    {
        $this->db->select('*')->from('user_page')
            ->where("$selector = '$value'");
        return $this->db->get()->result();
    }

}
