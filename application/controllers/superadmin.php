<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Superadmin extends CI_Controller{
    public $login;

    function __construct(){
        parent::__construct();
        $this->load->model(array('m_anggota','m_kegiatan','mupload','m_petugas','model_informatika', 'm_katana'));
        $this->load->library(array('template','form_validation','upload'));
        $this->load->helper('tglindo_helper');
        
        $this->login = $this->m_petugas
            ->cek($this->session->userdata('username'), $this->session->userdata('password'))->row();
        if(!$this->login){
            redirect('web');
        }
    }

// ===========================INDEX============================
    function index(){
        $data['title']="Beranda";
        $data['berita'] = $this->model_informatika->daftar_berita();
        $data['katana']=$this->m_katana->semua()->result();
        $data['jmlanggotaHide']=$this->m_anggota->jmlanggotaHide();
        $data['jmlanggotaShow']=$this->m_anggota->jmlanggotaShow();
        $data['jmlkegiatanHide']=$this->m_kegiatan->jmlkegiatanHide();
        $data['jmlkegiatanShow']=$this->m_kegiatan->jmlkegiatanShow();
        $data['jmlberitaHide']=$this->model_informatika->jmlberitaHide();
        $data['jmlberitaShow']=$this->model_informatika->jmlberitaShow();
        $data['jmlgambarHide']=$this->mupload->jmlgambarHide();
        $data['jmlgambarShow']=$this->mupload->jmlgambarShow();
        
        $this->template->superadmin('superadmin/beranda',$data);
    }

// ===========================BERITA============================
    function read($read) {
        $data['title']="Detail Berita";
        $this->load->model('model_informatika');
        
        $data['detail'] = $this->model_informatika->daftar_berita($read);
        $data['berita'] = $this->model_informatika->daftar_berita();
        
        $this->template->admin('superadmin/detail_berita',$data);  
    }

    function berita(){
        $data['title']="Data Berita";
        $data['katana']=$this->m_katana->semua()->result();
        $this->load->model('model_informatika');
        $data['informatika'] = $this->model_informatika->semua();
        $data['berita'] = $this->model_informatika->daftar_berita();

        $this->template->superadmin('superadmin/berita/berita',$data);
    }

    function beritatiapKT($id_karangtaruna){
        $karangtaruna = $this->m_katana->get_by_id((int)$id_karangtaruna);
        if ($karangtaruna) {
            $data['perKT']=$this->db->query("SELECT * FROM berita a JOIN karangtaruna b ON a.id_karangtaruna=b.id_karangtaruna WHERE a.id_karangtaruna=$id_karangtaruna AND a.dataShow=0")->result();
            $data['katana']=$this->m_katana->semua()->result();
            $data['title']="Data Berita";
            $data['kt'] = $id_karangtaruna;
            $data['namaKt'] = $karangtaruna->namaKt;
            $this->template->superadmin('superadmin/berita/tiapKT',$data);
        } else {
            redirect('superadmin/berita');
        }

    }

    function cariBerita($id_karangtaruna = ''){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->model_informatika->cariBeritaSuper($cari, $id_karangtaruna)->result();
        $data['title']="Pencarian Berita";
        $this->template->superadmin('superadmin/berita/cari',$data);
    }

    function cariBeritaSemua(){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->model_informatika->cariBerita($cari)->result();
        $data['title']="Pencarian Berita";
        $this->template->superadmin('superadmin/berita/cari',$data);
    }
    
    public function hapusBerita($id){
            $this->model_informatika->set_data_hide($id);
            redirect('superadmin/berita','refresh');
    }

// ===========================ANGGOTA============================
    function anggota(){
        $data['title']="Anggota";
        $data['katana']=$this->m_katana->semua()->result();
        $data['anggota']=$this->m_anggota->semua()->result();
        
        $this->template->superadmin('superadmin/anggota/anggota',$data);
    }

    function anggotatiapKT($id_karangtaruna){
        $karangtaruna = $this->m_katana->get_by_id((int)$id_karangtaruna);
        if ($karangtaruna) {
            $data['perKT']=$this->db->query("SELECT * FROM kt_anggota a JOIN karangtaruna b ON a.id_karangtaruna=b.id_karangtaruna WHERE a.id_karangtaruna=$id_karangtaruna AND a.dataShow=0")->result();
            $data['katana']=$this->m_katana->semua()->result();
            $data['title']="Data Anggota";
            $data['kt'] = $id_karangtaruna;
            $data['namaKt'] = $karangtaruna->namaKt;
            $this->template->superadmin('superadmin/anggota/tiapKT',$data);
            } else {
            redirect('superadmin/anggota');
        }
    }
    
    function cariAgg($id_karangtaruna = ''){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->m_anggota->cariAggSuper($cari, $id_karangtaruna)->result();
        $data['title']="Pencarian Anggota";
        $this->template->superadmin('superadmin/anggota/cari',$data);
    }

    function cariAggSemua(){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->m_anggota->cariAgg($cari)->result();
        $data['title']="Pencarian Anggota";
        $this->template->superadmin('superadmin/anggota/cari',$data);
    }
    
    public function hapusAgg($id){
            $this->m_anggota->set_data_hide($id);
            redirect('superadmin/anggota','refresh');
    }

// ===========================KEGIATAN============================    
    function kegiatan(){
        $data['title']="Data Kegiatan";
        $data['katana']=$this->m_katana->semua()->result();
        $data['kegiatan']=$this->m_kegiatan->semua()->result();
        $data['kt'] = '';
        $this->template->superadmin('superadmin/kegiatan/kegiatan',$data);
    }

    function kegiatantiapKT($id_karangtaruna = ''){
        $karangtaruna = $this->m_katana->get_by_id((int)$id_karangtaruna);
        if ($karangtaruna) {
            $data['perKT']=$this->db->query("SELECT * FROM kt_kegiatan a JOIN karangtaruna b ON a.id_karangtaruna=b.id_karangtaruna WHERE a.id_karangtaruna=$id_karangtaruna AND a.dataShow = 0")->result();
            $data['katana']=$this->m_katana->semua()->result();
            $data['title']="Data Kegiatan";
            $data['kt'] = $id_karangtaruna;
            $data['namaKt'] = $karangtaruna->namaKt;
            $this->template->superadmin('superadmin/kegiatan/tiapKT',$data);
            } else {
            redirect('superadmin/kegiatan');
        }
    }
    
    function cariKeg($id_karangtaruna = ''){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->m_kegiatan->cariKegSuper($cari, $id_karangtaruna)->result();
        $data['title']="Pencarian Kegiatan";
        $this->template->superadmin('superadmin/kegiatan/cari',$data);
    }

    function cariKegSemua(){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->m_kegiatan->cariKeg($cari)->result();
        $data['title']="Pencarian Kegiatan";
        $this->template->superadmin('superadmin/kegiatan/cari',$data);
    }
    
    public function hapusKeg($id){
            $this->m_kegiatan->set_data_hide($id);
            redirect('superadmin/kegiatan','refresh');
    }

// ===========================KARANGTARUNA============================    
    function karangtaruna(){
        $data['title']="Karang Taruna";
        $data['katana']=$this->m_katana->katanaAd()->result();

        $this->template->superadmin('superadmin/karangtaruna',$data);
    }

    public function hapusKt($id){
            $this->m_katana->set_data_hide($id);
            redirect('superadmin/karangtaruna','refresh');
    }
    
    function cariKT(){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->m_katana->cariKT($cari)->result();
        $data['title']="Pencarian Karang Taruna";
        $this->template->superadmin('superadmin/karangtaruna_cari',$data);
    }

// ===========================GALERI============================
    function galeri(){
        $data['title']="Data Galeri";
        $data['katana']=$this->m_katana->semua()->result();
        $data['query'] = $this->mupload->get_allimage();
        
        $this->template->superadmin('superadmin/galeri/galeri',$data);
    }

    function galeritiapKT($id_karangtaruna){
        $karangtaruna = $this->m_katana->get_by_id((int)$id_karangtaruna);
        if ($karangtaruna) {
            $data['query']=$this->db->query("SELECT * FROM tb_uploadimage a JOIN karangtaruna b ON a.id_karangtaruna=b.id_karangtaruna WHERE a.id_karangtaruna=$id_karangtaruna AND a.dataShow = 0")->result();
            $data['katana']=$this->m_katana->semua()->result();
            $data['title']="Data Galeri";
            $data['namaKt'] = $karangtaruna->namaKt;
            $this->template->superadmin('superadmin/galeri/tiapKT',$data);
        } else {
            redirect('superadmin/galeri');
        }
    }

    public function hapus_galeri($id){
            $this->mupload->set_data_hide($id);
            redirect('superadmin/galeri','refresh');
    }

// ===========================PESAN============================    
    function pesan(){
        $data['title']="Pesan";
        $data['pesan']	= $this->db->query("SELECT * FROM pesan WHERE dataShow=0 ORDER BY tgl DESC")->result();

        $this->template->superadmin('superadmin/pesan',$data);
    }

    public function hapusPesan($id){
            $this->m_petugas->set_data_hide($id);
            redirect('superadmin/pesan','refresh');
    }
}