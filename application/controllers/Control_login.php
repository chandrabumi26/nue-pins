<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_login extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_login');
		$this->load->library('session');

    }

	public function index()
	{
		redirect(base_url());
	}

	public function indexAdmin(){
		$this->load->view('v_loginadmin');
	}

	public function checkUserAccount(){
		$email = $this->input->post('emailLogin');
		$password = $this->input->post('pwdLogin');

		$user = $this->model_login->readUser($email);
		if($user){
			if($user['is_emailActive'] == 1){
				if(password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email']
					];
					$this->session->set_userdata($data);
					redirect(base_url());
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="text-align:center;">
					Incorrect Password</div>');
					redirect(base_url());
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="text-align:center;">
				Email has not been verified yet!</div>');
				redirect(base_url());
				echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#myModal').modal('show');
				});
				</script>";	
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="text-align:center;">
			Email not registered</div>');
			redirect(base_url());
			
		}
	}

	public function checkAdminAccount(){
		$email = $this->input->post('emailAdmin');
		$password = $this->input->post('pwdAdmin');

		$admin = $this->model_login->readAdmin($email);
		if($admin){
				if(password_verify($password, $admin['password'])){
					$data = [
						'emailadmin' => $admin['email']
					];
					$this->session->set_userdata($data);
					redirect(base_url('admin/home'));
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Incorrect Password</div>');
					redirect(base_url('admin'));
				}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			You are not admin, please click <a href="home"> this </a>to leave</div>');
			redirect(base_url('admin'));
		}
	}

	public function logoutUser(){
		unset($_SESSION['email']);
		redirect(base_url());
	}

	public function logoutAdmin(){
		unset($_SESSION['emailadmin']);
		redirect(base_url('admin'));
	}

}
