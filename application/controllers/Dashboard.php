<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
	    parent::__construct();
	    $this->load->library('form_validation');

	    $session_id = $this->session->userdata('id');
	    if(!$session_id){
	      redirect('login');
	    }
	}

	public function index()
	{
		$this->load->library('pagination');
		$judul["judul"] = "Inventory App | Dashboard";
		$this->load->model('mbarang');
		$this->load->model('mbarang_msk');
		$this->load->model('mbarang_klr');

		// Pagination
		$config['base_url'] = 'http://localhost/inventory-app/dashboard/index';
	    $config['total_rows'] = $this->mbarang->hitungData();
	    $config['per_page'] = 3;

	    // Style
	    $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
	    $config['full_tag_close'] = '</ul></nav>';

	    $config['first_link'] = 'First';
	    $config['first_tag_open'] = '<li class="page-item">';
	    $config['first_tag_close'] = '</li>';    

	    $config['last_link'] = 'Last';
	    $config['last_tag_open'] = '<li class="page-item">';
	    $config['last_tag_close'] = '</li>';

	    $config['next_link'] = '&raquo';
	    $config['next_tag_open'] = '<li class="page-item">';
	    $config['next_tag_close'] = '</li>';

	    $config['prev_link'] = '&laquo';
	    $config['prev_tag_open'] = '<li class="page-item">';
	    $config['prev_tag_close'] = '</li>';

	    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
	    $config['cur_tag_close'] = '</a></li>';

	    $config['num_tag_open'] = '<li class="page-item">';
	    $config['num_tag_close'] = '</li>';

	    $config['attributes'] = array('class' => 'page-link');

	    $this->pagination->initialize($config);

	    $data['start'] = $this->uri->segment(3);
	    $barang = $this->mbarang->ambilSemuaDataPage($config['per_page'], $data['start']);

	    $countdata = $this->mbarang->hitungData();
	    $countdata_msk = $this->mbarang_msk->hitungData();
	    $countdata_klr = $this->mbarang_klr->hitungData();

	    $data['countdata'] = $countdata;
	    $data['countdata_msk'] = $countdata_msk;
	    $data['countdata_klr'] = $countdata_klr;

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    	$data['barang'] = $barang;
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pages/admin/dashboard', $data);
		$this->load->view('templates/footer');
	}
}
