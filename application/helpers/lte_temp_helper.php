<?php

function check_child($current_module,$child_arr){
    $return=false;
    foreach($child_arr as $row){
        if( trim( $row['url'],'/' ) == $current_module ){
            $return=true;
        }
    }

    return $return;

}