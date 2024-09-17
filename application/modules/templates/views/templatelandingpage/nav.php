<body data-bs-spy="scroll" data-bs-target="#navbar-navlist" data-bs-offset="60">

    <!--start page Loader -->
    <div id="preloader">
        <div id="status">
            <div class="load">
                <hr />
                <hr />
                <hr />
                <hr />
            </div>
        </div>
    </div>
    <!--end page Loader -->

    <!-- START NAVBAR -->
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top sticky">
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url() ?>"><img src="<?php echo base_url(); ?>assets/images/logo-UNJ.png" alt="" height="55" width="55" style='border-radius: 10px 10px 10px 10px;'></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu text-muted">
                </i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-xl-5" id="navbar-navlist">
                    <li style="margin-left: 135px;"></li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>landing/feature">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>landing/carapesan">Cara Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>landing/harga">Harga</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Blog <i class="mdi mdi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="nav-link" href="<?php echo base_url(); ?>landing/blog">Blog</a></li>
                            <li><a class="nav-link" href="blog-list.html">Blog List</a></li>
                            <li><a class="nav-link" href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>landing/kontak">Kontak</a>
                    </li>
                </ul>
                <!--end navbar-nav-->
                <!-- <ul class="list-inline mb-0 ps-lg-4 ms-2">
                    <li class="list-inline-item">
                        <a href="#" class="primary-link"><i class="mdi mdi-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="primary-link"><i class="mdi mdi-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="primary-link"><i class="mdi mdi-instagram"></i></a>
                    </li>
                </ul> -->
            </div>
            <!--end collapse-->
            <div class="navbar-nav mb-2 mb-lg-0 ms-xl-5">
                <a href="<?php echo base_url('auth/login') ?>" class="btn btn-primary">Mulai</a>
            </div>
        </div>
        <!--end container-->
    </nav>
    <!-- END NAVBAR -->