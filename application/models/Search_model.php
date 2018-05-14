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

        $this->db->from("conference, field, conference_has_field");
        $this->db->select("conference.idconference,conference.title, conference.place,conference.begin, conference.end , field.name_field, "
                . "conference_has_field.field_idfield,conference_has_field.conference_idconference");
        $this->db->where("conference_has_field.field_idfield=field.idfield and conference_has_field.conference_idconference=conference.idconference  ");
        $this->db->group_by("conference.title");
//
//        $this->db->from("conference");
//        $this->db->select("title, place,begin, end");

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getInfoConf($idconf) {

        $this->db->select("conference.idconference,conference.title, conference.place,conference.begin, conference.end ");
        $this->db->from("conference");
        $this->db->where("conference.idconference", $idconf);
        $query = $this->db->get();
        return $query->result_array(); //vraca jednu vest
    }

}
