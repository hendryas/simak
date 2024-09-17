<?php
function check_access($id_role, $menu_id)
{
    $ci = get_instance();

    //query lain, buat bikin di SP
    // $ci->db->get_where('user_access_menu',[
    //     'id_role' => $id_role,
    //     'menu_id' => $menu_id
    // ]);

    $ci->db->where('role_id', $id_role);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
