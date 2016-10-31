<?php

Class m_kegiatan extends CI_Model {
    private $table="kt_kegiatan";
    private $primary="idKeg";

    function loadData($id_karangtaruna = ''){
        $sql= "SELECT * FROM kt_kegiatan WHERE dataShow =0 and id_karangtaruna = $id_karangtaruna ORDER BY tanggalKeg DESC ";
        $query = $this->db->query($sql);
        return $query;
    }

    function semua(){
        $sql= "SELECT * FROM kt_kegiatan a JOIN karangtaruna b ON a.id_karangtaruna=b.id_karangtaruna WHERE a.dataShow =0 AND b.dataShow=0 ORDER BY idKeg DESC ";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function set_data_hide($id){
            $sql="update kt_kegiatan set dataShow = 1 where idKeg = $id ";
            $query = $this->db->query($sql,$id);
            return $query;
    }

    function jumlah_kegiatan(){
        $sql= "SELECT namaKt, alamatKt, COUNT(*) AS total FROM karangtaruna a JOIN kt_kegiatan b ON a.id_karangtaruna = b.id_karangtaruna WHERE b.dataShow=0 GROUP BY namaKt";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function jmlkegiatanHide(){
            $data ="SELECT * from kt_kegiatan where dataShow=1";
             $query = $this->db->query($data);
            return $query->num_rows();
    }
    
    function jmlkegiatanShow(){
            $data ="SELECT * from kt_kegiatan where dataShow=0";
             $query = $this->db->query($data);
            return $query->num_rows();
    }

    function jumlah($id_karangtaruna = ''){
            $data ="SELECT * from kt_kegiatan where dataShow=0 and id_karangtaruna = $id_karangtaruna ";
             $query = $this->db->query($data);
            return $query->num_rows();
    }

    function tambah_kegiatan($data) {
	   return $this->db->insert('kt_kegiatan', $data);

    }
    
    function cekId($kode){
        $this->db->where("idKeg",$kode);
        return $this->db->get("kt_kegiatan");
    }
    
    function update($id,$info){
        $this->db->where('idKeg',$id);
        $this->db->update('kt_kegiatan',$info);
    }

    function cariKeg($cari){
        $this->db->where('dataShow', 0);
        $this->db->where("(namaKeg like '%$cari%' or $this->primary like '%$cari%')", null);
        return $this->db->get($this->table);
    }
    
    function cariKegSuper($cari = '', $id_karangtaruna = ''){
        $this->db->where('dataShow', 0);
        $this->db->where('id_karangtaruna', $id_karangtaruna);
        $this->db->where("(namaKeg like '%$cari%' or $this->primary like '%$cari%')", null);
        return $this->db->get($this->table);
    }

    public function insert($data) {
		  return $this->db->insert('kt_kegiatan',$data);
	}

}