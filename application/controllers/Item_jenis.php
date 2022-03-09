<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_jenis extends CI_Controller
{

    private $url_controller = 'item_jenis';

    function __construct()
    {
        parent::__construct();
        $userdata = $this->session->userdata();
        $this->load->model('Item_jenis_model');
    }

    public function index()
    {
        $template = new LTE_Temp();
        $datatables = new Datatables_templib();
        $page_title = 'Jenis Item';

        //generate culumn title
        $column_title = array(
            'id_item_jenis',
            'jenis item',
           
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
        $item_jenis = new Item_jenis_model();

        //handling searching from dttables request
        $search = $datatables->get_search();

        //handle ordering from dttables request
        $ordering_arr = $item_jenis->list_order();
        $datatables->set_order_arr($ordering_arr);
        $orderby = $datatables->orderby();

        //get sql script from model
        $sql_sript = $item_jenis->list_sql($search, $orderby);
        $datatables->set_sql($sql_sript);

        $datatables->set_callback_column(array($this, '_callback_column'));
        $datatables->set_callback_action(array($this, '_callback_action'));

        //response json
        $datatables->response();
    }

    function _callback_action($row)
    {
        $action_btn = '<a href="' . base_url($this->url_controller . '/edit/' . $row['id_item_jenis']) . '" 
						class="btn btn-primary btn-sm" >Edit</a>';
        $action_btn .= ' <a href="#"  delete_id="' . $row['id_item_jenis'] . '"
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

    
    function add()
    {
        $this->edit('');
    }

    function edit($primary_id = '')
    {
        $this->load->library('Form_templib');
        $item_jenis = new Item_jenis_model();

        $template = new LTE_Temp();
        $form_templib = new Form_templib();
        $page_title = 'Jenis Item';

        $form_templib->set_submit_url($this->url_controller . '/submit');
        $form_templib->set_base_url($this->url_controller);
        $form_templib->set_form_title($page_title);



        $form = array();
        $form['id_item_jenis'] = '';
        $form['item_jenis_nama'] = '';


        if (!empty(trim($primary_id))) {
            $row_data = $item_jenis->get_row($primary_id);

            if ($row_data) {
                $form['id_item_jenis'] = $row_data['id_item_jenis'];
                $form['item_jenis_nama'] = $row_data['item_jenis_nama'];

            }
        }

        // die();

        //column 1 start
        $form_templib->hidden_input('id_item_jenis', $form['id_item_jenis']);
        $form_templib->text_input('Jenis Item', 'item_jenis_nama', $form['item_jenis_nama']);


        $form_templib->set_col1();
        //column 1 end


        //column 2 start
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

        $primary_id = $this->input->post('id_item_jenis');

        $this->load->library('form_validation');
        $this->form_validation->set_data($post_data);


        $this->form_validation->set_rules('item_jenis_nama', ucwords('item_jenis_nama'), 'trim|required|min_length[3]');

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
                $set['item_jenis_nama'] = in_post('item_jenis_nama');

                $this->db->insert('item_jenis', $set);
            } else {
                $set = array();
                $set['item_jenis_nama'] = in_post('item_jenis_nama');

                $where = array(
                    'id_item_jenis' => $primary_id,
                );
                $this->db->update('item_jenis', $set, $where);
            }
			$this->session->set_flashdata('success_message','Data Telah Tersimpan');

        }


        //set response
        $form_templib->set_response_data($data);
        $form_templib->set_response_error($error);
        $form_templib->set_response_message($message);
        $form_templib->set_response_success($success);
        //send response
        $form_templib->response_submit();
    }

    function delete_submit()
    {
        $id = $this->input->get('id');

        $success = true;
        $html_message = "";
        $data = array();

        // $allow_delete = get_row('gudang', ['id_gudang' => $id])['allow_delete'];

        // if ($allow_delete) {
            $this->db->update('item_jenis', ['deleted' => 1], ['id_item_jenis' => $id]);
        // }

        $response = array(
            'success' => $success,
            'html_message' => $html_message,
            'data' => $data,
        );
        header_json();
        echo json_encode($response);
    }
}