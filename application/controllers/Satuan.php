<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {
	public function __construct()
	{
    parent::__construct();
    $this->load->library('session');
    $this->load->library('form_validation');

    $session_id = $this->session->userdata('id');
    if(!$session_id){
      redirect('login');
    }
	}

	public function index()
	{
		$judul["judul"] = "Inventory App | Satuan";
		
	    $this->load->model('msatuan');

	    $satuan = $this->msatuan->ambilSemuaData();

	    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    	$data['satuan'] = $satuan;
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pages/admin/satuan/index', $data);
		$this->load->view('templates/footer');
	}

  	public function inputdata()
  	{
    if($this->session->userdata('role') == 'Petugas'){
      redirect('satuan');
    }else{
		    $judul["judul"] = "Inventory App | Input Data satuan";
		    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		    $this->load->view('templates/header', $judul);
		    $this->load->view('templates/sidebar', $data);
		    $this->load->view('templates/topbar', $data);
		    $this->load->view('pages/admin/satuan/input', $data);
		    $this->load->view('templates/footer');
  		}
  	}

  	public function simpan(){
	    $this->form_validation->set_rules('nama','Nama satuan','required');

	    if ($this->form_validation->run() == false) {
	      $this->inputdata();
	    }else{

	      $this->load->model('msatuan');

	      $nama = $this->input->post('nama', true);

	      $insert = array(
	          'nama_satuan' => $nama       
	        );

	      $berhasil = $this->msatuan->simpan($insert); 
          $pesan = '<div class="alert alert-danger" role="alert">
                      Data Barang gagal disimpan
                    </div>';
	        if ($berhasil) {
          $pesan = '<div class="alert alert-success" role="alert">
                      Data Barang berhasil disimpan
                    </div>';
	        }
	      $this->session->set_flashdata('pesan', $pesan);
	      redirect('satuan');
	      }
  	}

  	public function hapus($id){
	    $this->load->model('msatuan');

	    $berhasil = $this->msatuan->hapusData($id);
          $pesan = '<div class="alert alert-danger" role="alert">
                      Data Barang gagal dihapus
                    </div>';
	      if ($berhasil) {
          $pesan = '<div class="alert alert-success" role="alert">
                      Data Barang berhasil dihapus
                    </div>';
	      }
	    $this->session->set_flashdata('pesan', $pesan);
	    redirect('satuan');
 	}

}
