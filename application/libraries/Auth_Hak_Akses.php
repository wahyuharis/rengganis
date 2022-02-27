<?php
class Auth_Hak_Akses
{

    function cek_hak_akses()
    {

        $ci = &get_instance();
        $ci->config->load('hak_akses');
        // $url = $ci->uri->segment(1) . '/' . $ci->uri->segment(2);
        $url = uri_string();
        $url = trim($url, '/');
        $jabatan = $ci->session->userdata('nama_jabatan');
        $hak_akses_list =  $ci->config->item($jabatan);

        // print_r2($hak_akses_list);

        $allow = false;
        
        if ($jabatan == 'superadmin') {
            $allow = true;
        }
        elseif( is_null($hak_akses_list) ){
            $allow=false;
        }
        else {
            $allow =  $this->checkUrlWildcard($url, $hak_akses_list);
        }


        return $allow;
    }

    function checkUrlWildcard($url, $whiteListUrls = [])
    {
        $ci = &get_instance();
        $ci->load->helper('haris_url');

        $url = trim($url, '/');
        //========================


        foreach ($whiteListUrls as $wUrl) {
            $wUrl = trim($wUrl, '/');

            // $pattern = preg_quote($wUrl, '/');
            // $pattern = str_replace('\*', '.*', $pattern);
            // $matched = preg_match('/^' . $pattern . '$/i', $url);

            // print_r2($pattern."-".$url);

            // if ($matched > 0) {
            //     return true;
            // }
            return  haris_checkMatch_url($url, $wUrl);
        }

        return false;
    }
}
