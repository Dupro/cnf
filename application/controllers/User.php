<?php

class User extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("ModelUser");
        $this->load->model("Search_model");
//        $this->load->model("ModelVest");
        $this->load->library('session');

        if ($this->session->userdata('user') == NULL)
            redirect("Guest");
        $this->session->flashdata('successPW');
//        print_r($this->session->flashdata('successPW'));

       if ($this->session->userdata('user') == NULL){
        $this->controller="guest";}
        else if ($this->session->userdata('user')->coordinator == "1"){
            $this->controller="admin";
        }
        else {
        $this->controller="user";}

    }

    private function loadView($data, $mainPart) {
        $this->load->view("template/header_".$this->controller.".php", $data);
        $this->load->view($mainPart, $data);
        $this->load->view("template/footer.php");
    }

    public function index() {
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;
        $data['controller'] = "User";
        $this->load->view("template/header_".$this->controller.".php", $data);
        $this->load->view("main/guest.php", $data);
        $this->load->view("template/footer.php");
    }

    public function logout() {
        $this->session->unset_userdata("User");
        $this->session->sess_destroy();
        redirect("Guest/index");
    }

    public function conferenceview() {
        $data['controller'] = "User";
        $this->load->view("template/header_".$this->controller.".php", $data);
        $this->load->view("main/cnfdetails.php");
        $this->load->view("template/footer.php");
    }

    public function myProfile() {
        $data['controller'] = "User";
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
            $this->upload->do_upload('image');


            redirect("User/myProfile");
    }
    
    
        public function showImage($idUser){
        $user=$this->ModelUser->myProfile($idUser);
        $data['user']=$user;
        $data['controller']="User";
        $this->loadView($data, "user_myprofile.php");
    }

    public function newProject() {
        $data['controller'] = "User";
        $this->load->view("template/header_".$this->controller.".php", $data);
        $this->load->view("main/user_new_project.php");
        $this->load->view("template/footer.php");
    }

    public function review() {
        $data['controller'] = "User";
        $this->load->view("template/header_".$this->controller.".php", $data);
        $this->load->view("main/user_review.php");
        $this->load->view("template/footer.php");
    }

    public function project() {
        $data['controller'] = "User";
        $this->load->view("template/header_".$this->controller.".php", $data);
        $this->load->view("main/user_project.php");
        $this->load->view("template/footer.php");
    }

    public function dataconf($idconf) {

        $datacon = $this->Search_model->getInfoConf($idconf);


        $data['confinfo'] = $datacon;
        $this->load->view("template/header_".$this->controller.".php", $data);
        $this->load->view("forms/login.php");
        $this->load->view("forms/registration.php");
        $this->load->view("main/cnfdetails.php", $data);
        $this->load->view("template/footer.php");
    }
    public function conferences() {
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;

        $data['controller'] = "User";
        $data['info'] = '$info_vesti';
        $this->load->view("template/header_".$this->controller.".php", $data);
        $this->load->view("forms/login.php");
        $this->load->view("forms/registration.php");
        $this->load->view("main/guest.php", $data);
        $this->load->view("template/footer.php");
    }

}
