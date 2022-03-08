<?php
class Form_templib
{

    private $form_buff = array();

    private $col1_arr = array();
    private $col2_arr = array();
    private $col3_arr = array();

    private $submit_url = '';
    private $base_url = '';

    private $form_title = '';

    //response
    private $res_error = array();
    private $res_success = false;
    private $res_message = '';
    private $res_data = array();
    //response

    function __construct()
    {
    }

    function set_form_title($title)
    {
        $this->form_title = $title;
        return $this;
    }

    function set_submit_url($url)
    {
        $this->submit_url = $url;
        return $this;
    }

    function set_base_url($url)
    {
        $this->base_url = $url;
        return $this;
    }


    function set_col1()
    {
        $arr = $this->form_buff;
        $this->col1_arr = $arr;

        $this->form_buff = array();

        return $this;
    }

    function set_col2()
    {
        $arr = $this->form_buff;
        $this->col2_arr = $arr;

        $this->form_buff = array();

        return $this;
    }

    function set_col3()
    {
        $arr = $this->form_buff;
        $this->col3_arr = $arr;

        $this->form_buff = array();

        return $this;
    }

    function hidden_input($name, $value)
    {
        $ci = &get_instance();

        $html = form_hidden($name, $value);

        array_push($this->form_buff, $html);

        return $this;
    }

    function custom_html_input($view_path, $data)
    {
        $ci = &get_instance();

        $html_custom = $ci->load->view($view_path, $data, true);

        $html = '
        <div class="form-group">
        ' . $html_custom . '
        </div>';

        array_push($this->form_buff, $html);

        return $this;
    }

    function text_input($label, $name, $value)
    {
        $ci = &get_instance();

        $html = '
        <div class="form-group">
            <label for="' . $name . '" >' . $label . '</label>
            ' . form_input($name, $value, ' class="form-control" id="' . $name . '" placeholder="' . $label . '" ') . '
        </div>';

        array_push($this->form_buff, $html);

        return $this;
    }

    function password_input($label, $name, $value)
    {
        $ci = &get_instance();

        $html = '
        <div class="form-group">
            <label for="' . $name . '" >' . $label . '</label>
            ' . form_input($name, $value, ' class="form-control password-whenkeyup" id="' . $name . '" placeholder="' . $label . '" ') . '
        </div>';

        array_push($this->form_buff, $html);

        return $this;
    }

    function form_upload($label = '', $name = '', $value = '')
    {
        $ci = &get_instance();

        $html = '';
        // $html = '
        // <div class="form-group">
        //     <label for="' . $name . '" >' . $label . '</label>
        //     ' . form_input($name, $value, ' class="form-control" id="' . $name . '" placeholder="' . $label . '" ') . '
        //     <input type="file" class="form-control-file border" name="'. $name .'-uploader">
        // </div>';
        $dataviews = array(
            'name' => $name,
            'value' => $value,
            'label' => $label,
        );
        $html .= $ci->load->view('template/file_upload', $dataviews, true);

        array_push($this->form_buff, $html);

        return $this;
    }

    function date_input($label, $name, $value)
    {
        $ci = &get_instance();

        $html = '
        <div class="form-group">
            <label for="' . $name . '" >' . $label . '</label>
            ' . form_input($name, $value, ' class="form-control singgle_date_picker_formlib" id="' . $name . '" placeholder="' . $label . '" ') . '
        </div>';

        array_push($this->form_buff, $html);

        return $this;
    }

    function daterange_input($label, $name, $value)
    {
        $ci = &get_instance();

        $html = '
        <div class="form-group">
            <label for="' . $name . '" >' . $label . '</label>
            ' . form_input($name, $value, ' class="form-control date_picker_formlib" id="' . $name . '" placeholder="' . $label . '" ') . '
        </div>';

        array_push($this->form_buff, $html);

        return $this;
    }

    function select_input($label, $name, $option = array(), $value = null)
    {
        $ci = &get_instance();

        $option2 = array(
            null => null,
        );
        foreach ($option as $key => $val) {
            $option2[$key] = $val;
        }

        $html = '
        <div class="form-group">
            <label for="' . $name . '" >' . $label . '</label>
            ' . form_dropdown($name, $option2, $value, ' class="form-control select2-formtemplib" id="' . $name . '" placeholder="' . $label . '" ') . '
        </div>';

        array_push($this->form_buff, $html);

        return $this;
    }

    function select_input_multiple($label, $name, $option = array(), $value = array())
    {
        $ci = &get_instance();

        $html = '
        <div class="form-group">
            <label for="' . $name . '" >' . $label . '</label>
            ' . form_dropdown($name . "[]", $option, $value, ' class="form-control select2-formtemplib"  multiple="multiple" id="' . $name . '" placeholder="' . $label . '" ') . '
        </div>';

        array_push($this->form_buff, $html);

        return $this;
    }

    function textarea_input($label, $name, $value, $summernote = true)
    {
        $ci = &get_instance();

        $is_summernote = '';
        if ($summernote) {
            $is_summernote = 'summernote-textarea';
        }

        $html = '
        <div class="form-group">
            <label for="' . $name . '" >' . $label . '</label>
            ' . form_textarea($name, $value, ' class="form-control ' . $is_summernote . '" style="height:200px" id="' . $name . '" placeholder="' . $label . '" ') . '
        </div>';

        array_push($this->form_buff, $html);

        return $this;
    }

    function set_response_error($error = array())
    {
        $this->res_error = $error;
        return $this;
    }

    function set_response_message($message = '')
    {
        $this->res_message = $message;
        return $this;
    }

    function set_response_data($data = array())
    {
        $this->res_data = $data;
        return $this;
    }

    function set_response_success($success = false)
    {
        $this->res_success = $success;
        return $this;
    }

    function response_submit()
    {
        $ci = &get_instance();

        $response = array(
            'error' => $this->res_error,
            'success' => $this->res_success,
            'message' => $this->res_message,
            'data' => $this->res_data,
        );

        header_json();
        echo json_encode($response);
    }


    function generate()
    {
        $ci = &get_instance();

        $form_data = array();
        $form_data['column1'] = $this->col1_arr;
        $form_data['column2'] = $this->col2_arr;
        $form_data['column3'] = $this->col3_arr;
        $form_data['submit_url'] = $this->submit_url;
        $form_data['base_url'] = $this->base_url;
        $form_data['form_title'] = $this->form_title;

        return $ci->load->view('template/form_temp', $form_data, true);
    }
}
