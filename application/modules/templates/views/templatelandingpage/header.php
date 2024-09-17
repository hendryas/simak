<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap v5.1.3 Landing Page Template" />
    <meta name="keywords" content="bootstrap v5.1.3, premium, marketing, multipurpose" />
    <meta content="Themesdesign" name="author" />

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo-fav.png" />

    <!-- Bootstrap css-->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Materialdesign icon-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialdesignicons.min.css" type="text/css" />

    <!-- Swiper Slider css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/swiper-bundle.min.css" type="text/css" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet" type="text/css" />

    <!-- colors -->
    <link href="<?php echo base_url(); ?>assets/css/colors/default.css" rel="stylesheet" type="text/css"
        id="color-opt" />


    <link href="https://fonts.googleapis.com/css?family=Montserrat:800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


    <style>
    .adminActions {
        position: fixed;
        bottom: 15px;
        right: 10px;
    }

    .adminButton {
        height: 60px;
        width: 60px;
        background-color: rgba(67, 83, 143, .8);
        border-radius: 50%;
        display: block;
        color: #fff;
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .adminButton i {
        font-size: 22px;
    }

    .adminButtons {
        position: absolute;
        width: 100%;
        bottom: 120%;
        text-align: center;
    }

    .adminButtons a {
        display: block;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        text-decoration: none;
        margin: 10px auto 0;
        line-height: 1.15;
        color: #fff;
        opacity: 0;
        visibility: hidden;
        position: relative;
        box-shadow: 0 0 5px 1px rgba(51, 51, 51, .3);
    }

    .adminButtons a:hover {
        transform: scale(1.05);
    }

    .adminButtons a:nth-child(1) {
        background-color: #ff5722;
        transition: opacity .2s ease-in-out .3s, transform .15s ease-in-out;
    }

    .adminButtons a:nth-child(2) {
        background-color: #03a9f4;
        transition: opacity .2s ease-in-out .25s, transform .15s ease-in-out;
    }

    .adminButtons a:nth-child(3) {
        background-color: #f44336;
        transition: opacity .2s ease-in-out .2s, transform .15s ease-in-out;
    }

    .adminButtons a:nth-child(4) {
        background-color: #4CAF50;
        transition: opacity .2s ease-in-out .15s, transform .15s ease-in-out;
    }

    .adminActions a i {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .adminToggle {
        -webkit-appearance: none;
        position: absolute;
        border-radius: 50%;
        top: 0;
        left: 0;
        margin: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
        background-color: transparent;
        border: none;
        outline: none;
        z-index: 3;
        transition: box-shadow .2s ease-in-out;
        box-shadow: 0 3px 5px 1px rgba(51, 51, 51, .3);
    }

    .adminToggle:hover {
        box-shadow: 0 3px 6px 2px rgba(51, 51, 51, .3);
    }

    .adminToggle:checked~.adminButtons a {
        opacity: 1;
        visibility: visible;
    }
    </style>

</head>