<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth/login');
    } else {
        $id_role = $ci->session->userdata('id_role');
        $menu = $ci->uri->segment(1); //controller mana yang mau di ambil/url mana

        //cocokkan dengan tabel user menu dengan user access menu
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $id_role,
            'menu_id' => $menu_id
        ]);



        //admin kenapa ke block?
        if ($userAccess->num_rows() < 1) {
            redirect('error/block');
        }
    }
}
