<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangMasuk extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
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
    $judul["judul"] = "Inventory App | Data Transaksi Masuk";

    $this->load->model('mbarang_msk');

    $barang_msk = $this->mbarang_msk->ambilSemuaData();

    $data['barang_msk'] = $barang_msk;
    $this->load->view('templates/header', $judul);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar');
    $this->load->view('pages/admin/barang_masuk/index', $data);
    $this->load->view('templates/footer');
  }

  public function inputdata()
  {
    $this->load->model('mbarang');
    $this->load->model('mbarang_msk');

    $judul["judul"] = "Inventory App | Input Data Transaksi";

    $data['barang'] = $this->mbarang->ambilSemuaData();

    $this->load->view('templates/header', $judul);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar');
    $this->load->view('pages/admin/barang_masuk/input', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id)
  { 
    $judul["judul"] = "Inventory App | Detail Transaksi Masuk";

    $this->load->model('mbarang_msk');

    $barang_msk = $this->mbarang_msk->ambilData($id);

    $data['barang_msk'] = $barang_msk;
    
    $this->load->view('templates/header', $judul);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar');
    $this->load->view('pages/admin/barang_masuk/detail', $data);
    $this->load->view('templates/footer');
  }

  public function simpan(){
    $this->form_validation->set_rules('id_barang','Nama Barang','required');
    $this->form_validation->set_rules('tgl_masuk','Tanggal Masuk','required');
    $this->form_validation->set_rules('kuantitas','Kuantitas','required');

    if ($this->form_validation->run() == false) {
      $this->inputdata();
    }else{

      $this->load->model('mbarang_msk');

      $id_barang = $this->input->post('id_barang', true);
      $tgl = $this->input->post('tgl_masuk', true); 
      $tgl_masuk = date("Y-m-d", strtotime($tgl));

      $kuantitas = $this->input->post('kuantitas', true);

      $insert = array(
          'id_barang' => $id_barang,
          'tgl_masuk' => $tgl_masuk,
          'kuantitas' => $kuantitas         
        );

      $berhasil = $this->mbarang_msk->simpan($insert); 
        $pesan = '<div class="alert alert-success" role="alert">
                    Data Transaksi gagal disimpan
                  </div>';
        if ($berhasil) {
          $pesan = '<div class="alert alert-success" role="alert">
                      Data Transaksi berhasil disimpan
                    </div>';
        }
      $this->session->set_flashdata('pesan', $pesan);
      redirect('barangmasuk');
      }
  }

    public function hapus($id){
      $this->load->model('mbarang_msk');

      $berhasil = $this->mbarang_msk->hapusData($id);
          $pesan = '<div class="alert alert-danger" role="alert">
                      Data Transaksi gagal dihapus
                    </div>';
        if ($berhasil) {
          $pesan = '<div class="alert alert-success" role="alert">
                      Data Transaksi berhasil dihapus
                    </div>';
        }
      $this->session->set_flashdata('pesan', $pesan);
      redirect('barangmasuk');
  }

  public function pdf($id){
    $this->load->library('pdfgenerator');

    $this->load->model(array('mbarang_msk','mbarang'));

    $data['barang'] = $this->mbarang->ambilSemuaData();
    $barang_msk = $this->mbarang_msk->ambilData($id);

    $data['barang_msk'] = $barang_msk;
    
    // title dari pdf
    $this->data['title_pdf'] = 'Laporan Transaksi Masuk Barang';
    $this->data['barang_msk'] = $barang_msk;
    
    // filename dari pdf ketika didownload
    $file_pdf = 'laporan_transaksi_masuk';
    // setting paper
    $paper = 'A4';
    //orientasi paper potrait / landscape
    $orientation = "portrait";
        
    $html = $this->load->view('pages/admin/barang_masuk/laporan', $this->data, true);     
        
    // run dompdf
    $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
  }
}