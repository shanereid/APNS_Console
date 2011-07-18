<?php
class Devices_model extends CI_Model {

    var $table = 'users';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   	function insert($data)
   	{
   		if ($this->db->insert($this->table,$data)) {
   			return $data;
   		} else {
   			return false;
   		}
   	}
   	
   	function update($data)
   	{
   		$this->db->where('id',$data['id']);
   		$this->db->update($this->table,$data);
   	}
   	
   	function delete($id)
   	{
   		$this->db->where('id',$id);
   		$this->db->delete($this->table);
   	}
   	
   	function get($filter=false)
   	{
   		if($filter)
   			$this->db->where($filter);
   		$query = $this->db->get($this->table);
   		return $query->result();
   	}
}
?>