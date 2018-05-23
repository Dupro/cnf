<?php

class User extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("ModelUser");
        $this->load->model("ModelRegistration");
        $this->load->model("Search_model");
//        $this->load->model("ModelVest");
        $this->load->library('session');

        if ($this->session->userdata('user') == NULL)
            redirect("Guest");
        $this->session->flashdata('successPW');
//        print_r($this->session->flashdata('successPW'));

        if ($this->session->userdata('user') == NULL) {
            $this->controller = "guest";
        } else if ($this->session->userdata('user')->coordinator == "1") {
            $this->controller = "admin";
            redirect("Admin");
        } else {
            $this->controller = "user";
        }
    }

    private function loadView($data, $mainPart) {
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view($mainPart, $data);
        $this->load->view("template/footer.php");
    }

    public function index() {
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;
        $data['controller'] = "User";
        $this->load->view("template/header_" . $this->controller . ".php", $data);
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
        $this->load->view("template/header_" . $this->controller . ".php", $data);
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

    public function addingImage() {
        $userID = $this->session->userdata('user')->iduser;
        $config['upload_path'] = './image/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 2048;
        $config['max_height'] = 1024;
        $config['file_name'] = "profile_" . $userID;

        $this->load->library('upload', $config);
        if (!file_exists("image/profile/profile_" . $userID . ".jpg")) {
            $this->upload->do_upload('image');
            redirect("User/myProfile");
        } else if (file_exists("image/profile/profile_" . $userID . ".jpg")) {
            unlink('image/profile/' . "profile_" . $userID . ".jpg");
            $this->upload->do_upload('image');
            redirect("User/myProfile");
        } else
            $this->upload->do_upload('image');
        redirect("User/myProfile");
    }

    public function showImage($idUser) {
        $user = $this->ModelUser->myProfile($idUser);
        $data['user'] = $user;
        $data['controller'] = "User";
        $this->loadView($data, "user_myprofile.php");
    }

    public function newProject() {
        $conference_data = $this->Search_model->conference();
        $autors = $this->Search_model->users();
        $data['confdata'] = $conference_data;
        $data['autor'] = $autors;
        $data['controller'] = "User";
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/user_new_project.php");
        $this->load->view("template/footer.php");
    }

    public function review() {
        $data['controller'] = "User";
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/user_review.php");
        $this->load->view("template/footer.php");
    }

    public function project() {
        $data['controller'] = "User";
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/user_project.php");
        $this->load->view("template/footer.php");
    }

    public function dataconf($idconf) {

        $datacon = $this->Search_model->getInfoConf($idconf);


        $data['confinfo'] = $datacon;
        $this->load->view("template/header_" . $this->controller . ".php", $data);
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
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("forms/login.php");
        $this->load->view("forms/registration.php");
        $this->load->view("main/guest.php", $data);
        $this->load->view("template/footer.php");
    }

    public function get_field() { // dovlacenje liste fileda za konferencije u myNewProject
        echo "smrda";
        $idconference = $this->input->post('idconference');
        $field = $this->Search_model->get_province_query($idconference);
        if (count($field) > 0) {
            $pro_select_box = '';
            $pro_select_box .= '<option value="" hidden="">Select Field</option>';
            foreach ($field as $field) {
                $pro_select_box .= '<option value="' . $field->idfield . '">' . $field->name_field . '</option>';
            }
            echo $pro_select_box;
        }
    }

    public function mynewProject() {
//        $this->form_validation->set_rules('project_name', 'Project Name', 'required|min_length[4]');
//        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
//        $this->form_validation->set_rules('field', 'Section', 'required');
//        $this->form_validation->set_rules('apstract', 'Apstract', 'required');
//        if ($this->form_validation->run() == FALSE) {
//            $this->index(); // ne treba redirect jer na refresh treba da proba da opet nesto doda
//        } else {
            //ispravno
            $project_name = $this->input->post("project_name");
            $keywords = $this->input->post("keywords");
            $section_pro = $this->input->post("field");
            $apstract = $this->input->post("apstract");
            $field_idfield = "1";
            $idproject = $this->ModelRegistration->myNewProject($project_name, $keywords, $section_pro, $apstract, $field_idfield);
            $iduser = $this->session->userdata('user')->iduser;
            $successAddProject = $this->session->set_flashdata('successAddProject', 'You have successfully add a new project!');
            $this->ModelRegistration->autor($idproject, $iduser);
            $successAddProject;
            redirect("User/index");
//        }
    }

}
