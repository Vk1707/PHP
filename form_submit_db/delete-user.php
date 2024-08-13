<?php
include_once("connec.php");

$id = $_GET['id'];
$img = GetImg($id);
print_r($img);
$upload_folder = "uploads/";

unlink($upload_folder . $img['profile_img']);


DeleteUser($id);
// header('location:display.php');