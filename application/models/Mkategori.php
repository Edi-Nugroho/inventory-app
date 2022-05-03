<?php
class Mkategori extends CI_Model{
 
  public function simpan($insert){
   
    $this->db->insert('kategori', $insert);
    return $this->db->affected_rows();
  }
  
  public function update($update,$id){
    $this->db->where('id', $id);
    $this->db->update('kategori', $update);
    return $this->db->affected_rows();
  }

  public function ambilSemuaData(){
    $this->db->order_by('kategori.id', 'desc');
    $res = $this->db->get('kategori');
    return $res->result();
  }

  public function hapusData($id){
    $this->db->where('id', $id);
    $res = $this->db->delete('kategori');
    return $this->db->affected_rows();
  }
  
  public function ambilData($id){
    $this->db->where('id', $id);

    $res = $this->db->get('kategori');
    return $res->row();
  }

  public function hitungData(){
    return $this->db->get('kategori')->num_rows();
  }

}