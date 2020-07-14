<?php


/**
 * print_r ...
 */
function debugout($data){
    if(!is_array($data)) $data[] = $data;
    echo "<pre>" . print_r($data,true) . "</pre>";
}


/**
 * Buffer flush
 * 
 */
function buffer_flush(){

    echo str_pad('', 512);
    echo '<!-- -->';

    if(ob_get_length()){

        @ob_flush();
        @flush();
        @ob_end_flush();

    }

    @ob_start();

}