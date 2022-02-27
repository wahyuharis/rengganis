<?php
class Auth
{
    function __construct()
    {
        $ci = &get_instance();
        if (!(in_array(strtolower($ci->uri->segment(1)), ['login', 'logout']))) {
            $this->is_login();

            if (!(in_array(strtolower($ci->uri->segment(1)), ['home']))) {
                $this->cek_hakakses();
            }
        }
    }

  
    function is_login()
    {
        $ci = &get_instance();

        $username = $ci->session->userdata('username');
        $password = $ci->session->userdata('password');

        $ci->db->where('username', $username);
        $ci->db->where('password', $password);
        $db = $ci->db->get('_user');
        if ($db->num_rows() < 1) {
            session_destroy();
            $ci->session->set_flashdata('error_message', 'Maaf Anda Belum Login');
            redirect('login');
        }
    }

    function cek_hakakses()
    {
        $ci = &get_instance();
        $ci->load->library('Auth_Hak_Akses');
        $hak_akses=new Auth_Hak_Akses();
        $hak_akses->cek_hak_akses();

        if(!$hak_akses->cek_hak_akses()){
            $ci->session->set_flashdata('error_message', 'Maaf Anda Tidak memiliki Akses');
            redirect('home');
        }
    }
}
