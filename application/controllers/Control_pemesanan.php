<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_pemesanan extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_login');
        $this->load->model('model_produk');
        $this->load->model('model_keranjang');
        $this->load->model('model_pemesanan');
		$this->load->library('session');
        $params = array('server_key' => 'SB-Mid-server-hDl1edrJ6TXf_qxY5nP3FeEk', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
    }

    public function index(){
        if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			$firstname = $this->model_login->readUser($email);
			$message = "Hai! ".$firstname['firstname'];
			$id_user = $firstname['id_user'];
			$headcount = $this->model_keranjang->readKeranjang($id_user);
            $keranjang = $this->model_keranjang->readKeranjang($id_user);

            // Get Region
            $provinsi = $this->model_pemesanan->getProvinsi();
			$data =  array( 'nama' => $message,
							'headcount' => $headcount,
                            'keranjang' => $keranjang,
                            'provinsi' => $provinsi,
                            'title' => 'Checkout',
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_checkout');
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}else{
			$headcount =[];
			$data =  array( 'nama' => '',
							'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_firstpage' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}
    }

    // public function createPemesanan(){
    //     $i = $this->input;
    //     $nama_jalan = $i->post('namajalan')." ".$i->post('provinsi')." ".$i->post('kota')." ".$i->post('kelurahan')." ".$i->post('kodepos');

    //     $email = $this->session->userdata('email');
    //     $firstname = $this->model_login->readUser($email);
    //     $message = "Hai! ".$firstname['firstname'];
    //     $id_user = $firstname['id_user'];
    //     $headcount = $this->model_keranjang->readKeranjang($id_user);
    //     $data =  array(     'nama' => $message,
	// 						'headcount' => $headcount,
    //                         'title' => 'Checkout',
    //                         'nama_jalan'=>$nama_jalan,
	// 						'tittle' => '#Nue Experience | nuepins.com',
	// 						'isi'	=> 'layoutuser/v_kodepembayaran');
	// 	$this->load->view('layoutuser/wrapperuser',$data,FALSE);
    // }

    public function getDataCity(){
        $namaProvinsi = $this->input->post('nama');
        $idProvinsi = $this->model_pemesanan->getIdProvinsi($namaProvinsi);
        $data = $this->model_pemesanan->getCity($idProvinsi['id']);
        $output = '<option value="">--Select City--</option>';
        foreach($data as $city){
            $output .= '<option value="'.$city->nama.'">'.$city->nama.' </option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));

    }

    public function getDataKecamatan(){
        $namaKota = $this->input->post('nama');
        $idKota = $this->model_pemesanan->getIdKota($namaKota);
        $data = $this->model_pemesanan->getKecamatan($idKota['id']);
        $output = '<option value="">--Select District--</option>';
        foreach($data as $kecamatan){
            $output .= '<option value="'.$kecamatan->nama.'">'.$kecamatan->nama.' </option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));

    }

    public function getDataKelurahan(){
        $namaKecamatan = $this->input->post('nama');
        $idKecamatan = $this->model_pemesanan->getIdKecamatan($namaKecamatan);
        $data = $this->model_pemesanan->getKelurahan($idKecamatan['id']);
        $output = '<option value="">--Select District--</option>';
        foreach($data as $kelurahan){
            $output .= '<option value="'.$kelurahan->nama.'">'.$kelurahan->nama.' </option>';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));

    }

    public function loadPemesananUser(){
        if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			$firstname = $this->model_login->readUser($email);
			$message = "Hai! ".$firstname['firstname'];
			$id_user = $firstname['id_user'];
			$headcount = $this->model_keranjang->readKeranjang($id_user);
            $pemesanan = $this->model_pemesanan->readPemesanan($id_user);
			$data =  array( 'nama' => $message,
							'headcount' => $headcount,
                            'pemesanan' => $pemesanan,
                            'title' => 'Checkout',
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_status');
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}else{
			$headcount =[];
			$data =  array( 'nama' => '',
							'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_status' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}
    }

    public function loadDataPemesanan(){
        if($this->session->has_userdata('emailadmin')){
        $email = $this->session->userdata('emailadmin');
        $firstname = $this->model_login->readAdmin($email);
        $pemesanan = $this->model_pemesanan->readPemesananAdmin();
        $pmsn = $this->model_pemesanan->readPemesananAdmin();
        $data = array(	'title' => 'Nuepins Administrator',
                        'nama'=> $firstname['firstname'],
                        'pemesanan' => $pemesanan,
                        'pmsn' => $pmsn,
                        'isi' => 'layoutadmin/v_pemesanan');
        $this->load->view('layoutadmin/wrapper',$data,FALSE);
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            You are not admin, please click <a href="home"> this </a>to leave</div>');
            redirect(base_url('admin'));
        }
    }

    public function updateResi($order_id){
        $i = $this->input;
        $resi = $i->post('agen')." - ".$i->post('no_resi');
        $row = $this->model_pemesanan->readInnerPemesanan($order_id);
        foreach($row as $row){
            $data = array(  'order_id' => $order_id,
                            'status_pemesanan' => "on delivery",
                            'resi' => $resi,
                            'isDelivered' => 1
        );
        $this->model_pemesanan->updatePemesanan($data);
        }
        redirect(base_url('control_pemesanan/loadDataPemesanan'));
    }

    public function delivered($order_id){
        $i = $this->input;
        $row = $this->model_pemesanan->readInnerPemesanan($order_id);
        foreach($row as $row){
            $data = array(  'order_id' => $order_id,
                            'status_pemesanan' => "Already delivered",
                            'isDelivered' => 1
        );
        $this->model_pemesanan->updatePemesanan($data);
        }
        redirect(base_url('control_pemesanan/loadPemesananUser/'));
    }

    public function completeOrder($order_id){
        if($this->session->has_userdata('email')){
        if($order_id){
			$email = $this->session->userdata('email');
			$firstname = $this->model_login->readUser($email);
			$message = "Hai! ".$firstname['firstname'];
			$id_user = $firstname['id_user'];
			$headcount = $this->model_keranjang->readKeranjang($id_user);
            $pemesanan = $this->model_pemesanan->readInnerPemesanan2($order_id);
            // Get Region
            $provinsi = $this->model_pemesanan->getProvinsi();
			$data =  array( 'nama' => $message,
							'headcount' => $headcount,
                            'pemesanan' => $pemesanan,
                            'title' => 'Checkout',
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_complete');
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}else{
			$headcount =[];
			$data =  array( 'nama' => '',
							'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_firstpage' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}
    }else{
            $headcount =[];
			$data =  array( 'nama' => '',
							'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_firstpage' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
    }
			
    }

}