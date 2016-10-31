<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_informatika extends CI_Model {
    private $table="berita";
    private $primary="id_berita";

	
	// Menampilkand data berita
	public function daftar_berita($read = FALSE) {
        $this->db
            ->from('berita b')
            ->where('b.dataShow', 0)
            ->join('karangtaruna k', 'b.id_karangtaruna = k.id_karangtaruna')
->order_by('id_berita','ASC');

        if ($read) {
            return $this->db->where('id_berita', $read)->get()->row_array();
        } else {
            return $this->db->get()->result_array();
        }
    }

    function semua(){
        $sql= "SELECT * FROM berita a JOIN karangtaruna b ON a.id_karangtaruna=b.id_karangtaruna WHERE a.dataShow =0 AND b.dataShow=0 ORDER BY id_berita DESC ";
        $query = $this->db->query($sql);
        return $query;
    }

    function tambah_berita($data) {
	   return $this->db->insert('berita', $data);
    }
    
	public function loadData($id_karangtaruna = ''){
		$query = "SELECT * FROM berita WHERE dataShow =0 and id_karangtaruna = $id_karangtaruna ORDER BY tanggal DESC";
		$data = $this->db->query($query);
		return $data;
	}
    
    function cekId($kode){
        $this->db->where("id_berita",$kode);
        return $this->db->get("berita");
    }

    function cariBeritaSuper($cari = '', $id_karangtaruna = ''){
        $this->db->where('dataShow', 0);
        $this->db->where('id_karangtaruna', $id_karangtaruna);
        $this->db->where("(judul like '%$cari%' or $this->primary like '%$cari%')", null);
        return $this->db->get($this->table);
    }
    
    function cariBerita($cari){
        $this->db->where('dataShow', 0);
        $this->db->like("judul", $cari);
        return $this->db->get($this->table);
    }
    
    public function set_data_hide($id){
            $sql="update berita set dataShow = 1 where id_berita = $id ";
            $query = $this->db->query($sql,$id);
            return $query;
    }
    
    function jmlberitaHide(){
            $data ="SELECT * from berita where dataShow=1";
             $query = $this->db->query($data);
            return $query->num_rows();
    }
    
    function jmlberitaShow(){
            $data ="SELECT * from berita where dataShow=0";
             $query = $this->db->query($data);
            return $query->num_rows();
    }
	
	public function getInformatika2(){
		$data=$this->db->get('berita');
		return $data;
	}
    
    function jumlah($id_karangtaruna = ''){
            $data ="SELECT * from berita where dataShow=0 and id_karangtaruna = $id_karangtaruna ";
             $query = $this->db->query($data);
            return $query->num_rows();
    }

    function cek($id_berita){
        $this->db->where("id_berita",$id_berita);
        return $this->db->get("berita");
    }
	
	public function edit($id){
		$this->db->where('id_berita',$id);
		return $this->db->get('berita',$id);
	}

	function update($id,$info){
        $this->db->where('id_berita',$id);
        $this->db->update('berita',$info);
    }
}