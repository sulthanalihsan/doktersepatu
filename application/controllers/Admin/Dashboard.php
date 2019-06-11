<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function login_kah(){
        if ( !$this->session->has_userdata('email_adm'))
            redirect(base_url());           
        else
            return TRUE; 
    }

	public function index()
	{
		$this->login_kah();
		$data['judul']="HOME";
		$data['content']="admin/beranda";
		$this->load->view('admin/template',$data);
	}
}
