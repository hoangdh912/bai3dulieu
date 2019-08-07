<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class staff_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert($name, $age, $phone, $avatar, $linkfb, $order_number )
	{
		// Get data and update mysql
		$data = [
		    'name' => $name, 
		    'age' => $age,
		    'phone' => $phone,
		    'order_number' => $order_number,
		    'linkfb' => $linkfb, 
		    'avatar' => $avatar
		];

		$this->db->insert('staff', $data);
		return $this->db->insert_id();
	}

	public function getAll()
	{
		$this->db->select('*');
		$data = $this->db->get('staff');
		$data = $data->result_array();
		return $data;
	}

	public function getDataByID($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data = $this->db->get('staff');
		$data = $data->result_array();
		return $data;
	}

	public function updateByID($id, $name, $age, $phone, $avatar, $linkfb, $order_number)
	{
		$updateData = [
		    'name' => $name, 
		    'age' => $age,
		    'phone' => $phone,
		    'order_number' => $order_number,
		    'linkfb' => $linkfb, 
		    'avatar' => $avatar
		];

		$this->db->where('id', $id);
		return $this->db->update('staff', $updateData);		
	}

	public function deleteByID($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('staff');
	}
}

/* End of file staff_model.php */
/* Location: ./application/models/staff_model.php */