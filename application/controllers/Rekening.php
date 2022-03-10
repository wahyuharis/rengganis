<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{

    private $base_url_controller = 'rekening';

    function __construct()
    {
        parent::__construct();
        $userdata = $this->session->userdata();
        $this->load->model('Rekening_model');
    }

    public function index()
    {
        $template = new LTE_Temp();
        $datatables = new Datatables_templib();
        $page_title = 'Rekening';

        //generate culumn title
        $column_title = array(
            'id_rekening',
            'Nama Rekening/E-Wallet',
            'Nomor Rekening',
            'Dokumen',
        );

        $datatables->set_add_url(base_url($this->base_url_controller.'/add'));
        $datatables->set_column_title($column_title);
        $datatables->set_url_serverside($this->base_url_controller . '/datatables_serverside');
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
        $rekening_model = new Rekening_model();

        //handling searching from dttables request
        $search = $datatables->get_search();

        //handle ordering from dttables request
        $ordering_arr = $rekening_model->list_order();
        $datatables->set_order_arr($ordering_arr);
        $orderby = $datatables->orderby();

        //get sql script from model
        $sql_sript = $rekening_model->list_sql($search, $orderby);
        $datatables->set_sql($sql_sript);

        $datatables->set_callback_column(array($this, '_callback_column'));
        $datatables->set_callback_action(array($this, '_callback_action'));

        //response json
        $datatables->response();
    }
    function _callback_action($row)
    {
        $action_btn = '<a href="' . base_url($this->base_url_controller . '/edit/' .  encode_key($row['id_buku_kas_rekening'])) . '" 
						class="btn btn-primary btn-sm" >Edit</a>';
        $action_btn .= ' <a href="#"  delete_id="' . $row['id_buku_kas_rekening'] . '"
						delete_action="' . base_url($this->base_url_controller . "/delete_submit/") . '"
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

        $this->db->update('buku_kas_rekening', ['deleted' => 1], ['id_buku_kas_rekening' => $id]);

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
        if (!empty(trim($primary_id))) {
            $primary_id = decode_key($primary_id);
            $deleted = get_row('buku_kas_rekening', ['id_buku_kas_rekening' => $primary_id])['deleted'];
            if (intval($deleted)) {
                $this->session->set_flashdata('error_message', 'Data Telah Dihapus');
                redirect('rekening');
            }
        }

        $this->load->library('Form_templib');
        $rekening_model = new Rekening_model();

        $template = new LTE_Temp();
        $form_templib = new Form_templib();
        $page_title = 'Rekening';

        $form_templib->set_submit_url($this->base_url_controller . '/submit');
        $form_templib->set_base_url($this->base_url_controller);
        $form_templib->set_form_title($page_title);

        $form = array();
        $form['id_buku_kas_rekening'] = '';
        $form['nama_rekening'] = '';
        $form['nomor_rekening'] = '';
        $form['document'] = '';
     

        if (!empty(trim($primary_id))) {
            $row_data = $rekening_model->get_row($primary_id);

            if ($row_data) {
                $form['id_buku_kas_rekening'] = $row_data['id_buku_kas_rekening'];
                $form['nama_rekening'] = $row_data['nama_rekening'];
                $form['nomor_rekening'] = $row_data['nomor_rekening'];
                $form['document'] = $row_data['document'];
            
            }
        }


        $form_templib->hidden_input('id_buku_kas_rekening', $form['id_buku_kas_rekening']);


        $form_templib->text_input('Nama Rekening/e-wallet', 'nama_rekening', $form['nama_rekening']);
        $form_templib->text_input('Nomor Rekening', 'nomor_rekening', $form['nomor_rekening']);
      
        $form_templib->set_col1();
        //column 1 end


        $form_templib->form_upload('document','document', $form['document']);
        $form_templib->set_col2();


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

        $primary_id = $this->input->post('id_buku_kas_rekening');

        $this->load->library('form_validation');
        $this->form_validation->set_data($post_data);

        $this->form_validation->set_rules('nama_rekening', ucwords('nama kontak'), 'trim|required');

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
                $set['nama_rekening'] = in_post('nama_rekening');
                $set['nomor_rekening'] = in_post('nomor_rekening');
                $set['document'] = in_post('document');


                $this->db->insert('buku_kas_rekening', $set);
            } else {
                //edit
                $set = array();
                $set['nama_rekening'] = in_post('nama_rekening');
                $set['nomor_rekening'] = in_post('nomor_rekening');
                $set['document'] = in_post('document');


                $where = array(
                    'id_buku_kas_rekening' => $primary_id,
                );

                $this->db->update('buku_kas_rekening', $set, $where);
            }
            $this->session->set_flashdata('success_message', 'Data Telah Tersimpan');
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