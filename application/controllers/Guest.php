<?php

class Guest extends CI_Controller{
    public function __construct() {
        parent:: __construct();
        $this->load->model("ModelUser");
//        $this->load->model("ModelVest");
        $this->load->library('session');
        if($this->session->userdata('user')!=NULL)
//            redirect("User");
            session_destroy ();
    }
    
    
    private function loadView($data,$mainPart){
        $this->load->view("template/header_guest.php", $data);
        $this->load->view($mainPart, $data);
        $this->load->view("template/footer.php");
    }
    
    public function index(){
        $data['pera']="Log in";
        $this->loadView($data,'forms/login.php' );
        $this->loadView($data,'forms/registration.php' );
    }
    
    public function login($message=NULL)
    {
        $data=array();
        if($message)
            $data['message']=$message;
        $data['title_page']="Log in";
        $this->loadView($data,'forms/login.php' );
    }
    
         public function login_validation(){
        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_message("required","Field {field} is empty.");
        if($this->form_validation->run())
        {
            $this->ModelUser->username=$this->input->post('username');
            if(!$this->ModelUser->usernameExist())
                $this->login("Incorrect username!");
            else if(!$this->ModelUser->correctPassword($this->input->post('password')))
                $this->login("Incorrect password!");
            else {
                $this->load->library('session');
                $this->session->set_userdata('user', $this->ModelUser);
                redirect("User/index");
             }     
        }
        else
            $this->login();
        
    }
}
