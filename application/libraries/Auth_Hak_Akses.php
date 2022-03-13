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
            $blocked =  $this->check_is_blocked($url, $block_list);

            // var_dump2($blocked);

            if ($blocked > 0) {
                $allow = false;
            } else {
                $allow = true;
            }
        }


        return $allow;
    }

    function check_is_blocked($url, $block_list = [])
    {
        $ci = &get_instance();
        // $ci->load->helper('haris_url');

        $url = trim($url, '/');
        $url = strtolower($url);
        //========================
        // echo "<pre>";

        $count_same1 = array();
        foreach ($block_list as $bUrl) {
            $bUrl = trim($bUrl, '/');
            $bUrl = strtolower($bUrl);

            $bUrl_arr = explode('/', $bUrl);
            $url_arr = explode('/', $url);

            $len_burl = count($bUrl_arr);
            $len_url = count($url_arr);
            $len_biggest = 0;
            if ($len_burl > $len_url) {
                $len_biggest = $len_burl;
            } else {
                $len_biggest = $len_url;
            }

            // var_dump2($len_biggest);
            $count_same = array();
            for ($i = 0; $i < $len_biggest; $i++) {
                if (isset($url_arr[$i]) && isset($bUrl_arr[$i])) {
                    if ($url_arr[$i] == $bUrl_arr[$i]) {
                        // echo  $url_arr[$i] ." ". $bUrl_arr[$i]."-".$i."<br>";
                        // echo " ".$i."<br>";
                        // die();
                        array_push($count_same, 1);
                    } elseif ((count($count_same) > 0) && ($bUrl_arr[$len_burl - 1] == '*')) {
                        array_push($count_same, 1);
                        $i = $len_biggest;
                    } else {
                        array_push($count_same, 0);
                    }
                } else {
                    array_push($count_same, 0);
                }
            }

            // print_r($count_same);
            // echo "<hr>";

            $is_same = 1;
            if (count($count_same) < 1) {
                $is_same = 0;
            }
            foreach ($count_same as $sm) {
                $is_same = $is_same * $sm;
            }
            array_push($count_same1, $is_same);
        }
        $return = 0;
        // die();
        // print_r2($count_same1);
        foreach ($count_same1 as $sm1) {
            if ($sm1 > 0) {
                $return = 1;
            }
        }
        return $return;
    }
}
