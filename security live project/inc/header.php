<?php
session_start();
include('../config.php');
include('checkin.php');
admin();
$ademail = $_SESSION['ademail'];
$adname = $_SESSION['adname'];
$adid = $_SESSION['adid'];
$adpost = $_SESSION['adpost'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ISMS Security</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../assets/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="icon" type="image/gif" href="../assets/img/fevicon.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/light.css">
<link rel="stylesheet" type="text/css" href="../assets/css/light.css">
  	<link rel="stylesheet" href="../assets/css/bootstrap.css">
  	<script src="../assets/js/jquery.js"></script>
  	<script src="../assets/js/Chart.js"></script>

</head>
<body>