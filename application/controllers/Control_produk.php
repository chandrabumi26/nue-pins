<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_produk extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_produk');
		$this->load->model('model_login');
		$this->load->model('model_keranjang');
		$this->load->library('session');

    }

	public function index()
	{	
		if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			$firstname = $this->model_login->readUser($email);
			$message = "Hai! ".$firstname['firstname'];
			$id_user = $firstname['id_user'];
			$headcount = $this->model_keranjang->readKeranjang($id_user);
			$data =  array( 'nama' => $message,
							'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_firstpage');
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

	public function loadKategori($kategori)
	{	
		if($kategori=="JepitRambut"){
			$title="Hair Pins";
			if($this->session->has_userdata('kalung')){
				unset($_SESSION['kalung']);
				$ses = [
					'jepit' => "jepit"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('anting')){
				unset($_SESSION['anting']);
				$ses = [
					'jepit' => "jepit"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('strap')){
				unset($_SESSION['strap']);
				$ses = [
					'jepit' => "jepit"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('cincin')){
				unset($_SESSION['cincin']);
				$ses = [
					'jepit' => "jepit"
				];
				$this->session->set_userdata($ses);
			}else{
				$ses = [
					'jepit' => "jepit"
				];
				$this->session->set_userdata($ses);
			}
		if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			$produk = $this->model_produk->readKategori($kategori);
			$prd = $this->model_produk->readProduk();
			$firstname = $this->model_login->readUser($email);
			$message = "Hai! ".$firstname['firstname'];
			$id_user = $firstname['id_user'];
			$headcount = $this->model_keranjang->readKeranjang($id_user);
			$data =  array( 'nama' => $message,
							'title' =>$title,
							'produk' => $produk,
							'headcount' => $headcount,
							'prd' => $prd,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_kategori' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}else{
			$produk = $this->model_produk->readKategori($kategori);
			$prd = $this->model_produk->readProduk();
			$headcount = [];
			$data =  array( 'nama' => '',
							'title' =>$title,
							'tittle' => '#Nue Experience | nuepins.com',
							'produk' => $produk,
							'headcount' => $headcount,
							'prd' => $prd,
							'isi'	=> 'layoutuser/v_kategori' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}
		}else if($kategori == "Anting"){
			$title = "Earings";
			if($this->session->has_userdata('jepit')){
				unset($_SESSION['jepit']);
				$ses = [
					'anting' => "anting"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('kalung')){
				unset($_SESSION['kalung']);
				$ses = [
					'anting' => "anting"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('strap')){
				unset($_SESSION['strap']);
				$ses = [
					'anting' => "anting"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('cincin')){
				unset($_SESSION['cincin']);
				$ses = [
					'anting' => "anting"
				];
				$this->session->set_userdata($ses);
			}else{
				$ses = [
					'anting' => "anting"
				];
				$this->session->set_userdata($ses);
			}
		if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			$produk = $this->model_produk->readKategori($kategori);
			$prd = $this->model_produk->readProduk();
			$firstname = $this->model_login->readUser($email);
			$message = "Hai! ".$firstname['firstname'];
			$id_user = $firstname['id_user'];
			$headcount = $this->model_keranjang->readKeranjang($id_user);
			$data =  array( 'nama' => $message,
							'title' =>$title,
							'produk' => $produk,
							'prd' => $prd,
							'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_kategori' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}else{
			$produk = $this->model_produk->readKategori($kategori);
			$prd = $this->model_produk->readProduk();
			$headcount = [];
			$data =  array( 'nama' => '',
							'title' =>$title,
							'tittle' => '#Nue Experience | nuepins.com',
							'produk' => $produk,
							'prd' => $prd,
							'headcount' => $headcount, 
							'isi'	=> 'layoutuser/v_kategori' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}
		}else if($kategori == "Kalung"){
			$title = "Necklace";
			if($this->session->has_userdata('jepit')){
				unset($_SESSION['jepit']);
				$ses = [
					'kalung' => "kalung"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('anting')){
				unset($_SESSION['anting']);
				$ses = [
					'kalung' => "kalung"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('strap')){
				unset($_SESSION['strap']);
				$ses = [
					'kalung' => "kalung"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('cincin')){
				unset($_SESSION['cincin']);
				$ses = [
					'kalung' => "kalung"
				];
				$this->session->set_userdata($ses);
			}else{
				$ses = [
					'kalung' => "kalung"
				];
				$this->session->set_userdata($ses);
			}
		if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			$produk = $this->model_produk->readKategori($kategori);
			$prd = $this->model_produk->readProduk();
			$firstname = $this->model_login->readUser($email);
			$message = "Hai! ".$firstname['firstname'];
			$id_user = $firstname['id_user'];
			$headcount = $this->model_keranjang->readKeranjang($id_user);
			$data =  array( 'nama' => $message,
							'title' =>$title,
							'produk' => $produk,
							'prd' => $prd,
							'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_kategori' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}else{
			$produk = $this->model_produk->readKategori($kategori);
			$prd = $this->model_produk->readProduk();
			$headcount = [];
			$data =  array( 'nama' => '',
							'title' =>$title,
							'tittle' => '#Nue Experience | nuepins.com',
							'produk' => $produk,
							'headcount' => $headcount,
							'prd' => $prd,
							'isi'	=> 'layoutuser/v_kategori' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}
		}else if($kategori == "Strap"){
			$title = "Strap";
			if($this->session->has_userdata('jepit')){
				unset($_SESSION['jepit']);
				$ses = [
					'strap' => "strap"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('anting')){
				unset($_SESSION['anting']);
				$ses = [
					'strap' => "strap"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('kalung')){
				unset($_SESSION['kalung']);
				$ses = [
					'strap' => "strap"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('cincin')){
				unset($_SESSION['cincin']);
				$ses = [
					'strap' => "strap"
				];
				$this->session->set_userdata($ses);
			}else{
				$ses = [
					'strap' => "strap"
				];
				$this->session->set_userdata($ses);
			}
		if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			$produk = $this->model_produk->readKategori($kategori);
			$prd = $this->model_produk->readProduk();
			$firstname = $this->model_login->readUser($email);
			$message = "Hai! ".$firstname['firstname'];
			$id_user = $firstname['id_user'];
			$headcount = $this->model_keranjang->readKeranjang($id_user);
			$data =  array( 'nama' => $message,
							'title' =>$title,
							'produk' => $produk,
							'prd' => $prd,
							'headcount'=>$headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_kategori' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}else{
			$produk = $this->model_produk->readKategori($kategori);
			$prd = $this->model_produk->readProduk();
			$headcount = [];
			$data =  array( 'nama' => '',
							'title' =>$title,
							'tittle' => '#Nue Experience | nuepins.com',
							'produk' => $produk,
							'headcount' => $headcount,
							'prd' => $prd,
							'isi'	=> 'layoutuser/v_kategori' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}
		}else if($kategori == "CinCin"){
			$title = "Rings";
			if($this->session->has_userdata('jepit')){
				unset($_SESSION['jepit']);
				$ses = [
					'cincin' => "cincin"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('anting')){
				unset($_SESSION['anting']);
				$ses = [
					'cincin' => "cincin"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('kalung')){
				unset($_SESSION['kalung']);
				$ses = [
					'cincin' => "cincin"
				];
				$this->session->set_userdata($ses);
			}else if($this->session->has_userdata('strap')){
				unset($_SESSION['strap']);
				$ses = [
					'cincin' => "cincin"
				];
				$this->session->set_userdata($ses);
			}else{
				$ses = [
					'cincin' => "cincin"
				];
				$this->session->set_userdata($ses);
			}
		if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			$produk = $this->model_produk->readKategori($kategori);
			$prd = $this->model_produk->readProduk();
			$firstname = $this->model_login->readUser($email);
			$message = "Hai! ".$firstname['firstname'];
			$id_user = $firstname['id_user'];
			$headcount = $this->model_keranjang->readKeranjang($id_user);
			$data =  array( 'nama' => $message,
							'title' =>$title,
							'produk' => $produk,
							'headcount' => $headcount,
							'prd' => $prd,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_kategori' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}else{
			$produk = $this->model_produk->readKategori($kategori);
			$prd = $this->model_produk->readProduk();
			$headcount = [];
			$data =  array( 'nama' => '',
							'title' =>$title,
							'tittle' => '#Nue Experience | nuepins.com',
							'produk' => $produk,
							'prd' => $prd,
							'headcount' => $headcount,
							'isi'	=> 'layoutuser/v_kategori' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}
		}
	}

	public function detailProduk($id_produk){
		if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			$firstname = $this->model_login->readUser($email);
			$produk = $this->model_produk->readDetail($id_produk);
			$message = "Hai! ".$firstname['firstname'];
			$data =  array( 'nama' => $message,
							'produk' =>$produk,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_productdetail' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}else{
			$produk = $this->model_produk->readDetail($id_produk);
			$data =  array( 'nama' => '',
							'produk' =>$produk,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_productdetail' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}
	}

	public function loadDataProduk(){
		if($this->session->has_userdata('emailadmin')){
		$email = $this->session->userdata('emailadmin');
		$firstname = $this->model_login->readAdmin($email);
		$produk = $this->model_produk->readProduk();
		$prd = $this->model_produk->readProduk();
		$data = array(	'title' => 'Nuepins Administrator',
						'nama'=> $firstname['firstname'],
						'produk'=>$produk,
						'prd'=>$prd,
						'isi' => 'layoutadmin/v_produk');
		$this->load->view('layoutadmin/wrapper',$data,FALSE);
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			You are not admin, please click <a href="home"> this </a>to leave</div>');
			redirect(base_url('admin'));
		}
	}

	public function buatProduk(){
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '5000';
		$config['max_width'] = '2024';
		$config['max_height'] = '2024';	
		$this->load->library('upload',$config);

		if( ! $this->upload->do_upload('gambar_produk') ){
			if($this->session->has_userdata('emailadmin')){
				$email = $this->session->userdata('emailadmin');
				$firstname = $this->model_login->readAdmin($email);
				$produk = $this->model_produk->readProduk();
				$data = array(	'title' => 'Nuepins Administrator',
								'nama'=> $firstname['firstname'],
								'produk'=>$produk,
								'isi' => 'layoutadmin/v_produk');
				$this->load->view('layoutadmin/wrapper',$data,FALSE);
				}
		}else{
			$upload_gambar = array ('upload_data' => $this->upload->data());
			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/upload'.$upload_gambar['upload_data']['file_name'];
			$config['new_image'] = './assets/upload';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 250;
			$config['height']       = 250;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$i = $this->input;
			$harga = $i->post('harga_produk');
			$numbers = preg_replace('/[^0-9]/', '', $harga);
			$data = array( 	'nama_produk' => $i->post('nama_produk'),
								'gambar_produk' => $upload_gambar['upload_data']['file_name'],
								'harga_produk' => $numbers,
								'kategori' => $i->post('kategori'),
								'stock' => $i->post('stock'),
								'deskripsi' => $i->post('deskripsi'),
								);
			$this->model_produk->createProduk($data);
			redirect(base_url('admin/produk'),'refresh');
		}
	}

	public function ubahProduk($id_produk){
		if(!empty($_FILES['gambar_produk']['name'])) {
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2400';
			$config['max_width'] = '2024';
			$config['max_height'] = '2024';	
			$this->load->library('upload',$config);
			if( ! $this->upload->do_upload('gambar_produk') ){
				if($this->session->has_userdata('emailadmin')){
					$email = $this->session->userdata('emailadmin');
					$firstname = $this->model_login->readAdmin($email);
					$produk = $this->model_produk->readProduk();
					$data = array(	'title' => 'Nuepins Administrator',
									'nama'=> $firstname['firstname'],
									'produk'=>$produk,
									'isi' => 'layoutadmin/v_produk');
					$this->load->view('layoutadmin/wrapper',$data,FALSE);
					}
			}else{
			$upload_gambar = array ('upload_data' => $this->upload->data());
			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/upload'.$upload_gambar['upload_data']['file_name'];
			$config['new_image'] = './assets/upload';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 250;
			$config['height']       = 250;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$i = $this->input;
			$harga = $i->post('harga_produk');
			$numbers = preg_replace('/[^0-9]/', '', $harga);
			$data = array( 	    'id_produk' => $id_produk,
								'nama_produk' => $i->post('nama_produk'),
								'gambar_produk' => $upload_gambar['upload_data']['file_name'],
								'harga_produk' => $numbers,
								'kategori' => $i->post('kategori'),
								'stock' => $i->post('stock'),
								'deskripsi' => $i->post('deskripsi'),
								);
			$this->model_produk->updateProduk($data);
			redirect(base_url('admin/produk'),'refresh');
			}}else{
			$i = $this->input;
			$harga = $i->post('harga_produk');
			$numbers = preg_replace('/[^0-9]/', '', $harga);
			$data = array( 		'id_produk' => $id_produk,
								'nama_produk' => $i->post('nama_produk'),
								'harga_produk' => $numbers,
								'kategori' => $i->post('kategori'),
								'stock' => $i->post('stock'),
								'deskripsi' => $i->post('deskripsi'),
								);
			$this->model_produk->updateProduk($data);
			redirect(base_url('admin/produk'),'refresh');
			}
	}

	public function hapusProduk($id_produk){
		$data = array('id_produk' => $id_produk);
		$this->model_produk->deleteProduk($data);
		redirect(base_url('admin/produk'),'refresh');
	}
}