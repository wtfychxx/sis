<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .select2 {
            width: 100% !important;
        }

        .label-required {
            color: red;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>School Information System</title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url() ?>assets/img/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>assets/img/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>assets/img/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/feather/style.min.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/feather-icons-web/feather.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/js/sweetalert2/package/dist/sweetalert2.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/css/dyna.css">

    <script src="<?= base_url() ?>assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>

    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?= base_url() ?>assets/vendors/js/moment.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/fullcalendar.min.js" type="text/javascript"></script>
    <!-- <script src="<?= base_url() ?>assets/vendors/js/core/fullcalendar.min.js" type="text/javascript"></script> -->
    <script src="<?= base_url() ?>assets/vendors/js/jquery-ui.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <!-- <script src="<?= base_url() ?>assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/js/customizer.js" type="text/javascript"></script> -->
    <!-- END APEX JS-->

    <script src="<?= base_url() ?>assets/vendors/js/pickadate/picker.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/pickadate/picker.date.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/pickadate/picker.time.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/pickadate/legacy.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->

    <!-- <script src="<?= base_url() ?>assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/js/customizer.js" type="text/javascript"></script> -->

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?= base_url() ?>assets/js/fullcalendar.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/toastr.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendors/js/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/js/sweetalert2/package/dist/sweetalert2.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js" type="text/javascript"></script> -->
    <!-- <script src="<?= base_url() ?>assets/vendors/js/sweetalert2.min.js" type="text/javascript"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
    
    <script src="<?= base_url() ?>assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/js/customizer.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/vendor/select2/js/select2.min.js"></script>

    <script src="<?= base_url() ?>assets/vendors/js/dyna.js"></script>
</head>