<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $userdata = $this->session->userdata();
    }

    public function index()
    {
        $template = new LTE_Temp();

        $template->set_content('home');
        $template->set_title_page('Jabatan');

        $template->run();
    }
    public function add()
    {
        $this->edit('');
    }
    public function edit($primary_val = '')
    {
        $template = new LTE_Temp();

        $template->set_content('home');
        $template->set_title_page('Jabatan form');

        $template->run();
    }
}
