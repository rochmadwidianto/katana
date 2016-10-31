<?php
class M_anggota extends CI_Model{
    private $table="kt_anggota";
    private $primary="idAgg";
    
    function cek($username,$password){
        $this->db->where("username",$username);
        $this->db->where("password",$password);
        $this->db->where('dataShow', 0);
        $this->db->where('active',1);
        return $this->db->get("kt_anggota");
    }
    
    function semua(){
        $sql= "SELECT * FROM kt_anggota a JOIN karangtaruna b ON a.id_karangtaruna=b.id_karangtaruna WHERE a.dataShow =0 AND b.dataShow=0 ORDER BY idAgg DESC ";
        $query = $this->db->query($sql);
        return $query;
    }

    function cekId($kode){
        $this->db->where("idAgg",$kode);
        return $this->db->get("kt_anggota");
    }

    function add_account($data)
		{
			$this->db->insert('kt_anggota',$data);
			
			return  mysql_insert_id();
		}
    
    function changeActiveState($key)
		{
			$data = array(
               'active' => 1
            );

            if ($this->db->where('md5(idAgg)', $key)->get('kt_anggota')->num_rows()){
                $this->db->where('md5(idAgg)', $key)->update('kt_anggota', $data);
                return true;
            } else {
                return false;
            }

		}
    
    function loadData($id_karangtaruna = ''){
        $sql= "SELECT * FROM kt_anggota WHERE dataShow =0 and id_karangtaruna = $id_karangtaruna ORDER BY idAgg DESC ";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function set_data_hide($id){
            $sql="update kt_anggota set dataShow = 1 where idAgg = $id ";
            $query = $this->db->query($sql,$id);
            return $query;
    }
    
    function jmlanggotaHide(){
            $data ="SELECT * from kt_anggota where dataShow=1" ;
             $query = $this->db->query($data);
            return $query->num_rows();
    }
    
    function jmlanggotaShow(){
            $data ="SELECT * from kt_anggota where dataShow=0";
             $query = $this->db->query($data);
            return $query->num_rows();
    }
    
    function jumlah($id_karangtaruna = ''){
            $data ="SELECT * from kt_anggota where dataShow=0 and id_karangtaruna = $id_karangtaruna ";
             $query = $this->db->query($data);
            return $query->num_rows();
    }
    
    function profil($idAgg = ''){
        $sql= "SELECT * FROM kt_anggota a JOIN karangtaruna b ON a.id_karangtaruna = b.id_karangtaruna WHERE idAgg = $idAgg";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function simpan($jenis){
        $this->db->insert($this->table,$jenis);
        return $this->db->insert_id();
    }
    
    function update($id,$info){
        $this->db->where('idAgg',$id);
        $this->db->update('kt_anggota',$info);
    }

    function update_profil($id,$data){
        $this->db->where('idAgg',$id);
        $this->db->update('kt_anggota',$data);
    }
    
    function cariAggSuper($cari = '', $id_karangtaruna = ''){
        $this->db->where('dataShow', 0);
        $this->db->where('id_karangtaruna', $id_karangtaruna);
        $this->db->where("(namaAgg like '%$cari%' or $this->primary like '%$cari%')", null);
        return $this->db->get($this->table);
    }

    function cariAgg($cari){
        $this->db->where('dataShow', 0);
        $this->db->where("(namaAgg like '%$cari%' or $this->primary like '%$cari%')", null);
        return $this->db->get($this->table);
    }
}