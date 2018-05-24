<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("ModelUser");
        $this->load->model('ModelRegistration');
        $this->load->model("Search_model");
        $this->load->library('session');

        if ($this->session->userdata('user') == NULL) {
            redirect("Guest");
        }
        $this->session->flashdata('successPW');
        $this->session->flashdata('successSentEmail');


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

        $mydata = '';
        $data['mydata'] = $mydata;
        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;
        $data['controller'] = "Admin";
        $data['successAddConf'] = $this->session->flashdata('successAddConf');
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/admin.php", $data);

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

    public function logout() {
        $this->session->unset_userdata("User");
        $this->session->sess_destroy();
        redirect("Guest/index");
    }

    public function addImage() {
        $this->loadView(array(), "user_myprofile.php");
    }

    public function addingImage() {
        $userID = $this->session->userdata('user')->iduser;
        $config['upload_path'] = './image/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = "profile_" . $userID;

        $this->load->library('upload', $config);
        if (!file_exists("image/profile/profile_" . $userID . ".jpg")) {
            $this->upload->do_upload('image');
            redirect("Admin/myProfile");
        } else if (file_exists("image/profile/profile_" . $userID . ".jpg")) {
            unlink('image/profile/' . "profile_" . $userID . ".jpg");
            $this->upload->do_upload('image');
            redirect("Admin/myProfile");
        } else
            $this->upload->do_upload('image');
        redirect("Admin/myProfile");
    }

    public function showImage($idUser) {
        $user = $this->ModelUser->myProfile($idUser);
        $data['user'] = $user;
        $data['controller'] = "Admin";

        $this->loadView($data, "user_myprofile.php");
    }

    public function conferences() {
        $conference_data = $this->Search_model->conference();
        $data['confdatapag'] = $conference_data;

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

    public function myConferences() {
        $iduser = $this->session->userdata("user")->iduser;
        $myconf = $this->ModelUser->modelMyConferences($iduser);
        $data['myconf'] = $myconf;
        $this->loadView($data, "main/admin_my_conference.php");
    }

    public function reviewerEmailInvitation() {
        $data['successSentEmail'] = $this->session->flashdata('successSentEmail');
        $this->loadView($data, "forms/admin_reviewer_email_invitation.php"); 
    }

    public function sendEmail() {
        $this->form_validation->set_rules('senderEmail', 'Sender Email', 'required|trim');
        $this->form_validation->set_rules('passwordEmail', 'Email password', 'required|trim');
        $this->form_validation->set_rules('recipientEmail', 'Recipient Email', 'required|trim');
        $this->form_validation->set_message("required", "Field {field} is empty.");
        if ($this->form_validation->run() == FALSE) {
//             // ne treba redirect jer na refresh treba da proba da opet nesto doda
        } else {
            $first_name = $this->session->userdata('user')->first_name;
            $last_name = $this->session->userdata('user')->last_name;
            $full_name = $first_name . " " . $last_name;
            $senderEmail = $this->input->post("senderEmail");
            $passwordEmail = $this->input->post("passwordEmail");
            $recipientEmail = $this->input->post("recipientEmail");
            $subject = $this->input->post("subject");
            $messageEmail = $this->input->post("messageEmail");
        }
        $config = Array(
            'protocol' => 'smtp',
            'smtp_crypto' => 'tls',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => $senderEmail,
            'smtp_pass' => $passwordEmail,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->email->from($senderEmail, $full_name);
        $this->email->to($recipientEmail);
        $this->email->subject($subject);
        $this->email->message($messageEmail);
        $this->email->set_newline("\r\n");
        $this->email->send();
        $this->email->print_debugger();
        $successSentEmail= $this->session->set_flashdata('successSentEmail', 'You have successfully sent a email!');
            $successSentEmail;
            redirect('Admin/reviewerEmailInvitation');

    }

    // OVO TEK TREBA DA SE RADI
    public function reviewerInvitation() {

//        $mydata = $this->ModelUser->myConferences();
//        $data['mydata'] = $mydata;
//        $conference_data = $this->Search_model->conference();
//        $data['confdata'] = $conference_data;
//        $data['controller'] = "Admin";
//        
//        $this->load->view("template/header_" . $this->controller . ".php", $data);
//        $this->load->view("main/admin.php", $data);
//        $this->load->view("main/admin_reviewer_invitation.php", $data);
//        $this->load->view("template/footer.php");
    }

    public function addnewConference() {

        $conference_data = $this->Search_model->conference();
        $data['confdata'] = $conference_data;
        $data['controller'] = "Admin";

        $this->load->view("template/header_" . $this->controller . ".php", $data);
//        $this->load->view("main/admin.php", $data);
        $this->load->view("main/admin_addnew_conference.php", $data);
        $this->load->view("template/footer.php");
    }

    public function createConference() {
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[6]');
        $this->form_validation->set_rules('place', 'Place', 'required');
        $this->form_validation->set_rules('event_begin', 'Event Begin', 'required');
        $this->form_validation->set_rules('event_end', 'Event end', 'required');
        $this->form_validation->set_rules('application_begin', 'Application begin', 'required');
        $this->form_validation->set_rules('application_end', 'Application end', 'required');
        $this->form_validation->set_rules('projects_per_autor', 'Projects per autor', 'required');



        if ($this->form_validation->run() == FALSE) {
            $this->index(); // ne treba redirect jer na refresh treba da proba da opet nesto doda
        } else {
            //ispravno
            $title = $this->input->post("title");
            $place = $this->input->post("place");
            $event_begin = $this->input->post("event_begin");
            $event_end = $this->input->post("event_end");
            $application_begin = $this->input->post("application_begin");
            $application_end = $this->input->post("application_end");
            $projects_per_autor = $this->input->post("projects_per_autor");
            $idconf = $this->ModelRegistration->newConference($title, $place, $event_begin, $event_end, $application_begin, $application_end, $projects_per_autor);
            $iduser = $this->session->userdata('user')->iduser;
            $successAddConf = $this->session->set_flashdata('successAddConf', 'You have successfully created a new conference!');
            $this->ModelRegistration->userHasConference($idconf, $iduser);


            $config['upload_path'] = './image/conference/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;
            $config['max_width'] = 2048;
            $config['max_height'] = 1080;
            $config['file_name'] = "conference_" . $idconf;

            $this->load->library('upload', $config);
            if (!file_exists("image/conference/conference_" . $idconf . ".jpg")) {
                $this->upload->do_upload('imageConf');
            } else if (file_exists("image/conference/conference_" . $idconf . ".jpg")) {
                unlink('image/conference/' . "conference_" . $idconf . ".jpg");
                $this->upload->do_upload('imageConf');
            }
            $successAddConf;
            redirect("Admin/index");
        }
    }

//    DODAVANJE SLIKE U CONF
    public function addConfImage() {
        $this->loadView(array(), "user_myprofile.php");
    }

    public function addingConfImage() {
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

//    TO DO
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
