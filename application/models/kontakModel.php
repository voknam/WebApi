<?php

class kontakModel extends CI_Model
{

	public function getKontak($id = null)
	{
		if ($id === null) {
		   return $this->db->get('telepon')->result_array();
		}else{
		   return $this->db->get_where('telepon', ['id' => $id])->result_array();
		}
	}

}