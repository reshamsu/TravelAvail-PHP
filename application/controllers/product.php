<?php

class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Load form helper library
		$this->load->helper('form');
		// Load form validation library
		$this->load->library('form_validation');
		// Load session library
		$this->load->library('session');
		//load url library
		$this->load->helper('url');

		date_default_timezone_set("Asia/colombo");
		//	$this->load->model('user_model');

		$this->load->model('Product_model');
		$this->load->library('upload');
	}

	public function index()
	{
		$this->load->view('/product/product_view');
	}

	public function addNewCategory()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('product/product_view');
		} else {
			echo "success";
			// print_r($_POST);
			$current_date = date('Y-m-d');
			// associative array

			// print_r($data_product);
			// pass this array to model
			// $this->load->view('formsuccess');
		}

		print_r($_FILES);
		// print_r($_POST);
		$new_name = time() . $_FILES["userfile"]['name'];

		$data_product = array(
			'id' => NULL,
			'title' => $_POST['title'],
			'description' => $_POST['description'],
			'image' => $new_name,
			'created_date' =>  $current_date
		);

		$config = array(
			'upload_path' => './uploads/image/',
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			// 'max_height' => "768",
			// 'max_width' => "1024",
			'file_name' => $new_name
		);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload()) {
			$data = array('upload_data' => $this->upload->data());
			echo "success";
			$result = $this->Product_model->addproduct($data_product);
			if ($result) {
				$data_product = array(
					'success' => 'Product Added Successfully'
				);
				$this->load->view('product/product_view', $data_product);
			} else {
				$data_product = array(
					'error' => 'Product Exist. Please try again'
				);
				$this->load->view('product/product_view', $data_product);
			}
		} else {
			$error = array('error' => $this->upload->display_errors());
			//echo $config['upload_path'];
			print_r($error);
			//$this->load->view('custom_view', $error);
		}
	}
}
