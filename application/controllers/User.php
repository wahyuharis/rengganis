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
			'id_user',
			'Username',
			'Email',
			'Phone',
			'Fullname',
			'Jabatan',
			"Locked",
		);

		$datatables->set_add_url(base_url('user/add'));
		$datatables->set_column_title($column_title);
		$datatables->set_url_serverside('user/datatables_serverside');
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
		$this->load->model('User_model');

		// print_r2($_GET);

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

		if ($key == 'allow_delete') {
			$val = '';
			if ($row['allow_delete'] . "" == '0') {
				$val = '<i class="fas fa-lock"></i>';
			}
		}

		return $val;
	}

	function delete_submit()
	{
		$id = $this->input->get('id');

		$success = true;
		$html_message = "";
		$data = array();

		$allow_delete = get_row('_user', ['id_user' => $id])['allow_delete'];
		if ($allow_delete) {
			$this->db->update('_user', ['deleted' => 1], ['id_user' => $id]);
		}


		$response = array(
			'success' => $success,
			'html_message' => $html_message,
			'data' => $data,
		);
		header_json();
		echo json_encode($response);
	}

	function add()
	{
		$this->edit('');
	}

	function edit($primary_id = '')
	{
		$this->load->library('Form_templib');
		$this->load->model('User_model');
		$user_model = new User_model();

		$template = new LTE_Temp();
		$form_templib = new Form_templib();
		$page_title = 'User';

		$form_templib->set_submit_url('user/submit');
		$form_templib->set_base_url('user');
		$form_templib->set_form_title($page_title);

		//create opt select
		// $this->db->where('_jabatan.deleted', 0);
		// $db = $this->db->get('_jabatan');
		$opt_jabatan = arr_to_opt($user_model->get_jabatan(), 'id_jabatan', 'nama_jabatan');

		$this->load->model('Gudang_model');
		$gudang_model = new Gudang_model();
		$opt_kota_arr = $gudang_model->alamat_kota();
		$opt_kota = arr_to_opt($opt_kota_arr, 'id', 'kota');


		$form = array();
		$form['id_user'] = '';
		$form['username'] = '';
		$form['password'] = '';
		$form['email'] = '';
		$form['phone'] = '';
		$form['fullname'] = '';
		$form['id_jabatan'] = '';
		$form['foto'] = '';
		$form['kota'] = '';
		$form['alamat'] = '';
		if (!empty(trim($primary_id))) {
			$row_data = $user_model->get_user_row($primary_id);

			if ($row_data) {
				$form['id_user'] = $row_data['id_user'];
				$form['username'] = $row_data['username'];
				$form['password'] = '';
				$form['email'] = $row_data['email'];
				$form['phone'] = $row_data['phone'];
				$form['fullname'] = $row_data['fullname'];
				$form['id_jabatan'] = $row_data['id_jabatan'];
				$form['foto'] = $row_data['foto'];
				$form['kota'] =  $row_data['kota'];
				$form['alamat'] = $row_data['alamat'];
			}
		}

		// die();

		//column 1 start
		$form_templib->hidden_input('id_user', $form['id_user']);
		$form_templib->text_input('username', 'username', $form['username']);
		$form_templib->password_input('password', 'password', $form['password']);
		$form_templib->text_input('email', 'email', $form['email']);
		$form_templib->text_input('phone', 'phone', $form['phone']);
		$form_templib->text_input('fullname', 'fullname', $form['fullname']);
		// $form_templib->select_input_multiple('Jabatan2', 'jabatan2', [1 => 'admin', 2 => 'user'], '');

		$form_templib->set_col1();
		//column 1 end


		//column 2 start
		// $form_templib->date_input('datesample', 'datesample', '');
		// $form_templib->daterange_input('daterangesample', 'daterangesample', '');
		$form_templib->select_input('Jabatan', 'jabatan', $opt_jabatan, $form['id_jabatan']);
		$form_templib->select_input('Kota', 'kota', $opt_kota, $form['kota']);

		$form_templib->textarea_input('alamat', 'alamat', $form['alamat']);
		$form_templib->set_col2();
		//column 2 end

		$form_templib->form_upload('Foto', 'foto', $form['foto']);
		$form_templib->set_col3();


		$html = $form_templib->generate();

		$html .= load_view_html('user/edit_custom_script');

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

		$primary_id = $this->input->post('id_user');

		$this->load->library('form_validation');
		$this->form_validation->set_data($post_data);


		$this->form_validation->set_rules('jabatan', ucwords('jabatan'), 'trim|required');
		$this->form_validation->set_rules('phone', ucwords('phone'), 'trim|required');
		$this->form_validation->set_rules('kota', ucwords('kota'), 'trim|required');

		if (empty(trim($primary_id))) {
			$this->form_validation->set_rules('username', ucwords('username'), 'trim|required|min_length[5]|is_unique[_user.username]');
			$this->form_validation->set_rules('email', ucwords('email'), 'trim|required|valid_email|is_unique[_user.email]');
			$this->form_validation->set_rules('password', ucwords('password'), 'trim|required|min_length[5]');
		}

		if ($this->form_validation->run() == FALSE) {
			$success = false;
			$error = $this->form_validation->error_array();
			$message = validation_errors();
		} else {
			$success = true;
		}

		if(!empty(trim($primary_id)) ){
			$id_jabatan=get_row('_user',['id_user'=>$primary_id ])['id_jabatan'];
			$jabatan=get_row('_jabatan',['id_jabatan'=>$id_jabatan ])['nama_jabatan'];

			$jabatan2=get_row('_jabatan',['id_jabatan'=>in_post('jabatan') ])['nama_jabatan'];

			if($jabatan=='sales' && (!($jabatan2=='sales')) ){
				$success = false;
				$message .= "User Jabatan Sales Tidak Boleh diubah Jabatannya<br>";
				$message .= "Jika Ikin Merubah Jabatan Silahkan Tambahkan User Baru<br>";

				$error['jabatan']="<p>User Jabatan Sales Tidak Boleh diubah Jabatannya<br></p>";
			}
		}

		// var_dump($success);
		// echo $jabatan2;
		// die();

		$this->load->model('Sales_model');
		$sales_model = new Sales_model();
		if ($success) {
			$this->db->trans_start();
			if (empty(trim($primary_id))) {
				//add
				$set = array();
				$set['username'] = in_post('username');
				$set['password'] = md5(in_post('password'));
				$set['email'] = in_post('email');
				$set['phone'] = in_post('phone');
				$set['fullname'] = in_post('fullname');
				$set['id_jabatan'] = in_post('jabatan');
				$set['foto'] = in_post('foto');
				$set['kota'] = in_post('kota');
				$set['alamat'] = in_post('alamat');


				$this->db->insert('_user', $set);
				$id_user = $this->db->insert_id();

				$jabatan = get_row('_jabatan', ['id_jabatan' => in_post('jabatan')])['nama_jabatan'];
				if ($jabatan == 'sales') {
					$set_sales['nama_gudang'] = in_post('username');
					$set_sales['kota'] = in_post('kota');
					$set_sales['phone'] = in_post('phone');
					$set_sales['alamat'] = in_post('alamat');
					$set_sales['id_user'] = $id_user;
					$sales_model->user_sales_add($set_sales);
				}
			} else {
				//edit
				$set = array();
				$set['username'] = in_post('username');

				if (!empty(trim(in_post('password')))) {
					$set['password'] = md5(in_post('password'));
				}

				$set['email'] = in_post('email');
				$set['phone'] = in_post('phone');
				$set['fullname'] = in_post('fullname');
				$set['id_jabatan'] = in_post('jabatan');
				$set['foto'] = in_post('foto');
				$set['kota'] = in_post('kota');
				$set['alamat'] = in_post('alamat');

				$allow_delete = get_row('_user', ['id_user' => $primary_id])['allow_delete'];
				if ($allow_delete) {
					$where = array(
						'id_user' => $primary_id,
					);
					$this->db->update('_user', $set, $where);
				}

				$jabatan = get_row('_jabatan', ['id_jabatan' => in_post('jabatan')])['nama_jabatan'];
				if ($jabatan == 'sales') {
					$set_sales['nama_gudang'] = in_post('username');
					$set_sales['kota'] = in_post('kota');
					$set_sales['phone'] = in_post('phone');
					$set_sales['alamat'] = in_post('alamat');
					$set_sales['id_user'] = $primary_id;
					$sales_model->user_sales_update($set_sales, $primary_id);
				}
			}
			$this->db->trans_complete();
			$this->session->set_flashdata('success_message','Data Telah Tersimpan');
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
