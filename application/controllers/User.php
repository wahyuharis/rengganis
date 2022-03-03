<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
		$page_title = 'User';

		//generate culumn title
		$column_title = array(
			'Username',
			'Email',
			'Phone',
			'Fullname'
		);

		$datatables->set_add_url(base_url('user/add'));
		$datatables->set_column_title($column_title);
		$datatables->set_url_serverside('user/datatables_serverside');
		$html = $datatables->htmltable();;

		$template->set_content_html($html);
		$template->set_title_page($page_title);

		$template->run();
	}

	function datatables_serverside()
	{
		$this->load->model('User_model');

		$datatables = new Datatables_templib();
		$user_model = new User_model();

		//handling searching from dttables request
		$search = $datatables->get_search();

		//handle ordering from dttables request
		$ordering_arr = $user_model->user_list_order();
		$datatables->set_order_arr($ordering_arr);
		$orderby = $datatables->orderby();

		//get sql script from model
		$sql_sript = $user_model->user_list_sql($search, $orderby);
		$datatables->set_sql($sql_sript);

		$datatables->set_callback_column(array($this, '_callback_column'));
		$datatables->set_callback_action(array($this, '_callback_action'));

		//response json
		$datatables->response();
	}
	function _callback_action($row)
	{
		$action_btn = '<a href="' . base_url('user/edit/' . $row['id_user']) . '" 
						class="btn btn-primary btn-sm" >Edit</a>';
		$action_btn .= ' <a href="#"  delete_id="' . $row['id_user'] . '"
						delete_action="' . base_url("user/delete_submit/") . '"
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

		$this->db->update('_user', ['deleted' => 1], ['id_user' => $id]);

		$response = array(
			'success' => $success,
			'html_message' => $html_message,
			'data' => $data,
		);
		header_json();
		echo json_encode($response);
	}

	function add(){
		$this->edit('');
	}

	function edit($primary_id='')
	{
		$this->load->library('Form_templib');

		$template = new LTE_Temp();
		$form_templib = new Form_templib();
		$page_title = 'User';

		$form_templib->set_submit_url('user/submit');
		$form_templib->set_base_url('user');
		$form_templib->set_form_title($page_title);

		//column 1 start
		$form_templib->hidden_input('id_user', '');
		$form_templib->text_input('username', 'username', '');
		$form_templib->password_input('password', 'password', '');
		$form_templib->text_input('email', 'email', '');
		$form_templib->text_input('fullname', 'fullname', '');
		$form_templib->select_input('Jabatan', 'jabatan', [1 => 'admin', 2 => 'user'], '');
		// $form_templib->select_input_multiple('Jabatan2', 'jabatan2', [1 => 'admin', 2 => 'user'], '');
		$form_templib->set_col1();
		//column 1 end


		//column 2 start
		// $form_templib->date_input('datesample', 'datesample', '');
		// $form_templib->daterange_input('daterangesample', 'daterangesample', '');
		$form_templib->form_upload('Foto','foto','');
		$form_templib->textarea_input('alamat', 'alamat', '');
		$form_templib->set_col2();
		//column 2 end


		$html = $form_templib->generate();

		$html.=load_view_html('user/edit_custom_script');

		$template->set_content_html($html);
		$template->set_title_page($page_title);

		$template->run();
	}

	function submit()
	{
		//init
		$this->load->library('Form_templib');
		$form_templib = new Form_templib();
		//end init


		//declare response
		$error = array();
		$success = false;
		$message = '';
		$data = array();

		$post_data = $this->input->post();


		$this->load->library('form_validation');
		$this->form_validation->set_data($post_data);

		$this->form_validation->set_rules('username', ucwords('username'), 'trim|required');
		$this->form_validation->set_rules('email', ucwords('email'), 'trim|required|valid_email|is_unique[_user.email]');
		$this->form_validation->set_rules('jabatan', ucwords('jabatan'), 'trim|required');
		// $this->form_validation->set_rules('jabatan2', ucwords('jabatan2'), 'required');

		if ($this->form_validation->run() == FALSE) {
			$success = false;
			$error = $this->form_validation->error_array();
			$message = validation_errors();
		} else {
			$success = true;
		}

		// print_r2($post_data);
		// die();

		$primary_id = $this->input->post('id_user');
		if ($success) {
			if (empty(trim($primary_id))) {
				//add
				$set=array();
				$set['username'] = in_post('username');
				$set['email'] = in_post('email');
				$set['fullname'] = in_post('fullname');
				$set['id_jabatan'] = in_post('jabatan');

				// print_r2($set);

				$this->db->insert('_user', $set);
			} else {
				//edit
				$set=array();
				$set['username'] = in_post('username');
				$set['email'] = in_post('email');
				$set['fullname'] = in_post('fullname');
				$set['id_jabatan'] = in_post('jabatan');

				$where=array(
					'id_user' => $primary_id,
				);

				$this->db->update('_user',$set,$where);
			}
		}

		// sdfjskdfj

		//set response
		$form_templib->set_response_data($data);
		$form_templib->set_response_error($error);
		$form_templib->set_response_message($message);
		$form_templib->set_response_success($success);
		//send response
		$form_templib->response_submit();
	}
}
