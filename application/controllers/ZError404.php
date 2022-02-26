<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ZError404 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$template=new LTE_Temp();

		$template->set_content('z404');
		$template->set_title_page('404');

		$template->run();
	}
}
