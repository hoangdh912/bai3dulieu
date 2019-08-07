<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		$this->load->model('staff_model');
		$result = $this->staff_model->getAll();
		$result = [
		    'resultData' => $result
		];

		$this->load->view('staff_view', $result);

		// $this->load->view('staff_view');
	}

	public function staff_add()
	{
		//Get data from view
		$name = $this->input->post('name');
		$age = $this->input->post('age');
		$phone = $this->input->post('phone');
		$order_number = $this->input->post('order_number');
		$linkfb = $this->input->post('linkfb');

		//Get avatar file image
		$target_dir = "fileUpload/";
		$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["avatar"]["size"] > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$avatar = base_url() . "fileUpload/" . basename($_FILES['avatar']['name']);

		//Put data to model
		$this->load->model('staff_model');
		if($this->staff_model->insert($name, $age, $phone, $avatar, $linkfb, $order_number))
		{
			echo "Successful";
			header('Location: ' . base_url() . 'index.php/staff');
		} else {
			echo "Failed";
		}
	}

	public function staff_edit($edit_id)
	{
		$this->load->model('staff_model');
		$result = $this->staff_model->getDataByID($edit_id);
		$result = array('resultData' => $result);
		$this->load->view('staff_edit_view', $result, FALSE);
	}

	public function staff_delete($delete_id)
	{
		$this->load->model('staff_model');
		if($this->staff_model->deleteByID($delete_id))
		{
			header('Location: ' . base_url() . 'index.php/staff');
		}
		else
		{
			echo "Failed";
		}
	}

	public function staff_update()
	{
		//Get data from view
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$age = $this->input->post('age');
		$phone = $this->input->post('phone');
		$order_number = $this->input->post('order_number');
		$linkfb = $this->input->post('linkfb');

		//New avatar upload validation

		//Get avatar file image
		$target_dir = "fileUpload/";
		$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["avatar"]["size"] > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$avatar = basename($_FILES['avatar']['name']);

		//If there are new upload -> update avatar
		if($avatar)
		{
			$avatar = base_url() . "fileUpload/" . basename($_FILES['avatar']['name']);
		} 
		else //If there are no new upload -> keep the same avatar
		{
			$avatar = $this->input->post('avatar2');
		}

		//To model
		$this->load->model('staff_model');
		if($this->staff_model->updateByID($id, $name, $age, $phone, $avatar, $linkfb, $order_number))
		{
			echo "Successful";
			header('Location: ' . base_url() . 'index.php/staff');
		} else {
			echo "Failed";
		}
	}
}

/* End of file staff.php */
/* Location: ./application/controllers/staff.php */