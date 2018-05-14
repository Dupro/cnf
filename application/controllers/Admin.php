<?php

class Admin extends CI_Controller{
     public function __construct() {
        parent:: __construct();
        $this->load->model("ModelUser");
        $this->load->model('ModelRegistration');
        $this->load->model("Search_model");
        $this->load->library('session');
        if ($this->session->userdata('user') == NULL){
            redirect("Guest");
            }

    }
  
    public function loadView($data, $mainPart){
         $data['controller'] = "Admin";
        $this->load->view("template/header_admin.php", $data);
        $this->load->view($mainPart, $data);
        $this->load->view("template/footer.php");
    }
    
    public function index(){
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;

        $data['controller'] = "Admin";
       $this->load->view("template/header_admin.php", $data);
        $this->load->view("main/admin.php", $data);
                $this->load->view("main/admin_my_conference.php", $data);
        $this->load->view("template/footer.php");
    }
  
        public function myProfile() {
        $data['controller'] = "Admin";
        $idUser = $this->session->userdata("user")->username;

        $mydata = '';
        $mydata = $this->ModelUser->myProfile($idUser);
        $data['mydata'] = $mydata;
        $this->loadView($data, "main/user_myprofile.php");
        
         $config['upload_path']          = './image/profile/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name']            = "profile_";
            
            $this->load->library('upload', $config);
            $this->upload->do_upload('slika');
    }
    
    
        public function showImage($idUser){
        $user=$this->ModelUser->myProfile($idUser);
        $data['user']=$user;
        $data['controller']="Admin";
        $this->loadView($data, "user_myprofile.php");
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