<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{

    private $base_url_controller = 'kontak';

    function __construct()
    {
        parent::__construct();
        $userdata = $this->session->userdata();
        $this->load->model('Kontak_model');
    }

    public function index()
    {
        $template = new LTE_Temp();
        $datatables = new Datatables_templib();
        $page_title = 'Kontak';

        //generate culumn title
        $column_title = array(
            'Nama kontak',
            'Jenis kontak',
            'Telphone kantor',
            'Whatsapp',
            'Email',
            'Kota'
        );

        $datatables->set_add_url(base_url($this->base_url_controller.'/add'));
        $datatables->set_column_title($column_title);
        $datatables->set_url_serverside($this->base_url_controller.'/datatables_serverside');
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

        // print_r2($_GET);

        $datatables = new Datatables_templib();
        $user_model = new Kontak_model();

        //handling searching from dttables request
        $search = $datatables->get_search();

        //handle ordering from dttables request
        $ordering_arr = $user_model->list_order();
        $datatables->set_order_arr($ordering_arr);
        $orderby = $datatables->orderby();

        //get sql script from model
        $sql_sript = $user_model->list_sql($search, $orderby);
        $datatables->set_sql($sql_sript);

        $datatables->set_callback_column(array($this, '_callback_column'));
        $datatables->set_callback_action(array($this, '_callback_action'));

        //response json
        $datatables->response();
    }
    function _callback_action($row)
    {
        $action_btn = '<a href="' . base_url($this->base_url_controller.'/edit/' . $row['id_kontak']) . '" 
						class="btn btn-primary btn-sm" >Edit</a>';
        $action_btn .= ' <a href="#"  delete_id="' . $row['id_kontak'] . '"
						delete_action="' . base_url($this->base_url_controller."/delete_submit/") . '"
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

        $this->db->update('kontak', ['deleted' => 1], ['id_kontak' => $id]);

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
		$kontak_model = new Kontak_model();

		$template = new LTE_Temp();
		$form_templib = new Form_templib();
		$page_title = 'Kontak';

		$form_templib->set_submit_url($this->base_url_controller.'/submit');
		$form_templib->set_base_url($this->base_url_controller);
		$form_templib->set_form_title($page_title);

		//create opt select
		// $this->db->where('_jabatan.deleted', 0);
		// $db = $this->db->get('_jabatan');
		// $opt_jabatan = arr_to_opt($user_model->get_jabatan(), 'id_jabatan', 'nama_jabatan');


		$form = array();
		$form['id_kontak'] = '';
		$form['nama_kontak'] = '';
		$form['jenis_kontak'] = '';
		$form['telphone_kantor'] = '';
		$form['whatsapp'] = '';
		$form['email'] = '';
		$form['kota'] = '';
		$form['alamat'] = '';

		if (!empty(trim($primary_id))) {
			$row_data = $kontak_model->get_row($primary_id);

			if($row_data){
				$form['id_kontak'] = $row_data['id_kontak'];
				$form['nama_kontak'] = $row_data['nama_kontak'];
				$form['jenis_kontak'] = $row_data['jenis_kontak'];
				$form['telphone_kantor'] = $row_data['telphone_kantor'];
				$form['whatsapp'] = $row_data['whatsapp'];
				$form['email'] = $row_data['email'];
				$form['kota'] = $row_data['kota'];
				$form['alamat'] = $row_data['alamat'];

			}
		}

		// die();

		//column 1 start
		$form_templib->hidden_input('id_kontak', $form['id_kontak']);


		$form_templib->text_input('Nama kontak', 'nama_kontak', $form['nama_kontak']);
		$form_templib->select_input('Jenis kontak', 'jenis_kontak', $kontak_model->jenis_kontak(),$form['jenis_kontak']);
		$form_templib->text_input('Telephone kantor', 'telphone_kantor', $form['telphone_kantor']);
		$form_templib->text_input('Whatsapp', 'whatsapp', $form['whatsapp']);


		// $form_templib->select_input_multiple('Jabatan2', 'jabatan2', [1 => 'admin', 2 => 'user'], '');

		$form_templib->set_col1();
		//column 1 end


        $alamat_kota=arr_to_opt($kontak_model->alamat_kota(),'id','kota');

		//column 2 start
		$form_templib->text_input('Email', 'email', $form['email']);
		// $form_templib->text_input('kota', 'kota', $form['jenis_kontak']);
        $form_templib->select_input('Kota', 'kota', $alamat_kota, $form['kota']);
		$form_templib->textarea_input('Alamat', 'alamat', $form['alamat']);
		$form_templib->set_col2();
		//column 2 end


		$html = $form_templib->generate();

		// $html .= load_view_html('user/edit_custom_script');

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

		$primary_id = $this->input->post('id_kontak');

		$this->load->library('form_validation');
		$this->form_validation->set_data($post_data);


        // print_r2($post_data);

		$this->form_validation->set_rules('nama_kontak', ucwords('nama kontak'), 'trim|required');
		$this->form_validation->set_rules('jenis_kontak', ucwords('jenis kontak'), 'trim|required');
		$this->form_validation->set_rules('whatsapp', ucwords('whatsapp'), 'trim|required');
		$this->form_validation->set_rules('kota', ucwords('kota'), 'trim|required');

		// if (empty(trim($primary_id))) {
		// 	$this->form_validation->set_rules('username', ucwords('username'), 'trim|required|min_length[5]|is_unique[_user.username]');
		// 	$this->form_validation->set_rules('email', ucwords('email'), 'trim|required|valid_email|is_unique[_user.email]');
		// 	$this->form_validation->set_rules('password', ucwords('password'), 'trim|required|min_length[5]');
		// }

		if ($this->form_validation->run() == FALSE) {
			$success = false;
			$error = $this->form_validation->error_array();
			$message = validation_errors();
		} else {
			$success = true;
		}

		// print_r2($post_data);
		// die();

		if ($success) {
			if (empty(trim($primary_id))) {
				//add
				$set = array();
				$set['nama_kontak'] = in_post('nama_kontak');
				$set['jenis_kontak'] = in_post('jenis_kontak');
				$set['telphone_kantor'] = in_post('telphone_kantor');
				$set['whatsapp'] = in_post('whatsapp');
				$set['email'] = in_post('email');
				$set['kota'] = in_post('kota');
				$set['alamat'] = in_post('alamat');
				// print_r2($set);

				$this->db->insert('kontak', $set);
			} else {
				//edit
				$set = array();
				$set['nama_kontak'] = in_post('nama_kontak');
				$set['jenis_kontak'] = in_post('jenis_kontak');
				$set['telphone_kantor'] = in_post('telphone_kantor');
				$set['whatsapp'] = in_post('whatsapp');
				$set['email'] = in_post('email');
				$set['kota'] = in_post('kota');
				$set['alamat'] = in_post('alamat');

				$where = array(
					'id_kontak' => $primary_id,
				);

				$this->db->update('kontak', $set, $where);
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
