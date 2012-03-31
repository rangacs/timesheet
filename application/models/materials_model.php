<?php

Class Materials_model extends CI_Model
{
    var $tbl = 'materials';

	function getAll($sort="ASC")
	{
	    $query = $this->db->order_by('matId', $sort)->get($this->tbl);
	    
	    return $query->result();
		
	
	}
	


	// $data = array key => value
	function find($data)
	{
	    $q = $this->db->get_where($this->tbl, $data);
            
            if($q)
            {
                return $q->result();
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
                    throw new Exception('Something went wrong');
            }
	}
	
	function update($data)
        {
            $q = $this->db->where('matId', $id)->update($this->tbl, $data);
            
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