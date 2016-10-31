<?php
class Template{
    protected $_CI;
    function __construct(){
        $this->_CI=&get_instance();
    }
    
    function display($template,$data=null){
        $data['_content']=$this->_CI->load->view($template,$data,true);
        $data['_header']=$this->_CI->load->view('template/header',$data,true);
        $data['_komplitsidebar']=$this->_CI->load->view('template/komplitsidebar',$data,true);
        $data['_rightsidebar']=$this->_CI->load->view('template/rightsidebar',$data,true);
        $data['_footer']=$this->_CI->load->view('template/footer',$data,true);
        $this->_CI->load->view('/template.php',$data);
    }

    function admin($template,$data=null){
        $data['_content']=$this->_CI->load->view($template,$data,true);
        $data['_header']=$this->_CI->load->view('template/ad_header',$data,true);
        $data['_footer']=$this->_CI->load->view('template/ad_footer',$data,true);
        $this->_CI->load->view('/admin_template.php',$data);
    }

    function menu($template,$data=null){
        $data['_content']=$this->_CI->load->view($template,$data,true);
        $data['_header']=$this->_CI->load->view('template/header',$data,true);
        $data['_komplitsidebar']=$this->_CI->load->view('template/komplitsidebar',$data,true);
        $data['_footer']=$this->_CI->load->view('template/footer',$data,true);
        $this->_CI->load->view('/template_menu.php',$data);
    }
    
    function superadmin($template,$data=null){
        $data['_content']=$this->_CI->load->view($template,$data,true);
        $data['_header']=$this->_CI->load->view('template/sd_header',$data,true);
        $data['_footer']=$this->_CI->load->view('template/sd_footer',$data,true);
        $this->_CI->load->view('/superadmin_template.php',$data);
    }
}