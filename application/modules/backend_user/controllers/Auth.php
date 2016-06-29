<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation', 'session'));
		$this->load->model(array('Auth_model'));
		$this->load->helper('string');
		$this->load->library('MY_Form_validation');
	}

	public function login() {		
		// $string = random_string('alpha', '100');
		if($this->input->post('login')) {
			
			/* Post data */
			$data = array('username' => $this->input->post('txtUsername'), 'password' => $this->input->post('txtPassword'));
			
			/* Form Validation */	
			$this->form_validation->set_rules('txtUsername', 'Tên tài khoản', 'trim|required');
			$this->form_validation->set_rules('txtPassword', 'Mật khẩu', 'trim|required|callback_checkLogin');
			$this->form_validation->set_error_delimiters('<p class="error">','</p>');

			if($this->form_validation->run($this)) {
				$param = array(
							'where' => array('taikhoan' => $data['username']),
							'select' => 'taikhoan, matkhau, salt'
						);
				$data = $this->Auth_model->getRow($param);
				$this->session->set_userdata('authentication', $data);
				redirect('admin');
			}
		}
		$data['template'] = 'backend_user/auth/login';
		$data['meta-title'] = 'Trang đăng nhập';
		$data['meta-description'] = 'Trang đăng nhập';
		$this->template->call_auth_template(isset($data) ? $data : null);
		// $this->output->enable_profiler(true);

	}

	public function checkLogin($password = '') {
		$username = $this->input->post('txtUsername');
		if(!empty($username)) {
			$param = array(
							'where' => array('taikhoan' => $username),
							'select' => 'taikhoan, matkhau, salt'
						);
			$row = $this->Auth_model->getRow($param);

			if(!isset($row)) {
				$this->form_validation->set_message('checkLogin', 'Tài khoản không tồn tại');
				return false;
			} else {
				$password = sha1(sha1(sha1($password).sha1($row['salt'])));
				if($password != $row['matkhau']) {
					$this->form_validation->set_message('checkLogin', 'Mật khẩu không đúng !');
					return false;
				}	
				return true;
			}	
		}
	}

	public function resgister() {
		if($this->input->post('register')) {
			/* Post data */
				$data = array(
							'taikhoan' => $this->input->post('txtUsername'), 
							'matkhau' => $this->input->post('txtPassword'),
							'fullname' => $this->input->post('txtFullName'),
							'dob' => $this->input->post('txtDob'),
							'email' => $this->input->post('txtEmail')
						);	

			/* Form Validation */
			$this->form_validation->set_rules('txtEmail', 'Email', 'trim|required|callback__checkEmail');
			$this->form_validation->set_rules('txtUsername', 'Tên tài khoản', 'trim|required|callback__checkUsername');
			$this->form_validation->set_rules('txtPassword', 'Mật khẩu', 'trim|required');
			$this->form_validation->set_rules('txtPassword_repeat', 'Xác thực mật khẩu', 'trim|required|callback__checkPassword['.$data['matkhau'].']');
			$this->form_validation->set_rules('txtFullName', 'Tên đầy đủ', 'trim|required');
			$this->form_validation->set_rules('txtDob', 'Ngày sinh', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="error">','</p>');

			if($this->form_validation->run($this)) {
				$data['salt'] = random_string('alpha', 100);
				$data['matkhau'] = sha1(sha1(sha1($data['matkhau']).sha1($data['salt'])));
				$flag = $this->Auth_model->insert($data);
				$this->session->set_userdata('authentication', $data);
				redirect('admin');
			}
		}

		$data['template'] = 'backend_user/auth/resgister';
		$data['meta-title'] = 'Trang đăng ký';
		$data['meta-description'] = 'Trang đăng ký';
		$this->template->call_auth_template(isset($data) ? $data : null);
		$this->output->enable_profiler(true);
	}

	public function _checkPassword($password_repeat = "", $password = "") {
		if($password != $password_repeat) {
			$this->form_validation->set_message('_checkPassword', 'Xác thực mật khẩu không đúng');
			return false;
		}
		return true;
	}

	public function _checkEmail($email) {
		$data = $this->Auth_model->getRow(array('where' => array('email ' =>  $email)));
		if(isset($data) && count($data) > 0) {
			$this->form_validation->set_message('_checkEmail', 'Email đã đăng ký');
			return false;
		}
		return true;
	}	

	public function _checkUsername($username) {
		$data = $this->Auth_model->getRow(array('where' => array('taikhoan ' => $username)));
		if(isset($data) && count($data) > 0) {
			$this->form_validation->set_message('_checkUsername', 'Tài khoản đã tồn tại');
			return false;
		}
		return true;
	}

	public function updateInfo() {
		$user = $this->session->userdata('authentication');
		$param['where'] = array('taikhoan' => $user['taikhoan']);
		if($this->input->post('submit')) {
			
			/* Post data */
			$data = array(
					'taikhoan' => $this->input->post('taikhoan'), 
					'fullname' => $this->input->post('fullname'),
					'dob' => $this->input->post('dob'),
					'email' => $this->input->post('email')
				);
			
			/* Form Validation */
			$this->form_validation->set_rules('taikhoan', 'Tên tài khoản', 'trim|required');
			$this->form_validation->set_rules('fullname', 'Họ tên đầy đủ', 'trim|required|callback_checkLogin');
			$this->form_validation->set_rules('dob', 'Ngày sinh', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="error">','</p>');

			if($this->form_validation->run($this)) {
				$param['where'] = array('taikhoan' => $data['taikhoan'] );
				$param['data'] = $data;
				
				$flag = $this->auth_model->update($param);
				$flag = $this->session->set_userdata('authentication', $data);
				$this->session->set_flashdata('message', $flag);
				redirect('admin');
			}
		}
		$data['data']['row'] = $this->Auth_model->getRow($param);
		$data['template'] = 'backend_user/auth/updateInfo';
		$data['meta-title'] = 'Trang đăng nhập';
		$data['meta-description'] = 'Trang đăng nhập';
		$this->template->call_admin_template(isset($data) ? $data : null);
	}

	public function changePass() {
		$user = $this->session->userdata('authentication');
		
		if($this->input->post('submit')) {
			
			/* Post data */
			$data = array(
					'taikhoan' => $this->input->post('taikhoan'), 
					'matkhau' => $this->input->post('matkhau_moi'),
				);
			
			/* Form Validation */
			$this->form_validation->set_rules('matkhau', 'Mật khẩu cũ', 'trim|required|callback__checkpass_old');
			$this->form_validation->set_rules('matkhau_new', 'Mật khẩu mới', 'trim|required|callback__checkpass_repeat');
			$this->form_validation->set_rules('matkhau_repeat', 'Nhập lại mật khẩu', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="error">','</p>');

			if($this->form_validation->run($this)) {
				
				$data['matkhau'] = sha1(sha1(sha1($data['matkhau']).sha1($user['salt'])));		
				$param['data'] = $data;
				$param['where'] = array('taikhoan' => $user['taikhoan']);
				$flag = $this->auth_model->update($param);
				$flag = $this->session->set_userdata('authentication', $data);
				$this->session->set_flashdata('message', $flag);
				redirect('admin');
			}
		}

		$data['data']['taikhoan'] = $user['taikhoan'];
		$data['template'] = 'backend_user/auth/changepass';
		$data['meta-title'] = 'Trang đăng nhập';
		$data['meta-description'] = 'Trang đăng nhập';
		$this->template->call_admin_template(isset($data) ? $data : null);
	}

	public function _checkpass_old($pass_old =  "") {
		$user =  $this->session->userdata('authentication');
		if(isset($pass_old)) {

			$pass_old = sha1(sha1(sha1($pass_old).sha1($user['salt'])));

			if($pass_old != $user['matkhau']) {
				$this->form_validation->set_message('_checkpass_old', 'Mật khẩu không đúng');
				return false;
			}	
			return true;
		}
		
	}

	public function _checkpass_repeat($pass_new) {
		$user = $this->session->userdata('authentication');
		$pass_old = $this->input->post('pass_old');
		if(isset($pass_new)) {
			if($pass_old == $pass_new) {
				$this->form_validation->set_message('_checkpass_repeat', 'Xác nhận mật khẩu không đúng.');
				return false;
			}
		}
		return true;
	}

	public function forgot() {
		$data['template'] = 'backend_user/auth/forgot';
		$data['meta-title'] = 'Trang đăng nhập';
		$data['meta-description'] = 'Trang đăng nhập';
		$this->template->call_auth_template(isset($data) ? $data : null);
		$this->output->enable_profiler(true);
	}

	public function logout() {
		$this->session->unset_userdata('authentication');
		redirect('backend_user/auth/login');
	}


	public function checkAuthentication() {
		$user = $this->session->userdata('authentication'); 
		if(!isset($user)) {
			redirect('backend_user/auth/login');
		} 
	}

	


}