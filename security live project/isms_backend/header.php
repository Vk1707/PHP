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
  	<link rel="stylesheet" href="../assets/css/bootstrap.css">
  	<script src="../assets/js/jquery.js"></script>
  	<script src="../assets/js/Chart.js"></script>
  	
</head>
  <body style="overflow-x: hidden;">
   <div class="row" style="background-color: #004684;padding: 0px 0px 0px 0px;height: 14px;" id="home">
    <div class="container"> </div>
  </div>
   <div class="row header_text" style=" margin-top: -20px; ">
    <div class="container">
      <div style="float: left;margin-left: -71px;padding-top: 20px;" class="col-md-1 emblemb"><img src="../imagest/emblemb.png" width="59" height="100" style=" margin-top: 18px; "></div>
      <div class="col-md-8 textheadingmain" style="display: inline;">
        <h1 style="font-size: 20px;line-height: 40px;font-weight: bold;font-family: initial;color: #004684;margin: 16PX 0PX 0PX 0PX;padding: 0px 0px 0px 0px;border: 0px solid #fff;">सूचना सुरक्षा प्रबंधन प्रणाली</h1>
        <h1 style="font-size: 28px;line-height: 40px;font-weight: bold;font-family: initial;color: #004684;margin: -8PX 0PX 0PX 0PX;padding: 0px 0px 0px 0px;border: 0px solid #fff;">Information Security Management System</h1>
        <h5 style="margin-top: 5px;color: #333;font-family: 'Open Sans', sans-serif;font-size: 14px;">ISO 27001:2022 | ISO 9001:2015 | PCI DSS Certified Organization</h5>
      </div>

      <div style="float: right;" class="col-md-3 emblemb2 text-center"><img src="../imagest/silaris.png" height="120px" style=" margin-top: -125px; "></div>
    </div>
  </div>
    </body>
</html>