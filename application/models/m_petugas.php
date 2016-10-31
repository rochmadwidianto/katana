<?php
class M_petugas extends CI_Model{
    private $table="petugas";
    
    function cek($username,$password){
        $this->db->where("user",$username);
        $this->db->where("password",$password);
        return $this->db->get("petugas");
    }

    public function set_data_hide($id){
            $sql="UPDATE pesan SET dataShow = 1 WHERE id = $id ";
            $query = $this->db->query($sql,$id);
            return $query;
    }
    
    // function semua(){
    //     return $this->db->get("petugas");
    // }
    
    // function cekKode($kode){
    //     $this->db->where("user",$kode);
    //     return $this->db->get("petugas");
    // }
    
    // function cekId($kode){
    //     $this->db->where("id_petugas",$kode);
    //     return $this->db->get("petugas");
    // }
    
    // function update($id,$info){
    //     $this->db->where("id_petugas",$id);
    //     $this->db->update("petugas",$info);
    // }
    
    // function simpan($info){
    //     $this->db->insert("petugas",$info);
    // }
    
    // function hapus($kode){
    //     $this->db->where("id_petugas",$kode);
    //     $this->db->delete("petugas");
    // }
}