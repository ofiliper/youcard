<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	private $language;
	private $siteUrl;

	function __construct()
	{
		parent::__construct();
		$this->siteUrl = base_url();
		$this->load->helper('language');
		$this->language = language_selected(get_language(isset($_COOKIE['lang']) ? $_COOKIE['lang'] : ''));
	}
	public function index()
	{
		$data['content']    = $this->language['home']['index'];
		$data['header_menu'] = $this->language['home']['header_menu'];
		$data['footer_menu'] = $this->language['home']['footer_menu'];

		$data['fonts'] = true;
		$this->load->view('home/common/header', $data);
		$this->load->view('home/index');
		$this->load->view('home/common/footer', $data);
	}
	public function privacy()
	{
		$data['title']    = $this->language['home']['privacy']['title'];
		$data['content']  = $this->language['home']['privacy']['content'];
		$data['header_menu'] = $this->language['home']['header_menu'];
		$data['footer_menu'] = $this->language['home']['footer_menu'];

		$data['fonts'] = true;
		$this->load->view('home/common/inner_header', $data);
		$this->load->view('home/privacy');
		$this->load->view('home/common/footer', $data);
	}
	public function terms()
	{
		$data['title'] = $this->language['home']['terms']['title'];
		$data['content'] = $this->language['home']['terms']['content'];
		$data['header_menu'] = $this->language['home']['header_menu'];
		$data['footer_menu'] = $this->language['home']['footer_menu'];

		$data['language'] = $this->language;
		$data['fonts'] = true;
		$this->load->view('home/common/inner_header', $data);
		$this->load->view('home/terms');
		$this->load->view('home/common/footer', $data);
	}
	public function prices()
	{
		$data['content'] = $this->language['home']['index']['price'];
		$data['title'] = $this->language['home']['index']['price']['title'];
		$data['header_menu'] = $this->language['home']['header_menu'];
		$data['footer_menu'] = $this->language['home']['footer_menu'];

		$data['language'] = $this->language;
		$data['fonts'] = true;
		$this->load->view('home/common/inner_header', $data);
		$this->load->view('home/prices');
		$this->load->view('home/common/footer', $data);
	}
	public function user()
	{

		if($this->uri->segment(1) !='blog'){
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
	
			$rota = $this->uri->segment(1);
			$this->db->select('*')->from('user_page')->where("url = '$rota'");
			$result = $this->db->get()->result();
	
			if (!empty($result)) {
	
				$this->load->helper('format');
				$data['cover'] = !empty($result[0]->cover) ? $result[0]->cover : 'default.png';
				$data['profile'] = !empty($result[0]->profile) ? $result[0]->profile : 'default.png';
	
				if (!empty($result[0]->config)) {
	
					$custom_style = json_decode($result[0]->config);
					$data['title_font']   = isset($custom_style->title)       ? $custom_style->title : '';
					$data['text_font']    = isset($custom_style->text)        ? $custom_style->text : '';
					$data['title_color']  = isset($custom_style->title_color) ? $custom_style->title_color : '';
					$data['icon_color']   = isset($custom_style->icon)        ? $custom_style->icon : '';
					$data['button_color'] = isset($custom_style->button)      ? $custom_style->button : '';
	
					$social_network  = isset($result[0]->social) ? json_decode($result[0]->social) : '';
					$data['social_content']  = $social_network[0];
				}
				if (!empty($result[0]->content)) {
					$content = json_decode($result[0]->content);
					foreach ($content as $c) :
						if ($c->type == 'bio') :
							$data['title'] = !empty($c->title) ? $c->title : '';
							$data['description'] = !empty($c->content) ? $c->content : '';
						endif;
					endforeach;
					$data['content'] = $content;
				}
				$data['social'] = $social;
				$data['premium'] = $result[0]->is_premium;
				$data['conn'] = $this->db->conn_id;
			} else {
				header("Location: {$this->siteUrl}");
				exit;
			}
	
			$this->load->view('page/common/header', $data);
			$this->load->view('page/index', $data);
			$this->load->view('page/common/footer');
		}
	}
	public function recover()
	{
		if ($this->input->is_ajax_request()) {

			$this->load->helper('escape');
			$el = escape_post($_POST, $this->db->conn_id);

			$this->load->model('User_model', '', TRUE);
			$user = new User_model();


			$result = $user->select_user('email', $el['email']);

			if (!empty($result)) {

				$numRandom = md5(rand());
				$config = array(
					'token_recover' => $numRandom
				);

				if ($user->update_user('email', $el['email'], $config)) {

					$this->load->library('Emails');

					$data['email'] = $el['email'];
					$data['site']  = $this->siteUrl;
					$data['token'] = $numRandom;
					$data['language'] = $this->language['email']['recover'];

					$mensagem = $this->load->view('auth/template/email/recover', $data, TRUE);
					$assunto = $this->language['email']['recover']['topic'];

					if ($this->emails->enviar($assunto, $mensagem, $el['email'])) {
						echo json_encode(array('res' => true));
					} else {
						echo json_encode(array('res' => false));
					}
				}
			}
		}
	}
	public function redefine()
	{

		if (isset($_GET['t']) && isset($_GET['e'])) {

			$this->load->helper('escape');
			$el = escape_post($_GET, $this->db->conn_id);

			$data['email']  = $el['e'];
			$data['t']      = $el['t'];

			$this->load->model('User_model', '', TRUE);
			$user = new User_model();

			$result = $user->select_user_by_token($el['e'], $el['t']);

			if (!empty($result)) {

				$data['login']  = true;
				$data['content'] = $this->language['redefine'];
				$data['language'] = $this->language['redefine']['alert'];

				$this->load->view('auth/common/header', $data);
				$this->load->view('auth/redefine', $data);
				$this->load->view('auth/common/footer', $data);

			} else {
				// header("Location: $this->siteUrl");
			}
		}
	}
	public function update()
	{
		if ($this->input->is_ajax_request()) {

			$this->load->helper('escape');
			$el = escape_post($_POST, $this->db->conn_id);

			$pass1 = md5($el['pass1']);
			$pass2 = md5($el['pass2']);

			$this->load->model('User_model', '', TRUE);
			$user = new User_model();

			$result = $user->select_user_by_token($el['email'], $el['tkn']);

			if (!empty($result)) {
				if ($pass1 == $pass2) {
					$numRandom = md5(rand());

					$config = array(
						'token_recover' => $numRandom,
						'pass'          => $pass1,
						'approved'      => 1,
					);
					if ($user->update_user('email', $el['email'], $config)) {
						echo json_encode(array('login' => true));
					} else {
						echo json_encode(array('login' => false));
					}
				} else {
					echo json_encode(array('login' => false));
				}
			} else {
				echo json_encode(array('login' => false));
			}
		}
	}
	public function confirm()
	{

		if (isset($_GET['t']) && isset($_GET['e'])) {
			$this->load->helper('escape');
			$el = escape_post($_GET, $this->db->conn_id);

			$email = $el['e'];
			$token = $el['t'];

			$this->load->model('User_model', '', TRUE);
			$user = new User_model();

			$result = $user->select_user_by_token($email, $token);

			if (!empty($result)) {

				$numRandom = md5(rand());
				$randValue = md5(rand());

				$config = array(
					'token'        => $randValue,
					'token_recover' => $numRandom,
					'approved' => 1,
				);

				if ($user->update_user_by_token($email, $token, $config)) {

					$this->load->model('User_login', '', TRUE);
					$user_login = new User_login();

					if (isset($_COOKIE['tkn'])) {
						$user_login->unset_cookie($_COOKIE);
					}

					$user_login->set_cookie('tkn', $randValue);
					$user_login->set_cookie('usr', $result[0]->id);

					$data['login'] = true;
					$data['language'] = $this->language['login']['alert'];
					$data['content'] = $this->language['confirm'];
					$this->load->view('auth/common/header');
					$this->load->view('auth/confirm', $data);
					$this->load->view('auth/common/footer', $data);
				}
			} else {
				header("Location: $this->siteUrl");
				echo json_encode(array('res' => false));
			}
		} else {
			header("Location: $this->siteUrl");
			echo json_encode(array('res' => false));
		}
	}
}
