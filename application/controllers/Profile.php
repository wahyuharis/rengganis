<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$userdata = $this->session->userdata();

		// print_r2($userdata);

	}

	public function index()
	{
		$primary_id = $this->session->userdata('id_user');

		$this->load->library('Form_templib');
		$this->load->model('User_model');
		$user_model = new User_model();

		$template = new LTE_Temp();
		$form_templib = new Form_templib();
		$page_title = 'Profile';

		$form_templib->set_submit_url('profile/profile_submit');
		$form_templib->set_base_url('profile');
		$form_templib->set_form_title($page_title);


		$this->load->model('Gudang_model');
		$gudang_model = new Gudang_model();
		$opt_kota_arr = $gudang_model->alamat_kota();
		$opt_kota = arr_to_opt($opt_kota_arr, 'id', 'kota');


		$form = array();

		$row_data = $user_model->get_user_row($primary_id);

		if ($row_data) {
			$form['id_user'] = $row_data['id_user'];
			$form['phone'] = $row_data['phone'];
			$form['fullname'] = $row_data['fullname'];
			$form['kota'] =  $row_data['kota'];
			$form['alamat'] = $row_data['alamat'];
			$form['foto'] = $row_data['foto'];
		}

		// die();

		//column 1 start
		$form_templib->hidden_input('id_user', $form['id_user']);
		$form_templib->text_input('phone', 'phone', $form['phone']);
		$form_templib->text_input('fullname', 'fullname', $form['fullname']);
		$form_templib->select_input('Kota', 'kota', $opt_kota, $form['kota']);

		$form_templib->set_col1();
		//column 1 end

		$form_templib->textarea_input('alamat', 'alamat', $form['alamat']);
		$form_templib->set_col2();
		//column 2 end

		$form_templib->form_upload('Foto', 'foto', $form['foto']);
		$form_templib->set_col3();

		$html = "";
		$html .= $form_templib->generate();
		$html .= load_view_html('profile/profile_script');


		$template->set_content_html($html);
		$template->set_title_page($page_title);

		$template->run();
	}

	function profile_submit()
	{
		$this->load->library('Form_templib');
		$form_templib = new Form_templib();
		//end init


		//declare response
		$error = array();
		$success = false;
		$message = '';
		$data = array();

		$post_data = $this->input->post();

		// print_r2($post_data);

		$primary_id = $this->input->post('id_user');

		$this->load->library('form_validation');
		$this->form_validation->set_data($post_data);


		$this->form_validation->set_rules('phone', ucwords('phone'), 'trim|required|min_length[10]');
		$this->form_validation->set_rules('fullname', ucwords('fullname'), 'trim|required|min_length[5]');
		$this->form_validation->set_rules('kota', ucwords('kota'), 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$success = false;
			$error = $this->form_validation->error_array();
			$message = validation_errors();
		} else {
			$success = true;
		}


		if ($success) {

			$set = array();
			$set['phone'] = in_post('phone');
			$set['fullname'] = in_post('fullname');
			$set['kota'] = in_post('kota');
			$set['alamat'] = in_post('alamat');
			$set['foto'] = in_post('foto');

			$where = array(
				'id_user' => $primary_id,
			);
			$this->db->update('_user', $set, $where);
		}


		//set response
		$form_templib->set_response_data($data);
		$form_templib->set_response_error($error);
		$form_templib->set_response_message($message);
		$form_templib->set_response_success($success);
		//send response
		$form_templib->response_submit();
	}
}
