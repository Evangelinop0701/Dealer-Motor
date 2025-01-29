<?php

session_start();
include "../../class/class.php";
include "../../class/funsi_thm.php";
$db = new database();
$user = new user();
$stock = new Stock();
$kt = new kategoria();

$crud = new CRUD();

if (!$user->get_sessi()) {
    echo "<script>   
            alert('ITA BOOT CEDAUK ALOGIN..!!');
            document.location='login.html';</script>";
}

if (!$user->get_sessi()) {
    header('location: login.html');
}
$act = $_GET['act'];

switch ($act) {
    case 'input':
        $id = $_POST['id_stock'];
        $total = $_POST['total_hola'];
        $stok = $stock->show_dados_stock($id);

        if ($total <= $stok[0]['stock']) {
            $stock_origin = $stok[0]['stock'] - $total;
            $stock->updateStock($id, $stock_origin);

        } elseif ($stok[0]['stock'] == 0) {

            if($stok) {
                echo "<script>alert('Stock Mamuk ona Obrigado...!')</script>";
                echo "<script>window.location='../../transaksi.html'</script>";
            } else {
                echo "<script>alert('ERROR!')</script>";
                header('location: stock.html');
            }


        }

        if ($total > $stok[0]['stock']) {


            if($stok) {
                echo "<script>alert('Stock la too ...!')</script>";
                echo "<script>window.location='../../transaksi.html'</script>";
            } else {
                echo "<script>alert('ERROR!')</script>";
                header('location: stock.html');
            }


        } elseif ($total <= $stok[0]['stock']) {

            $arrayData = array(
                                             'data_faan' => $_POST['data_faan'],
                                             'id_stock' => $_POST['id_stock'],
                                             'id_cliente' => $_POST['id_cliente'],
                                             'total_hola' => $_POST['total_hola']
                                          );

            $data = $crud->insert_data('t_faan', $arrayData);

            if($data) {
                echo "<script>alert('Dados Rai ona...!')</script>";
                echo "<script>window.location='../../transaksi.html'</script>";
            } else {
                echo "<script>alert('ERROR!')</script>";
                header('location: stock.html');
            }

        }
        break;


    case 'update':

        $id = $_GET['id'];
        $arrayData = array(
                            "data_faan='".$_POST['data_faan']."'",
                            "id_cliente='".$_POST['id_cliente']."'",
                        );

        $data = $crud->update_data('t_faan', $arrayData, 'id_faan', $id);

        if($data) {
            echo "<script>alert('Hadia dados ho sucesu...!')</script>";
            echo "<script>window.location='../../transaksi.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }





        break;

    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_faan', 'id_faan', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../transaksi.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }

        break;
}
