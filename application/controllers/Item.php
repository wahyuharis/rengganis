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
            'Nama Item',
            'Satuan',
            'Harga Jual',
            'Harga Beli',
            'Kategori',
            'Foto',
            'Dokumen'
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
        $action_btn = '<a href="' . base_url($this->url_controller . '/edit/' . $row['id_item']) . '" 
						class="btn btn-primary btn-sm" >Edit</a>';
        $action_btn .= ' <a href="#"  delete_id="' . $row['id_item'] . '"
						delete_action="' . base_url($this->url_controller . "/delete_submit/") . '"
						class="btn btn-danger btn-sm delete_handler" >Delete</a>';

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
            $val = '<div style="width:100%;text-align: right;" >'.$val.'</div>';
            
        }

        if ($key == 'harga_beli') {
            $val = format_currency($val);
            $val = '<div style="width:100%;text-align: right;" >'.$val.'</div>';
            
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
        $item_model = new Item_model();

        $template = new LTE_Temp();
        $form_templib = new Form_templib();
        $page_title = 'Gudang';

        $form_templib->set_submit_url($this->url_controller . '/submit');
        $form_templib->set_base_url($this->url_controller);
        $form_templib->set_form_title($page_title);


        $form = array();
        $form['id_gudang'] = '';
        $form['nama_gudang'] = '';
        $form['kota'] = '';
        $form['phone'] = '';
        $form['alamat'] = '';

        if (!empty(trim($primary_id))) {
            $row_data = $item_model->get_row($primary_id);

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
}
