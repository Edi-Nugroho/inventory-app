<?php
class Mbarang extends CI_Model{
 
  public function simpan($insert){
   
    $this->db->insert('barang', $insert);
    return $this->db->affected_rows();
  }
  
  public function update($update,$id){
    $this->db->where('id', $id);
    $this->db->update('barang', $update);
    return $this->db->affected_rows();
  }

  public function ambilSemuaDataPage($limit, $start, $keyword = null){
    $this->db->select('k.nama_kategori, sp.nama_supplier, s.nama_satuan, b.*');
    $this->db->from('barang b'); 
    $this->db->join('kategori k', ' k.id=b.id_ktg', 'left');
    $this->db->join('supplier sp', ' sp.id=b.id_spl', 'left');
    $this->db->join('satuan s', 's.id=b.id_stn', 'left');
    $this->db->order_by('b.id', 'desc');
    if( $keyword ){
      $this->db->like('nama', $keyword);
    }
    $res = $this->db->get('', $limit, $start);
    return $res->result();
  }

  public function ambilSemuaData(){
    $this->db->select('k.nama_kategori, sp.nama_supplier, s.nama_satuan, b.*');
    $this->db->from('barang b'); 
    $this->db->join('kategori k', ' k.id=b.id_ktg', 'left');
    $this->db->join('supplier sp', ' sp.id=b.id_spl', 'left');
    $this->db->join('satuan s', 's.id=b.id_stn', 'left');
    $this->db->order_by('b.id', 'desc');
    $res = $this->db->get('');
    return $res->result();
  }

  public function ambilStok($id){
    $this->db->select('stok');
    $this->db->from('barang'); 
    $this->db->where('id', $id);
    return $this->db->get()->row()->stok;
  }

  public function hapusData($id){
    $this->db->where('id', $id);
    $res = $this->db->delete('barang');
    return $this->db->affected_rows();
  }
  
  public function ambilData($id){
    $this->db->where('id', $id);

    $res = $this->db->get('barang');
    return $res->row();
  }

  public function hitungData(){
    return $this->db->get('barang')->num_rows();
  }
}