<?php
error_reporting(0);
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
            'naran_cliente' => $_POST['naran_cliente'],
            'sexu' => $_POST['sexu'],
            'id_suku' => $_POST['id_suku'],
            'data_moris' => $_POST['data_moris'],
            'hela_fatin' => $_POST['hela_fatin']
    );

        $data = $crud->insert_data('t_cliente', $arrayData);


        if($data) {
            echo "<script>alert('Dados Rai ona...!')</script>";
            echo "<script>window.location='../../cliente.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }

        break;

    case 'update':
        $id = $_GET['id'];
        $arrayData = array(
            "naran_cliente='".$_POST['naran_cliente']."'",
            "sexu='".$_POST['sexu']."'",
            "id_suku='".$_POST['id_suku']."'",
            "data_moris='".$_POST['data_moris']."'",
            "hela_fatin='".$_POST['hela_fatin']."'"
        );

        $data = $crud->update_data('t_cliente', $arrayData, 'id_cliente', $id);

        if($data) {
            echo "<script>alert('Hadia dados ho sucessu...!')</script>";
            echo "<script>window.location='../../cliente.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
        }
        break;

    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_cliente', 'id_cliente', $id);

        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../cliente.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: stock.html');
        }
            break; 
        case 'import':
             $filename=$_FILES["file"]["tmp_name"];
             $file_name = $_FILES['file']['name'];
             $size = $_FILES["file"]["size"];
             $file_extension = explode('.', $file_name);
             $file_extension = strtolower(end($file_extension));
        
         if ($file_extension == "csv") {

                $file = fopen($filename, "r");
                while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
                    if (empty($emapData[1])) {
                        echo "<script>alert('Empty data..!')</script>";
                        echo "<script>window.location='../../cliente.html'</script>";
                    }else {
                    $arrayData = array(
                        'naran_cliente' =>$emapData[1],
                        'sexu' =>$emapData[2],
                        'id_suku' => $emapData[3],
                        'data_moris' => $emapData[4],
                        'hela_fatin' => $emapData[5]
                    );

                    $data = $crud->insert_data('t_cliente',$arrayData);
                     if($data) {
                        echo "<script>alert('Dados Importe sucesfuly')</script>";
                        echo "<script>window.location='../../cliente.html'</script>";
                    } else {
                        echo "<script>alert('ERROR!')</script>";
                    }
            }
        }
            
         }else {
             echo "<script>alert('File extension is not .csv but this file is extension .".$file_extension."')</script>";
             echo "<script>window.location='../../cliente.html'</script>";
         }


            break;
}