<?php
class Mstaff extends CI_Model{
 
  public function simpan($insert){
   
    $this->db->insert('user', $insert);
    return $this->db->affected_rows();
  }
  
  public function update($update,$id){
    $this->db->where('id', $id);
    $this->db->update('user', $update);
    return $this->db->affected_rows();
  }
 
  public function ambilSemuaData(){
    $res = $this->db->get('user');
    return $res->result();
  }

  public function hapusData($id){
    $this->db->where('id', $id);
    $res = $this->db->delete('user');
    return $this->db->affected_rows();
  }
  
  public function ambilData($id){
    $this->db->where('id', $id);

    $res = $this->db->get('user');
    return $res->row();
  }

  public function ambilPass($id){
    $this->db->select('password');
    $this->db->from('user');
    $this->db->where('id', $id);

    return $this->db->get()->row()->password;
  }

  public function cekUser($email,$password){
    $q = "SELECT id, email , nama, role, no_hp FROM user WHERE email='".$email."' AND password='".$password."'";
    $res = $this->db->query($q);
    return $res->row();
  }

  public function getUser($id){
    $q = "SELECT * FROM user WHERE id = '".$id."'";
    $res = $this->db->query($q);
    return $res->row();
  }
}