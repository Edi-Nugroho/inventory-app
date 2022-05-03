<?php
class Msupplier extends CI_Model{
 
  public function simpan($insert){
   
    $this->db->insert('supplier', $insert);
    return $this->db->affected_rows();
  }
  
  public function update($update,$id){
    $this->db->where('id', $id);
    $this->db->update('supplier', $update);
    return $this->db->affected_rows();
  }
 
  public function ambilSemuaData(){
    $this->db->order_by('supplier.id', 'desc');
    $res = $this->db->get('supplier');
    return $res->result();
  }

  public function hapusData($id){
    $this->db->where('id', $id);
    $res = $this->db->delete('supplier');
    return $this->db->affected_rows();
  }
  
  public function ambilData($id){
    $this->db->where('id', $id);

    $res = $this->db->get('supplier');
    return $res->row();
  }
}