<?php
defined('BASEPATH') or exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

        $html = load_view_html('item/item_list');
        $datatables->set_custom_button_html($html);

        $html = '';
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
        $datatables->set_total_row($item_model->get_total_row($search));
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
        $action_btn .= '<a href="' . base_url($this->url_controller . '/edit/' . encode_key($row['id_item'])) . '" 
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

        if ($key == 'jenis_item') {
            $jenis_arr = explode(',', $val);
            $html_res = '';
            foreach ($jenis_arr as $ij) {
                $html_res .= ' <span  class="badge badge-pill badge-secondary">' . $ij . '</span> ';
            }

            $val = '<div style="width:180px;display:block;" >' . $html_res . '</div>';
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
        if (!empty(trim($primary_id))) {
            $primary_id = decode_key($primary_id);

            $deleted = get_row('item', ['id_item' => $primary_id])['deleted'];
            if (intval($deleted)) {
                $this->session->set_flashdata('error_message', 'Data Telah Dihapus');
                redirect('item');
            }
        }

        $this->load->library('Form_templib');
        $item_model = new Item_model();

        $template = new LTE_Temp();
        $form_templib = new Form_templib();
        $page_title = 'Item';

        $form_templib->set_submit_url($this->url_controller . '/submit');
        $form_templib->set_base_url($this->url_controller);
        $form_templib->set_form_title($page_title);

        $opt_item_jenis = array();
        $opt_item_jenis_arr = $item_model->get_item_jenis();

        if ($opt_item_jenis_arr) {
            $opt_item_jenis = arr_to_opt($opt_item_jenis_arr, 'id_item_jenis', 'item_jenis_nama');
        }

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
        $form['item_jenis'] = array();
        $form['opt_item_jenis'] = $opt_item_jenis;

        if (!empty(trim($primary_id))) {
            $row_data = $item_model->get_row($primary_id);
            $item_jenis_selected = $item_model->get_item_jenis_selected($primary_id);

            // print_r2($item_jenis_selected);

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
                $form['item_jenis'] = $item_jenis_selected;
                $form['opt_item_jenis'] = $opt_item_jenis;
            }
        }

        // die();

        //column 1 start
        $form_templib->hidden_input('id_item', $form['id_item']);
        $form_templib->text_input('Kode Item', 'kode_item', $form['kode_item']);
        $form_templib->text_input('Nama Item', 'item_nama', $form['item_nama']);
        $form_templib->text_input('Satuan', 'satuan', $form['satuan']);
        $form_templib->select_input_multiple('Jenis Item', 'item_jenis', $opt_item_jenis, $form['item_jenis']);
        $form_templib->set_col1();
        //column 1 end


        //column 2 start
        $form_templib->text_input('Harga Jual', 'harga_jual', $form['harga_jual']);
        $form_templib->text_input('Harga Beli', 'harga_beli', $form['harga_beli']);
        $form_templib->textarea_input('keterangan', 'keterangan', $form['keterangan']);
        $form_templib->set_col2();
        //column 2 end


        $form_templib->form_upload('Foto', 'foto', $form['foto']);
        $form_templib->form_upload('Dokumen', 'document', $form['document']);
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

        $item_jenis = $this->input->post('item_jenis');
        if ($success) {
            if (is_array($item_jenis) && count($item_jenis) > 0) {
                $success = true;
            } else {
                $success = false;
                $message .= "<br>Item Jenis Kosong";
                $error['item_jenis[]'] = "Item Jenis Kosong";
            }
        }

        $foto = in_post('foto');
        if ($success && strlen(trim($foto)) > 0) {
            $foto_arr = explode('.', $foto);
            $foto_ext = end($foto_arr);
            $foto_ext = strtolower($foto_ext);

            if (in_array($foto_ext, ['jpg', 'jpeg', 'png'])) {
                $success = true;
            } else {
                $success = false;
                $message .= "<br>Format Foto yang diupload hanya boleh jpg dan png";
            }
        }

        $documen = in_post('document');
        if ($success && strlen(trim($documen)) > 0) {
            $documen_arr = explode('.', $documen);
            $documen_ext = end($documen_arr);
            $documen_ext = strtolower($documen_ext);

            if (in_array($documen_ext, ['pdf'])) {
                $success = true;
            } else {
                $success = false;
                $message .= "<br>Format Dokumen yang diupload hanya boleh pdf";
            }
        }

        $this->load->helper('currency_helper');
        if ($success) {
            $this->db->trans_start();
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
                $insert_id = $this->db->insert_id();

                if (is_array($item_jenis)) {
                    foreach ($item_jenis as $ij) {
                        $this->db->insert('item_rel_item_jenis', ['id_item' => $insert_id, 'id_item_jenis' => $ij]);
                    }
                }
                // foreach($this->input->post('item_jenis'))

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
                $insert_id = $primary_id;

                if (is_array($item_jenis)) {

                    $this->db->where('id_item', $insert_id);
                    $this->db->delete('item_rel_item_jenis');

                    foreach ($item_jenis as $ij) {
                        $this->db->insert('item_rel_item_jenis', ['id_item' => $insert_id, 'id_item_jenis' => $ij]);
                    }
                }
            }
            $this->db->trans_complete();
            $this->session->set_flashdata('success_message', 'Data Telah Berhasil Di Simpan');
        }


        //set response
        $form_templib->set_response_data($data);
        $form_templib->set_response_error($error);
        $form_templib->set_response_message($message);
        $form_templib->set_response_success($success);
        //send response
        $form_templib->response_submit();
    }

    function import()
    {
        $template = new LTE_Temp();

        // $template->set_content('home');
        $template->set_title_page('Import Item');

        $data_view = array();
        $html = load_view_html('item/item_import', $data_view);

        $template->set_content_html($html);

        $template->run();
    }

    function import_submit()
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
        $truncate_table = in_post('truncate_table');

        $config['upload_path']          = './import/upload/';
        $config['allowed_types']        = 'xlsx';
        $config['file_name']        = 'item_' . uniqid();
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('excel_import')) {
            $message = $this->upload->display_errors();
        } else {
            $upload_data = $this->upload->data();
            $success = true;
        }

        // print_r2($truncate_table);
        if (empty(trim($truncate_table))) {
            $success = false;
            $message = "<p>Anda Belum Menentukan apakah tabel akan dikosongkan atau tidak</p>";
        }

        if ($success) {
            $file_name = $upload_data['file_name'];
            $spreadsheet = new Spreadsheet();

            $inputFileType = 'Xlsx';
            $inputFileName = './import/upload/' . $file_name;

            /**  Create a new Reader of the type defined in $inputFileType  **/
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
            /**  Advise the Reader that we only want to load cell data  **/
            $reader->setReadDataOnly(true);

            $reader->setLoadSheetsOnly('input_item');
            $spreadsheet = $reader->load($inputFileName);

            $worksheet = $spreadsheet->getActiveSheet();
            // echo "<pre>";
            $excel_data = $worksheet->toArray();

            // print_r2($excel_data);
            //CHECK FORMAT

            if (is_array($excel_data)) {
                $success = true;
            } else {
                $success = false;
                $message = "Data Excel Tidak Terbaca";
            }

            if ($success) {
                $i = 0;
                // $buff=array();
                $this->db->trans_start();
                if ($truncate_table == 'Y') {
                    $this->db->truncate('item');
                    // $this->db->truncate('item_jenis');
                    $this->db->truncate('item_rel_item_jenis');
                }

                foreach ($excel_data as $row) {
                    if ($i > 3) { //iteration start
                        $set['kode_item'] = trim($row[0]);
                        $set['item_nama'] = trim($row[1]);
                        $set['satuan'] = trim($row[2]);
                        $set['harga_jual'] = floatval2($row[3]);
                        $set['harga_beli'] = floatval2($row[4]);
                        $set['foto'] = trim($row[6]);
                        $set['document'] = trim($row[7]);
                        $set['keterangan'] = trim($row[8]);

                        $import_process = true;
                        if (empty(trim($row[0]))) {
                            $import_process = false;
                        }
                        if (empty(trim($row[1]))) {
                            $import_process = false;
                        }
                        if (empty(trim($row[2]))) {
                            $import_process = false;
                        }
                        if (empty(trim($row[3]))) {
                            $import_process = false;
                        }
                        if (empty(trim($row[4]))) {
                            $import_process = false;
                        }

                        if ($import_process) {
                            $this->db->insert('item', $set);
                            $insert_id = $this->db->insert_id();

                            $jenis_item_arr = explode('/', $row[5]);
                            foreach ($jenis_item_arr as $row2) {
                                $dbjenis = $this->db->get_where('item_jenis', ['item_jenis_nama' => $row2]);
                                $id_dbjenis = false;
                                if ($dbjenis->num_rows() > 0) {
                                    $id_dbjenis = $dbjenis->row()->id_item_jenis;
                                } else {
                                    $this->db->insert('item_jenis', ['item_jenis_nama' => trim($row2)]);
                                    $id_dbjenis = $this->db->insert_id();
                                }

                                if ($id_dbjenis) {
                                    $rel_jenis = array(
                                        'id_item' => $insert_id,
                                        'id_item_jenis' => $id_dbjenis
                                    );
                                    // $this->db->delete('item_rel_item_jenis',['id_item'=>$insert_id]);

                                    $this->db->insert('item_rel_item_jenis', $rel_jenis);
                                }
                            }
                            // array_push($buff,$set);
                        }
                    }
                    $i++;
                }
                $this->session->set_flashdata('success_message', 'Data Telah Berhasil Di import');
                $this->db->trans_complete();
                // print_r2($buff);
            }
        }



        $form_templib->set_response_data($data);
        $form_templib->set_response_error($error);
        $form_templib->set_response_message($message);
        $form_templib->set_response_success($success);
        //send response
        $form_templib->response_submit();
    }
}
