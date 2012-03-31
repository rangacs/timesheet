<?php

Class User_model extends CI_Model{
    
    var $tbl = 'users';
    
    function validate()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', sha1($this->input->post('password')));
        
        $query = $this->db->get($this->tbl);
        
        if($query->num_rows == 1)
        {
            $userid = $query->row('id');
            return $userid;
        }
        else
        {
            return false;
        }
    }
    
    
    function getAll()
    {
        $q = $this->db->get($this->tbl);
        
        if($q)
        {
            return $q->result();
        }
        else
        {
            return false;
        }
        
    }
    
    function find($data)
    {
        $q = $this->db->get_where($this->tbl, $data);
        
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        else
        {
            return false;
        }
    }
    
    
}