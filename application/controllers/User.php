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
            redirect("Guest");
        } else if ($this->session->userdata('user')->coordinator == "1") {
            $this->controller = "Admin";
            redirect("Admin");
        } else {
            $this->controller = "User";
        }
    }

    private function loadView($data, $mainPart) {
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view($mainPart, $data);
        $this->load->view("template/footer.php");
    }

    public function index() {
        if ($this->uri->segment(3))
            $indexnum = $this->uri->segment(3);
        else
            $indexnum = 0;

        $limit = 3;
        $conferencenum = $this->db->count_all('conference');
        $data['confdatapag'] = $this->Search_model->conference($limit, $indexnum);

        $this->load->library('pagination'); // ovo moze i u  config/autoload.php da se doda
        $this->config->load('bootstrap_pagination'); //moze i u autoload.php

        $config_pagination = $this->config->item('pagination');
        $config_pagination['base_url'] = site_url("User/index");
        $config_pagination['total_rows'] = $conferencenum;
        $config_pagination['per_page'] = $limit;
        $config_pagination['next_link'] = 'Next';
        $config_pagination['prev_link'] = 'Prev';

        $this->pagination->initialize($config_pagination);
        $data['links'] = $this->pagination->create_links();
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

        $mydata = $this->ModelUser->myProfile($idUser);
        $data['mydata'] = $mydata;
        $this->loadView($data, "main/user_myprofile.php");
    }

    public function editMyProfile() {
        if ($this->input->post("submitMyEditProfile") !== NULL) {
            $iduser = $this->session->userdata("user")->iduser;
            $first_name = $this->input->post("first_name");
            $last_name = $this->input->post("last_name");
            $phone_number = $this->input->post("phone_number");
            $email = $this->input->post("email");
            $organisation = $this->input->post("organisation");
            $date_of_birth = $this->input->post("date_of_birth");
            $this->ModelRegistration->changeMyProfile($iduser, $first_name, $last_name, $phone_number, $email, $organisation, $date_of_birth);
            redirect("User/myProfile");
        } else {
            $idUser = $this->session->userdata("user")->username;
            $mydata = $this->ModelUser->myProfile($idUser);
            $data['mydata'] = $mydata;
            $data['controller'] = "User";
            $this->loadView($data, "main/user_editmyprofile.php");
        }
    }

    public function addImage() {
        $this->loadView(array(), "user_myprofile.php");
    }

    public function addingImage() {
        $userID = $this->session->userdata('user')->iduser;
        $config['upload_path'] = './image/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 2048;
        $config['max_height'] = 2048;
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
        $idUser = $this->session->userdata("user")->iduser;
        $project_data = $this->ModelUser->myproject($idUser);
        $data['project_data'] = $project_data;
        $data['controller'] = "User";
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("main/user_project.php", $data);
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
        
         if ($this->uri->segment(3))
            $indexnum = $this->uri->segment(3);
        else
            $indexnum = 0;

        $limit = 3;
        $conferencenum = $this->db->count_all('conference');
        $data['confdatapag'] = $this->Search_model->conference($limit, $indexnum);

        $this->load->library('pagination'); // ovo moze i u  config/autoload.php da se doda
        $this->config->load('bootstrap_pagination'); //moze i u autoload.php

        $config_pagination = $this->config->item('pagination');
        $config_pagination['base_url'] = site_url("User/conferences");
        $config_pagination['total_rows'] = $conferencenum;
        $config_pagination['per_page'] = $limit;
        $config_pagination['next_link'] = 'Next';
        $config_pagination['prev_link'] = 'Prev';

        $this->pagination->initialize($config_pagination);
        $data['links'] = $this->pagination->create_links();

        $data['controller'] = "User";
        $data['info'] = '$info_vesti';
        $this->load->view("template/header_" . $this->controller . ".php", $data);
        $this->load->view("forms/login.php");
        $this->load->view("forms/registration.php");
        $this->load->view("main/guest.php", $data);
        $this->load->view("template/footer.php");
    
        
        
       
    }

    public function get_field() { // dovlacenje liste fileda za konferencije u myNewProject
        
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
        $this->form_validation->set_rules('project_name', 'Project Name', 'required|min_length[4]');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        $this->form_validation->set_rules('field', 'Section', 'required');
        $this->form_validation->set_rules('apstract', 'Apstract', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->newProject(); // ne treba redirect jer na refresh treba da proba da opet nesto doda
        } else {
        //ispravno
        $fieldid = $this->input->post("field");
        $field_name = $this->Search_model->field($fieldid);
        $project_name = $this->input->post("project_name");
        $keywords = $this->input->post("keywords");
        foreach ($field_name as $field) {
            $section_pro .= $field['name_field'];
        }
        $apstract = $this->input->post("apstract");
        $field_idfield = $this->input->post("field");

        $idproject = $this->ModelRegistration->myNewProject($project_name, $keywords, $section_pro, $apstract, $field_idfield);
        $iduser = $this->session->userdata('user')->iduser;
        
        // --------------DODAVANJE FOLDERA ZA KONKRETAN PROJEKAT AKO NE POSTOJI--------------
        if (!is_dir('userProject/'.$idproject)){ 
        mkdir('userProject/'.$idproject, 0777, TRUE);}
        // --------------KONFIGURACIJA ZA SAM FAJL KOJI CE BITI UPLOADOVAN--------------
        $config['upload_path'] = './userProject/'. $idproject .'/';
        $config['allowed_types'] = 'pdf|doc|docx||txt|';
        $config['max_size'] = 2048;
        $config['file_name'] = "project_" . $idproject;
        
        $this->load->library('upload', $config);
        $this->upload->do_upload('fileUpload');
        
        
        
        $successAddProject = $this->session->set_flashdata('successAddProject', 'You have successfully add a new project!');
        $this->ModelRegistration->autor($idproject, $iduser);
        $successAddProject;
        foreach ($_POST['autorslistselect'] as $item) {

            $coautorid = $this->Search_model->findUserByUsername($item);
            foreach ($coautorid as $el) {
                $coautorid2 = $el['iduser'];
            }
            $this->ModelRegistration->autor($idproject, $coautorid2);
        }
        
        redirect("User/index");
        }
    }

}
