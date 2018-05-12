<?php

class Search_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function fetch_data($query) {
        $this->db->select("first_name, last_name, organisation");
        $this->db->from("user");
        if ($query != '') {
            $this->db->like('first_name', $query);
            $this->db->or_like('last_name', $query);
            $this->db->or_like('organisation', $query);
        }

        return $this->db->get();
    }

    public function conference() {
        $this->db->from("conference");
        $this->db->select("title, place,begin, end");
        $query = $this->db->get();
        return $query->result_array();
    }

}
