<?php

Class Hours_model extends CI_Model
{
        var $tbl = 'hours';
	
	function add_hours($data)
        {

	    $query = $this->db->insert($this->tbl, $data);
            
            if($query)
            {
                return true;
            }
            else
            {
                return false;
            }
	
	}
        
        function getAll()
        {
            $query = $this->db->get($this->tbl);
            
            return $query->result();
        }
	
	function getAllGroup()
	{

		$this->db->group_by((array("date", "project_id")));
		$query = $this->db->get($this->tbl);
		
		return $query->result();
	}
        
	function find($data)
	{
	    $q = $this->db->get_where($this->tbl, $data);
            
            if($q->num_rows > 0)
            {
                return $q->result();
            }
            else
            {
                return false;
            }
	}
        
        function update($id, $data)
        {
            $q = $this->db->where('id', $id)->update($this->tbl, $data);
            
            if($q)
            {
                return true;
            }
            else
            {
                return false;
            }
            
        }
	
	function delete($id)
	{
		$q = $this->db->where('id', $id)->delete($this->tbl, $data);
		
		if($q)
            {
                return true;
            }
            else
            {
                return false;
            }
	}
	
	function sumweek($user)
	{
		$this->db->select('week, sum(hours) as hours');
		$this->db->where('user_id', $user);
		$this->db->group_by('week');
		
		$result = $this->db->get('hours');
		
		return $result->result();
	}
	
}