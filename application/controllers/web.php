<?php
class Web extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model(array('m_anggota', 'mupload', 'm_petugas','m_katana','m_logadmin'));
        $this->load->library(array('form_validation','template'));
    }

// =================================FORM LOGIN=====================================
    function index(){
        $this->load->view('web/index');
    }
    
    function admin_login(){
        $this->load->view('web/admin_login');
    }
    
    function super_login(){
        $this->load->view('web/super_login');
    }
    
// =================================TAMBAH KATANA & ADMIN=====================================
    function tambah_katana(){
        $this->load->view('web/tambah_katana');
    }
    
    function tambah_admin(){
        $data['katana']=$this->m_katana->get_id()->result();
        $this->load->view('web/tambah_admin',$data);
    }
    
    
    function proses_tambah_katana(){
        $this->load->model('m_katana','',TRUE);
        $data['title']="Tambah Karangtaruna";
        
        $data = array(
                'namaKt' => $this->input->post('namaKatana'),
                'alamatKt' => $this->input->post('alamatKatana'),
                'tentangKt' => $this->input->post('tentangKatana')   
    );

        $this->m_katana->tambah_katana($data);
        redirect('web/tambah_admin',$data);
    }
    
    function proses_tambah_admin(){
        $this->load->model('m_logadmin','',TRUE);
        $data['title']="Tambah Admin";
        
        $data = array(
            'id_karangtaruna' => $this->input->post('id_karangtaruna'),
            'namaAd' => $this->input->post('namaAdmin'),
            'hpAd' => $this->input->post('hpAdmin'),
            'alamatAd' => $this->input->post('alamatAdmin'),
            'pekerjaanAd' => $this->input->post('pekerjaanAdmin'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
    );
        $this->m_logadmin->tambah_admin($data);
        redirect('web/admin_login',$data);

    }
    
// =================================LOGIN ANGGOTA=====================================
    function loganggota(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','password','required|trim|xss_clean');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Username dan password harus diisi');
            redirect('web');
        }else{
            $username=$this->input->post('username');
            $password=md5($this->input->post('password'));
            $cek=$this->m_anggota->cek($username,$password);
            if($cek->num_rows()>0){
                //login berhasil, buat session
                $this->session->set_userdata('username',$username);
                $this->session->set_userdata('password',$password);
                redirect('dashboard');
                
            }else{
                //login gagal
                $this->session->set_flashdata('message','Username atau password salah');
                redirect('web');
            }
        }
    }
    
// =================================LOGIN ADMIN SISTEM=====================================
    function logpetugas(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','password','required|trim|xss_clean');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Username dan password harus diisi');
            redirect('web/super_login');
        }else{
            $username=$this->input->post('username');
            $password=md5($this->input->post('password'));
            $cek=$this->m_petugas->cek($username,$password);
            if($cek->num_rows()>0){
                //login berhasil, buat session
                $this->session->set_userdata('username',$username);
                $this->session->set_userdata('password',$password);
                redirect('superadmin');
                
            }else{
                //login gagal
                $this->session->set_flashdata('message','Username atau password salah');
                redirect('web/super_login');
            }
        }
    }

// =================================LOGIN ADMIN KARANG TARUNA=====================================
    function logadmin(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','password','required|trim|xss_clean');

        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Username dan password harus diisi');
            redirect('web/admin_login');
        }else{
            $username=$this->input->post('username');
            $password=md5($this->input->post('password'));
            $cek=$this->m_logadmin->cek($username,$password);
            if($cek->num_rows()>0){
                //login berhasil, buat session
                $this->session->set_userdata('username',$username);
                $this->session->set_userdata('password',$password);
                redirect('admin');

            }else{
                //login gagal
                $this->session->set_flashdata('message','Username atau password salah');
                redirect('web/admin_login');
            }
        }
    }

// =================================VERIFIKASI EMAIL=====================================
    public function verification($key)
    {
        $this->load->helper('url');
        $this->load->model('m_anggota');
        if ($this->m_anggota->changeActiveState($key)) {
            echo "Selamat kamu telah memverifikasi akun kamu";
            echo "<br><br><a href='".site_url("web/loganggota")."'>Masuk ke Menu Login</a>";
        } else {
            echo 'Kode verifikasi salah';
        }

    }

}