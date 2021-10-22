<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_register extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('model_register');
        $this->load->library('session');
    }

	public function index()
	{
		$this->load->view('v_registeradmin');
	}

    private function kirimEmail($token, $type){
        $i = $this->input;
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'nuepins.admn@gmail.com',
            'smtp_pass' => 'nuepins2018',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('nuepins.admn@gmail.com', 'Nue Pins');
        $this->email->to($i->post('email'));

        if($type === 'verify'){
        $this->email->subject('Email Verification');
        $this->email->message('Click this link to verify your account : <a href="'.base_url(). 'control_register/verify?email='.$i->post('email') . '&token=' . urlencode($token) .'">Activate!</a>');
        }
        if($this->email->send()){
            return true;
        }else{
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if($user){
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if($user_token){
                $this->db->set('is_emailActive', 1);
                $this->db->where('email', $email);
                $this->db->update('user');
                $this->db->delete('user_token', ['email' => $email]);
                
                $headcount =[];
                $data =  array( 'nama' => '',
                                'headcount' => $headcount,
                                'tittle' => '#Nue Experience | nuepins.com',
                                'isi'	=> 'layoutuser/v_afterverified' );
                $this->load->view('layoutuser/wrapperuser',$data,FALSE);
            }else{
                $headcount =[];
                $data =  array( 'nama' => '',
                                'headcount' => $headcount,
                                'tittle' => '#Nue Experience | nuepins.com',
                                'isi'	=> 'layoutuser/v_alreadyverify' );
                $this->load->view('layoutuser/wrapperuser',$data,FALSE);
            }
        }else{
            redirect('gagaluser.php');
        }
    }

    public function registerAccount(){

        $this->form_validation->set_rules('email', 'Email', 'is_unique[user.email]',[
            'is_unique' => 'Email sudah terdaftar'
        ]);
        if($this->form_validation->run() == false){
            $this->load->view('v_register');
        }else{  
            $i = $this->input;
            $email = $i->post('email');
            $data = array( 	'firstname' => htmlspecialchars($i->post('firstname')),
                            'lastname' => htmlspecialchars($i->post('lastname')),
                            'no_handphone' => htmlspecialchars($i->post('no_handphone')),
                            'password' => password_hash($i->post('pwd'),PASSWORD_DEFAULT),
                            'email' => htmlspecialchars($email),
                            'is_emailActive' => 0
                            );
            $token = base64_encode(random_bytes(32));
            $user_token = array ('email'=> $email,
                                'token' => $token,
                                'date_created' => time()
                                );
            $this->model_register->createAccount($data);
            $this->model_register->createToken($user_token);
            $this->kirimEmail($token, 'verify');
            $headcount =[];
            $data =  array( 'nama' => '',
                            'headcount' => $headcount,
                            'email' => $email,
                            'tittle' => '#Nue Experience | nuepins.com',
                            'isi'	=> 'layoutuser/v_verify' );
            $this->load->view('layoutuser/wrapperuser',$data,FALSE);
            
        }

    }

    public function registerAdmin(){

        
            $i = $this->input;
            $email = $i->post('emailAdmin');
            $data = array( 	'firstname' => htmlspecialchars($i->post('firstnameAdmin')),
                            'lastname' => htmlspecialchars($i->post('lastnameAdmin')),
                            'password' => password_hash($i->post('pwdAdmin'),PASSWORD_DEFAULT),
                            'email' => htmlspecialchars($email)
                            );
            $this->model_register->createAccountAdmin($data);
           
            
        

    }



}
