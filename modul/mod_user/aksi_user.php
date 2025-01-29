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
        $password = $_POST['passwords'];
        $pass = md5($password);

        $arrayData = array(
            'id_tbdr' => $_POST['id_tbdr'],
            'username' => $_POST['username'],
            'passwords' => $pass,
            'level' => $_POST['level'],
            'pass' => $password,
        );

        $data = $crud->insert_data('t_user', $arrayData);


        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../users.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }


        break;
    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_user', 'id_user', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../users.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }

        break;

    case 'update':
        $id = $_GET['id'];
        $password = $_POST['passwords'];
        $pass = md5($password);
        $arrayData = array(
            "id_tbdr='".$_POST['id_tbdr']."'",
            "username='".$_POST['username']."'",
            "passwords='".$pass."'",
            "level='".$_POST['level']."'",
            "pass='".$password."'"
        );

        $data = $crud->update_data('t_user', $arrayData, 'id_user', $id);

        if($data) {
            echo "<script>alert('Hadia dados ho sucessu...!')</script>";
            echo "<script>window.location='../../users.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

    case 'updatepass':
        $id = $_GET['id'];
        $password = $_POST['passwords'];
        $pass = md5($password);

        $data = $user->updatepass($id, $_POST['username'], $pass, $password);

        if(!$data) {
            echo "<script>alert('Troka Password ho sucessu...!')</script>";
            echo "<script>window.location='../../home.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;
}
