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
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $name_file_unik = $_POST['naran_tbdr'].'-'.$nama_file ;

        if (!empty($lokasi_file)) {
            fototbdr($name_file_unik);
            $arrayData = array(
                           'naran_tbdr' => $_POST['naran_tbdr'],
                           'sexu' => $_POST['sexu'],
                           'id_suku' => $_POST['id_suku'],
                           'hela_fatin' => $_POST['hela_fatin'],
                           'no_tlf' => $_POST['no_tlf'],
                           'foto' => $name_file_unik
            );
            $data = $crud->insert_data('t_trabalho', $arrayData);

            if($data) {
                echo "<script>alert('Dados Rai ona...!')</script>";
                echo "<script>window.location='../../trabalhador.html'</script>";
            } else {
                echo "<script>alert('ERROR!')</script>";
            }
        } else {

            $foto = " ";

            $arrayData = array(
                           'naran_tbdr' => $_POST['naran_tbdr'],
                           'sexu' => $_POST['sexu'],
                           'id_suku' => $_POST['id_suku'],
                           'hela_fatin' => $_POST['hela_fatin'],
                           'no_tlf' => $_POST['no_tlf'],
                           'foto' => $foto
                       );
            $data = $crud->insert_data('t_trabalho', $arrayData);


            if($data) {
                echo "<script>alert('Dados Rai ona...!')</script>";
                echo "<script>window.location='../../trabalhador.html'</script>";
            } else {
                echo "<script>alert('ERROR!')</script>";
            }

        }

        break;

    case 'update':

        $id = $_GET['id'];

        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $name_file_unik = $_POST['naran_tbdr'].'-'.$nama_file ;

        if (empty($lokasi_file)) {
            $arrayData = array(
                 "naran_tbdr='".$_POST['naran_tbdr']."'",
                 "sexu='".$_POST['sexu']."'",
                 "id_suku='".$_POST['id_suku']."'",
                 "hela_fatin='".$_POST['hela_fatin']."'",
                 "no_tlf='".$_POST['no_tlf']."'",
                 "foto='".$_POST['foto']."'",
            );
            $data = $crud->update_data('t_trabalho', $arrayData, 'id_tbdor', $id);

            if($data) {
                echo "<script>alert('Hadia dodos ho sucessu...!')</script>";
                echo "<script>window.location='../../trabalhador.html'</script>";
            } else {
                echo "<script>alert('ERROR!')</script>";
            }
        } else {

            $del = $_POST['foto'];

            if (!empty($del)) {

                unlink("../../foto_trabalhador/$del");
                unlink("../../foto_trabalhador/kiik_$del");

                fototbdr($name_file_unik);

                $arrayData = array(
                                "naran_tbdr='".$_POST['naran_tbdr']."'",
                                "sexu='".$_POST['sexu']."'",
                                "id_suku='".$_POST['id_suku']."'",
                                "hela_fatin='".$_POST['hela_fatin']."'",
                                "no_tlf='".$_POST['no_tlf']."'",
                                "foto='".$name_file_unik."'"
                           );


                $data = $crud->update_data('t_trabalho', $arrayData, 'id_tbdor', $id);



                if($data) {
                    echo "<script>alert('Hadia dodos ho sucessu...!')</script>";
                    echo "<script>window.location='../../trabalhador.html'</script>";
                } else {
                    echo "<script>alert('ERROR!')</script>";
                }



            }
        }
        break;

    case 'delete':
        $id = $_GET['id'];
        $file = $_GET['file'];

        $data = $crud->delete_data('t_sasan', 'id_sasan', $id);

        if (!empty($file)) {
            unlink("../../foto_motor/$file");
            unlink("../../foto_motor/kiik_$file");

        }

        if($data) {
            echo "<script>alert('Hamos dados ho sucesu...!')</script>";
            echo "<script>window.location='../../d_sasan.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }



        break;



}
