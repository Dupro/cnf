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
    public function newConference($title, $place, $event_begin, $event_end, $application_begin, $application_end, $projects_per_autor){
        $this->db->set("title", $title);
        $this->db->set("place", $place);
        $this->db->set("event_begin",$event_begin);
        $this->db->set("event_end",$event_end);
        $this->db->set("application_begin",$application_begin);
        $this->db->set("application_end",$application_end);
        $this->db->set("projects_per_autor",$projects_per_autor);
        $this->db->insert("conference");
        $id=$this->db->insert_id();
        return $id;
    }
    public function userHasConference($idconf, $iduser){
        $this->db->set("conference_idconference", $idconf);
        $this->db->set("user_iduser", $iduser);
        $this->db->insert("user_has_conference");
        $id=$this->db->insert_id();
        return $id;
    }
    public function myNewProject($project_name, $keywords, $section_pro, $apstract, $field_idfield){
        $this->db->set("project_name", $project_name);
        $this->db->set("keywords", $keywords);
        $this->db->set("section_pro",$section_pro);
        $this->db->set("apstract",$apstract);
        $this->db->set("field_idfield",$field_idfield);
        $this->db->insert("project");
        $id=$this->db->insert_id();
        return $id;
    }
    public function autor($idproject, $iduser){
        $this->db->set("project_idproject", $idproject);
        $this->db->set("user_iduser", $iduser);
        $this->db->insert("autor");
        $id=$this->db->insert_id();
        return $id;
    }
}
