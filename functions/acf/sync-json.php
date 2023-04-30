<?php

add_filter('acf/settings/save_json', 'hsc_acf_json_save_point');

function hsc_acf_json_save_point( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acf-json';


    // return
    return $path;

}
