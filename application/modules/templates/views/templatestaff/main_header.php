<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo $title; ?></title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/drixo/css/fontawesome5.min.css" rel="stylesheet">

    <!-- Font Awesome Pro -->
    <!-- <link href="<?php echo base_url(); ?>assets/plugins/font-awesome-pro-master/css/all.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>assets/drixo/plugins/font-awesome-pro-master/css/all.min.css" rel="stylesheet">

    <!-- ICONS -->
    <link href="<?php echo base_url(); ?>assets/drixo/images/logo_rsdk.png" rel="shortcut icon">

    <link href="<?php echo base_url(); ?>assets/drixo/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/drixo/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/drixo/css/style.css" rel="stylesheet" type="text/css">

    <!-- style vertical -->
    <link href="<?php echo base_url(); ?>assets/drixo/css/style_vertical.css" rel="stylesheet" type="text/css">

    <!-- Sweet Alert -->
    <link href="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="<?php echo base_url(); ?>assets/drixo/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/drixo/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="<?php echo base_url(); ?>assets/drixo/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Datepicker css -->
    <link href="<?php echo base_url(); ?>assets/drixo/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/drixo/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/drixo/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen" type="text/css">
    <link href="<?php echo base_url(); ?>assets/drixo/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <!-- Ckeditor JS -->
    <script src="<?php echo base_url(); ?>assets/drixo/vendor/ckeditor/ckeditor/ckeditor.js"></script>

    <!-- Select Search CSS -->
    <link href="<?php echo base_url(); ?>assets/drixo/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">

    <!-- Alertify css -->
    <!-- <link href="<?php echo base_url(); ?>assets/plugins/alertify/css/alertify.css" rel="stylesheet" type="text/css"> -->

    <!-- Accordion -->
    <link href="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>assets/css/components/tabs-accordian/custom-accordions.css" rel="stylesheet" type="text/css" />

    <!-- Tampilah Dashboard  -->
    <link href="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />

    <!-- Modules Widget -->
    <link href="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>assets/css/widgets/modules-widgets.css" rel="stylesheet" type="text/css" />

    <!-- <link href="<?php echo base_url(); ?>assets/css/summernote-lite.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- Style RS-DIKLIT Main CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>assets/css/main.css">



    <style>
        #more {
            display: none;
        }

        .button-1 {
            background-color: transparent;
            border: 3px solid #00d7c3;
            border-radius: 50px;
            -webkit-transition: all .15s ease-in-out;
            transition: all .15s ease-in-out;
            color: #00d7c3;
        }

        .button-1:hover {
            box-shadow: 0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3;
            border: 3px solid #00d7c3;
        }
    </style>

</head>


<body>