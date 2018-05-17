<?php

class Guest extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        
        $this->load->model("ModelUser");
        $this->load->model('ModelRegistration');
        $this->load->model("Search_model");
        $this->load->library('session');
        if ($this->session->userdata('user') != NULL) {
            redirect("User");
        }
//            session_destroy();
    }

    private function loadView($data, $mainPart) {
       
        $this->load->view("template/header_guest.php", $data);
        $this->load->view("forms/login.php", $data);
        $this->load->view("forms/registration.php", $data);
        $this->load->view("main/cnfdetails.php", $data);
        $this->load->view($mainPart, $data);
        $this->load->view("template/footer.php");
    }

    public function index() {
        $config['base_url'] = base_url() . 'Guest/index';
        $config['total_rows'] = $this->db->count_all('conferences');
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        
        $this->pagination->initialize($config);

        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;
        $data['controller'] = "Guest";
       
        $this->load->view("template/header_guest.php", $data);
        $this->load->view("forms/login.php", $data);
        $this->load->view("forms/registration.php", $data);
        $this->load->view("main/guest.php", $data);
        $this->load->view("template/footer.php");
    }

    public function login($message = NULL) {

        $data = array();
        if ($message)
            $data['message'] = $message;
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;
        $data['title_page'] = "Log in";
        $this->load->view("template/header_guest.php", $data);
        $this->load->view("forms/login.php", $data);
        $this->load->view("forms/registration.php", $data);
        $this->load->view("main/guest.php", $data);
        $this->load->view("template/footer.php");
    }

    public function login_validation() {
        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_message("required", "Field {field} is empty.");
        if ($this->form_validation->run()) {
            $this->ModelUser->username = $this->input->post('username');
            if (!$this->ModelUser->usernameExist())
                $this->login("Incorrect username!");

            else if (!$this->ModelUser->correctPassword($this->input->post('password')))
                $this->login("Incorrect password!");
            else if ($this->ModelUser->coordinatorExist() == TRUE) {
                $this->session->set_userdata('user', $this->ModelUser);
                redirect("Admin/index");
            } else {
                $this->load->library('session');
                $this->session->set_userdata('user', $this->ModelUser);
                redirect("User/index");
            }
        } else
            $this->login();
    }

    public function registerUser() {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('first_name', 'First_name', 'required');
        $this->form_validation->set_rules('last_name', 'Last_name', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone_number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('organisation', 'Organisation', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index(); // ne treba redirect jer na refresh treba da proba da opet nesto doda
        } else {
            //ispravno
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $first_name = $this->input->post("first_name");
            $last_name = $this->input->post("last_name");
            $phone_number = $this->input->post("phone_number");
            $email = $this->input->post("email");
            $organisation = $this->input->post("organisation");
            $date_of_birth = $this->input->post("date_of_birth");
            $this->ModelRegistration->register($username, $password, $first_name, $last_name, $phone_number, $email, $organisation, $date_of_birth);
            redirect("User/index");
        }
    }

    public function conferenceview() {

        $data['info'] = '$info_vesti';
        $this->load->view("template/header_guest.php");
        $this->load->view("forms/login.php");
        $this->load->view("forms/registration.php");
        $this->load->view("main/cnfdetails.php", $data);
        $this->load->view("template/footer.php");
    }

    public function dataconf($idconf) {

        $datacon = $this->Search_model->getInfoConf($idconf);
        $data['confinfo'] = $datacon;
        $this->load->view("template/header_guest.php");
        $this->load->view("forms/login.php");
        $this->load->view("forms/registration.php");
        $this->load->view("main/cnfdetails.php", $data);
        $this->load->view("template/footer.php");
    }

}
