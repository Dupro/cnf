<?php

class Search_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function fetch_data($var) {
        $query = $this->db->query("SELECT u.first_name, u.last_name, p.project_name FROM autor as a
            join user as u on u.iduser = a.user_iduser
            join project as p on p.idproject = a.project_idproject where
u.first_name LIKE '%{$var}%' OR u.last_name LIKE '%{$var}%' OR
p.project_name LIKE '%{$var}%'");

//$query= $this->db->query("SELECT first_name, last_name, project_name FROM user, autor, project
//WHERE iduser=user_iduser AND project_idproject= idproject and
//first_name LIKE '%{$var}%' OR last_name LIKE '%{$var}%' OR
//project_name LIKE '%{$var}%'"); lik kida radi sve drugi nacin
        return $query->result();
    }

//$limit = FALSE, $offset = FALSE
    public function conference($limit = 1000, $pocetak = 0) {
        if ($limit) {
            $query = $this->db->get('conference', $limit, $pocetak);
        } else {
            $query = $this->db->get();
        }
//prikazujem prvih deset vesti
        $result = $query->result_array(); //vraca niz vesti
        return $result;
    }

    public function users() {

        $query = $this->db->get("user");
        $result = $query->result_array();
        return $result;
    }

    public function getInfoConf($idconf) {

//        $this->db->select("conference.idconference,conference.title, conference.place,conference.begin, conference.end ");
        $this->db->from("conference");
        $this->db->where("idconference", $idconf);
        $query = $this->db->get();
        return $query->result_array(); //vraca jednu vest
    }

    public function conference_fieldlist($param) {
        $query = $this->db->query("Select name_field from field, conference_has_field, conference
where idconference=conference_idconference and idfield=field_idfield and title='$param'");
        $result = $query->result();
        return $result;
    }

    public function get_country_query() {
        $query = $this->db->get('conference');
        return $query->result();
    }

    public function get_province_query($idconference) {
        $query = $this->db->query("Select name_field, idfield from field, conference_has_field, conference
where idconference=conference_idconference and idfield=field_idfield and idconference='$idconference'");
        return $query->result();
    }

    public function field($idfield) {
        $this->db->from("field");
        $this->db->where("idfield", $idfield);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function all_field(){
        $query= $this->db->get('field');
        return $query->result_array();
    }

    public function findUserByUsername($username) {
        $query = $this->db->query("Select iduser from user where  username='$username'");
        $result = $query->result_array();
        return $result;
    }
    public function myconference($iduser,$limit = 1000, $pocetak = 0) {

            $query = $this->db->query('SELECT * FROM user, user_has_conference, conference 
WHERE iduser='.$iduser. ' and user_iduser='.$iduser. ' and idconference =conference_idconference LiMIT '.$limit.' OFFSET '.$pocetak.'');
  
        $result = $query->result_array(); //vraca niz vesti
        return $result;
    
    }
    public function myprojectofconf($idconference){
        $query = $this->db->query("SELECT * FROM conference, conference_has_project, project, user, autor
where idconference=conference_idconference and idproject=conference_has_project.project_idproject and idproject=autor.project_idproject and iduser=autor.user_iduser and project.core=user.iduser  and idconference=".$idconference." and status!='5'");
        $result = $query->result_array(); 
        return $result;
    }
    public function delete_projectformconf($param) {
        $this->db->where('idproject', $param);
        $this->db->set("status", "5");
        $this->db->update('project');
    }
     public function add_projectformconf() {
         $query = $this->db->query("SELECT * FROM conference, conference_has_project, project, user, autor
where idconference=conference_idconference and idproject=conference_has_project.project_idproject and idproject=autor.project_idproject and iduser=autor.user_iduser and project.core=user.iduser  and idconference=".$idconference." and status='5'");

         $result = $query->result_array(); 
        return $result;
     }
 }
