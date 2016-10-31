<?php
class Mupload extends CI_Model {
    var $tabel = 'tb_uploadimage'; //buat variabel tabel 
 
    function __construct() {
        parent::__construct();
    }
     
    function loadData($id_karangtaruna = ''){
        $sql= "SELECT * FROM tb_uploadimage WHERE dataShow =0 and id_karangtaruna = $id_karangtaruna ORDER BY id ASC ";
        $query = $this->db->query($sql);
        return $query;
    }

function get_by_id($id){
		return $this->db->where('id', $id)->get('tb_uploadimage')->row();
	}

    public function set_data_hide($id){
            $sql="update tb_uploadimage set dataShow = 1 where id = $id ";
            $query = $this->db->query($sql,$id);
            return $query;
    }

    //fungsi untuk menampilkan semua data dari tabel database
    function get_allimage() {
        $sql= "SELECT * FROM tb_uploadimage a JOIN karangtaruna b ON a.id_karangtaruna=b.id_karangtaruna WHERE a.dataShow =0 AND b.dataShow=0";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    //fungsi insert ke database
    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }
    
    function jumlah($id_karangtaruna = ''){
            $data ="SELECT * from tb_uploadimage where dataShow=0 and id_karangtaruna = $id_karangtaruna ";
             $query = $this->db->query($data);
            return $query->num_rows();
    }
    
    function jmlgambarHide(){
            $data ="SELECT * from tb_uploadimage where dataShow=1";
             $query = $this->db->query($data);
            return $query->num_rows();
    }
    
    function jmlgambarShow(){
            $data ="SELECT * from tb_uploadimage where dataShow=0";
             $query = $this->db->query($data);
            return $query->num_rows();
    }
}
?>