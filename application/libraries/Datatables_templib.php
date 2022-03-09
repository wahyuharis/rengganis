<?php
class Datatables_templib
{

	private $column_title;
	private $card_title = '';
	private $url_serverside = '';
	private $order_arr = false;
	private $add_url = false;
	private $filter_form_id = false;
	private $total_row = false;

	private $sql = '';
	private $method_callback = false;
	private $method_callback2 = false;


	function set_filter_form($filter_form_id)
	{
		$this->filter_form_id = $filter_form_id;
		return $this;
	}

	function set_url_serverside($url_serverside)
	{
		$this->url_serverside = $url_serverside;
		return $this;
	}

	function set_total_row($total_row = 0)
	{
		$this->total_row = $total_row;
		return $this;
	}

	function get_total_row()
	{
		return $this->total_row;
	}

	function set_add_url($add_url)
	{
		$this->add_url = $add_url;
		return $this;
	}

	function set_sql($sql)
	{
		$this->sql = $sql;
		return $this;
	}

	function set_card_title($card_title)
	{
		$this->card_title = $card_title;
		return $this;
	}

	function get_search()
	{
		$ci = &get_instance();

		$search_arr = $ci->input->get('search');
		$search = '';
		if (isset($search_arr['value'])) {
			$search = trim($search_arr['value']);
		}

		return $search;
	}

	function set_order_arr($arr)
	{

		$this->order_arr = $arr;
		return $this;
	}

	function orderby()
	{
		$ci = &get_instance();
		$order_arr = $ci->input->get('order');
		$sql_order = "";

		// print_r2($order_arr);

		$col_order = false;
		$col_order_direction = '';
		if (is_array($order_arr)) {
			if (isset($order_arr[0]['column'])) {
				$col_order = $order_arr[0]['column'];
				$col_order_direction = $order_arr[0]['dir'];
			}
		}

		if ($col_order) {
			$sql_order = "order by " . $this->order_arr[$col_order - 1] . " " . $col_order_direction;
		}
		// print_r2($sql_order);

		return $sql_order;
	}

	function set_column_title($arr)
	{
		$this->column_title = $arr;
	}

	function htmltable()
	{
		$ci = &get_instance();
		// $column_title0 = array(
		// 	'Username',
		// 	'Email',
		// 	'Phone',
		// 	'Fullname'
		// );
		$column_title0 = $this->column_title;

		$column_title = array(
			'Action'
		);
		foreach ($column_title0 as $row) {
			array_push($column_title, $row);
		}

		$content_data = array();
		$content_data['card_title'] = $this->card_title . " List";
		$content_data['filter_form_id'] = $this->filter_form_id;
		$content_data['thead'] = $column_title;
		$content_data['add_url'] = $this->add_url;
		$content_data['url_serverside'] = $this->url_serverside;

		return $ci->load->view('template/datatables_temp', $content_data, true);
	}

	function set_callback_column($method_arr = array())
	{
		$this->method_callback = $method_arr;
	}

	function set_callback_action($method_arr = array())
	{
		$this->method_callback2 = $method_arr;
	}

	private function callback_column($key, $row, $col)
	{
		if ($this->method_callback) {
			$col = call_user_func_array($this->method_callback, array($key, $row, $col));
		}
		return $col;
	}

	private function callback_action($row)
	{
		$action_btn = '';
		if ($this->method_callback2) {
			$action_btn = call_user_func_array($this->method_callback2, array($row));
		}

		return $action_btn;
	}

	function response()
	{
		$ci = &get_instance();
		$sql = $this->sql;


		$total_row = 0;
		if (!$this->total_row) {
			$db0 = $ci->db->query($sql);
			$total_row = $db0->num_rows();
		}else{
			$total_row=$this->total_row;
		}

		$start = intval($ci->input->get('start'));
		$limit = intval($ci->input->get('length'));

		$sql2 = $sql . "\n" . " limit  " . $start . "," . $limit . " ";

		$db = $ci->db->query($sql2);
		$res = array();
		foreach ($db->result_array() as $row) {
			$row2 = array();

			$action_btn = $this->callback_action($row);

			array_push($row2, $action_btn);
			foreach ($row as $key => $col) {
				$col = $this->callback_column($key, $row, $col);
				array_push($row2, $col);
			}
			array_push($res, $row2);
		}


		$response = array(
			"draw" => $ci->input->get('draw'),
			"recordsTotal" => $total_row,
			"recordsFiltered" => $total_row,
			'data' => $res
		);
		header_json();
		echo json_encode($response);
	}
}
