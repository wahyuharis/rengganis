<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{

    private $url_controller = 'sales';

    function __construct()
    {
        parent::__construct();
        $userdata = $this->session->userdata();
        $this->load->model('Sales_model');
    }

    public function index()
    {
        $template = new LTE_Temp();
        $datatables = new Datatables_templib();
        $page_title = 'Sales';

        //generate culumn title
        $column_title = array(
            'id_gudang',
            'Nama Sales',
            'Kota',
            'Telphone ',
            'lock delete',
        );

        // $datatables->set_add_url(base_url($this->url_controller . '/add'));
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
        $gudang_model = new Sales_model();

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
        // $action_btn = '<a href="' . base_url($this->url_controller . '/edit/' . $row['id_gudang']) . '" 
		// 				class="btn btn-primary btn-sm" >Edit</a>';
        // $action_btn .= ' <a href="#"  delete_id="' . $row['id_gudang'] . '"
		// 				delete_action="' . base_url($this->url_controller . "/delete_submit/") . '"
		// 				class="btn btn-danger btn-sm delete_handler" >Delete</a>';
        $action_btn='';

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

        return $val;
    }

}
