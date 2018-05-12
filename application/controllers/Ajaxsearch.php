<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("ModelUser");
        $this->load->model('ModelRegistration');
        $this->load->model("Search_model");
        $this->load->library('session');
        if ($this->session->userdata('user') != NULL)
            redirect("User");
    }

    function index() {
        $data['controler'] = 'Guest';
        $this->load->view('template/header_guest');
        $this->load->view("forms/login.php", $data);
        $this->load->view("forms/registration.php", $data);
        $this->load->view('ajaxsearch');
        $this->load->view('template/footer');
    }

    function fetch() {
        $output = '';
        $query = '';
        $this->load->model('Search_model');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->ajaxsearch_model->fetch_data($query);
        $output .= '
		<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>First name</th>
							<th>Last name</th>

						</tr>
		';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
						<tr>
							<td>' . $row->first_name . '</td>
							<td>' . $row->last_name . '</td>
							
						</tr>
				';
            }
        } else {
            $output .= '<tr>
							<td colspan="5">No Data Found</td>
						</tr>';
        }
        $output .= '</table>';
        echo $output;
    }

}
