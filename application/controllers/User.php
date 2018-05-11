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
        $idAutor=$this->session->userdata("user")->username;
        
        //$pocetni_index=($this->uri->segment(3))?$this->uri->segment(3):0;
        $vest='';
        $vesti=$this->ModelUser->myProfile($idAutor);
        $data['vesti']=$vesti;
        $this->loadView($data, "main/user_myprofile.php");

    }

        
}
