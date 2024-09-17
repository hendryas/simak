<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Access Bloked</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="<?php echo base_url(); ?>assets/drixo/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/drixo/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/drixo/css/style.css" rel="stylesheet" type="text/css">

</head>


<body class="pb-0">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div class="accountbg">

        <div class="content-center">
            <div class="content-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-8">
                            <div class="card">
                                <div class="card-block">

                                    <div class="ex-page-content text-center">
                                        <h1 class="text-primary">4<i class="fa fa-smile-o text-warning ml-1 mr-1"></i>3!</h1>
                                        <h3 class="">Sorry, Access Forbidden</h3><br>

                                        <p class="text-primary">Please Back To Dashboard!<i class="fa fa-smile-o text-warning ml-1 mr-1"></i></p>

                                        <?php if ($id_role == 2) : ?>
                                            <a href="<?php echo base_url('admin'); ?>"><span class="badge badge-primary waves-effect waves-light ml-3">Back to Dashboard</span></a>
                                        <?php elseif ($id_role == 3) : ?>
                                            <a href="<?php echo base_url('staff'); ?>"><span class="badge badge-primary waves-effect waves-light ml-3">Back to Dashboard</span></a>
                                        <?php elseif ($id_role == 4) : ?>
                                            <a href="<?php echo base_url('customer'); ?>"><span class="badge badge-primary waves-effect waves-light ml-3">Back to Dashboard</span></a>
                                        <?php endif ?>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery  -->
    <script src="<?php echo base_url(); ?>assets/drixo/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/drixo/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/drixo/js/modernizr.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/drixo/js/detect.js"></script>
    <script src="<?php echo base_url(); ?>assets/drixo/js/fastclick.js"></script>
    <script src="<?php echo base_url(); ?>assets/drixo/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/drixo/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url(); ?>assets/drixo/js/waves.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url(); ?>assets/drixo/js/app.js"></script>

</body>

</html>