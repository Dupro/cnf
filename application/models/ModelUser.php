<?php

class ModelUser extends CI_Model {
    public $username;
    public $first_name;
    public $last_name;
    public $id;
    public $coordinator;
   


    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    public function usernameExist(){
        $this->db->where('username',$this->username);
        $result=$this->db->get('user');
        if($result->result())
            return TRUE;
        else
            return false;
    }
    public function coordinatorExist(){
 
//      $query = $this->db->get_where('user', array('coordinator' => true));
//        $result=$this->db->get('user');
        if($this->coordinator==1)
            return TRUE;
        else
            return false;
    }
    public function correctPassword($password){
        $this->db->where('username',$this->username);
        $this->db->where('password',$password);
        $result=$this->db->get('user');
        $user=$result->row_array();
       
        if($user!=NULL){
            $this->first_name=$user['first_name'];
            $this->last_name=$user['last_name'];
            $this->phone_number=$user['phone_number'];
            $this->email=$user['email'];
            $this->organisation=$user['organisation'];
            $this->date_of_birth=$user['date_of_birth'];
            $this->coordinator=$user['coordinator'];
            $this->iduser=$user['iduser'];
            return TRUE;
        }
        else
            return false;
        
    }
    

    public function myProfile($username=NULL){
        if($username!=NULL)
            $this->db->where("username",$username);
        $query=$this->db->get('user');
        $result=$query->result_array();
        return $result;
    }
    public function myConferences($iduser){
        
            $this->db->select('iduser','user_iduser','idconfernce','conference_idconference');
        $query=$this->db->get('user','user_has_conference','conference');
        $array=array('iduser'=>'user_iduser','idconference'=>'conference_idconference');
        $this->db->where($array);
        $this->db->group_by('iduser');
        $this->db->having('iduser',$iduser);
        $result=$query->result_array();
        return $result;
    }
}