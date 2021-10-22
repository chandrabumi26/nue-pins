<?php
defined('BASEPATH') OR exit('No direct script access Allowed');

class Model_login extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    
    public function readUser($data){
        $this->db->select('user.*');
		$this->db->from('user');
		$this->db->where('email',$data);
		$query = $this->db->get();
		return $query->row_array();
    }

	public function readAdmin($data){
        $this->db->select('admin.*');
		$this->db->from('admin');
		$this->db->where('email',$data);
		$query = $this->db->get();
		return $query->row_array();
    }

	public function readUserById($data){
        $this->db->select('user.*');
		$this->db->from('user');
		$this->db->where('id_user',$data['id_user']);
		$query = $this->db->get();
		return $query->row_array();
    }

}