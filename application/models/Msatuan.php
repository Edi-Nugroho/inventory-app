<?php
class Msatuan extends CI_Model{
 
  public function simpan($insert){
   
    $this->db->insert('satuan', $insert);
    return $this->db->affected_rows();
  }
  
  public function update($update,$id){
    $this->db->where('id', $id);
    $this->db->update('satuan', $update);
    return $this->db->affected_rows();
  }
 
  public function ambilSemuaData(){
    $this->db->order_by('satuan.id', 'desc');
    $res = $this->db->get('satuan');
    return $res->result();
  }

  public function hapusData($id){
    $this->db->where('id', $id);
    $res = $this->db->delete('satuan');
    return $this->db->affected_rows();
  }
  
  public function ambilData($id){
    $this->db->where('id', $id);

    $res = $this->db->get('satuan');
    return $res->row();
  }
}