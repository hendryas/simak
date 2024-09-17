<div class="navbar-custom">
    <div class="container-fluid">

        <div id="navigation">
            <!-- QUERY MENU -- PAKAI JOIN TABLE -->
            <?php
            //karena di setiap tabel ada id,nantinya akan ambigu,maka ditulislah user_menu, id yaitu id yang ada di user menu
            $id_role = $this->session->userdata('id_role');
            $queryMenu = "  SELECT user_menu.id,menu,menu_nama
                            FROM user_menu JOIN user_access_menu
                            ON user_menu.id = user_access_menu.menu_id
                            WHERE user_access_menu.role_id = $id_role
                            ORDER BY user_access_menu.menu_id ASC ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>


            <!-- // $this->db->select('user_has_sub_menu.*');
            // $this->db->from('user_has_sub_menu');
            // $this->db->where(['user_access_menu.id_role' => $id_role]);
            // $this->db->join('user_access_menu', 'user_access_menu.has_sub_menu_id = user_has_sub_menu.id');

            // $query = $this->db->get();

            // var_dump($hasmenu);
            // die; -->

            <!-- Looping Navigation Menu-->

            <ul class="navigation-menu">
                <?php foreach ($menu as $m) : ?>
                    <li class="has-submenu">
                        <a href="#"></i><?php echo $m['menu_nama']; ?></a>

                        <?php
                        $menu_id = $m['id'];
                        $id_role = $this->session->userdata('id_role');
                        $queryHasSubMenu = "  SELECT user_has_sub_menu.*
                            FROM user_has_sub_menu JOIN user_menu
                            ON user_has_sub_menu.menu_id = user_menu.id
                            WHERE user_has_sub_menu.menu_id = $menu_id
                            AND user_has_sub_menu.is_active = 1";
                        $hasSubMenu = $this->db->query($queryHasSubMenu)->result_array();
                        // var_dump($hasSubMenu);
                        // die;
                        ?>
                        <!-- megasubmenu -->

                        <ul class="submenu">
                            <?php foreach ($hasSubMenu as $hsm) : ?>
                                <?php if ($hsm['status_sub'] == 1) : ?>
                                    <li>
                                        <ul>
                                            <li><a href="<?php echo base_url($hsm['url']); ?>"><i class="<?php echo $hsm['icon']; ?>"></i><?php echo $hsm['title']; ?></a></li>
                                        </ul>
                                    </li>
                                <?php else : ?>
                                    <li class="has-submenu">
                                        <a href="#"><i class="<?php echo $hsm['icon']; ?>"></i><?php echo $hsm['title']; ?></a>

                                        <!-- START SIAPKAN SUB-MENU SESUAI MENU -->
                                        <?php
                                        $menu_id = $m['id'];
                                        $hasSubMenuId = $hsm['id'];
                                        $this->db->select('user_sub_menu.*');
                                        $this->db->from('user_sub_menu');
                                        $this->db->where(['user_sub_menu.has_sub_menu_id' => $hasSubMenuId]);
                                        $this->db->join('user_has_sub_menu', 'user_has_sub_menu.id = user_sub_menu.has_sub_menu_id');

                                        $subMenu = $this->db->get()->result_array();
                                        // var_dump($menu_id);
                                        // die;
                                        ?>

                                        <!-- END SIAPKAN SUB-MENU SESUAI MENU -->
                                        <ul class="submenu">
                                            <?php foreach ($subMenu as $sm) : ?>
                                                <li><a href="<?php echo base_url($sm['url']); ?>"><i class="<?php echo $sm['icon']; ?>"></i><?php echo $sm['title']; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
                <li>
                    <a data-toggle="modal" data-target="#logoutFromSubMenuModal" href="<?php echo base_url(); ?>auth/logout">
                        <?php $this->load->view('templates/buttons/button_logout') ?></a>
                </li>
            </ul>

            <!-- End navigation menu -->
        </div> <!-- end #navigation -->

    </div> <!-- end container -->
</div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->

<!-- START LOGOUT FROM NAVBAR MENU MODAL -->
<div class="modal fade" id="logoutFromSubMenuModal" tabindex="-1" aria-labelledby="logoutFromSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutFromSubMenuModalLabel">Apakah kamu akan keluar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Klik tombol "Logout" untuk keluar dari halaman, klik "Close" untuk membatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>auth/logout">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- END LOGOUT FROM NAVBAR MENU MODAL -->


<!-- START LOGOUT MODAL -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Apakah kamu akan keluar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Klik tombol "Logout" untuk keluar dari halaman, klik "Close" untuk membatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>auth/logout">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- END LOGOUT MODAL -->