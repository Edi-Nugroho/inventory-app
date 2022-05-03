<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanMasuk extends CI_Controller {
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
    $judul["judul"] = "Inventory App | Laporan Transaksi Masuk";

    $tgl_awal = $this->input->post('tgl_awal');
    $tgl_akhir = $this->input->post('tgl_akhir');

    $this->session->set_flashdata('tanggal_awal', $tgl_awal);
    $this->session->set_flashdata('tanggal_akhir', $tgl_akhir);

    if(empty($tgl_awal) || empty($tgl_akhir)){
      $this->load->model('mlaporan_msk');
      $barang_msk = $this->mlaporan_msk->ambilSemuaData();

      $data['barang_msk'] = $barang_msk;
    }else{
      $this->load->model('mlaporan_msk');
      $barang_msk = $this->mlaporan_msk->filterData($tgl_awal, $tgl_akhir);

      $data['barang_msk'] = $barang_msk;
    }

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header', $judul);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('pages/admin/laporan_masuk/index', $data);
      $this->load->view('templates/footer');
  }

  public function pdf(){
    $this->load->library('pdfgenerator');

    if(empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_akhir'))){
      $this->load->model('mlaporan_msk');

      $barang_msk = $this->mlaporan_msk->ambilSemuaData();

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
          
      $html = $this->load->view('pages/admin/laporan_masuk/laporan', $this->data, true);     
          
      // run dompdf
      $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);      
    }else{
      $this->load->model('mlaporan_msk');

      $barang_msk = $this->mlaporan_msk->filterData($this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_akhir'));

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
          
      $html = $this->load->view('pages/admin/laporan_masuk/laporan', $this->data, true);     
          
      // run dompdf
      $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);  
    }
  }
}