<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_controller{

	function index(){
		$data['pesan']='';
	    $this->form_validation->set_rules('email', 'Email', 'required', array('required'=>'Email harus diisi'));
	    $this->form_validation->set_rules('password', 'Password', 'required', array('required'=>'Password tidak boleh kosong'));
		
		if ($this->form_validation->run() == FALSE){
            $this->load->view("login",$data);
			if ($this->session->has_userdata('email_adm'))
			redirect(base_url("admin"));
			else if ($this->session->has_userdata('email_plg'))
			redirect(base_url("pelanggan"));
        else
            return TRUE; 
        }else{
            echo "berhasil";
	    	if($data['dt']=$this->m_admin->cek_login('admin')){
				$data_user = array(
					'id_adm' => $data['dt']['id_adm'],
					'email_adm'  => $data['dt']['email_adm'],
					'nama_adm' => $data['dt']['nama_adm'],
					'foto_adm' => $data['dt']['foto_adm']
					);
				$this->session->set_userdata($data_user);
				redirect(base_url("admin"));

			}else if($data['dt']=$this->m_pelanggan->cek_login('pelanggan')){
				$data_user = array(
					'id_plg' => $data['dt']['id_plg'],
					'email_plg'  => $data['dt']['email_plg'],
					'nama_plg' => $data['dt']['nama_plg'],
					'foto_plg' => $data['dt']['foto_plg']
					);
				$this->session->set_userdata($data_user);
				redirect(base_url("pelanggan"));
	    	}else{
				echo "login gagal username / password salah";
	    		$data['pesan']='username password salah';
				$this->load->view("login");			
			}
	    }	
	}

	function logout(){
        unset(
			$_SESSION['email_adm'],
			$_SESSION['email_plg']
		);  
		session_destroy();
		$_SESSION = [];

		$data['pesan']='Logout Sukses';
		redirect(base_url("admin"));
		// $this->load->view("login",$data);			
	}

}
?>
