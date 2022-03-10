<?php

function haris_checkMatch_url($current_url,$block_url)
{
    $current_url = strtolower(trim($current_url, '/'));
    $block_url = strtolower(trim($block_url, '/'));
    $current_url_arr = explode('/', $current_url);
    $block_url_arr = explode('/', $block_url);
    $len = count($block_url_arr);
    $return = 1;
    for ($i = 0; $i < $len; $i++) {
        if (isset($current_url_arr[$i]) && isset($block_url_arr[$i])) {
            if ($current_url_arr[$i] == $block_url_arr[$i]) {
                $return = 0;
            } 
            // else {
            //     $i = $len;
            //     $return = false;
            // }
        }
    }
    return $return;
}
