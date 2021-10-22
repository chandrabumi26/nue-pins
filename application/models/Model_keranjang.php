<?php
defined('BASEPATH') OR exit('No direct script access Allowed');

class Model_keranjang extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function createKeranjang($data){
        $this->db->insert('keranjang_belanja',$data);
    }

    public function readKeranjang($id_user){
        $this->db->select('keranjang_belanja.*');
        $this->db->from('keranjang_belanja');
        $this->db->where('id_user',$id_user);
        $query = $this->db->get();
        return $query->result();
    }

    public function checkKeranjang($id_user,$id_produk){
        $this->db->select('keranjang_belanja.*');
		$this->db->from('keranjang_belanja');
		$this->db->where('id_user',$id_user);
        $this->db->where('id_produk',$id_produk);
		$query = $this->db->get();
		return $query->result();
    }

    public function getQuantity($data){
        $this->db->select('keranjang_belanja.*');
		$this->db->from('keranjang_belanja');
		$this->db->where('id_user',$data['id_user']);
        $this->db->where('id_produk',$data['id_produk']);
		$query = $this->db->get();
		return $query->row_array();
    }

    public function updateKeranjang($data){
		$this->db->where('id_user',$data['id_user']);
        $this->db->where('id_produk',$data['id_produk']);
		$this->db->update('keranjang_belanja',$data);
	}

    public function updateKeranjangg($data){
		$this->db->where('id_keranjang',$data['id_keranjang']);
		$this->db->update('keranjang_belanja',$data);
	}

    public function deleteKeranjang($data){
        $this->db->where('id_keranjang',$data['id_keranjang']);
        $this->db->delete('keranjang_belanja',$data);
    }
}