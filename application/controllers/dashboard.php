<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public $login;

    function __construct(){
        parent::__construct();
        $this->load->model(array('m_petugas','m_anggota', 'm_pengunjung', 'mupload', 'm_kegiatan', 'm_katana'));
        $this->load->library(array('form_validation','template','upload'));
        $this->load->helper('tglindo_helper');

        $this->login = $this->m_anggota
            ->cek($this->session->userdata('username'), $this->session->userdata('password'))->row();
        if(!$this->login){
            redirect('web');
        }
    }

// ==================================INDEX======================================
    function index(){
        
        $ip=$_SERVER['REMOTE_ADDR'];
        $tanggalakses=date("Y-m-d");
        $bulan = date('m');
        $tahun = date('Y');

        $a = $this->m_pengunjung->get_data($ip,$tanggalakses);

        if ( ! $a){
            $b = $this->m_pengunjung->insert_ip($ip,$tanggalakses);
        }
        $data = array(
            'total'=>$this->m_pengunjung->total(),
            'hari'=>$this->m_pengunjung->hari(),
            'bulan'=>$this->m_pengunjung->bulan($bulan),
            'tahun'=>$this->m_pengunjung->tahun($tahun),
            );
        
        //load data
        $data['title']="Beranda";
        $data['katana']=$this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
        $this->load->model('model_informatika');
        $data['informatika'] = $this->model_informatika->getInformatika2();
        $data['berita'] = $this->model_informatika->daftar_berita();

        $this->template->display('user/beranda',$data);
    }

// ==================================BUKU TAMU======================================
    public function bukutamu($id_karangtaruna = '') {
        $this->load->model('model_informatika');
        $data['katana']=$this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
        $data['informatika'] = $this->model_informatika->getInformatika2();
        $data['berita'] = $this->model_informatika->daftar_berita();
        $data['anggota']=$this->m_anggota->loadData($this->login->id_karangtaruna)->result();
		$data['buku_tamu']	= $this->db->query("SELECT * FROM pesan ORDER BY tgl DESC")->result();
		$data['title']		= "Buku Tamu";
		$ke					= $this->uri->segment(3);

		if ($ke == "simpan") {
			$nama	= $this->input->post('nama');
			$email	= $this->input->post('email');
			$pesan	= $this->input->post('pesan');
			
			if ($nama != "" || $email != "" || $pesan != "") {
				$this->db->query("INSERT INTO pesan VALUES ('', '".$nama."', '".$email."', '".$pesan."', NOW(), 0)");
				$this->session->set_flashdata("k", "<div class='alert alert-success'>Pesan terkirim</div>");
				redirect('dashboard/bukutamu');
			} else {
				$this->session->set_flashdata("k", "<div class='alert alert-error'>Isian harus lengkap</div>");
				redirect('dashboard/bukutamu');
			}
		} 
		else {		
			$this->template->menu('user/v_bukutamu',$data);
	}
    }

// ==================================POLLING======================================
    public function post_poll() {
		$id_poll	= $this->input->post('id_poll');
		$pilih		= $this->input->post('poll');
		$pilih_poll	= $this->db->query("UPDATE poll SET j_".$pilih." = (j_".$pilih."+1) WHERE id = '".$id_poll."'");
		
		redirect('dashboard');
	}
	
	public function hasil_poll() {
		$data['title']		= "Hasil Polling";
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
		$this->load->model('model_informatika');
        $data['katana']=$this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $data['informatika'] = $this->model_informatika->getInformatika2();
        $data['berita'] = $this->model_informatika->daftar_berita();
		$this->template->menu('user/v_poll',$data);
	}

// ==================================OBROLAN======================================
    public function kirim_chat(){
		$user=$this->input->post("user");
		$pesan=$this->input->post("pesan");
        $id_karangtaruna= $this->login->id_karangtaruna;
		
		mysql_query("INSERT INTO chat (user,pesan,id_karangtaruna) VALUES ('$user','$pesan',$id_karangtaruna)");
		redirect ("dashboard/ambil_pesan");
	}
	
	public function ambil_pesan(){
		$tampil=mysql_query("SELECT * FROM chat where id_karangtaruna = '" . $this->login->id_karangtaruna . "' ORDER BY waktu ASC");
		while($r=mysql_fetch_array($tampil)){
		echo "<font><b>$r[user]</b></font> <small><i>$r[waktu]</i></small></br>  $r[pesan]<hr>";
		}
	}

// ==================================BERITA======================================
    function read($read) {
        $data['title']="Detail Berita";
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
        $data['katana']=$this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $this->load->model('model_informatika');
        
        $data['detail'] = $this->model_informatika->daftar_berita($read);
        $data['berita'] = $this->model_informatika->daftar_berita();
        
        $this->template->menu('user/detail_berita',$data);
    }

// ==================================ANGGOTA======================================
    function anggota($id_karangtaruna = ''){
        $data['title']="Anggota";
        $data['kt'] = $id_karangtaruna;
        $this->load->model('model_informatika');
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
        $data['katana']=$this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $data['informatika'] = $this->model_informatika->getInformatika2();
        $data['berita'] = $this->model_informatika->daftar_berita();
        $data['anggota']=$this->m_anggota->loadData($this->login->id_karangtaruna)->result();
        
        $this->template->menu('user/anggota',$data);
    }
    
    function cariAgg($id_karangtaruna = ''){
        $cari=$this->input->post('cari');
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
        $data['hasil']=$this->m_anggota->cariAggSuper($cari, $this->login->id_karangtaruna)->result();
        $data['katana'] = $this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $this->load->model('model_informatika');
        $data['informatika'] = $this->model_informatika->getInformatika2();
        $data['berita'] = $this->model_informatika->daftar_berita();
        $data['title']="Pencarian Anggota";
        $this->template->menu('user/anggota_cari',$data);
    }

    function detail_anggota($idAgg){
        $data['title']="Detail Data Anggota";
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
        $data['katana']=$this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $this->load->model('model_informatika');
        $data['berita'] = $this->model_informatika->daftar_berita();
        $data['anggota']=$this->m_anggota->cekId($idAgg)->row_array();
        $this->template->menu('user/detail_agg',$data);
    }

// ==================================PROFIL======================================
    function profil(){
        $data['title']="Profil";
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
        $this->load->model('model_informatika');
        $data['katana']=$this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $data['informatika'] = $this->model_informatika->getInformatika2();
        $data['berita'] = $this->model_informatika->daftar_berita();

        if($this->input->post('simpan-profil')){
            $param = array(
                'namaAgg' => $this->input->post('namaAgg'),
                'hpAgg' => $this->input->post('hpAgg'),
                'alamatAgg' => $this->input->post('alamatAgg'),
                'pekerjaanAgg' => $this->input->post('pekerjaanAgg'),
            );

            $this->m_anggota->update($this->login->idAgg, $param);
            redirect('dashboard/profil');
        }

        if($this->input->post('simpan-password')){
            if (md5($this->input->post('plama')) == $this->login->password){
                $baru = $this->input->post('pbaru');
                $conf = $this->input->post('pconf');

                if ($baru != $conf) {
                    $data['err_password'] = 'Password dan konfirmasi tidak sama';
                } else {
                    $this->m_anggota->update($this->login->idAgg, array(
                        'password' => md5($baru)
                    ));
                    redirect('dashboard/profil');
                }

            } else {
                $data['err_password'] = 'Password lama salah';
            }
        }

        $this->template->menu('user/profil',$data);
    }

// ==================================ATURAN======================================
    function aturan(){
        $data['title']="Peraturan Sistem";
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
        $this->load->model('model_informatika');
        $data['katana']=$this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $data['informatika'] = $this->model_informatika->getInformatika2();
        $data['berita'] = $this->model_informatika->daftar_berita();
        
        $this->template ->menu('user/aturan',$data);
    }

// ==================================GALERI======================================
    function galeri(){
        $data['title']="Galeri";
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
        $this->load->model('model_informatika');
        $data['katana']=$this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $data['informatika'] = $this->model_informatika->getInformatika2();
        $data['berita'] = $this->model_informatika->daftar_berita();
        $data['galeri']=$this->mupload->loadData($this->login->id_karangtaruna)->result();
        
        $this->template->menu('user/galeri',$data);
    }

    function download_galeri($id){
        $this->load->helper('download');
        $gambar = $this->mupload->get_by_id($id);
        $data = file_get_contents(base_url('assets/uploads/'.$gambar->nm_gbr));
        
        force_download($gambar->nm_gbr, $data);
    }
    
    public function tambah_gambar(){
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
         
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'nm_gbr' =>$gbr['file_name'],
                  'tipe_gbr' =>$gbr['file_type'],
                  'ket_gbr' =>$this->input->post('textket'),
                   'id_karangtaruna' => $this->login->id_karangtaruna
                );
 
                $this->mupload->get_insert($data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Gambar <b>berhasil</b> ditambahkan !!</div></div>");
                redirect('dashboard/galeri'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gambar <b>gagal</b> ditambahkan!!</div></div>");
                redirect('dashboard/galeri'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }

// ==================================KEGIATAN======================================
    function kegiatan($id_karangtaruna = ''){
        $data['title']="Kegiatan";
        $data['kegiatan']=$this->m_kegiatan->loadData($this->login->id_karangtaruna)->result();
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
        $data['kt'] = $id_karangtaruna;
        $this->load->model('model_informatika');
        $data['katana']=$this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $data['informatika'] = $this->model_informatika->getInformatika2();
        $data['berita'] = $this->model_informatika->daftar_berita();
        
        $this->template->menu('user/kegiatan',$data);
    }
    
    function cariKeg($id_karangtaruna = ''){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->m_kegiatan->cariKegSuper($cari, $this->login->id_karangtaruna)->result();
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
        $data['katana'] = $this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $this->load->model('model_informatika');
        $data['informatika'] = $this->model_informatika->getInformatika2();
        $data['berita'] = $this->model_informatika->daftar_berita();
        $data['title']="Pencarian Kegiatan";
        $this->template->menu('user/kegiatan_cari',$data);
    }

    function edit_kegiatan($id){
        $data['title']="Edit Data Kegiatan";
        $data['profil'] = $this->m_anggota->profil($this->login->idAgg)->result();
        $this->load->model('model_informatika');
        $data['tampil']=$this->m_kegiatan->loadData($this->login->id_karangtaruna)->result();
        $data['katana'] = $this->m_kegiatan->jumlah_kegiatan()->result();
        $data['katanaAgg']=$this->m_katana->semua()->result();
        $data['informatika'] = $this->model_informatika->getInformatika2();
        $data['berita'] = $this->model_informatika->daftar_berita();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('namaKeg', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsiKeg', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tanggalKeg', 'Tanggal', 'required');

        if($this->form_validation->run()==true){
            
            $info=array(
                'namaKeg'=>$this->input->post('namaKeg'),
                'deskripsiKeg'=>$this->input->post('deskripsiKeg'),
                'tanggalKeg'=>$this->input->post('tanggalKeg')
            );
            //update data angggota
            $this->m_kegiatan->update($id,$info);

            redirect('dashboard/kegiatan');
            //tampilkan pesan
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            
            //tampilkan data anggota 
            $data['kegiatan']=$this->m_kegiatan->cekId($id)->row_array();
            $this->template->menu('user/kegiatan',$data);
        }else{
            $data['kegiatan']=$this->m_kegiatan->cekId($id)->row_array();
            $data['message']="";
            $this->template->menu('user/kegiatan_edit',$data);
        }
    }
 
    function proses_tambah(){
        $data['title']="Data Kegiatan";
        $this->load->model('m_kegiatan','',TRUE);
        
        $data = array(
        'namaKeg' => $this->input->post('namaKeg'),
        'deskripsiKeg' => $this->input->post('deskripsiKeg'),
        'tanggalKeg' => $this->input->post('tanggalKeg'),
        'id_karangtaruna' => $this->login->id_karangtaruna
    );
        $this->m_kegiatan->tambah_kegiatan($data);
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Kegiatan <b>berhasil</b> ditambahkan !!</div></div>");
        redirect('dashboard/kegiatan');
    }

// ==================================LOG OUT======================================
    function logout(){
        $this->session->sess_destroy();
        redirect('web');
    }

}