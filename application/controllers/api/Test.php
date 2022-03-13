<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Test extends CI_Controller
{

    private $url_controller = 'item';

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $error = array();
        $success = false;
        $message = '';
        $data = array();

        $this->db->limit(100);
        $db = $this->db->get('item');

        $success = true;

        $data = $db->result_array();


        header_cross_domain();
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
