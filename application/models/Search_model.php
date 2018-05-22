<?php

class Search_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function fetch_data($var) {
        $query= $this->db->query("SELECT first_name, last_name, project_name FROM user, autor, project
WHERE iduser=user_iduser AND project_idproject= idproject and 
first_name LIKE '%{$var}%' OR last_name LIKE '%{$var}%' OR
project_name LIKE '%{$var}%'");
   return $query->result();
    }


    public function conference($limit=FALSE, $offset=FALSE) {
        if($limit){
             $this->db->limit($limit, $offset);
        }
        $query = $this->db->get("conference");
        $result=$query->result_array();
        return $result ;
    }
     public function users() {

        $query = $this->db->get("user");
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
    public function conference_fieldlist($param) {
        $query= $this->db->query("Select name_field from field, conference_has_field, conference
where idconference=conference_idconference and idfield=field_idfield and title='$param'");
        $result=$query->result();
        return $result;
    }
    public function get_country_query()
	{
		$query = $this->db->get('conference');
		return $query->result();
	}
	public function get_province_query($idconference)
	{
		$query= $this->db->query("Select name_field from field, conference_has_field, conference
where idconference=conference_idconference and idfield=field_idfield and idconference='$idconference'");
		return $query->result();
	}
}
