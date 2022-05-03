<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
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
		$judul["judul"] = "Inventory App | Data Kategori";

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
    $this->load->model('mkategori');

    $kategori = $this->mkategori->ambilSemuaData();

  	$data['kategori'] = $kategori;
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pages/admin/kategori/index', $data);
		$this->load->view('templates/footer');
	}

  	public function inputdata()
  	{
    if($this->session->userdata('role') == 'Petugas'){
      redirect('kategori');
    }else{
		    $judul["judul"] = "Inventory App | Input Data Kategori";

		    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		    $this->load->view('templates/header', $judul);
		    $this->load->view('templates/sidebar', $data);
		    $this->load->view('templates/topbar', $data);
		    $this->load->view('pages/admin/kategori/input', $data);
		    $this->load->view('templates/footer');
	  	}
  	}

  	public function simpan(){
	    $this->form_validation->set_rules('nama','Nama Kategori','required');

	    if ($this->form_validation->run() == false) {
	      $this->inputdata();
	    }else{

	      $this->load->model('mkategori');

	      $nama = $this->input->post('nama', true);

	      $insert = array(
	          'nama_kategori' => $nama       
	        );

	      $berhasil = $this->mkategori->simpan($insert); 
          $pesan = '<div class="alert alert-danger" role="alert">
                      Data Barang berhasil disimpan
                    </div>';
	        if ($berhasil) {
          $pesan = '<div class="alert alert-success" role="alert">
                      Data Barang berhasil disimpan
                    </div>';
	        }
	       $this->session->set_flashdata('pesan', $pesan);
	      redirect('kategori');
	      }
  	}

  	public function hapus($id){
	    $this->load->model('mkategori');

	    $berhasil = $this->mkategori->hapusData($id);
          $pesan = '<div class="alert alert-danger" role="alert">
                      Data Barang gagal dihapus
                    </div>';
	      if ($berhasil) {
          $pesan = '<div class="alert alert-success" role="alert">
                      Data Barang berhasil dihapus
                    </div>';
	      }
	    $this->session->set_flashdata('pesan', $pesan);
	    redirect('kategori');
 	}

}
