<?php
defined('BASEPATH') OR exit('No direct script access Allowed');

class Model_register extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    
    public function createAccount($data){
		$this->db->insert('user',$data);
	}

	public function createToken($data){
		$this->db->insert('user_token',$data);
	}

	public function createAccountAdmin($data){
		$this->db->insert('admin',$data);
	}
}