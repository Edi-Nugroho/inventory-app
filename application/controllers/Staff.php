<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('pagination');

    $session_id = $this->session->userdata('id');
    if(!$session_id){
      redirect('login');
    }

    if($this->session->userdata('role') == 'Petugas'){
      redirect('dashboard');
    }
  }

	public function index()
	{
		$judul["judul"] = "Inventory App | Data Staff";

    $this->load->model('mstaff');

    $staff = $this->mstaff->ambilSemuaData();

    $data['staff'] = $staff;
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
		$this->load->view('pages/admin/staff/index', $data);
		$this->load->view('templates/footer');
	}

  public function inputdata()
  {
    $judul["judul"] = "Inventory App | Input Staff";

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $judul);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('pages/admin/staff/input');
    $this->load->view('templates/footer');
  }

  public function simpan(){
    $this->form_validation->set_rules('nama','Nama Lengkap','required');
    $this->form_validation->set_rules('email','Email','required');
    $this->form_validation->set_rules('no_hp','Nomor Handphone','required|numeric');
    $this->form_validation->set_rules('role','Role','required');
    
    if ($this->form_validation->run() == false) {
      $judul["judul"] = "Inventory App | Input Staff";

      $this->load->view('templates/header', $judul);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('pages/admin/staff/input');
      $this->load->view('templates/footer');
    }else{
      $this->load->model('mstaff');

      $nama = $this->input->post('nama', true);
      $email = $this->input->post('email', true);
      $no_hp = $this->input->post('no_hp', true);
      $role = $this->input->post('role', true);
      $password = $this->input->post('password', true);

      $insert  = array(
          'nama' => $nama,
          'email'        => $email,
          'no_hp'        => $no_hp,
          'role'        => $role,
          'password'     => md5($password)
        );

      $berhasil = $this->mstaff->simpan($insert);
      $pesan = '<div class="alert alert-danger" role="alert">Data Staff Gagal Disimpan</div>';
      if ($berhasil) {
        $pesan = '<div class="alert alert-danger" role="alert">Data Staff Berhasil Disimpan</div>';
      }
      $this->session->set_flashdata('pesan', $pesan);
      redirect('staff');
    }
  }

  public function hapus($id){
    $this->load->model('mstaff');

    $berhasil = $this->mstaff->hapusData($id);
          $pesan = '<div class="alert alert-danger" role="alert">
                      Data Staff gagal dihapus
                    </div>';
      if ($berhasil) {
        $pesan = '<div class="alert alert-success" role="alert">
            Data Staff berhasil dihapus
          </div>';
      }
    $this->session->set_flashdata('pesan', $pesan);
    redirect('staff');
  }
}