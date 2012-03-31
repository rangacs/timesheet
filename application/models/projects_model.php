<?php

Class Projects_model extends CI_Model
{
    var $tbl = 'projects';

	function getAll($sort="ASC")
	{
	    $query = $this->db->order_by('id', $sort)->get($this->tbl);
	    
	    return $query->result();
		
	
	}

	function find($data)
	{
	    $q = $this->db->get_where($this->tbl, $data);
            
            if($q)
            {
                return $q;
            }
            else
            {
                return false;
            }
	}

	function add($data)
	{
            $q = $this->db->insert($this->tbl, $data);
            
            if($q)
            {
                    return true;
            }
            else
            {
                    return false;
            }
	}



}