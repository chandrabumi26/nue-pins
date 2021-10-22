<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_keranjang extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_produk');
        $this->load->model('model_keranjang');
		$this->load->model('model_login');
		$this->load->library('session');

    }

	public function index()
	{	
		// if($this->session->has_userdata('email')){
		// 	$email = $this->session->userdata('email');
		// 	$firstname = $this->model_login->readUser($email);
		// 	$message = "Hai! ".$firstname['firstname'];
		// 	$data =  array( 'nama' => $message,
		// 					'tittle' => '#Nue Experience | nuepins.com',
		// 					'isi'	=> 'layoutuser/v_firstpage' );
		// 	$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		// }else{
		// 	$data =  array( 'nama' => '',
		// 					'tittle' => '#Nue Experience | nuepins.com',
		// 					'isi'	=> 'layoutuser/v_firstpage' );
		// 	$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		// }
	}

    public function loadKeranjangUser(){
        if($this->session->has_userdata('email')){
            // Udah Login
			$email = $this->session->userdata('email');
			$firstname = $this->model_login->readUser($email);
			$message = "Hai! ".$firstname['firstname'];
            $id_user = $firstname['id_user'];
            $keranjang = $this->model_keranjang->readKeranjang($id_user);
			$headcount = $this->model_keranjang->readKeranjang($id_user);
            // Ambil id_produk
            // $data = array('id_produk' => $keranjang);
			$data =  array( 'nama' => $message,
                            'keranjang' => $keranjang,
                            'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_keranjang' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}else{
            // Belom login
            $headcount = [];
			$data =  array( 'nama' => '',
                            'headcount' => $headcount,
							'tittle' => '#Nue Experience | nuepins.com',
							'isi'	=> 'layoutuser/v_firstpage' );
			$this->load->view('layoutuser/wrapperuser',$data,FALSE);
		}
    }

    // Exepction page, quantity >= Stock
    public function saveToKeranjang($id_produk){
        $i = $this->input;
        $quantity = $i->post('quantity');
        if($quantity >= 1){
            // Dari modal
            if($this->session->has_userdata('email')){
                $email = $this->session->userdata('email');
                $user = $this->model_login->readUser($email);
                $id_user = $user['id_user'];
                $checking = $this->model_keranjang->checkKeranjang($id_user,$id_produk);
                $numb = count($checking);
                // check keranjang
                // Data Ada
                if($numb!=0){
                    $bundle = array('id_user' => $id_user,
                                    'id_produk' => $id_produk);
                    $buatProduk = array('id_produk' => $id_produk);
                    $stokProduk = $this->model_produk->readDetail($buatProduk);
                    $qty = $this->model_keranjang->getQuantity($bundle);
                    $jumlah = $qty['jumlah_pembelian'] + $quantity;
                    $totalbeli = 0;
                    if($jumlah >= $stokProduk['stock']){
                        $totalbeli = $stokProduk['stock'];
                    }else{
                        $totalbeli = $jumlah;
                    }
                    $buatId = array('id_produk'=>$id_produk);
                    $prd = $this->model_produk->readDetail($buatId);
                    $pembayaran = $prd['harga_produk']*$totalbeli;
                    $data = array(  'id_user' => $id_user,
                                    'id_produk' => $id_produk,
                                    'jumlah_pembelian' => $totalbeli,
                                    'total_pembayaran' => $pembayaran);
                    $this->model_keranjang->updateKeranjang($data);
                    if($this->session->has_userdata('jepit')){
                        redirect(base_url('categories/clips'));
                    }else if($this->session->has_userdata('kalung')){
                        redirect(base_url('categories/necklace'));
                    }else if($this->session->has_userdata('anting')){
                        redirect(base_url('categories/earings'));
                    }else if($this->session->has_userdata('strap')){
                        redirect(base_url('categories/strap'));
                    }else if($this->session->has_userdata('cincin')){
                        redirect(base_url('categories/rings'));
                    }
                }else{
                    // Data kosong
                    $buatId = array('id_produk'=>$id_produk);
                    $prd = $this->model_produk->readDetail($buatId);
                    $pembayaran = $prd['harga_produk']*$quantity;
                    $data = array(  'id_user' => $id_user,
                                'id_produk' => $id_produk,
                                'jumlah_pembelian' =>$quantity,
                                'total_pembayaran' => $pembayaran);
                    $this->model_keranjang->createKeranjang($data);
                    if($this->session->has_userdata('jepit')){
                        redirect(base_url('categories/clips'));
                    }else if($this->session->has_userdata('kalung')){
                        redirect(base_url('categories/necklace'));
                    }else if($this->session->has_userdata('anting')){
                        redirect(base_url('categories/earings'));
                    }else if($this->session->has_userdata('strap')){
                        redirect(base_url('categories/strap'));
                    }else if($this->session->has_userdata('cincin')){
                        redirect(base_url('categories/rings'));
                    }
                }

            }else{
                if($this->session->has_userdata('jepit')){
                    redirect(base_url('categories/clips'));
                }else if($this->session->has_userdata('kalung')){
                    redirect(base_url('categories/necklace'));
                }else if($this->session->has_userdata('anting')){
                    redirect(base_url('categories/earings'));
                }else if($this->session->has_userdata('strap')){
                    redirect(base_url('categories/strap'));
                }else if($this->session->has_userdata('cincin')){
                    redirect(base_url('categories/rings'));
                }
            }
            
        }else{
            // Dari Page
            if($this->session->has_userdata('email')){
                $email = $this->session->userdata('email');
                $user = $this->model_login->readUser($email);
                $id_user = $user['id_user'];
                // Checking start disini
                $checking = $this->model_keranjang->checkKeranjang($id_user,$id_produk);
                $numb = count($checking);
                // check keranjang
                // Data Ada
                if($numb!=0){
                    $bundle = array('id_user' => $id_user,
                                    'id_produk' => $id_produk);
                    $buatProduk = array('id_produk' => $id_produk);
                    $stokProduk = $this->model_produk->readDetail($buatProduk);
                    $qty = $this->model_keranjang->getQuantity($bundle);
                    $jumlah = $qty['jumlah_pembelian'] + 1;
                    $totalbeli = 0;
                    if($jumlah >= $stokProduk['stock']){
                        $totalbeli = $stokProduk['stock'];
                    }else{
                        $totalbeli = $jumlah;
                    }
                    $buatId = array('id_produk'=>$id_produk);
                    $prd = $this->model_produk->readDetail($buatId);
                    $pembayaran = $totalbeli*$prd['harga_produk'];
                    $data = array(  'id_user' => $id_user,
                                    'id_produk' => $id_produk,
                                    'jumlah_pembelian' => $totalbeli,
                                    'total_pembayaran' => $pembayaran);
                    $this->model_keranjang->updateKeranjang($data);
                    if($this->session->has_userdata('jepit')){
                        redirect(base_url('categories/clips'));
                    }else if($this->session->has_userdata('kalung')){
                        redirect(base_url('categories/necklace'));
                    }else if($this->session->has_userdata('anting')){
                        redirect(base_url('categories/earings'));
                    }else if($this->session->has_userdata('strap')){
                        redirect(base_url('categories/strap'));
                    }else if($this->session->has_userdata('cincin')){
                        redirect(base_url('categories/rings'));
                    }
                }else{
                    // Data kosong
                    $buatId = array('id_produk'=>$id_produk);
                    $prd = $this->model_produk->readDetail($buatId);
                    $pembayaran = $prd['harga_produk'];
                    $data = array(  'id_user' => $id_user,
                                'id_produk' => $id_produk,
                                'jumlah_pembelian' =>1,
                                'total_pembayaran' => $pembayaran);
                    $this->model_keranjang->createKeranjang($data);
                    if($this->session->has_userdata('jepit')){
                        redirect(base_url('categories/clips'));
                    }else if($this->session->has_userdata('kalung')){
                        redirect(base_url('categories/necklace'));
                    }else if($this->session->has_userdata('anting')){
                        redirect(base_url('categories/earings'));
                    }else if($this->session->has_userdata('strap')){
                        redirect(base_url('categories/strap'));
                    }else if($this->session->has_userdata('cincin')){
                        redirect(base_url('categories/rings'));
                    }
                }
            }else{
                if($this->session->has_userdata('jepit')){
                    redirect(base_url('categories/clips'));
                }else if($this->session->has_userdata('kalung')){
                    
                    redirect(base_url('categories/necklace'));
                }else if($this->session->has_userdata('anting')){
                    redirect(base_url('categories/earings'));
                }else if($this->session->has_userdata('strap')){
                    redirect(base_url('categories/strap'));
                }else if($this->session->has_userdata('cincin')){
                    redirect(base_url('categories/rings'));
                }
            }   
        }
    }

    public function updateDataKeranjang($id_keranjang,$jumlah_pembelian,$total_pembayaran){
        $data = array(  'id_keranjang' => $id_keranjang,
                        'jumlah_pembelian' => $jumlah_pembelian,
                        'total_pembayaran' => $total_pembayaran);
        $this->model_keranjang->updateKeranjangg($data);
        redirect(base_url('control_keranjang/loadKeranjangUser'),'refresh');
    }

    public function deleteDataKeranjang($id_keranjang){
        $data = array('id_keranjang' => $id_keranjang);
		$this->model_keranjang->deleteKeranjang($data);
		redirect(base_url('control_keranjang/loadKeranjangUser'),'refresh');
    }
}