<?php

class User extends CI_Controller{
        public function __construct() {
        parent:: __construct();
        $this->load->model("ModelUser");
//        $this->load->model("ModelVest");
        $this->load->library('session');
//        if($this->session->userdata('user')!=NULL)
//            redirect("User");

    }
    
    
    private function loadView($data,$mainPart){
        $this->load->view("template/header_user.php", $data);
        $this->load->view($mainPart, $data);
        $this->load->view("template/footer.php");
    }
    
    public function index(){
        $data['controller'] = "User";
       $this->load->view("template/header_user.php", $data);
        $this->load->view("main/guest.php", $data);
        $this->load->view("template/footer.php");
    }
    public function logout(){
        $this->session->unset_userdata("User");
        $this->session->sess_destroy();
        redirect("Guest/index");
    }
        public function conferenceview() {
        $data['controller'] = "User";
        $this->load->view("template/header_user.php");
        $this->load->view("main/cnfdetails.php");
        $this->load->view("template/footer.php");

    }
            public function myProfile() {
        $data['controller'] = "User";
        $this->load->view("template/header_user.php");
        $this->load->view("main/user_myprofile.php");
        $this->load->view("template/footer.php");

    }
       public function newProject() {
        $data['controller'] = "User";
        $this->load->view("template/header_user.php");
        $this->load->view("main/user_new_project.php");
        $this->load->view("template/footer.php");

    }
    public function review() {
        $data['controller'] = "User";
        $this->load->view("template/header_user.php");
        $this->load->view("main/user_review.php");
        $this->load->view("template/footer.php");

    }
        
    
}
