<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelRegistration
 *
 * @author Korisnik
 */
class ModelRegistration extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
        public function register($username, $password, $first_name, $last_name, $phone_number, $email, $organisation, $date_of_birth){
        $this->db->set("username", $username);
        $this->db->set("password", $password);
        $this->db->set("first_name",$first_name);
        $this->db->set("last_name",$last_name);
        $this->db->set("phone_number",$phone_number);
        $this->db->set("email",$email);
        $this->db->set("organisation",$organisation);
        $this->db->set("date_of_birth",$date_of_birth);
        $this->db->set("coordinator","0");
        $this->db->insert("user");
        $id=$this->db->insert_id();
        return $id;
    }
}
