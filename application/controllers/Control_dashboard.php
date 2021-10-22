<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_dashboard extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_produk');
		$this->load->model('model_login');
		$this->load->model('model_pemesanan');
		$this->load->model('model_keranjang');
		$this->load->library('session');

    }

    public function index()
	{	
		if($this->session->has_userdata('emailadmin')){
			$email = $this->session->userdata('emailadmin');
			$firstname = $this->model_login->readAdmin($email);
			$pemesanan = $this->model_pemesanan->readPemesananDashboard();
			$pmsn = $this->model_pemesanan->readPemesananPending();
			$gross_januari = $this->model_pemesanan->incomeJanuari();
			$gross_februari = $this->model_pemesanan->incomeFebruari();
			$gross_maret = $this->model_pemesanan->incomeMaret();
			$gross_april = $this->model_pemesanan->incomeApril();
			$gross_mei = $this->model_pemesanan->incomeMei();
			$gross_juni = $this->model_pemesanan->incomeJuni();
			$gross_juli = $this->model_pemesanan->incomeJuli();
			$gross_agustus = $this->model_pemesanan->incomeAgustus();
			$gross_september = $this->model_pemesanan->incomeSeptember();
			$gross_oktober = $this->model_pemesanan->incomeOktober();
			$gross_november = $this->model_pemesanan->incomeNovember();
			$gross_desember = $this->model_pemesanan->incomeDesember();
			$data =  array( 'title' => 'Nuepins Administrator',
							'pemesanan' => $pemesanan,
							'pmsn' => $pmsn,
							'gross_januari' => $gross_januari,
							'gross_februari' => $gross_februari,
							'gross_maret' => $gross_maret,
							'gross_april' => $gross_april,
							'gross_mei' => $gross_mei,
							'gross_juni' => $gross_juni,
							'gross_juli' => $gross_juli,
							'gross_agustus' => $gross_agustus,
							'gross_september' => $gross_september,
							'gross_oktober' => $gross_oktober,
							'gross_november' => $gross_november,
							'gross_desember' => $gross_desember,
							'nama' => $firstname['firstname'],
							'isi'	=> 'layoutadmin/v_dashboard' );
			$this->load->view('layoutadmin/wrapper',$data,FALSE);
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			You are not admin, please click <a href="home"> this </a>to leave</div>');
			redirect(base_url('admin'));
		}
	}

	public function about(){
		if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			$firstname = $this->model_login->readUser($email);
			$message = "Hai! ".$firstname['firstname'];
			$id_user = $firstname['id_user'];
			$headcount = $this->model_keranjang->readKeranjang($id_user);
			$data =  array( 'nama' => $message,
							'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'title' => 'About',
							'isi'	=> 'layoutuser/v_about');
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}else{
			$headcount =[];
			$data =  array( 'nama' => '',
							'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'title' => 'About',
							'isi'	=> 'layoutuser/v_about' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}
	}

	public function contact(){
		if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			$firstname = $this->model_login->readUser($email);
			$message = "Hai! ".$firstname['firstname'];
			$id_user = $firstname['id_user'];
			$headcount = $this->model_keranjang->readKeranjang($id_user);
			$data =  array( 'nama' => $message,
							'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'title' => 'Contact',
							'isi'	=> 'layoutuser/v_contact');
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}else{
			$headcount =[];
			$data =  array( 'nama' => '',
							'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'title' => 'Contact',
							'isi'	=> 'layoutuser/v_contact' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}
	}

	public function getHelp(){
	}

	
}