<?php

$semana = array("Domingo","Segunda Feira","Tersa Feira","Quarta Feira","Quinta Feira","Sexta Feira","Sabado");
$loron = date("w");
$loron_ohin = $semana[$loron];

$data_agora = date("Ymd");
$dt_agr     = date("d");
$fln_agora = date("m");
$tin_agora = date("Y");
$horas_agora = date("H:i:s");

$naran_fln=array(1=> "Janeiru", "Fevereiru", "Marsu", "Abril", "Maiu",
                    "Junhu", "Julhu", "Agostu", "Septembru",
                    "Outubru", "Novembru", "Desembru");


function data_tl($dt)
{
    $data = substr($dt, 8, 2);
    $fulan = getBulan(substr($dt, 5, 2));
    $tinan = substr($dt, 0, 4);
    return $data.' '.$fulan.' '.$tinan;
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Janeiru";
            break;
        case 2:
            return "Fevereiru";
            break;
        case 3:
            return "Marsu";
            break;
        case 4:
            return "Abril";
            break;
        case 5:
            return "Maiu";
            break;
        case 6:
            return "Junhu";
            break;
        case 7:
            return "Julhu";
            break;
        case 8:
            return "Agostu";
            break;
        case 9:
            return "Septembru";
            break;
        case 10:
            return "Outubru";
            break;
        case 11:
            return "Novembru";
            break;
        case 12:
            return "Desembru";
            break;
    }
}



$seminggu = array("Domingu","Segunda","Tersa","Kuarta","Kinta","Sesta","Sabadu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$tgl_sekarang = date("Ymd");
$tgl_skrg     = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

$nama_bln=array(1=> "Janeiru", "Fevereiru", "Marsu", "Abril", "Maiu",
                    "Junhu", "Julhu", "Agostu", "Setembru",
                    "Outubru", "Novembru", "Dezembru");



$week = array("Sunday","Monday","Tuesday ","Wednesday ","Thursday ","Friday ","Saturday ");
$day = date("w");
$today = $week[$day];

$month=array(1=> "January", "February", "March", "April", "May",
                    "June", "July", "August", "September",
                    "October", "November", "December");
