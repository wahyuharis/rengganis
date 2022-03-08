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
		$config['allowed_types']        = 'gif|jpg|png|pdf|xls|xlsx';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			$message = $this->upload->display_errors();
		} else {
			$data = $this->upload->data();
			$success = true;
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

	function delete()
	{
		$success = false;
		$data = array();
		$error = array();
		$message = '';

		$file_name = $this->input->get('file_name');

		if (!empty(trim($file_name))) {
			$path_to_file = './uploads/' . $file_name;
			if (unlink($path_to_file)) {
				$message = 'deleted successfully';
				$success = true;
			} else {
				$message = 'errors occured';
			}
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
