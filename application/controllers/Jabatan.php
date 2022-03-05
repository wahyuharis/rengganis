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
		$datatables = new Datatables_templib();
		$page_title = 'Jabatan';

		//generate culumn title
		$column_title = array(
			'Nama Jabatan',
		);

		$datatables->set_add_url(base_url('jabatan/add'));
		$datatables->set_column_title($column_title);
		$datatables->set_url_serverside('jabatan/datatables_serverside');
		// $datatables->set_filter_form('#filter-dtt-list');

		$html = '';
		// $html .= load_view_html('user/user_list_filter');
		$html .= $datatables->htmltable();;

		$template->set_content_html($html);
		$template->set_title_page($page_title);

		$template->run();
	}

    
	function datatables_serverside()
	{
		$this->load->model('Jabatan_model');

		// print_r2($_GET);

		$datatables = new Datatables_templib();
		$jabatan_model = new Jabatan_model();

		//handling searching from dttables request
		$search = $datatables->get_search();

		//handle ordering from dttables request
		$ordering_arr = $jabatan_model->list_order();
		$datatables->set_order_arr($ordering_arr);
		$orderby = $datatables->orderby();

		//get sql script from model
		$sql_sript = $jabatan_model->list_sql($search, $orderby);
		$datatables->set_sql($sql_sript);

		$datatables->set_callback_column(array($this, '_callback_column'));
		$datatables->set_callback_action(array($this, '_callback_action'));

		//response json
		$datatables->response();
	}
	function _callback_action($row)
	{
		$action_btn = '<a href="' . base_url('jabatan/edit/' . $row['id_jabatan']) . '" 
						class="btn btn-primary btn-sm" >Edit</a>';
		$action_btn .= ' <a href="#"  delete_id="' . $row['id_jabatan'] . '"
						delete_action="' . base_url("jabatan/delete_submit/") . '"
						class="btn btn-danger btn-sm delete_handler" >Delete</a>';

		return $action_btn;
	}
	function _callback_column($key, $row, $val)
	{

		return $val;
	}

	function delete_submit()
	{
		$id = $this->input->get('id');

		$success = true;
		$html_message = "";
		$data = array();

		$this->db->update('_jabatan', ['deleted' => 1], ['id_jabatan' => $id]);

		$response = array(
			'success' => $success,
			'html_message' => $html_message,
			'data' => $data,
		);
		header_json();
		echo json_encode($response);
	}
}
