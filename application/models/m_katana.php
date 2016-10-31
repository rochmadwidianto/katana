<?php

Class m_katana extends CI_Model {
    private $table="karangtaruna";
    private $primary="id_karangtaruna";
    
    function semua(){
        $this->db->where('dataShow',0);
        return $this->db->get($this->table);
    }
    
    function tambah_katana($data) {
	   return $this->db->insert('karangtaruna', $data);

    }
    
    function cariKT($cari = ''){
        $sql= "SELECT * FROM admin a join karangtaruna b on a.id_karangtaruna=b.id_karangtaruna WHERE b.dataShow=0 and b.namaKt like '%$cari%'";
        $query = $this->db->query($sql);
        return $query;

        $this->db->like($this->primary,$cari);
        $this->db->or_like("namaKt",$cari);
        return $this->db->get($this->table);
    }

    function get_id(){
        $sql= "SELECT * FROM karangtaruna ORDER BY id_karangtaruna DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_by_id($id){
       return $this->db->where('id_karangtaruna', $id)->get('karangtaruna')->row();
    }
    
    function katanaAd(){
        $sql= "SELECT * FROM admin a join karangtaruna b on a.id_karangtaruna=b.id_karangtaruna WHERE b.dataShow=0";
        $query = $this->db->query($sql);
        return $query;
    }

    public function set_data_hide($id){
        $this->db
            ->where('id_karangtaruna', $id)
            ->update('karangtaruna', array(
                'dataShow' => 1
            ));

        $this->db
            ->where('id_karangtaruna', $id)
            ->update('admin', array(
                'dataShow' => 1
            ));
        return true;
    }
    
    function jumlah(){
        return $this->db->count_all($this->table);
    }

    public function update($id,$info){
		$this->db->where('id_karangtaruna',$id);
		return $this->db->update('karangtaruna',$info);
	} 

    public function insert($data) {
		return $this->db->insert('karangtaruna',$data);
	}
 
}