<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("ModelUser");
        $this->load->model('ModelRegistration');
        $this->load->model("Search_model");
        $this->load->library('session');

        if ($this->session->userdata('user') == NULL){
            redirect("Guest");
            }
        $this->session->flashdata('successPW');


        if ($this->session->userdata('user') == NULL) {
            $this->controller = "guest";
        } else if ($this->session->userdata('user')->coordinator == "1") {
            $this->controller = "admin";
        } else {
            $this->controller = "user";
        }

    }

    public function loadView($data, $mainPart) {
       
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view($mainPart, $data);
        $this->load->view("template/footer.php");
    }

    public function index() {
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;
        $data['controller'] = "Admin";
        
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/admin.php", $data);
        $this->load->view("main/admin_my_conference.php", $data);
        $this->load->view("template/footer.php");
    }

    public function myProfile() {
               $data['controller'] = "Admin";
        $data['successPW'] = $this->session->flashdata('successPW');

        $idUser = $this->session->userdata("user")->username;

        $mydata = '';
        $mydata = $this->ModelUser->myProfile($idUser);
        $data['mydata'] = $mydata;
        $this->loadView($data, "main/user_myprofile.php");
        
    }
        public function addImage() {
        $this->loadView(array(), "user_myprofile.php");
    }
    public function addingImage(){
            $userID = $this->session->userdata('user')->iduser;
            $config['upload_path'] = './image/profile/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['file_name'] = "profile_".$userID;

            $this->load->library('upload', $config);
            if (!file_exists("image/profile/profile_" . $userID . ".jpg")){
                $this->upload->do_upload('image');
                redirect("Admin/myProfile");
            }
           else if (file_exists("image/profile/profile_" . $userID . ".jpg")){
                unlink('image/profile/'."profile_".$userID.".jpg");
                $this->upload->do_upload('image');
                redirect("Admin/myProfile");
            } else
            $this->upload->do_upload('image');
            redirect("Admin/myProfile");
    }

    public function showImage($idUser) {
        $user = $this->ModelUser->myProfile($idUser);
        $data['user'] = $user;
        $data['controller']="Admin";
       
        $this->loadView($data, "user_myprofile.php");
    }

    public function conferences() {
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;

        $data['controller'] = "Admin";
        $data['info'] = '$info_vesti';
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("forms/login.php");
        $this->load->view("forms/registration.php");
        $this->load->view("main/guest.php", $data);
        $this->load->view("template/footer.php");
    }
    public function conferenceview() {

        $data['info'] = '$info_vesti';
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("forms/login.php");
        $this->load->view("forms/registration.php");
        $this->load->view("main/cnfdetails.php", $data);
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
