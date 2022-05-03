<?php
class Mlaporan_klr extends CI_Model{
 
  public function ambilSemuaData(){
    $this->db->select('b.nama, bk.tgl_keluar, bk.kuantitas, s.nama_satuan, bk.*');
    $this->db->from('barang_keluar bk'); 
    $this->db->join('barang b', ' b.id=bk.id_barang', 'left');
    $this->db->join('satuan s', 's.id=b.id_stn', 'left');
    $this->db->order_by('bk.id', 'desc');
    $res = $this->db->get('');
    return $res->result();
  }

  public function filterData($tgl_awal, $tgl_akhir){
    $this->db->select('b.nama, bk.tgl_keluar, bk.kuantitas, s.nama_satuan, bk.*');
    $this->db->from('barang_keluar bk'); 
    $this->db->join('barang b', ' b.id=bk.id_barang', 'left');
    $this->db->join('satuan s', 's.id=b.id_stn', 'left');
    $this->db->where('bk.tgl_keluar >=', date("Y-m-d", strtotime($tgl_awal)));
    $this->db->where('bk.tgl_keluar <=', date("Y-m-d", strtotime($tgl_akhir)));
    $this->db->order_by('bk.tgl_keluar', 'asc');
    $res = $this->db->get('');
    return $res->result();
  }
}