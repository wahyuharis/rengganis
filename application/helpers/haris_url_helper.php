<?php

function haris_checkMatch_url($current_url,$allow_url)
{
    $current_url = strtolower(trim($current_url, '/'));
    $allow_url = strtolower(trim($allow_url, '/'));
    $current_url_arr = explode('/', $current_url);
    $allow_url_arr = explode('/', $allow_url);
    $len = count($allow_url_arr);
    for ($i = 0; $i < $len; $i++) {
        $return = false;
        if (isset($current_url_arr[$i]) && isset($allow_url_arr[$i])) {
            if ($current_url_arr[$i] == $allow_url_arr[$i]) {
                $return = true;
            } else {
                $i = $len;
                $return = false;
            }
        }
    }
    return $return;
}
