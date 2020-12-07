<?php

function posted() {
    return array("no" => "No", "si" => "Si");
}

function categories_to_form($categories) {
    $aCategories = array();

    foreach ($categories as $key => $c) {
        $aCategories[$c->category_id] = $c->name;
    }

    return $aCategories;
}

function clean_name($name) {
    return convert_accented_characters(url_title($name, '-', TRUE));
}

function all_images() {
    $CI = & get_instance();
    $CI->load->helper('directory');

    $dir = "uploads/post";
    $files = directory_map($dir);

    return $files;
}
