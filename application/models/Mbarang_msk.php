<?php
class Mbarang_msk extends CI_Model{

  public function simpan($insert){
   
    $this->db->insert('barang_masuk', $insert);
    return $this->db->affected_rows();
  }
  
  public function update($update,$id){
    $this->db->where('id', $id);
    $this->db->update('barang_masuk', $update);
    return $this->db->affected_rows();
  }
 
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

  public function hapusData($id){
    $this->db->where('id', $id);
    $res = $this->db->delete('barang_masuk');
    return $this->db->affected_rows();
  }
  
  public function ambilData($id){
    $this->db->select('b.nama, bm.tgl_masuk, bm.kuantitas, sp.nama_supplier, s.nama_satuan, bm.*');
    $this->db->from('barang_masuk bm');
    $this->db->join('barang b', ' b.id=bm.id_barang', 'left');
    $this->db->join('supplier sp', 'sp.id=b.id_spl', 'left'); 
    $this->db->join('satuan s', 's.id=b.id_stn', 'left');
    $this->db->where('bm.id', $id);

    $res = $this->db->get('');
    return $res->row();
  }

  public function ambilTgl($id){
    $this->db->select('tgl_masuk');
    $this->db->from('barang_masuk'); 
    $this->db->where('id_barang', $id);
    return $this->db->get()->row()->tgl_masuk;
  }

  public function hitungData(){
    return $this->db->get('barang_masuk')->num_rows();
  }

 }