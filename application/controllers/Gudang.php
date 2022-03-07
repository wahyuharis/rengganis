<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{

    private $url_controller = 'gudang';

    function __construct()
    {
        parent::__construct();
        $userdata = $this->session->userdata();
        $this->load->model('Gudang_model');
    }

    public function index()
    {
        $template = new LTE_Temp();
        $datatables = new Datatables_templib();
        $page_title = 'Gudang';

        //generate culumn title
        $column_title = array(
            'id_gudang',
            'Nama gudang',
            'Kota',
            'Telphone ',
            'lock delete',
        );

        $datatables->set_add_url(base_url($this->url_controller . '/add'));
        $datatables->set_column_title($column_title);
        $datatables->set_url_serverside($this->url_controller . '/datatables_serverside');
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
        $gudang_model = new Gudang_model();

        //handling searching from dttables request
        $search = $datatables->get_search();

        //handle ordering from dttables request
        $ordering_arr = $gudang_model->list_order();
        $datatables->set_order_arr($ordering_arr);
        $orderby = $datatables->orderby();

        //get sql script from model
        $sql_sript = $gudang_model->list_sql($search, $orderby);
        $datatables->set_sql($sql_sript);

        $datatables->set_callback_column(array($this, '_callback_column'));
        $datatables->set_callback_action(array($this, '_callback_action'));

        //response json
        $datatables->response();
    }
    function _callback_action($row)
    {
        $action_btn = '<a href="' . base_url($this->url_controller . '/edit/' . $row['id_gudang']) . '" 
						class="btn btn-primary btn-sm" >Edit</a>';
        $action_btn .= ' <a href="#"  delete_id="' . $row['id_gudang'] . '"
						delete_action="' . base_url($this->url_controller . "/delete_submit/") . '"
						class="btn btn-danger btn-sm delete_handler" >Delete</a>';

        return $action_btn;
    }
    function _callback_column($key, $row, $val)
    {

        if ($key == 'allow_delete') {
            $val ='';
            if (intval($row['allow_delete']) == 0) {
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

        $allow_delete = get_row('gudang', ['id_gudang' => $id])['allow_delete'];

        if ($allow_delete) {
            $this->db->update('gudang', ['deleted' => 1], ['id_gudang' => $id]);
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
        $gudang_model = new Gudang_model();

        $template = new LTE_Temp();
        $form_templib = new Form_templib();
        $page_title = 'Gudang';

        $form_templib->set_submit_url($this->url_controller . '/submit');
        $form_templib->set_base_url($this->url_controller);
        $form_templib->set_form_title($page_title);

        //create opt select
        // $this->db->where('_jabatan.deleted', 0);
        // $db = $this->db->get('_jabatan');
        // $opt_jabatan = arr_to_opt($user_model->get_jabatan(), 'id_jabatan', 'nama_jabatan');
        $opt_kota = $gudang_model->alamat_kota();
        $opt_kota = arr_to_opt($opt_kota, 'id', 'kota');


        $form = array();
        $form['id_gudang'] = '';
        $form['nama_gudang'] = '';
        $form['kota'] = '';
        $form['phone'] = '';
        $form['alamat'] = '';

        if (!empty(trim($primary_id))) {
            $row_data = $gudang_model->get_row($primary_id);

            if ($row_data) {
                $form['id_gudang'] = $row_data['id_gudang'];
                $form['nama_gudang'] = $row_data['nama_gudang'];
                $form['kota'] = $row_data['kota'];
                $form['phone'] = $row_data['phone'];
                $form['alamat'] = $row_data['alamat'];
            }
        }

        // die();

        //column 1 start
        $form_templib->hidden_input('id_gudang', $form['id_gudang']);
        $form_templib->text_input('Nama Gudang', 'nama_gudang', $form['nama_gudang']);
        $form_templib->select_input('Kota', 'kota', $opt_kota, $form['kota']);
        $form_templib->text_input('Phone', 'phone', $form['phone']);

        // $form_templib->select_input_multiple('Jabatan2', 'jabatan2', [1 => 'admin', 2 => 'user'], '');

        $form_templib->set_col1();
        //column 1 end


        //column 2 start
        // $form_templib->date_input('datesample', 'datesample', '');
        // $form_templib->daterange_input('daterangesample', 'daterangesample', '');
        // $form_templib->form_upload('Foto', 'foto', $form['foto']);
        $form_templib->textarea_input('Alamat', 'alamat', $form['alamat']);
        $form_templib->set_col2();
        //column 2 end


        $html = $form_templib->generate();


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

        $primary_id = $this->input->post('id_gudang');

        $this->load->library('form_validation');
        $this->form_validation->set_data($post_data);


        $this->form_validation->set_rules('nama_gudang', ucwords('nama_gudang'), 'trim|required|min_length[5]');
        $this->form_validation->set_rules('kota', ucwords('kota'), 'trim|required');
        $this->form_validation->set_rules('phone', ucwords('phone'), 'trim|required|min_length[11]');



        if ($this->form_validation->run() == FALSE) {
            $success = false;
            $error = $this->form_validation->error_array();
            $message = validation_errors();
        } else {
            $success = true;
        }


        if ($success) {
            if (empty(trim($primary_id))) {
                //add
                $set = array();
                $set['nama_gudang'] = in_post('nama_gudang');
                $set['kota'] = in_post('kota');
                $set['phone'] = in_post('phone');
                $set['alamat'] = in_post('alamat');

                $this->db->insert('gudang', $set);
            } else {
                $set = array();
                $set['nama_gudang'] = in_post('nama_gudang');
                $set['kota'] = in_post('kota');
                $set['phone'] = in_post('phone');
                $set['alamat'] = in_post('alamat');

                $where = array(
                    'id_gudang' => $primary_id,
                );
                $this->db->update('gudang', $set, $where);
            }
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
