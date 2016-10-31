<?php
class M_logadmin extends CI_Model{
    private $table="admin";
    
    function cek($username,$password){
        return $this->db
            ->where("username",$username)
            ->where("password",$password)
            ->where("dataShow",0)
            ->get("admin");
    }
    
    function semua(){
        return $this->db->get("admin");
    }

    function profil($id_admin = ''){
        $sql= "SELECT * FROM admin a JOIN karangtaruna b ON a.id_karangtaruna = b.id_karangtaruna WHERE id_admin = $id_admin";
        $query = $this->db->query($sql);
        return $query;
    }

    function tambah_admin($data) { 
        return $this->db->insert('admin', $data);
    }
    
    function cekKode($kode){
        $this->db->where("username",$kode);
        return $this->db->get("logadmin");
    }
    
    function cekId($kode){
        $this->db->where("idAdmin",$kode);
        return $this->db->get("logadmin");
    }
    
    function update($id,$info){
        $this->db->where("id_admin",$id);
        $this->db->update("admin",$info);
    }
    
    function simpan($info){
        $this->db->insert("logadmin",$info);
    }
}