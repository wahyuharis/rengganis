<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function index()
	{
		$this->load->library('LTE_Temp');

		$this->load->view('template/template');
	}
}
