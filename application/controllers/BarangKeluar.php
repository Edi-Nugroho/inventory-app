<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangKeluar extends CI_Controller {
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
    $judul["judul"] = "Inventory App | Data Transaksi Keluar";

    $this->load->model('mbarang_klr');

    $barang_klr = $this->mbarang_klr->ambilSemuaData();

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['barang_klr'] = $barang_klr;
    $this->load->view('templates/header', $judul);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pages/admin/barang_keluar/index', $data);
    $this->load->view('templates/footer');
  }

  public function inputdata()
  {
    $this->load->model('mbarang');
    $this->load->model('mbarang_klr');

    $judul["judul"] = "Inventory App | Input Data Transaksi";

    $data['barang'] = $this->mbarang->ambilSemuaData();

    $this->load->view('templates/header', $judul);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pages/admin/barang_keluar/input', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    $judul["judul"] = "Inventory App | Detail Transaksi Keluar";

    $this->load->model('mbarang_klr');

    $barang_klr = $this->mbarang_klr->ambilData($id);

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['barang_klr'] = $barang_klr;
    
    $this->load->view('templates/header', $judul);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pages/admin/barang_keluar/detail', $data);
    $this->load->view('templates/footer');
  }

  public function simpan(){
    $this->form_validation->set_rules('id_barang','Nama Barang','required');
    $this->form_validation->set_rules('tgl_keluar','Tanggal Keluar','required');
    $this->form_validation->set_rules('kuantitas','Kuantitas','required');

    if ($this->form_validation->run() == false) {
      $this->inputdata();
    }else{

      $this->load->model('mbarang');
      $this->load->model('mbarang_msk');
      $this->load->model('mbarang_klr');

      $id_barang = $this->input->post('id_barang', true);
      $tgl = $this->input->post('tgl_keluar', true); 
      $tgl_keluar_cek = str_replace('-', '', date('Y-m-d', strtotime($tgl)));
      $tgl_keluar = date('Y-m-d', strtotime($tgl));
      $kuantitas = $this->input->post('kuantitas', true);
      $stok = $this->mbarang->ambilStok($id_barang);   
      $tgl_masuk = str_replace('-', '', $this->mbarang_msk->ambilTgl($id_barang));

      if($tgl_keluar_cek < $tgl_masuk){
        $pesan = '<div class="alert alert-danger" role="alert">
                    Belum Ada Transaksi Masuk Pada Tanggal '.date('d-m-Y', strtotime($tgl_keluar)).
                  '</div>';
        $this->session->set_flashdata('pesan', $pesan);

        redirect('barangkeluar/inputdata');
      }else if($tgl_keluar_cek >= $tgl_masuk){  

        if($kuantitas > $stok){
          $pesan = '<div class="alert alert-danger" role="alert">
                      Penginputan Kuantitas Melebihi Stok Yang Tersedia
                    </div>';
          $this->session->set_flashdata('pesan', $pesan);

          redirect('barangkeluar/inputdata');
        }else{

          $insert = array(
              'id_barang' => $id_barang,
              'tgl_keluar' => $tgl_keluar,
              'kuantitas' => $kuantitas         
            );

          $berhasil = $this->mbarang_klr->simpan($insert); 
            $pesan = '<div class="alert alert-success" role="alert">
                        Data Transaksi gagal disimpan
                      </div>';
            if ($berhasil) {
              $pesan = '<div class="alert alert-success" role="alert">
                          Data Transaksi berhasil disimpan
                        </div>';
            }
          $this->session->set_flashdata('pesan', $pesan);
          redirect('barangkeluar');
          }
        }
      }
    }
  

  public function hapus($id){
    $this->load->model('mbarang_klr');

    $berhasil = $this->mbarang_klr->hapusData($id);
        $pesan = '<div class="alert alert-danger" role="alert">
                    Data Transaksi gagal dihapus
                  </div>';
      if ($berhasil) {
        $pesan = '<div class="alert alert-success" role="alert">
                    Data Transaksi berhasil dihapus
                  </div>';
      }
    $this->session->set_flashdata('pesan', $pesan);
    redirect('barangkeluar');
  }

  public function pdf($id){
    $this->load->library('pdfgenerator');

    $this->load->model('mbarang_klr');

    $barang_klr = $this->mbarang_klr->ambilData($id);

    $data['barang_klr'] = $barang_klr;
    
    // title dari pdf
    $this->data['title_pdf'] = 'Laporan Transaksi Keluar Barang';
    $this->data['barang_klr'] = $barang_klr;
    
    // filename dari pdf ketika didownload
    $file_pdf = 'laporan_transaksi_keluar';
    // setting paper
    $paper = 'A4';
    //orientasi paper potrait / landscape
    $orientation = "portrait";
        
    $html = $this->load->view('pages/admin/barang_keluar/laporan', $this->data, true);     
        
    // run dompdf
    $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
  }
}