<?php
class Mlaporan_msk extends CI_Model{
 
  public function ambilSemuaData(){
    $this->db->select('b.nama, bm.tgl_masuk, bm.kuantitas, sp.nama_supplier, s.nama_satuan, bm.*');
    $this->db->from('barang_masuk bm'); 
    $this->db->join('barang b', ' b.id=bm.id_barang', 'left');
    $this->db->join('supplier sp', 'sp.id=b.id_spl', 'left');
    $this->db->join('satuan s', 's.id=b.id_stn', 'left');
    $this->db->order_by('bm.id', 'desc');
    $res = $this->db->get('');
    return $res->result();
  }

  public function filterData($tgl_awal, $tgl_akhir){
    $this->db->select('b.nama, bm.tgl_masuk, bm.kuantitas, sp.nama_supplier, s.nama_satuan, bm.*');
    $this->db->from('barang_masuk bm'); 
    $this->db->join('barang b', ' b.id=bm.id_barang', 'left');
    $this->db->join('supplier sp', 'sp.id=b.id_spl', 'left');
    $this->db->join('satuan s', 's.id=b.id_stn', 'left');
    $this->db->where('bm.tgl_masuk >=', date("Y-m-d", strtotime($tgl_awal)));
    $this->db->where('bm.tgl_masuk <=', date("Y-m-d", strtotime($tgl_akhir)));
    $this->db->order_by('bm.tgl_masuk', 'asc');
    $res = $this->db->get('');
    return $res->result();
  }
}