<?php

class Admin extends CI_Controller{
    public function __construct()
            {
        $this->load->model("ModelUser");
        $this->load->library('session');
        if ($this->session->userdata('user') != NULL)
            redirect("User");
//            session_destroy();
    }
  
     private function loadView($data,$mainPart){
        $this->load->view("template/header_admin.php", $data);
        $this->load->view("main/admin_my_conference.php", $data);
        $this->load->view("template/footer.php");
    }
    
    public function index(){
        $data['controller'] = "Admin";
       $this->load->view("template/header_admin.php", $data);
        $this->load->view("main/admin_my_conference.php", $data);
        $this->load->view("template/footer.php");
    }
  
    
    
    
       // public function project() {
        //$data['controller'] = "Admin";
        //$this->load->view("template/header_admin.php");
        //$this->load->view("main/admin_my_conference.php");
        //$this->load->view("template/footer.php");
    
    // public function addnewconf() {
        //$data['controller'] = "Admin";
        //$this->load->view("template/header_admin.php");
        //$this->load->view("main/admin_addnew_conference.php");
        //$this->load->view("template/footer.php");
    
   // }
    }