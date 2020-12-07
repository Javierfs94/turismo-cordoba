<?php

function breadcrumb_admin($action) {
    $CI = & get_instance();

    $breadcrumb = array();
    $breadcrumb[] = ['', 'Inicio'];
    switch ($action) {
        case 'posts':
            $breadcrumb[] = ['admin/post_list', 'Posts'];
            break;
        case 'categories':
            $breadcrumb[] = ['admin/category_list', 'Categorias'];
            break;
        case 'users':
            $breadcrumb[] = ['admin/user_crud', 'Usuarios'];
            break;
        case 'profile':
            $breadcrumb[] = ['app/profile', 'Perfil'];
            break;
        default:
            break;
    }
    return $breadcrumb;
}
