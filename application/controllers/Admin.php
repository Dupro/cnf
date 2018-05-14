<?php

class Admin extends CI_Controller{
     public function __construct() {
        parent:: __construct();
        $this->load->model("ModelUser");
        $this->load->model('ModelRegistration');
        $this->load->model("Search_model");
        $this->load->library('session');
        if ($this->session->userdata('user') != NULL){
            redirect("User");
            }

    }
  
    public function loadView(){
         $data['controller'] = "Admin";
        $this->load->view("template/header_admin.php", $data);
        $this->load->view("main/admin_my_conference.php", $data);
        $this->load->view("template/footer.php");
    }
    
    public function index(){
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;

        $data['controller'] = "Admin";
       $this->load->view("template/header_admin.php", $data);
        $this->load->view("main/admin.php", $data);
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