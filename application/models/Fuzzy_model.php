<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fuzzy_model extends CI_Model
{

	function get_kode()
	{
	    $this->db->select('RIGHT(data.id,4) as kode', FALSE);
	    $this->db->order_by('id','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('data');
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "data-".$kodemax;
		return $kodejadi;  
    }

    function fuzzy($datadbfuzzy)
	{	
		$this->db->insert('fuzzy', $datadbfuzzy);
	}

	function insert_excel($data)
	{	
		$this->db->insert_batch('data', $data);
	}

	function get_by_id($id)
	{	
		$this->db->where('id_fuzzy', $id);
    	return $this->db->get('data')->result_array();
	}

	function get_by_datailid($id)
	{	
		$this->db->where('id', $id);
    	return $this->db->get('data')->row_array();
	}
}