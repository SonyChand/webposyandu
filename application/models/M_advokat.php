<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_advokat extends CI_Model {

	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_advokat');
		$this->db->order_by('id_advokat','DESC');
		return $this->db->get()->result();
		
		
	}

	public function add($data)
	{
		$this->db->insert('tbl_advokat', $data);
	}

	
}

/* End of file M_advokat.php */
