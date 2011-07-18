<?php
class Device_model extends CI_Model {

    var $table = 'apns_devices';

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
   		$this->db->where('pid',$data['pid']);
   		$this->db->update($this->table,$data);
   	}
   	
   	function mass_update($ids, $data)
   	{
   		if(count($ids) == 0)
   			return;
   		$i = 0;
   		foreach($ids as $id) {
   			if($i == 0)
   				$this->db->where('pid',$id);
   			else
   				$this->db->or_where('pid',$id);
   			$i++;
   		}
   		$this->db->update($this->table,$data);
   	}
   	
   	function delete($id)
   	{
   		$this->db->where('pid',$id);
   		$this->db->delete($this->table);
   	}
   	
   	function mass_delete($ids)
   	{
   		if(count($ids) == 0)
   			return;
   		$i = 0;
   		foreach($ids as $id) {
   			if($i == 0)
   				$this->db->where('pid',$id);
   			else
   				$this->db->or_where('pid',$id);
   			$i++;
   		}
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