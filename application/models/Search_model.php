<?php

class Search_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function fetch_data($query) {
        $this->db->select("first_name, last_name, project_name");
        $this->db->from("user, autor, project");
        
        if ($query != '') {
            
            $this->db->like('first_name', $query);
            $this->db->or_like('last_name', $query);
            $this->db->or_like('project_name', $query);
            $this->db->where ('iduser', 'user_iduser');
            $this->db->where ('project_idproject', 'idproject');
            
        }
   return $this->db->get();
    }

    public function conference() {
//$this->db->select('*');
//        $this->db->from("conference");
//        $this->db->select("conference.idconference,conference.title, conference.place,conference.begin, conference.end , field.name_field, "
//                . "conference_has_field.field_idfield,conference_has_field.conference_idconference");
//        $this->db->where("conference_has_field.field_idfield=field.idfield and conference_has_field.conference_idconference=conference.idconference  ");
//        $this->db->group_by("conference.title");

//        $this->db->from("conference");
//        $this->db->select("title, place, begin, end");

        $query = $this->db->get("conference");
        $result=$query->result_array();
        return $result ;
    }

    public function getInfoConf($idconf) {

//        $this->db->select("conference.idconference,conference.title, conference.place,conference.begin, conference.end ");
        $this->db->from("conference");
        $this->db->where("idconference", $idconf);
        $query = $this->db->get();
        return $query->result_array(); //vraca jednu vest
    }

}
