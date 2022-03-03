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
		$config['upload_path']          = './assets/upload/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			$error = $this->upload->display_errors();
			print_r2($error);

		} else {
			$data = $this->upload->data();
			print_r2($data);
		}
	}
}
