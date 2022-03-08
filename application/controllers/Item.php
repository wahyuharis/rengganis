<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

    private $url_controller = 'item';

    function __construct()
    {
        parent::__construct();
        $userdata = $this->session->userdata();
        $this->load->model('Item_model');
    }

    public function index()
    {
        $template = new LTE_Temp();
        $datatables = new Datatables_templib();
        $page_title = 'Item';

        //generate culumn title
        $column_title = array(
            'id_item',
            'kode',
            'Nama Item',
            'Satuan',
            'Harga Jual',
            'Harga Beli',
            'Kategori',

        );

        // $datatables->set_add_url(base_url($this->url_controller . '/add'));
        $datatables->set_column_title($column_title);
        $datatables->set_url_serverside($this->url_controller . '/datatables_serverside');
        // $datatables->set_filter_form('#filter-dtt-list');

        $html = '';
        $html .= load_view_html('item/item_list');
        $html .= $datatables->htmltable();;

        $template->set_content_html($html);
        $template->set_title_page($page_title);

        $template->run();
    }

    function datatables_serverside()
    {

        // print_r2($_GET);

        $datatables = new Datatables_templib();
        $item_model = new Item_model();

        //handling searching from dttables request
        $search = $datatables->get_search();

        //handle ordering from dttables request
        $ordering_arr = $item_model->list_order();
        $datatables->set_order_arr($ordering_arr);
        $orderby = $datatables->orderby();

        //get sql script from model
        $sql_sript = $item_model->list_sql($search, $orderby);
        $datatables->set_sql($sql_sript);

        $datatables->set_callback_column(array($this, '_callback_column'));
        $datatables->set_callback_action(array($this, '_callback_action'));

        //response json
        $datatables->response();
    }
    function _callback_action($row)
    {
        $action_btn = '';

        $action_btn .= '<div style="width:110px">';
        $action_btn .= '<a href="' . base_url($this->url_controller . '/edit/' . $row['id_item']) . '" 
						class="btn btn-primary btn-sm" >Edit</a>';
        $action_btn .= ' <a href="#"  delete_id="' . $row['id_item'] . '"
						delete_action="' . base_url($this->url_controller . "/delete_submit/") . '"
						class="btn btn-danger btn-sm delete_handler" >Delete</a>';
        $action_btn .= '</div>';

        return $action_btn;
    }
    function _callback_column($key, $row, $val)
    {

        if ($key == 'allow_delete') {
            $val = '';
            if (intval($row['allow_delete']) == 0) {
                $val = '<i class="fas fa-lock"></i>';
            }
        }
        if ($key == 'harga_jual') {
            $val = format_currency($val);
            $val = '<div style="width:100%;text-align: right;" >' . $val . '</div>';
        }

        if ($key == 'harga_beli') {
            $val = format_currency($val);
            $val = '<div style="width:100%;text-align: right;" >' . $val . '</div>';
        }

        return $val;
    }

    function delete_submit()
    {
        $id = $this->input->get('id');

        $success = true;
        $html_message = "";
        $data = array();


        $this->db->update('item', ['deleted' => 1], ['id_item' => $id]);

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
        $item_model = new Item_model();

        $template = new LTE_Temp();
        $form_templib = new Form_templib();
        $page_title = 'Item';

        $form_templib->set_submit_url($this->url_controller . '/submit');
        $form_templib->set_base_url($this->url_controller);
        $form_templib->set_form_title($page_title);


        $form = array();
        $form['id_item'] = '';
        $form['kode_item'] = '';
        $form['item_nama'] = '';
        $form['satuan'] = '';
        $form['harga_jual'] = '';
        $form['harga_beli'] = '';
        $form['foto'] = '';
        $form['document'] = '';
        $form['keterangan'] = '';

        if (!empty(trim($primary_id))) {
            $row_data = $item_model->get_row($primary_id);

            if ($row_data) {
                $form['id_item'] = $row_data['id_item'];
                $form['kode_item'] = $row_data['kode_item'];
                $form['item_nama'] = $row_data['item_nama'];
                $form['satuan'] = $row_data['satuan'];
                $form['harga_jual'] = $row_data['harga_jual'];
                $form['harga_beli'] = $row_data['harga_beli'];
                $form['foto'] = $row_data['foto'];
                $form['document'] = $row_data['document'];
                $form['keterangan'] = $row_data['keterangan'];
            }
        }

        // die();

        //column 1 start
        $form_templib->hidden_input('id_item', $form['id_item']);
        $form_templib->text_input('Kode Item', 'kode_item', $form['kode_item']);
        $form_templib->text_input('Nama Item', 'item_nama', $form['item_nama']);
        $form_templib->text_input('Satuan', 'satuan', $form['satuan']);
        $form_templib->text_input('Harga Jual', 'harga_jual', $form['harga_jual']);
        $form_templib->text_input('Harga Beli', 'harga_beli', $form['harga_beli']);



        $form_templib->set_col1();
        //column 1 end


        //column 2 start
        $form_templib->form_upload('Foto', 'foto', $form['foto']);
        $form_templib->form_upload('Dokumen', 'document', $form['document']);
        $form_templib->set_col2();
        //column 2 end

        $form_templib->textarea_input('keterangan', 'keterangan', $form['keterangan']);
        $form_templib->set_col3();

        $html = '';
        $html .= $form_templib->generate();
        $html .= load_view_html('item/item_edit_script');


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

        $primary_id = $this->input->post('id_item');

        $this->load->library('form_validation');
        $this->form_validation->set_data($post_data);


        $this->form_validation->set_rules('kode_item', ucwords('kode item'), 'trim|required|min_length[5]');
        $this->form_validation->set_rules('item_nama', ucwords('nama item'), 'trim|required|min_length[5]');
        $this->form_validation->set_rules('satuan', ucwords('satuan'), 'trim|required|min_length[1]');



        if ($this->form_validation->run() == FALSE) {
            $success = false;
            $error = $this->form_validation->error_array();
            $message = validation_errors();
        } else {
            $success = true;
        }

        $this->load->helper('currency_helper');
        if ($success) {
            if (empty(trim($primary_id))) {
                //add
                $set = array();
                $set['kode_item'] = in_post('kode_item');
                $set['item_nama'] = in_post('item_nama');
                $set['satuan'] = in_post('satuan');
                $set['harga_jual'] = floatval2(in_post('harga_jual'));
                $set['harga_beli'] = floatval2(in_post('harga_beli'));
                $set['foto'] = in_post('foto');
                $set['document'] = in_post('document');
                $set['keterangan'] = in_post('keterangan');

                $this->db->insert('item', $set);
            } else {
                $set = array();
                $set['kode_item'] = in_post('kode_item');
                $set['item_nama'] = in_post('item_nama');
                $set['satuan'] = in_post('satuan');
                $set['harga_jual'] = floatval2(in_post('harga_jual'));
                $set['harga_beli'] = floatval2(in_post('harga_beli'));
                $set['foto'] = in_post('foto');
                $set['document'] = in_post('document');
                $set['keterangan'] = in_post('keterangan');

                $where = array(
                    'id_item' => $primary_id,
                );
                $this->db->update('item', $set, $where);
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
