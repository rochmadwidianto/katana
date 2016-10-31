<?php
class M_pengunjung extends CI_Model{
    private $table="user_activity";
   
    function get_data($ip,$tanggalakses){
        $data="SELECT * from user_activity where ip='$ip' and tanggal='$tanggalakses'";
        $jumlah= $this->db->query($data);
        return $jumlah->num_rows();   
    }

    public function insert_ip($ip,$tanggalakses){
       $sql =  "INSERT into user_activity values ('$ip','$tanggalakses')";
       $this->db->query($sql);
    }

    function total(){
            $data="SELECT * from user_activity";
            
            $query = $this->db->query($data);
            return $query->num_rows();
        }

    function hari(){
            $data ="SELECT * from user_activity where tanggal=curdate()";
             $query = $this->db->query($data);
            return $query->num_rows();
        }

    function bulan($bulan){
            $today = date("m");  
           // echo ($today); exit();
            $data ="SELECT * from user_activity where month(tanggal)=$today";
            $query = $this->db->query($data);
            return $query->num_rows();
        }

    function tahun($tahun){
            $today = date("Y");
            $data ="SELECT * from user_activity where year(tanggal)=$today";
             $query = $this->db->query($data);
            return $query->num_rows();
        }
}
?>