<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->is_logged_in();
		$this->load->view('template/login');
	}

	function is_logged_in()
	{
		$username = $this->session->userdata('username');
		$password = $this->session->userdata('password');

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$db = $this->db->get('_user');
		if ($db->num_rows() > 0) {

			redirect('home');
		}
	}

	function submit()
	{
		$html_message = '';
		$data = array();
		$success = false;

		$username = in_post('username');
		$password = in_post('password');

		$this->db->where('username', $username);
		$this->db->where('_user.deleted', 0);
		$db = $this->db->get('_user');
		if ($db->num_rows() < 1) {
			$success = false;
			$html_message = "username tidak ditemukan";
		} else {
			$success = true;
		}

		if ($success) {
			$this->db->where('username', $username);
			$this->db->where('password', md5($password));
			$this->db->where('_user.deleted', 0);
			$this->db->join('_jabatan', '_jabatan.id_jabatan=_user.id_jabatan', 'left');
			$db = $this->db->get('_user');
			if ($db->num_rows() < 1) {
				$success = false;
				$html_message = "password yang anda masukkan salah";
			} else {
				$success = true;
				$userdata = $db->row_array();
				$this->session->set_userdata($userdata);
			}
		}
		// print_r2($userdata);

		header_json();
		$response = array(
			'html_message' => $html_message,
			'data' => $data,
			'success' => $success
		);
		echo json_encode($response);
	}

	function logout()
	{
		session_destroy();
		redirect('login/index');
	}
}
