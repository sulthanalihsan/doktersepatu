<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test_moota extends CI_controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_deposit');
    }

    function index(){
        $notifications = json_decode( file_get_contents("php://input"));  
            if(!is_array($notifications)) {
                $notifications = json_decode( $notifications,TRUE);
            }
            
            if( count($notifications) > 0 ) {
                foreach( $notifications as $notification) {
                    // Your code here
                    // echo "masuk";
                    $amount= $notification['amount'];
                    // tambah($deskripsi);
                    $this->m_deposit->ubah_status_deposit($amount);
                    // // print_r($notification);
                }
            }
            // echo "<pre>";
            print_r($notifications);
    }
}

