<?php

class ModelChangePassword extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function checkOldPassword($opassword){
        $this->db->where('password',$opassword);
        $result=$this->db->get('user');
        if($result->result())
            return TRUE;
        else
            return false;
    }
    
    public function updateNewPassword($npassword){
//        $this->db->where('username', $username);
        $this->db->set('password', $npassword);
         $this->db->update("user");
        
    }
}
