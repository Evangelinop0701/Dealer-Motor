<?php

session_start();

include 'class/class.php';
include "class/lib.php";


$db = new database();
$user = new user();


$username = substr($_POST['username'], 0, 2);
if ($username<>20) {
    $login = $user->chek_login($_POST['username'], $_POST['passwords']);
    $id_session=session_id();
    $username=$_SESSION['username'];
    $last_log=date("Y-m-d H:i:s");
    $user->updatesession($username, $last_log, $id_session);

    if ($login) {
        echo "<script>   
            alert('Login ho sucessu..!!');
            document.location='home.html';</script>";
    } else {
        echo "<script>   
            alert('Sorry, Username ou password Lalos!!');
            document.location='login.html';</script>";

    }
}
