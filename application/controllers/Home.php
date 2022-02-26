<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$userdata=$this->session->userdata();
		
		// print_r2($userdata);

	}

	public function index()
	{
		$template=new LTE_Temp();

		$template->set_content('home');
		$template->set_title_page('Dashboard');

		$template->run();
	}
}
