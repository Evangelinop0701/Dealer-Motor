<?php

session_start();
include "../../class/class.php";
include "../../class/funsi_thm.php";
$db = new database();
$user = new user();
$sasan = new sasan();
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
                        'kategoria' => $_POST['kategoria']
                    );
        $data = $crud->insert_data('t_kategoria', $arrayData);

        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../kategoria.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;
    case 'update':
        $id = $_GET['id'];
        $arrayData = array(
                        "kategoria='".$_POST['kategoria']."'"

                   );
        $data = $crud->update_data('t_kategoria', $arrayData, 'id_kategoria', $id);

        if($data) {
            echo "<script>alert('Hadia dodos ho sucessu...!')</script>";
            echo "<script>window.location='../../kategoria.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

    case 'delete':

        $id = $_GET['id'];
        $data = $crud->delete_data('t_kategoria', 'id_kategoria', $id);
        if($data) {
            echo "<script>alert('Hamos dados ho sucesu...!')</script>";
            echo "<script>window.location='../../kategoria.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

}
