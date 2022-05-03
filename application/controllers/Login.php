<?php  
class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
    	$this->load->library('form_validation');
	}

	public function index(){
    	$this->load->view("pages/admin/login/index");
  	}

	public function submit(){
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		
		if($this->form_validation->run() == false)
		{
		  $this->index();

		}else{
		  
		  $this->load->model('mstaff');    
		  $email   		= $this->input->post('email', true);
		  $password		= $this->input->post('password', true);
		  $password		= md5($password);
		  $cekUser = $this->mstaff->cekUser($email,$password);

		  if($cekUser){
		    $this->session->set_userdata('id', $cekUser->id);
		    $this->session->set_userdata('email', $cekUser->email);
		    $this->session->set_userdata('nama', $cekUser->nama);
		    $this->session->set_userdata('no_hp', $cekUser->no_hp);
		    $this->session->set_userdata('role', $cekUser->role);
		    redirect('dashboard');
		  }else{
		    $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"> User atau Password salah.</div>');
		    redirect('login'); 
		  }
		}
	}
	  
	  public function logout(){
	    $this->session->sess_destroy();
	    redirect('login');
	  }
  }