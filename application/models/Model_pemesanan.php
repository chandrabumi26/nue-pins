<?php
defined('BASEPATH') OR exit('No direct script access Allowed');

class Model_pemesanan extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function readPemesanan($id_user){
        $this->db->select('pemesanan.*');
		$this->db->from('pemesanan');
		$this->db->where('id_user',$id_user);
        $this->db->group_by('order_id');
        $this->db->order_by('order_date','DESC');
		$query = $this->db->get();
		return $query->result();
    }

    public function readPemesananAdmin(){
        $this->db->select('pemesanan.*');
		$this->db->from('pemesanan');
        $this->db->group_by('order_id');
		$query = $this->db->get();
		return $query->result();
    }

    public function readPemesananDashboard(){
        $this->db->select('pemesanan.*');
		$this->db->from('pemesanan');
        $this->db->where('status_pemesanan',"on delivery");
        $this->db->or_where('status_pemesanan',"Already delivered");
        $this->db->group_by('order_id');
		$query = $this->db->get();
		return $query->result();
    }

    public function incomeJanuari(){
        $this->db->select('total_gross AS jumlah');
        $this->db->from('pemesanan');
        $this->db->where('MONTH(order_date)', 1);
        $this->db->where('isDelivered', 1);
        $this->db->group_by('order_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function incomeFebruari(){
        $this->db->select('total_gross AS jumlah');
        $this->db->from('pemesanan');
        $this->db->where('MONTH(order_date)', 2);
        $this->db->where('isDelivered', 1);
        $this->db->group_by('order_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function incomeMaret(){
        $this->db->select('total_gross AS jumlah');
        $this->db->from('pemesanan');
        $this->db->where('MONTH(order_date)', 3);
        $this->db->where('isDelivered', 1);
        $this->db->group_by('order_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function incomeApril(){
        $this->db->select('total_gross AS jumlah');
        $this->db->from('pemesanan');
        $this->db->where('MONTH(order_date)', 4);
        $this->db->where('isDelivered', 1);
        $this->db->group_by('order_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function incomeMei(){
        $this->db->select('total_gross AS jumlah');
        $this->db->from('pemesanan');
        $this->db->where('MONTH(order_date)', 5);
        $this->db->where('isDelivered', 1);
        $this->db->group_by('order_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function incomeJuni(){
        $this->db->select('total_gross AS jumlah');
        $this->db->from('pemesanan');
        $this->db->where('MONTH(order_date)', 6);
        $this->db->where('isDelivered', 1);
        $this->db->group_by('order_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function incomeJuli(){
        $this->db->select('total_gross AS jumlah');
        $this->db->from('pemesanan');
        $this->db->where('MONTH(order_date)', 7);
        $this->db->where('isDelivered', 1);
        $this->db->group_by('order_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function incomeAgustus(){
        $this->db->select('total_gross AS jumlah');
        $this->db->from('pemesanan');
        $this->db->where('MONTH(order_date)', 8);
        $this->db->where('isDelivered', 1);
        $this->db->group_by('order_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function incomeSeptember(){
        $this->db->select('total_gross AS jumlah');
        $this->db->from('pemesanan');
        $this->db->where('MONTH(order_date)', 9);
        $this->db->where('isDelivered', 1);
        $this->db->group_by('order_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function incomeOktober(){
        $this->db->select('total_gross AS jumlah');
        $this->db->from('pemesanan');
        $this->db->where('MONTH(order_date)', 10);
        $this->db->where('isDelivered', 1);
        $this->db->group_by('order_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function incomeNovember(){
        $this->db->select('total_gross AS jumlah');
        $this->db->from('pemesanan');
        $this->db->where('MONTH(order_date)', 11);
        $this->db->where('isDelivered', 1);
        $this->db->group_by('order_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function incomeDesember(){
        $this->db->select('total_gross AS jumlah');
        $this->db->from('pemesanan');
        $this->db->where('MONTH(order_date)', 12);
        $this->db->where('isDelivered', 1);
        $this->db->group_by('order_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function readPemesananPending(){
        $this->db->select('pemesanan.*');
		$this->db->from('pemesanan');
        $this->db->where('status_pemesanan',"Transaksi sedang diproses");
        $this->db->group_by('order_id');
		$query = $this->db->get();
		return $query->result();
    }

    public function readInnerPemesanan($order_id){
        $this->db->select('pemesanan.*');
		$this->db->from('pemesanan');
		$this->db->where('order_id',$order_id);
		$query = $this->db->get();
		return $query->result();
    }

    public function readInnerPemesanan2($order_id){
        $this->db->select('pemesanan.*');
		$this->db->from('pemesanan');
		$this->db->where('order_id',$order_id);
        $this->db->group_by('order_id');
		$query = $this->db->get();
		return $query->result();
    }

    public function updatePemesanan($data){
        $this->db->where('order_id',$data['order_id']);
		$this->db->update('pemesanan',$data);
    }

    public function getProvinsi(){
        $otherdb = $this->load->database('otherdb', TRUE);
        $query = $otherdb->select('wilayah_provinsi.*')->get('wilayah_provinsi');
        return $query->result();
    }

    public function getIdProvinsi($data){
        $otherdb = $this->load->database('otherdb', TRUE);
        $query = $otherdb->get_where('wilayah_provinsi',['nama'=>$data]);
        return $query->row_array();
    }

    public function getCity($idProvinsi){
        $otherdb = $this->load->database('otherdb', TRUE);
        $query = $otherdb->get_where('wilayah_kabupaten',['provinsi_id'=>$idProvinsi]);
        return $query->result();
    }

    public function getIdKota($data){
        $otherdb = $this->load->database('otherdb', TRUE);
        $query = $otherdb->get_where('wilayah_kabupaten',['nama'=>$data]);
        return $query->row_array();
    }

    public function getKecamatan($idKota){
        $otherdb = $this->load->database('otherdb', TRUE);
        $query = $otherdb->get_where('wilayah_kecamatan',['kabupaten_id'=>$idKota]);
        return $query->result();
    }

    public function getIdkecamatan($data){
        $otherdb = $this->load->database('otherdb', TRUE);
        $query = $otherdb->get_where('wilayah_kecamatan',['nama'=>$data]);
        return $query->row_array();
    }

    public function getKelurahan($idKecamatan){
        $otherdb = $this->load->database('otherdb', TRUE);
        $query = $otherdb->get_where('wilayah_desa',['kecamatan_id'=>$idKecamatan]);
        return $query->result();
    }

    public function createPemesanan($data){
		$this->db->insert('pemesanan',$data);
	}
}