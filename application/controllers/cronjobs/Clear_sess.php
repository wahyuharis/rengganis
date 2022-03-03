<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clear_sess extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->db->from('__ci_sessions');
        $this->db->truncate();
    }
}
