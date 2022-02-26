<?php
class Auth_Hak_Akses
{
    function is_disallow_urls()
    {
        $allow = true;
        $ci = &get_instance();
        $url = $ci->uri->segment(1) . '/' . $ci->uri->segment(2);
        $url = trim($url, '/');
        $jabatan = $ci->session->userdata('nama_jabatan');

        if ($jabatan == 'superadmin') {
            $block_url = array(
                // 'user',
                // 'user/index',
                // 'user/add',
                // 'user/edit',
                // 'user/submit',
                // 'user/delete_submit',
                // 'user/datatables_serverside',
            );
            if (in_array($url, $block_url)) {
                $allow = false;
            }
        }


        return $allow;
    }

    //disallow mungkin butuh dibalik casenya
    //perlu diutak atik lagi
    function checkUrlWildcard($url, $whiteListUrls = [])
    {
        foreach ($whiteListUrls as $wUrl) {
            $pattern = preg_quote($wUrl, '/');
            $pattern = str_replace('\*', '.*', $pattern);
            $matched = preg_match('/^' . $pattern . '$/i', $url);
            if ($matched > 0) {
                return true;
            }
        }

        return false;
    }
}
