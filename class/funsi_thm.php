<?php

function foto_upload($fupload_name)
{
    $vdir_upload = "../../foto_motor/";
    $vfile_upload = $vdir_upload . $fupload_name;

    move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

    $im_src = imagecreatefromjpeg($vfile_upload);
    $src_width = imageSX($im_src);
    $src_height = imageSY($im_src);

    $dst_width = 200;
    $dst_height = ($dst_width/$src_width)*$src_height;

    $im = imagecreatetruecolor($dst_width, $dst_height);
    imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

    imagejpeg($im, $vdir_upload . "kiik_" . $fupload_name);

    imagedestroy($im_src);
    imagedestroy($im);
}


function fototbdr($fupload_name)
{
    $vdir_upload = "../../foto_trabalhador/";
    $vfile_upload = $vdir_upload . $fupload_name;

    move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

    $im_src = imagecreatefromjpeg($vfile_upload);
    $src_width = imageSX($im_src);
    $src_height = imageSY($im_src);

    $dst_width = 200;
    $dst_height = ($dst_width/$src_width)*$src_height;

    $im = imagecreatetruecolor($dst_width, $dst_height);
    imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

    imagejpeg($im, $vdir_upload . "kiik_" . $fupload_name);

    imagedestroy($im_src);
    imagedestroy($im);
}