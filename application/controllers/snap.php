<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-4NkRw7zQKJF__bYcrUfdrEhf', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
		$this->load->model('model_login');
        $this->load->model('model_produk');
        $this->load->model('model_keranjang');
		$this->load->model('model_pemesanan');
		$this->load->library('session');
    }

    public function index()
    {
    	$this->load->view('checkout_snap');
    }

    public function token()
    {	
		// Getting Produk
		$email = $this->session->userdata('email');
		$firstname = $this->model_login->readUser($email);
		$id_user = $firstname['id_user'];
		
		$keranjang = $this->model_keranjang->readKeranjang($id_user);

		$namadepan = $this->input->post('namadepan');
		$namabelakang = $this->input->post('namabelakang');
		$namajalan = $this->input->post('namajalan');
		$provinsi = $this->input->post('provinsi');
		$kota = $this->input->post('kota');;
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$kodepos = $this->input->post('kodepos');
		$totalbayar = $this->input->post('totalbayar');
		$phone_number = $this->input->post('phone_number');
		$streetadress = $namajalan.", ".$kelurahan.", ".$kecamatan;
		$kotaaddress = $kota.", ".$provinsi;

		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $totalbayar, // no decimal allowed for creditcard
		);

		$item_details = array();
		// Foreach Keranjang & Produk
		foreach($keranjang as $keranjang){
			$data = array('id_produk' => $keranjang->id_produk);
            $produk = $this->model_produk->readDetail($data);
			$item_details[] = array(
				'id' => $keranjang->id_keranjang,
				'price' => $produk['harga_produk'],
				'quantity' => $keranjang->jumlah_pembelian,
				'name' => $produk['nama_produk']
			);
		};

		// Optional
		// $ongkir = array(
		//   'id' => 'a1',
		//   'price' => $totalbayar,
		//   'quantity' => 1,
		//   'name' => "Apple"
		// );

		// // Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );
		// End Foreach Keranjang & Produk

		// Optional
		// $item_details = array ($item1_details);

		// Foreach User
		// Optional
		$billing_address = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'address'       => "Mangga 20",
		  'city'          => "Jakarta",
		  'postal_code'   => "16602",
		  'phone'         => "081122334455",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => $namadepan,
		  'last_name'     => $namabelakang,
		  'address'       => $streetadress,
		  'city'          => $kotaaddress,
		  'postal_code'   => $kodepos,
		  'phone'         => $phone_number,
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $firstname['firstname'],
		  'last_name'     => $firstname['lastname'],
		  'email'         => $firstname['email'],
		  'phone'         => $firstname['no_handphone'],
		  'shipping_address' => $shipping_address
		);
		// End Foreach User

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 1440
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'));
		// Insert into DBDBDB
		$email = $this->session->userdata('email');
		$firstname = $this->model_login->readUser($email);
		$id_user = $firstname['id_user'];
		$keranjang = $this->model_keranjang->readKeranjang($id_user);

		// if payment bank trf, echannel, store
		if($result->payment_type == 'bank_transfer'){
			foreach($keranjang as $keranjang){
				$vanumb = "";
				$bank ="";
				foreach($result->va_numbers as $row){
					$vanumb = $row->va_number;
					$bank = $row->bank;
				}
				$data = array(	'order_id' => $result->order_id,
								'id_produk' => $keranjang->id_produk,
								'id_user' => $id_user,
								'quantity' => $keranjang->jumlah_pembelian,
								'status_pembayaran' => $result->transaction_status,
								'status_pemesanan' => $result->status_message,
								'payment_type' => "Bank Transfer ".$bank,
								'kode_pembayaran' => $vanumb,
								'order_date' => date("Y-m-d"),
								'pdf_url' => $result->pdf_url,
								'total_gross' => $result->gross_amount
							);
				$this->model_pemesanan->createPemesanan($data);
				$data3 = array('id_produk' => $keranjang->id_produk);
				$prd = $this->model_produk->readDetail($data3);
				$jumlah = $prd['stock'] - $keranjang->jumlah_pembelian;
				$sold = $prd['total_sold'] + $keranjang->jumlah_pembelian;
				$data4 = array('id_produk' => $keranjang->id_produk,
								'stock' => $jumlah,
								'total_sold'=>$sold);
				$this->model_produk->updateProduk($data4);
				$data2 = array('id_keranjang' => $keranjang->id_keranjang);
				$this->model_keranjang->deleteKeranjang($data2);
			}
			// Mandiri
		}else if($result->payment_type == 'echannel'){
			foreach($keranjang as $keranjang){
				$data = array(	'order_id' => $result->order_id,
								'id_produk' => $keranjang->id_produk,
								'id_user' => $id_user,
								'quantity' => $keranjang->jumlah_pembelian,
								'status_pembayaran' => $result->transaction_status,
								'status_pemesanan' => $result->status_message,
								'payment_type' => "Bank Transfer mandiri",
								'kode_pembayaran' => $result->bill_key,
								'order_date' => date("Y-m-d"),
								'pdf_url' => $result->pdf_url,
								'total_gross' => $result->gross_amount
							);
				$this->model_pemesanan->createPemesanan($data);
				$data3 = array('id_produk' => $keranjang->id_produk);
				$prd = $this->model_produk->readDetail($data3);
				$jumlah = $prd['stock'] - $keranjang->jumlah_pembelian;
				$sold = $prd['total_sold'] + $keranjang->jumlah_pembelian;
				$data4 = array('id_produk' => $keranjang->id_produk,
								'stock' => $jumlah,
								'total_sold'=>$sold);
				$this->model_produk->updateProduk($data4);
				$data2 = array('id_keranjang' => $keranjang->id_keranjang);
				$this->model_keranjang->deleteKeranjang($data2);
			}
			// Indomart & Alfa
		}else if($result->payment_type == 'cstore'){
			foreach($keranjang as $keranjang){
				$data = array(	'order_id' => $result->order_id,
								'id_produk' => $keranjang->id_produk,
								'id_user' => $id_user,
								'quantity' => $keranjang->jumlah_pembelian,
								'status_pembayaran' => $result->transaction_status,
								'status_pemesanan' => $result->status_message,
								'payment_type' => "CSTORE",
								'kode_pembayaran' => $result->payment_code,
								'order_date' => date("Y-m-d"),
								'pdf_url' => $result->pdf_url,
								'total_gross' => $result->gross_amount
							);
				$this->model_pemesanan->createPemesanan($data);
				$data3 = array('id_produk' => $keranjang->id_produk);
				$prd = $this->model_produk->readDetail($data3);
				$jumlah = $prd['stock'] - $keranjang->jumlah_pembelian;
				$sold = $prd['total_sold'] + $keranjang->jumlah_pembelian;
				$data4 = array('id_produk' => $keranjang->id_produk,
								'stock' => $jumlah,
								'total_sold'=>$sold);
				$this->model_produk->updateProduk($data4);
				$data2 = array('id_keranjang' => $keranjang->id_keranjang);
				$this->model_keranjang->deleteKeranjang($data2);
			}
		}
		redirect(base_url('control_pemesanan/completeOrder/'.$result->order_id));
    }
}
