<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
				header("Location: {$this->siteUrl}login");
				exit;
			}
		} else {
			header("Location: {$this->siteUrl}login");
			exit;
		}
	}


	public function index()
	{
		$this->db->select('*')->from('user_page')->where("user_id = $this->user");
		$result =  $this->db->get()->result();
		$data['language'] = $this->language;
		$data['route'] = $this->uri->segment(2);
		$data['page_builder'] = true;

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
		$data['icons'] = $icons;
		if (!empty($result)) {

			$this->load->helper('elements_edit');

			$data['premium'] = isset($result[0]->is_premium) ? $result[0]->is_premium           : '';
			$data['profile'] = isset($result[0]->profile)    ? $result[0]->profile              : '';
			$data['cover']   = isset($result[0]->cover)      ? $result[0]->cover                : '';
			$data['url'] 	 = isset($result[0]->url)        ? $result[0]->url                  : '';
			$data['config']  = isset($result[0]->config)     ? json_decode($result[0]->config)  : '';
			$data['content'] = isset($result[0]->content)    ? json_decode($result[0]->content) : '';
			$data['conn'] = $this->db->conn_id;

			if(!empty($result[0]->content)){
				foreach (json_decode($result[0]->content) as $c) :
					if ($c->type == 'bio') :
						$data['title'] = !empty($c->title) ? $c->title : '';
						$data['description'] = !empty($c->content) ? $c->content : '';
					endif;
				endforeach;
			}
		} else {
			$data['default'] = '';
		}
		$this->load->view('admin/common/header', $data);
		$this->load->view('admin/common/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/common/footer', $data);
	}

	public function divulgation()
	{
		$social = array(
			'whatsapp'   => 'fab fa-whatsapp',
			'facebook'   => 'fab fa-facebook',
			'instagram'  => 'fab fa-instagram',
			'twitter'    => 'fab fa-twitter',
			'youtube'    => 'fab fa-youtube',
			'linkedin'   => 'fab fa-linkedin',
			'telegram'   => 'fab fa-telegram',
			'soundcloud' => 'fab fa-soundcloud',
			'spotify'    => 'fab fa-spotify',
		);

		$this->db->select('*')->from('user_page')->where("user_id = $this->user");
		$result =  $this->db->get()->result();

		if (!empty($result)) {
			$data['premium'] = isset($result[0]->is_premium) ? $result[0]->is_premium : 0;
			$data['url'] 	 = isset($result[0]->url) ? $result[0]->url : '';
			if(!empty($result[0]->social)){
				$social_network  = isset($result[0]->social) ? json_decode($result[0]->social) : '';
				$data['social_content']  = $social_network[0];
			}
		}
		$data['language'] = $this->language;
		$data['social'] = $social;
		$data['route'] = $this->uri->segment(2);

		$this->load->view('admin/common/header');
		$this->load->view('admin/common/sidebar', $data);
		$this->load->view('admin/divulgation', $data);
		$this->load->view('admin/common/footer');
	}
	public function account()
	{
		$this->db->select('user.email, user.name, user_page.is_premium')->from('user')
			->join('user_page', 'user.id = user_page.user_id')
			->where("user.id = {$this->user}");
		$result =  $this->db->get()->result();

		if (!empty($result)) {
			$data['name']  = isset($result[0]->name) ? $result[0]->name : 0;
			$data['email'] = isset($result[0]->name) ? $result[0]->email : 0;
			$data['premium'] = isset($result[0]->is_premium) ? $result[0]->is_premium : 0;
		}

		$data['language'] = $this->language;
		$data['route'] = $this->uri->segment(2);

		$this->load->view('admin/common/header');
		$this->load->view('admin/common/sidebar', $data);
		$this->load->view('admin/account', $data);
		$this->load->view('admin/common/footer');
	}
	public function premium()
	{
		$data['language'] = $this->language;
		$data['route'] = $this->uri->segment(2);
		$this->load->view('admin/common/header');
		$this->load->view('admin/common/sidebar', $data);
		$this->load->view('admin/premium');
		$this->load->view('admin/common/footer');
	}

	public function logout()
	{

		if (isset($_COOKIE['usr']) || isset($_COOKIE['tkn'])) {

			$this->load->model('User_login', '', TRUE);
			$user = new User_login();
			$user->logout($_COOKIE['usr'], $_COOKIE['tkn']);
			$user->unset_cookie($_COOKIE);

			header("Location: {$this->siteUrl}");
			exit;
		} else {

			header("Location: {$this->siteUrl}");
			exit;
		}
	}

	public function template()
	{

		$action = isset($_POST['action'])      ? htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $_POST['action']))      : '';

		$data['type'] = $action;
		$data['language'] = $this->language['custom_page']['elements'];

		echo $this->load->view("admin/template/element", $data, TRUE);
	}
	public function save_page()
	{
		if ($this->input->is_ajax_request()) {

			$content = isset($_POST['content']) ? $_POST['content'] : die();

			$final = [];
			$this->load->helper('escape');

			// var_dump($content);
			foreach ($content as $c) {
				$post = [];
				while ($f = current($c)) {
					if (key($c) == 'type') {
						$post['type'] =  htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $c['type']), ENT_QUOTES);
					}
					if (key($c) == 'title') {
						$post['title'] =  substr(htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $c['title']), ENT_QUOTES), 0, 50);
					}
					if (key($c) == 'align') {
						$post['align'] =  $c['align'] != '' ? htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $c['align']), ENT_QUOTES) : '';
					}
					if (key($c) == 'icon') {
						$post['icon'] =  htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $c['icon']), ENT_QUOTES);
					}
					if (key($c) == 'content') {
						if ($c['type'] == 'text') {
							$post['content'] =  substr(htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $c['content']), ENT_COMPAT, 'UTF-8', true), 0, 320);
						} elseif ($c['type'] == 'button') {
							$post['content'] =  htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $c['content']), ENT_COMPAT, 'UTF-8', true);
						} else {
							$post['content'] =  substr(htmlspecialchars(mysqli_real_escape_string($this->db->conn_id, $c['content']), ENT_COMPAT, 'UTF-8', true), 0, 50);
						}
					}
					next($c);
				}
				array_push($final, $post);
			}
			$config = array(
				'content' => json_encode($final),
			);
			$this->db->where('user_id', $this->user);
			$this->db->update('user_page', $config);
		}
	}
	public function save_config()
	{
		if ($this->input->is_ajax_request()) {

			$final = [];
			foreach ($_POST['el'] as $k => $c) {
				$final[$k] = substr(mysqli_real_escape_string($this->db->conn_id, $c), 0, 25);
			}
			$config = array(
				'config' => json_encode($final)
			);
			$this->db->where("user_id = $this->user");
			$this->db->update('user_page', $config);
		}
	}
}
