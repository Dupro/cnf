<?php
class Ajaxsearch_model extends CI_Model
{
	function fetch_data($query)
	{
		$this->db->select("first_name, last_name, organisation");
		$this->db->from("user");
		if($query != '')
		{
			$this->db->like('first_name', $query);
			$this->db->or_like('last_name', $query);
			$this->db->or_like('organisation', $query);
		
		}
		
		return $this->db->get();
	}
}
?>