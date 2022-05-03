<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class DataBarang extends CI_Controller {

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
		$judul["judul"] = "Inventory App | Data Barang";

    $this->load->model('mbarang');

    $barang = $this->mbarang->ambilSemuaData();

    $data['barang'] = $barang;
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
		$this->load->view('pages/admin/databarang/index', $data);
		$this->load->view('templates/footer');
	}

  public function inputdata()
  {
    if($this->session->userdata('role') == 'Petugas'){
      redirect('databarang');
    }else{
      $this->load->model('mkategori');
      $this->load->model('msupplier');
      $this->load->model('msatuan');

      $judul["judul"] = "Inventory App | Input Data Barang";

      $data['kategori'] = $this->mkategori->ambilSemuaData();
      $data['supplier'] = $this->msupplier->ambilSemuaData();
      $data['satuan'] = $this->msatuan->ambilSemuaData();

      $this->load->view('templates/header', $judul);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('pages/admin/databarang/input', $data);
      $this->load->view('templates/footer');
    }
  }

  public function simpan(){
    $this->form_validation->set_rules('nama','Nama Barang','required');
    $this->form_validation->set_rules('id_ktg','Kategori','required');
    $this->form_validation->set_rules('id_spl','Supplier','required');
    $this->form_validation->set_rules('id_stn','Satuan','required');

    if ($this->form_validation->run() == false) {
      $this->inputdata();
    }else{

      $this->load->model('mbarang');

      $nama = $this->input->post('nama', true);
      $id_ktg = $this->input->post('id_ktg', true);
      $id_spl = $this->input->post('id_spl', true);
      $id_stn = $this->input->post('id_stn', true);

      $insert = array(
          'nama' => $nama,
          'id_ktg' => $id_ktg,
          'id_spl' => $id_spl,
          'id_stn' => $id_stn         
        );

      $berhasil = $this->mbarang->simpan($insert); 
          $pesan = '<div class="alert alert-danger" role="alert">
                      Data Barang gagal disimpan
                    </div>';
        if ($berhasil) {
          $pesan = '<div class="alert alert-success" role="alert">
                      Data Barang berhasil disimpan
                    </div>';
        }
      $this->session->set_flashdata('pesan', $pesan);
      redirect('databarang');
      }
  }

  public function hapus($id){
    $this->load->model('mbarang');

    $berhasil = $this->mbarang->hapusData($id);
          $pesan = '<div class="alert alert-danger" role="alert">
                      Data Barang gagal disimpan
                    </div>';
      if ($berhasil) {
        $pesan = '<div class="alert alert-success" role="alert">
            Data Barang berhasil dihapus
          </div>';
      }
    $this->session->set_flashdata('pesan', $pesan);
    redirect('databarang');
  }

  public function edit($id){
    if($this->session->userdata('role') == 'Petugas'){
      redirect('databarang');
    }else{
      $this->load->model(array('mbarang','mkategori', 'msupplier', 'msatuan'));
      $judul["judul"] = "Inventory App | Edit Data Barang";

      $data['kategori'] = $this->mkategori->ambilSemuaData();
      $data['supplier'] = $this->msupplier->ambilSemuaData();
      $data['satuan'] = $this->msatuan->ambilSemuaData();
      $barang = $this->mbarang->ambilData($id);

      $data['barang'] = $barang;
      $this->load->view('templates/header', $judul);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('pages/admin/databarang/update', $data);
      $this->load->view('templates/footer');
    }
  }

  public function updateData(){
    $this->load->model('mbarang');

    $id = $this->input->post('id', true);
    $nama = $this->input->post('nama', true);
    $id_ktg = $this->input->post('id_ktg', true);
    $id_spl = $this->input->post('id_spl', true);
    $id_stn = $this->input->post('id_stn', true);
    
    $update = array(
        'nama' => $nama,
        'id_ktg' => $id_ktg,
        'id_spl' => $id_spl,
        'id_stn' => $id_stn   
      );

    $berhasil = $this->mbarang->update($update,$id); 
          $pesan = '<div class="alert alert-success" role="alert">
                      Data Barang gagal diupdate
                    </div>';
    if ($berhasil) {
      $pesan = '<div class="alert alert-success" role="alert">
                   Data Barang berhasil diupdate
                </div>';
    }
    $this->session->set_flashdata('pesan', $pesan);

    redirect('databarang');
    }
}

