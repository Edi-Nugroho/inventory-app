<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class MyProfile extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->library('encryption');
    $this->load->library('form_validation');
    $this->load->library('pagination');
    $this->load->helper('date');

    $session_id = $this->session->userdata('id');
    if(!$session_id){
      redirect('login');
    }
  }

  public function index()
  {
    $judul["judul"] = "Inventory App | Profile";

    $this->load->view('templates/header', $judul);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('pages/admin/staff/myprofile');
    $this->load->view('templates/footer');
  }

  public function edit()
  {
    $judul["judul"] = "Inventory App | Update Profile";

    $this->load->view('templates/header', $judul);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('pages/admin/staff/update');
    $this->load->view('templates/footer');
  }

  public function updateData(){
    $this->load->model('mstaff');

    $id = $this->input->post('id', true);
    $nama = $this->input->post('nama', true);
    $email = $this->input->post('email', true);
    $no_hp = $this->input->post('no_hp', true);
    $cekpass = md5($this->input->post('cekpass', true));
    $dbpass = $this->mstaff->ambilPass($id);
    $password = $this->input->post('password', true);

    $update = array(
        'nama' => $nama,
        'email' => $email,
        'no_hp' => $no_hp, 
      );

    $berhasil = $this->mstaff->update($update,$id); 
          $pesan = '<div class="alert alert-success" role="alert">
                      Data Profile gagal diupdate
                    </div>';
    if ($berhasil) {
      $pesan = '<div class="alert alert-success" role="alert">
                   Data Profile berhasil diupdate
                </div>';
    }
    $this->session->set_flashdata('pesan', $pesan);

    redirect('myprofile');    
    }

  public function editPass($id)
  {
    $judul["judul"] = "Inventory App | Change Password";

    $this->load->view('templates/header', $judul);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('pages/admin/staff/updatePass');
    $this->load->view('templates/footer');
  }

  public function updatePass(){
    $this->load->model('mstaff');

    $id = $this->input->post('id', true);
    $cekpass = md5($this->input->post('cekpass', true));
    $dbpass = $this->mstaff->ambilPass($id);
    $password = $this->input->post('password', true);

    if($cekpass != $dbpass){
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                                              Password Tidak Sesuai!
                                            </div>');
    redirect('myprofile/editPass/'.$id);
    }else{

      $update = array(
          'password' => md5($password)  
        );

      $berhasil = $this->mstaff->update($update,$id); 
            $pesan = '<div class="alert alert-success" role="alert">
                        Data Profile gagal diupdate
                      </div>';
      if ($berhasil) {
        $pesan = '<div class="alert alert-success" role="alert">
                     Data Profile berhasil diupdate
                  </div>';
      }
      $this->session->set_flashdata('pesan', $pesan);

      redirect('myprofile');
      }
  }
}