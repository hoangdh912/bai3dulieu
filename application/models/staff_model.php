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
}

/* End of file staff_model.php */
/* Location: ./application/models/staff_model.php */