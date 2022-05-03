<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->load->library('pagination');

    $session_id = $this->session->userdata('id');
    if(!$session_id){
      redirect('login');
    }
  }

  public function index()
  {
    $judul["judul"] = "Inventory App | Data Supplier";

    $this->load->model('msupplier');

    $supplier = $this->msupplier->ambilSemuaData();

    $data['supplier'] = $supplier;
    $this->load->view('templates/header', $judul);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pages/admin/supplier/index', $data);
    $this->load->view('templates/footer');
  }

  public function inputdata()
  {
    if($this->session->userdata('role') == 'Petugas'){
      redirect('supplier');
    }else{
      $this->load->model('msupplier');

      $judul["judul"] = "Inventory App | Input Data Supplier";

      $this->load->view('templates/header', $judul);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('pages/admin/supplier/input');
      $this->load->view('templates/footer');
    }
  }

  public function simpan(){
    $this->form_validation->set_rules('nama','Nama supplier','required');
    $this->form_validation->set_rules('email','Email supplier','required');
    $this->form_validation->set_rules('no_hp','No_Hp supplier','required');
    $this->form_validation->set_rules('alamat','Alamat supplier','required');

    if ($this->form_validation->run() == false) {
      $this->inputdata();
    }else{

      $this->load->model('msupplier');

      $nama = $this->input->post('nama', true);
      $email = $this->input->post('email', true);
      $no_hp = $this->input->post('no_hp', true);
      $alamat = $this->input->post('alamat', true);

      $insert = array(
          'nama_supplier' => $nama,
          'email' => $email,
          'no_hp' => $no_hp,
          'alamat' => $alamat      
        );

      $berhasil = $this->msupplier->simpan($insert); 
        $pesan = '<div class="alert alert-danger" role="alert">
                    Data Supplier gagal disimpan
                  </div>';
        if ($berhasil) {
        $pesan = '<div class="alert alert-success" role="alert">
                    Data Supplier berhasil disimpan
                  </div>';
        }
      $this->session->set_flashdata('pesan', $pesan);
      redirect('supplier');
      }
  }

  public function edit($id){
    if($this->session->userdata('role') == 'Petugas'){
      redirect('supplier');
    }else{
      $this->load->model('msupplier');
      $judul["judul"] = "Inventory App | Edit Data Supplier";

      $supplier = $this->msupplier->ambilData($id);

      $data['supplier'] = $supplier;
      $this->load->view('templates/header', $judul);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('pages/admin/supplier/update', $data);
      $this->load->view('templates/footer');
    }
  }

  public function updateData(){
    $this->load->model('msupplier');

    $id = $this->input->post('id', true);
    $nama = $this->input->post('nama', true);
    $email = $this->input->post('email', true);
    $no_hp = $this->input->post('no_hp', true);
    $alamat = $this->input->post('alamat', true);
    
    $update = array(
        'nama_supplier' => $nama,
        'email' => $email,
        'no_hp' => $no_hp,
        'alamat' => $alamat   
      );

    $berhasil = $this->msupplier->update($update,$id); 
          $pesan = '<div class="alert alert-success" role="alert">
                      Data Supplier gagal diupdate
                    </div>';
    if ($berhasil) {
      $pesan = '<div class="alert alert-success" role="alert">
                   Data Supplier berhasil diupdate
                </div>';
    }
    $this->session->set_flashdata('pesan', $pesan);

    redirect('supplier');
    }

  public function hapus($id){
    $this->load->model('msupplier');

    $berhasil = $this->msupplier->hapusData($id);
          $pesan = '<div class="alert alert-danger" role="alert">
                      Data Supplier gagal disimpan
                    </div>';
      if ($berhasil) {
        $pesan = '<div class="alert alert-success" role="alert">
            Data Supplier berhasil dihapus
          </div>';
      }
    $this->session->set_flashdata('pesan', $pesan);
    redirect('supplier');
  }
}