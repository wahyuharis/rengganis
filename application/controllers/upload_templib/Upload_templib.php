<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_templib extends CI_Controller
{

	// assets/upload

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// print_r2($_FILES);
		$success = false;
		$data = array();
		$error = array();
		$message = '';

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			$error = $this->upload->display_errors();
		} else {
			$data = $this->upload->data();
			$success=true;
		}

		header_json();
		$response = array(
			'success' => $success,
			'data' => $data,
			'error' => $error,
			'message' => $message,
		);
		echo json_encode($response);
	}
}
