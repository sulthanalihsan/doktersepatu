<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	function login_kah(){
        if ( !$this->session->has_userdata('email_plg'))
            redirect(base_url());           
        else
            return TRUE; 
    }


    function index($id = FALSE){
		$this->login_kah();
        $data['title']="Data Artikel";
		if(!$id){
			$data['content']="pelanggan/artikel/index";
			$data['data_artikel']=$this->m_pelanggan->ambil_data('artikel'); //parameter : namatabel,primary,id
		}else{
			$data['content']="pelanggan/artikel/detail";
			$data['data_admin']=$this->m_pelanggan->ambil_data('admin');
			$data['data_artikel']=$this->m_pelanggan->ambil_data('artikel','id_artikel',$id); //parameter : namatabel,primary,id
			$data['artikel_lain']=$this->m_pelanggan->berita_terbaru('artikel'); 
		}
        $this->load->view('pelanggan/template',$data);
    }
}