<?php
defined('BASEPATH') OR exit('No direct script access Allowed');

class Model_produk extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

	public function readProduk(){
		$this->db->select('produk.*');
		$this->db->from('produk');
		$this->db->order_by('nama_produk','asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function readKategori($data){
		$this->db->select('produk.*');
		$this->db->from('produk');
		$this->db->where('kategori',$data);
		$this->db->where('stock >=', '1');
		$this->db->order_by('nama_produk','asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function readFeatured(){
		$this->db->select('produk.*');
		$this->db->from('produk');
		$this->db->where('total_sold >=', '5');
		$this->db->order_by('total_sold','desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function readDetail($data){
		$this->db->select('produk.*');
		$this->db->from('produk');
		$this->db->where('id_produk',$data['id_produk']);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function createProduk($data){
		$this->db->insert('produk',$data);
	}

	public function updateProduk($data){
		$this->db->where('id_produk',$data['id_produk']);
		$this->db->update('produk',$data);
	}

	public function deleteProduk($data){
		$this->db->where('id_produk',$data['id_produk']);
		$this->db->delete('produk',$data);
	}
    
}