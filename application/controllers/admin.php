<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
    public $login;

    function __construct(){
        parent::__construct();
        $this->load->model(array('m_anggota','m_kegiatan','mupload','m_katana','m_logadmin', 'm_kegiatan', 'model_informatika'));
        $this->load->library(array('template','form_validation','upload'));
        $this->load->helper('tglindo_helper');
        
        $this->login = $this->m_logadmin
            ->cek($this->session->userdata('username'), $this->session->userdata('password'))->row();
        if(!$this->login){
            redirect('web');
        }
    }

// ============================INDEX====================================
    function index(){
        $data['title']="Beranda";
        $data['berita'] = $this->model_informatika->daftar_berita();
        $data['jmlanggota']=$this->m_anggota->jumlah($this->login->id_karangtaruna);
        $data['jmlkegiatan']=$this->m_kegiatan->jumlah($this->login->id_karangtaruna);
        $data['jmlBerita']=$this->model_informatika->jumlah($this->login->id_karangtaruna);
        $data['jmlGambar']=$this->mupload->jumlah($this->login->id_karangtaruna);
        
        $this->template->admin('admin/beranda',$data);
    }

// ============================PROFIL====================================
    function profil() {
        $data['title']="Edit Profil";
        $data['profil']=$this->m_logadmin->profil($this->login->id_admin)->result();

        if($this->input->post('simpan-profil')){
            $param = array(
                'namaAd' => $this->input->post('namaAd'),
                'hpAd' => $this->input->post('hpAd'),
                'alamatAd' => $this->input->post('alamatAd'),
                'pekerjaanAd' => $this->input->post('pekerjaanAd'),
            );

            $this->m_logadmin->update($this->login->id_admin, $param);
            redirect('admin/profil');
        }

        if($this->input->post('simpan-password')){
            if (md5($this->input->post('plama')) == $this->login->password){
                $baru = $this->input->post('pbaru');
                $conf = $this->input->post('pconf');

                if ($baru != $conf) {
                    $data['err_password'] = 'Password dan konfirmasi tidak sama';
                } else {
                    $this->m_logadmin->update($this->login->id_admin, array(
                        'password' => md5($baru)
                    ));
                    redirect('admin/profil');
                }

            } else {
                $data['err_password'] = 'Password lama salah';
            }
        }

        if($this->input->post('simpan-katana')){
            $param = array(
                'namaKt' => $this->input->post('namaKt'),
                'alamatKt' => $this->input->post('alamatKt'),
                'tentangKt' => $this->input->post('tentangKt'),
            );

            $this->m_katana->update($this->login->id_karangtaruna, $param);
            redirect('admin/profil');
        }

        $this->template->admin('admin/profil',$data);  
    }
    
// ============================ANGGOTA====================================
    function tambah_anggota(){
        $data['title']="Tambah Anggota";
        $this->template->admin('admin/anggota/tambah',$data);
    }

    public function submit(){
		//passing post data dari view
		$this->load->helper(array('form', 'url'));
        $namaAgg = $this->input->post('namaAgg');
		$jk = $this->input->post('jk');
		$agamaAgg = $this->input->post('agamaAgg');
        $ttlAgg = $this->input->post('ttlAgg');
		$alamatAgg = $this->input->post('alamatAgg');
		$hpAgg = $this->input->post('hpAgg');
		$statusAgg = $this->input->post('statusAgg');
		$pekerjaanAgg = $this->input->post('pekerjaanAgg');
		$username = $this->input->post('username');
        $password = md5($this->input->post('password'));
		$email = $this->input->post('email');
		
        $config['upload_path'] = './assets/img/anggota/';
        $config['allowed_types'] = 'gif|jpg|png|ppt|pptx';
        $config['max_size'] = '1000';
        $config['max_width']  = '2000';
        $config['max_height']  = '1024';
                
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar="";
                }else{
                    $gambar=$this->upload->file_name;
                }
        
		//memasukan ke array
		$data = array(
            'namaAgg' => $namaAgg ,
            'jk' => $jk ,
            'agamaAgg' => $agamaAgg ,
            'ttlAgg' => $ttlAgg ,
            'alamatAgg' => $alamatAgg ,
            'hpAgg' => $hpAgg ,
            'statusAgg' => $statusAgg ,
            'pekerjaanAgg' => $pekerjaanAgg ,
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'active' => 0,
            'fotoAgg'=>$gambar,
            'id_karangtaruna' => $this->login->id_karangtaruna
		);
		//tambahkan akun ke database
		$this->load->model('m_anggota');
		$id = $this->m_anggota->add_account($data);
		
		//enkripsi id
		$encrypted_id = md5($id);
		
		$this->load->library('email');
		$config = array();
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'Codeigniter';
		$config['protocol']= "mail";
		$config['mailtype']= "html";
		$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
		$config['smtp_port']= "465";
		$config['smtp_timeout']= "400";
		$config['smtp_user']= "Admin KATANA"; // isi dengan email kamu
		$config['smtp_pass']= "sekolahvokasi12"; // isi dengan password kamu
		$config['crlf']="\r\n"; 
		$config['newline']="\r\n"; 
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		//konfigurasi pengiriman
		$this->email->from($config['smtp_user']);
		$this->email->to($email);
		$this->email->subject("Verifikasi Akun");
		$this->email->message(
                           '<h3>Selamat Datang, <b> ' . $namaAgg. '</b><br/><br/></h3>'.
			'Terima kasih telah melakukan registrasi, <br/>' .
            '<b>Username :</b> ' . $username. '<br/>'.
            '<b>Password :</b> ' . $this->input->post('password') . '<br/><br/>'
            .'Untuk memverifikasi silahkan klik tautan dibawah ini<br><br>'.
			'<a href='.site_url("web/verification/$encrypted_id").'>' . site_url("web/verification/$encrypted_id") . '</a>'
		);
		
		if($this->email->send())
		{
			echo "SELAMAT! Anda berhasil melakukan registrasi, silahkan cek email kamu";
		}else
		{
			echo "Berhasil melakukan registrasi, namun gagal mengirim verifikasi email";
		}
		
		echo "<br><br><a href='".site_url("admin/anggota")."'>Kembali ke Menu Anggota</a>";
	}

    function edit($id){
        $data['title']="Edit Data Anggota";
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('namaAgg', 'Nama', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agamaAgg', 'Agama', 'required');
        $this->form_validation->set_rules('ttlAgg', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamatAgg', 'Alamat', 'required');
        $this->form_validation->set_rules('hpAgg', 'No. HP', 'required');
        $this->form_validation->set_rules('statusAgg', 'Status', 'required');
        $this->form_validation->set_rules('pekerjaanAgg', 'Pekerjaan', 'required');

        if($this->form_validation->run()==true){
            // $id=$this->input->post('id');
            //setting konfiguras upload image
        $config['upload_path'] = './assets/img/anggota/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size']	= '1000';
	    $config['max_width']  = '2000';
	    $config['max_height']  = '1024';
                
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar')){
                $gambar="";
            }else{
                $gambar=$this->upload->file_name;
            }
            $info=array(
                'namaAgg'=>$this->input->post('namaAgg'),
                'jk'=>$this->input->post('jk'),
                'agamaAgg'=>$this->input->post('agamaAgg'),
                'ttlAgg'=>$this->input->post('ttlAgg'),
                'alamatAgg'=>$this->input->post('alamatAgg'),
                'hpAgg'=>$this->input->post('hpAgg'),
                'statusAgg'=>$this->input->post('statusAgg'),
                'pekerjaanAgg'=>$this->input->post('pekerjaanAgg'),
            );

            if ($gambar) {
                $info['fotoAgg'] = $gambar;
            }
            //update data angggota
            $this->m_anggota->update($id,$info);
            redirect('admin/anggota');

            //tampilkan pesan
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            
            //tampilkan data anggota 
            $data['anggota']=$this->m_anggota->cekId($id)->row_array();
            $this->template->admin('admin/anggota/anggota',$data);
        }else{
            $data['anggota']=$this->m_anggota->cekId($id)->row_array();
            $data['message']="";
            $this->template->admin('admin/anggota/edit',$data);
        }
    }
    
    function anggota($id_karangtaruna = ''){
        $data['title']="Anggota";
        $data['kt'] = $id_karangtaruna;
        $data['anggota']=$this->m_anggota->loadData($this->login->id_karangtaruna)->result();
        
        $this->template->admin('admin/anggota/anggota',$data);
    }
    
    function cariAgg($id_karangtaruna = ''){
        $data['title']="Pencarian Anggota";
        $cari=$this->input->post('cari');
        $data['hasil']=$this->m_anggota->cariAggSuper($cari, $this->login->id_karangtaruna)->result();
        
        $this->template->admin('admin/anggota/cari',$data);
    }

    public function hapusAgg($id){
            $this->m_anggota->set_data_hide($id);
            redirect('admin/anggota','refresh');
    }

// ============================KEGIATAN====================================
    function kegiatan($id_karangtaruna = ''){
        $data['title']="Data Kegiatan";
        $data['kt'] = $id_karangtaruna;
        $data['kegiatan']=$this->m_kegiatan->loadData($this->login->id_karangtaruna)->result(); 

        $this->template->admin('admin/kegiatan/kegiatan',$data);
    }
    
    function cariKeg($id_karangtaruna = ''){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->m_kegiatan->cariKegSuper($cari, $this->login->id_karangtaruna)->result();
        $data['title']="Pencarian Kegiatan";
        $this->template->admin('admin/kegiatan/cari',$data);
    }
    
    function edit_kegiatan($id){
        $data['title']="Edit Data Kegiatan";

        $this->load->library('form_validation');

        $this->form_validation->set_rules('namaKeg', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsiKeg', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tanggalKeg', 'Tanggal', 'required');

        if($this->form_validation->run()==true){
            //$id=$this->input->post('idKeg');
            
            $info=array(
                'namaKeg'=>$this->input->post('namaKeg'),
                'deskripsiKeg'=>$this->input->post('deskripsiKeg'),
                'tanggalKeg'=>$this->input->post('tanggalKeg')
            );
            //update data angggota
            $this->m_kegiatan->update($id,$info);

            redirect('admin/kegiatan');
            //tampilkan pesan
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            
            //tampilkan data anggota 
            $data['kegiatan']=$this->m_kegiatan->cekId($id)->row_array();
            $this->template->admin('admin/kegiatan/kegiatan',$data);
        }else{
            $data['kegiatan']=$this->m_kegiatan->cekId($id)->row_array();
            $data['message']="";
            $this->template->admin('admin/kegiatan/edit',$data);
        }
    }
    
    public function hapusKeg($id){
            $this->m_kegiatan->set_data_hide($id);
            redirect('admin/kegiatan','refresh'); 
    }
    
    function proses_tambah(){
        $this->load->model('m_kegiatan','',TRUE);
        $data['title']="Data Kegiatan";
         
        $data = array(
        'namaKeg' => $this->input->post('namaKeg'),
        'deskripsiKeg' => $this->input->post('deskripsiKeg'),
        'tanggalKeg' => $this->input->post('tanggalKeg'),
        'id_karangtaruna' => $this->login->id_karangtaruna
    );

        $this->m_kegiatan->tambah_kegiatan($data);
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Kegiatan <b>berhasil</b> ditambahkan !!</div></div>");
        redirect('admin/kegiatan/kegiatan');
    }
    
// ============================GALERI====================================
    function galeri(){
        $data['title']="Data Galeri";
        $data['query'] = $this->mupload->loadData($this->login->id_karangtaruna)->result();
        $this->template->admin('admin/galeri/galeri',$data);
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
                redirect('admin/galeri/galeri'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gambar <b>gagal</b> ditambahkan!!</div></div>");
                redirect('admin/galeri/galeri'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }

    public function hapus_galeri($id){
            $this->mupload->set_data_hide($id);
            redirect('admin/galeri','refresh');
    }

// ============================BERITA====================================
    function berita($id_karangtaruna = ''){
        $data['title']="Data Berita";
        $data['kt']=$id_karangtaruna;
      	$this->load->model('model_informatika');
       	$data['informatika'] = $this->model_informatika->loadData($this->login->id_karangtaruna);
        $data['berita'] = $this->model_informatika->daftar_berita();

        $this->template->admin('admin/berita/berita',$data);
    }

    function edit_berita($id){
        $data['title']="Edit Data Berita";

        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if($this->form_validation->run()==true){

            $info=array(
                'judul'=>$this->input->post('judul'),
                'ringkasan'=>$this->input->post('ringkasan'),
                'isi'=>$this->input->post('isi'),
                'tanggal'=>$this->input->post('tanggal')
            );
            //update data angggota
            $this->model_informatika->update($id,$info);

            redirect('admin/berita');
            //tampilkan pesan
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            
            //tampilkan data anggota 
            $data['berita']=$this->model_informatika->cekId($id)->row_array();
            $this->template->admin('admin/berita/berita',$data);
        }else{
            $data['berita']=$this->model_informatika->cekId($id)->row_array();
            $data['message']="";
            $this->template->admin('admin/berita/edit',$data);
        }
    }
    
    function cariBerita($id_karangtaruna = ''){
        $this->load->model('model_informatika');
        $cari=$this->input->post('cari');
        $data['hasil']=$this->model_informatika->cariBeritaSuper($cari,$this->login->id_karangtaruna)->result();
        $data['title']="Pencarian Berita";
        $this->template->admin('admin/berita/cari',$data);
    }
    
    public function hapusBerita($id){
            $this->model_informatika->set_data_hide($id);
            redirect('admin/berita','refresh'); 
    }
    
    function tambah_berita(){
        $this->load->model('model_informatika','',TRUE);
        $data['title']="Tambah Berita";
         
        $data = array(
        'judul' => $this->input->post('judul'),
        'slug' => $this->input->post('slug'),
        'ringkasan' => $this->input->post('ringkasan'),
        'isi' => $this->input->post('isi'),
        'tanggal' => $this->input->post('tanggal'),
        'id_karangtaruna' => $this->login->id_karangtaruna
    );

        $this->model_informatika->tambah_berita($data);
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Berita <b>berhasil</b> ditambahkan !!</div></div>");
        redirect('admin/berita');
    }
}