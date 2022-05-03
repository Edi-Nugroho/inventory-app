<?php
class Mbarang_klr extends CI_Model{

  public function simpan($insert){
   
    $this->db->insert('barang_keluar', $insert);
    return $this->db->affected_rows();
  }
  
  public function update($update,$id){
    $this->db->where('id', $id);
    $this->db->update('barang_keluar', $update);
    return $this->db->affected_rows();
  }
 
  public function ambilSemuaData(){
    $this->db->select('b.nama, bk.tgl_keluar, bk.kuantitas, s.nama_satuan, bk.*');
    $this->db->from('barang_keluar bk'); 
    $this->db->join('barang b', ' b.id=bk.id_barang', 'left');
    $this->db->join('satuan s', 's.id=b.id_stn', 'left');
    $this->db->order_by('bk.id', 'desc');
    $res = $this->db->get('');
    return $res->result();
  }

  public function hapusData($id){
    $this->db->where('id', $id);
    $res = $this->db->delete('barang_keluar');
    return $this->db->affected_rows();
  }
  
  public function ambilData($id){
    $this->db->select('b.nama, bk.tgl_keluar, bk.kuantitas, s.nama_satuan, bk.*');
    $this->db->from('barang_keluar bk');
    $this->db->join('barang b', ' b.id=bk.id_barang', 'left'); 
    $this->db->join('satuan s', 's.id=b.id_stn', 'left');
    $this->db->where('bk.id', $id);

    $res = $this->db->get('');
    return $res->row();
  }

  public function hitungData(){
    return $this->db->get('barang_keluar')->num_rows();
  }

 }