<?php
session_start();
include "class/class.php";
include "class/lib.php";
$db = new database();
$user = new user();
$sasan = new sasan();
$stock = new Stock();
$kt = new kategoria();
$transaksi = new transaksaun();
$cliente = new cliente();
$tbr = new trabalhador();
$mps = new mps();



$username = $_SESSION['username'];
$id = $_SESSION['id_tbdor'];
$leveluser = $_SESSION['level'];
$password = $_SESSION['passwords'];
$id_user = $_SESSION['id_user'];


if (!$user->get_sessi()) {
    echo "<script>   
            alert('ITA BOOT CEDAUK ALOGIN..!!');
            document.location='login.html';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Systmea Manegemnto dados Motor iha Dealer</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="assets/font/fonts.googleapis.css" rel="stylesheet">
    <link href="assets/icon/all.min.css" rel="stylesheet">

    <!-- search -->

    <!-- <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet"> -->

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/local.css" rel="stylesheet">

    <style>
    .table {
        width: 99%;
        margin-bottom: 20px;
        margin-left: auto;
        margin-right: auto;
    }

    #table {
        width: 20%;
        margin-bottom: 20px;
        /* margin-left: auto;
        margin-right: auto; */
    }

    table>thead>tr>td {
        border: 1px solid gray;
        background-repeat: no-repeat;
    }

    table>tbody>tr>td {
        border: 1px solid gray;
        background-repeat: no-repeat;
        height: 10px;
    }


    .table-striped tbody>tr:nth-child(odd)>td,
    .table-striped tbody>tr:nth-child(odd)>th {
        background-color: #f9f9f9;
    }

    @media print {
        #print {
            display: none;
        }
    }

    @media print {
        #PrintButton {
            display: none;
        }
    }

    @page {
        size: auto;
        /* auto is the initial value */
        margin: 0;
        /* this affects the margin in the printer settings */
    }

    #img {
        width: 100%;
        height: 50px;
    }
    </style>

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


    <?php 
    
    $id = $_GET['id'];
    $dados = $transaksi->show_transaksi_form($id);
    ?>

    <div class="container-fluid mt-2">
        <img src="img/header.png" class="img mb-2" alt="" id="img">

        <table class="mb-2" id="table">
            <thead>
                <tr>
                    <td>Data</td>
                    <td><?= date('d-M-Y'); ?></td>
                </tr>
                <tr>
                    <td>Transaksaun</td>
                    <td>Dala 11</td>
                </tr>

            </thead>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Naran Cliente</td>
                    <td>Presu Kada Sasan</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Evangelino Soares</td>
                    <td>Vixson</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Evangelino Soares</td>
                    <td>Vixson</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Evangelino Soares</td>
                    <td>Vixson</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Evangelino Soares</td>
                    <td>Vixson</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Evangelino Soares</td>
                    <td>Vixson</td>
                </tr>
            </tbody>

        </table>
        <center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
    </div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/icon/all.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- Search Combobox -->
    <script src="assets/searchCombox/dselect.js"></script>

    <script>
    var select_box_element = document.querySelector('#select_box');

    dselect(select_box_element, {
        search: true
    });
    </script>
    <!-- And Search Combobox -->
    <script type="text/javascript">
    function PrintPage() {
        window.print();
    }
    document.loaded = function() {

    }
    window.addEventListener('DOMContentLoaded', (event) => {
        PrintPage()
        setTimeout(function() {
            window.close()
        }, 750)
    });
    </script>
</body>

</html>