<?php
class Auth_Hak_Akses
{

    function cek_hak_akses()
    {

        $ci = &get_instance();
        $ci->config->load('blocked_access');
        // $url = $ci->uri->segment(1) . '/' . $ci->uri->segment(2);
        $url = uri_string();
        $url = trim($url, '/');
        $jabatan = $ci->session->userdata('nama_jabatan');
        $block_list =  $ci->config->item($jabatan);

        // print_r2($hak_akses_list);

        $allow = false;

        if ($jabatan == 'superadmin') {
            $allow = true;
        } elseif (is_null($block_list)) {
            $allow = false;
        } else {
            $allow =  $this->check_is_blocked($url, $block_list);
        }


        return $allow;
    }

    function check_is_blocked($url, $block_list = [])
    {
        $ci = &get_instance();
        // $ci->load->helper('haris_url');

        $url = trim($url, '/');
        //========================


        foreach ($block_list as $bUrl) {
            $bUrl = trim($bUrl, '/');

            echo $bUrl;
            echo "<br>";
            echo $url;
            echo "<br>";
            echo "<br>";

        }
        die();
    }
}
