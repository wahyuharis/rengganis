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
		$config['file_ext_tolower']        = true;
		$config['file_name'] 			= 'file_' . date('Y_m_d_H_i_s') . uniqid();
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			$message = $this->upload->display_errors();
		} else {
			$data = $this->upload->data();

			if ($data['is_image']) {
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = './uploads/' . $data['file_name'];
				$config2['new_image'] = './uploads/thumbs/' . $data['file_name'];
				$config2['create_thumb'] = false;
				$config2['maintain_ratio'] = TRUE;
				$config2['width']         = 100;
				$config2['height']       = 100;
				$this->load->library('image_lib', $config2);
				$this->image_lib->resize();
			}

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
			$path_to_file2 = './uploads/thumbs/' . $file_name;
			if (unlink($path_to_file)) {
				$message = 'deleted successfully';
				$success = true;
				unlink($path_to_file2);
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
