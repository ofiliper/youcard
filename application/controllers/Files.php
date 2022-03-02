<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Files extends CI_Controller
{

    private $user;
    private $token;
    private $siteUrl;
    private $language;

    function __construct()
    {
        parent::__construct();

        $this->siteUrl = base_url();

        if (isset($_COOKIE['usr'])) {

            $this->user = $_COOKIE['usr'];
            $this->token = $_COOKIE['tkn'];

            $this->load->helper('language');
			$this->language = language_selected(get_language(isset($_COOKIE['lang']) ? $_COOKIE['lang'] : ''));

            $this->load->model('User_login', '', TRUE);
            $user = new User_login();

            $result =  $user->validate_hash($this->user, $this->token);

            if (!$result) {

                $user->unset_cookie($_COOKIE);
                header("Location: {$this->siteUrl}");
                exit;
            }
        } else {
            header("Location: {$this->siteUrl}");
            exit;
        }
    }
    function send() // Enviar imagem
    {
        if ($this->input->is_ajax_request()) {
            if ($_FILES['file']['name'] != '') {

                if ($_GET['i'] == 'profile' || $_GET['i'] == 'cover') {
                    $currentImg = ($_GET['i'] == 'profile') ? 'profile' : 'cover';
                    $imgPath = './assets/upload/';
                } else {
                    die();
                }

                $output = '';
                $config['encrypt_name'] = TRUE;
                $config['upload_path'] = $imgPath;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '400000';
                // $config['max_width'] = '1080';
                // $config['max_height'] = '1080';


                // var_dump($config);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // var_dump($config);


                if ($this->upload->do_upload('file')) {

                    $data = $this->upload->data();

                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $imgPath . $this->upload->data('file_name');
                    $config['new_image']      = $imgPath . $this->upload->data('file_name');
                    $config['create_thumb']   = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['overwrite']      = TRUE;
                    $config['width']          = 500;
                    $config['height']         = 500;


                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);

                    $this->image_lib->resize();

                    if (!$this->image_lib->resize()) {

                        // echo $this->image_lib->display_errors();
                        echo json_encode(array(
                            'state' => 3,
                        ));
                    }

                    $thumbnail = $data['raw_name'] . '_thumb' . $data['file_ext'];
                    $finalPath = FCPATH . 'assets/upload/' . $this->upload->data('file_name');
                    $this->image_lib->clear();

                    unlink($finalPath);

                    if ($thumbnail) {

                        $config = array(
                            $currentImg => $thumbnail,
                        );
                        $this->db->where("user_id = {$this->user}");
                        $this->db->update('user_page', $config);
                    }
                    echo json_encode(array(
                        'img' => $thumbnail,
                        'state' => 1,
                    ));
                } else {
                    echo json_encode(array(
                        'state' => 2,
                        'msg' => $this->upload->display_errors(),
                        'content' => $_FILES['file'],
                    ));
                }
            }
        }
    }
    function remove() // Deletar imagem
    {
        if ($this->input->is_ajax_request()) {

            $type = isset($_POST['type']) ? htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $_POST['type'])) : '';
            $elImg = isset($_POST['elImg']) ? htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $_POST['elImg'])) : '';
            $type = ($type == 'profile' || $type == 'cover') ? (($type == 'profile') ? 'profile' : 'cover') : die();

            $this->db->select('*')->from('user_page')->where("user_id = $this->user AND $type = '$elImg'");
            $result = $this->db->get()->result();

            if (!empty($result)) {

                $finalPath = FCPATH . '/assets/upload/';
                $archive = $finalPath . $elImg;
                if (file_exists($archive)) {
                    unlink($archive);
                }
                $config = array(
                    $type => '',
                );

                $this->db->where("user_id = $this->user AND $type = '$elImg'");
                $this->db->update('user_page', $config);

                $data['type'] = $type;
                $data['language'] = $this->language;
                
                $input = $this->load->view('admin/template/images_upload', $data, TRUE);
                echo json_encode(array('res' => $input));
            } else {
                die();
            }
        }
    }
}
