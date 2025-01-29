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

        $arrayData = array(
                       'stock' => $_POST['stock'],
                       'id_sasan' => $_POST['id_sasan'],
                       'id_kategoria' => $_POST['id_kategoria'],
                       'presu_kada_m' => $_POST['presu_kada_m']
                    );

        $data = $crud->insert_data('t_stock', $arrayData);

        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../stock.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }

        break;

    case 'update_stock':
        $id = $_GET['id'];
        $stoc = $_POST['stock'];

        $data = $stock->updateStock($id, $stoc);


        if(!$data) {
            echo "<script>alert('Stock Aumenta ho Sucesu...!')</script>";
            echo "<script>window.location='../../stock.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

    case 'update':
        $id = $_GET['id'];
        $arrayData = array(
                        "stock='".$_POST['stock']."'",
                        "id_sasan='".$_POST['id_sasan']."'",
                        "id_kategoria='".$_POST['id_kategoria']."'",
                        "presu_kada_m='".$_POST['presu_kada_m']."'",
                   );

        $data = $crud->update_data('t_stock', $arrayData, 'id_stock', $id);

        if($data) {
            echo "<script>alert('Hadia dodos ho sucessu...!')</script>";
            echo "<script>window.location='../../stock.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }


        break;
    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_stock', 'id_stock', $id);

        if($data) {
            echo "<script>alert('Hamos dodos ho sucessu...!')</script>";
            echo "<script>window.location='../../stock.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

}
