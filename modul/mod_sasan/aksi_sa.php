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
        $name_file_unik = $_POST['naran_sasan'].'-'.$nama_file ;

        if (!empty($lokasi_file)) {
            foto_upload($name_file_unik);
            $arrayData = array(
                'naran_sasan' => $_POST['naran_sasan'],
                'modelu' => $_POST['modelu'],
                'tinan_produz' => $_POST['tinan_produz'],
                'cc_motor' => $_POST['cc_motor'],
                'foto' => $name_file_unik
            );
            $data = $crud->insert_data('t_sasan', $arrayData);

            if($data) {
                echo "<script>alert('Dados Rai ona...!')</script>";
                echo "<script>window.location='../../d_sasan.html'</script>";
            } else {
                echo "<script>alert('ERROR!')</script>";
            }
        } else {

            $foto = " ";

            $arrayData = array(
                           'naran_sasan' => $_POST['naran_sasan'],
                           'modelu' => $_POST['modelu'],
                           'tinan_produz' => $_POST['tinan_produz'],
                           'cc_motor' => $_POST['cc_motor'],
                           'foto' => $foto
                       );
            $data = $crud->insert_data('t_sasan', $arrayData);

            if($data) {
                echo "<script>alert('Dados Rai ona...!')</script>";
                echo "<script>window.location='../../d_sasan.html'</script>";
            } else {
                echo "<script>alert('ERROR!')</script>";
            }

        }

        break;

    case 'edit':

        $id = $_GET['id'];

        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $name_file_unik = $_POST['naran_sasan'].'-'.$nama_file ;

        if (empty($lokasi_file)) {
            $arrayData = array(
                 "naran_sasan='".$_POST['naran_sasan']."'",
                 "modelu='".$_POST['modelu']."'",
                 "tinan_produz='".$_POST['tinan_produz']."'",
                 "cc_motor='".$_POST['cc_motor']."'",
                 "foto='".$_POST['foto']."'",
            );
            $data = $crud->update_data('t_sasan', $arrayData, 'id_sasan', $id);

            if($data) {
                echo "<script>alert('Hadia dodos ho sucessu...!')</script>";
                echo "<script>window.location='../../d_sasan.html'</script>";
            } else {
                echo "<script>alert('ERROR!')</script>";
            }
        } else {

            $del = $_POST['foto'];
            if (!empty($del)) {

                unlink("../../foto_motor/$del");
                unlink("../../foto_motor/kiik_$del");

                foto_upload($name_file_unik);

                $arrayData = array(
                                "naran_sasan='".$_POST['naran_sasan']."'",
                                "modelu='".$_POST['modelu']."'",
                                "tinan_produz='".$_POST['tinan_produz']."'",
                                "cc_motor='".$_POST['cc_motor']."'",
                                "foto='".$name_file_unik."'",
                           );

                $data = $crud->update_data('t_sasan', $arrayData, 'id_sasan', $id);

                if($data) {
                    echo "<script>alert('Hadia dados ho sucesu...!')</script>";
                    echo "<script>window.location='../../d_sasan.html'</script>";
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