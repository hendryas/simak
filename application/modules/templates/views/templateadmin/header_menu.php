<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Image Logo -->
                <a href="<?php echo base_url(); ?>" class="logo">
                    <img src="<?php echo base_url(); ?>assets/images/logo-UNJ.png" alt="" height="55" width="55" style='border-radius: 10px 10px 10px 10px;'>
                </a>

            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="list-inline float-right mb-0">
                    <!-- Jam -->
                    <!-- <li class="list-inline-item">
                        <p class="text-white jam_skrng"> </?= date('Y-m-d H:i:s', time()); ?></p>
                    </li> -->



                    <!-- User-->
                    <li class="list-inline-item">
                        <p style="font-size: 10px;" class="text-white"><?php echo $user['name']; ?></p>
                        <!-- mengambil data menggunakan session -->
                    </li>

                    <!-- start notification-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline noti-icon"></i>
                            <span class="badge badge-success badge-pill noti-icon-badge count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <span class="badge badge-danger float-right">80</span>
                                <h5>Notification</h5>
                            </div>

                            <div class="slimscroll" style="max-height: 230px;">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details">New Message received<span class="text-muted"><?php echo $this->session->flashdata('message'); ?></span>
                                    </p>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item notify-all">
                                View All
                            </a>

                        </div>

                    </li>
                    <!-- end notification-->

                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <!-- <img src="<?php echo base_url('assets/images/profiles/') . $user['upload_foto']; ?>" alt="user" class="rounded-circle"> -->
                            <?php if ($user['gender'] == 2) : ?>
                                <img src="<?php echo base_url('assets/images/profile_2.png'); ?>" alt="user-foto" class="rounded-circle">
                            <?php else : ?>
                                <img src="<?php echo base_url('assets/images/profile_1.png'); ?>" alt="user-foto" class="rounded-circle">
                            <?php endif ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                            <!-- item-->
                            <?php if ($this->session->userdata('id_role') == 1) : ?>
                                <a class="dropdown-item" href="<?php echo base_url('profile'); ?>"><i class="mdi mdi-account-circle m-r-5 text-muted"></i>
                                    Profile</a>
                            <?php elseif ($this->session->userdata('id_role') == 2) : ?>
                                <a class="dropdown-item" href="<?php echo base_url('profile'); ?>"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                            <?php elseif ($this->session->userdata('id_role') == 3) : ?>
                                <a class="dropdown-item" href="<?php echo base_url('profile'); ?>"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                            <?php elseif ($this->session->userdata('id_role') == 4) : ?>
                                <a class="dropdown-item" href="<?php echo base_url('profile'); ?>"><i class="mdi mdi-account-circle m-r-5 text-muted"></i>
                                    Profile</a>
                            <?php elseif ($this->session->userdata('id_role') == 5) : ?>
                                <a class="dropdown-item" href="<?php echo base_url('profile'); ?>"><i class="mdi mdi-account-circle m-r-5 text-muted"></i>
                                    Profile</a>
                            <?php endif; ?>

                            <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="<?php echo base_url(); ?>auth/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                        </div>


                    </li>
                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->