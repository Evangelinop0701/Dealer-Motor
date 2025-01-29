<?php 
error_reporting();
session_start();
include "../../class/class.php";
include "../../class/funsi_thm.php";
$db = new database();
$user = new user();
$sasan = new sasan();
$crud = new CRUD();

$act = $_GET['act'];

switch ($act) {
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
                        echo "<script>window.location='../../mps.html'</script>";
                    }else {
                        
                    $arrayData = array(
                        'naran_mun' =>$emapData[1],
                    );

                    $data = $crud->insert_data('t_muni',$arrayData);
                     if($data) {
                        echo "<script>alert('Dados Importe sucesfuly')</script>";
                        echo "<script>window.location='../../mps.html'</script>";
                    } else {
                        echo "<script>alert('ERROR!')</script>";
                    }
            }
        }
            
         }else {
             echo "<script>alert('File extension is not .csv but this file is extension .".$file_extension."')</script>";
             echo "<script>window.location='../../mps.html'</script>";
         }


     break;
        case 'import_suku':
             $filename=$_FILES["file"]["tmp_name"];
             $file_name = $_FILES['file']['name'];
             $size = $_FILES["file"]["size"];
             $file_extension = explode('.', $file_name);
             $file_extension = strtolower(end($file_extension));
        
         if ($file_extension == "csv") {

                $file = fopen($filename, "r");
                while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
                    $array = count(array($emapData));
                    $dbarray = count(array('a','b','c'));
                    if (empty($emapData[1])) {
                        echo "<script>alert('Empty data..!')</script>";
                        echo "<script>window.location='../../mps.html'</script>";
                    }elseif ($array > $dbarray) {
                        echo "<script>alert('invalid Row in CSV File..!')</script>";
                        echo "<script>window.location='../../mps.html'</script>";
                    } else {
                    $arrayData = array(
                        'id_suku' =>$emapData[0],
                        'naran_suku' =>$emapData[1],
                        'id_postu' =>$emapData[2],
                    );

                    $data = $crud->insert_data('t_suku',$arrayData);
                     if($data) {
                        echo "<script>alert('Dados Importe sucesfuly')</script>";
                        echo "<script>window.location='../../mps.html'</script>";
                    } else {
                        echo "<script>alert('ERROR!')</script>";
                    }
            }
        }
            
         }else {
             echo "<script>alert('File extension is not .csv but this file is extension .".$file_extension."')</script>";
             echo "<script>window.location='../../mps.html'</script>";
         }
               
                break;
                case 'import_postu':
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
                        echo "<script>window.location='../../mps.html'</script>";
                    }else {
                    $arrayData = array(
                        'naran_postu' =>$emapData[1],
                        'id_mun' =>$emapData[2],
                    );

                    $data = $crud->insert_data('t_postu',$arrayData);
                     if($data) {
                        echo "<script>alert('Dados Importe sucesfuly')</script>";
                        echo "<script>window.location='../../mps.html'</script>";
                    } else {
                        echo "<script>alert('ERROR!')</script>";
                    }
            }
        }
            
         }else {
             echo "<script>alert('File extension is not .csv but this file is extension .".$file_extension."')</script>";
             echo "<script>window.location='../../mps.html'</script>";
         }
               
                break;
}


?>