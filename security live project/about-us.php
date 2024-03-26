<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="source" content="Information Security Management System" />
    <meta name="author" content="Information Security Management System" />
    <meta name="description" content="Information Security Management System" />
    <meta name="keywords" content="Information Security Management System" />         
    <title>Information Security Management System (ISMS)</title>
    <link href="imagest/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>    
    <link rel="stylesheet" href="assetst/BootStrap/bootstrap.min.css">
    <link rel="stylesheet" href="assetst/dataTables/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assetst/dataTables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="assetst/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="assetst/css/AdminLTE.css">
    <link rel="stylesheet" href="assetst/Jquery/jquery-ui.min.css">
    <link rel="stylesheet" href="assetst/eventCalender/bootstrap-year-calendar.min.css">
    <link rel="stylesheet" href="assetst/chd/demo.css"><link rel="stylesheet" href="assetst/chd/style.css">
    <link rel="stylesheet" href="assetst/chd/css/main.css">
    <link rel="stylesheet" href="assetst/chd/css/responsive.css">
    <script src="assetst/Jquery/jquery-3.3.1.min.js"></script>
    <script src="assetst/Jquery/jquery-migrate-1.4.1.min.js"></script>
    <script src="assetst/BootStrap/bootstrap.min.js"></script>
    <script src="assetst/Jquery/jquery-ui.min.js"></script>
    <script src="assetst/eventCalender/bootstrap-year-calendar.min.js"></script>
    <script src="assetst/ClientChk/jquery.md5.js"></script>
    <script src="assetst/ClientChk/jsValidatorv4.js"></script>
    <script src="assetst/ClientChk/callValidation.js"></script>
    <script src="assetst/ClientChk/custom-frm-err.js"></script>
    <script src="assetst/jqprint/jqprint-0.3.js"></script>
    <script src="assets/dataTables/jquery.dataTables.min.js"></script>
    <script src="assetst/dataTables/dataTables.responsive.min.js"></script>
    <script src="assetst/dataTables/dataTables.bootstrap.min.js"></script>
    <script src="assetst/base64EncDec/jquery.base64.js"></script>
    <script src="assetst/vscroller/jquery-scroller-v1.min.js"></script>
    <script src="assetst/highlight/jquery.highlight-5.closure.js"></script>
    <script src="assetst/icwa/js/jquery.flexslider.js"></script>
    <link href="assetst/ddpnoc/css/main.css" rel="stylesheet">
 <style>
  body {font-family: Arial, Helvetica, sans-serif;}

  /* Full-width input fields */
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }

  /* Set a style for all buttons */
  button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    opacity: 0.8;
  }

  /* Extra styles for the cancel button */
  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }

  /* Center the image and position the close button */
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
  }

  img.avatar {
    width: 40%;
    border-radius: 50%;
  }

  .container {
    padding: 16px;
  }

  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
  }

  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
  }

  /* The Close Button (x) */
  .close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: red;
    cursor: pointer;
  }

  /* Add Zoom Animation */
  .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
  }

  @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
  }

  @keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
  }
  </style>
  <style>

.tickerpanle_maine {
    margin: 2px 0px 5px 0px!important;
    padding: 8px 0px 10px 0px!important;
    background-color: #e0e0e0;
    line-height: 30px;
    color: #fff;
}

.tickerpanle_maine_heading {
    text-align: center;
    background-color: #253898;
    line-height: 42px;
    color: #f9f9f9;
    font-weight: bold;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

.tickerpanle_maine_mar {
    background-color: #d0d4ec;
    color: red;
    font-size: 17px;
    border-bottom: 1px solid #253898;
    border-top: 1px solid #253898;
    border-right: 5px solid #253898;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    
}

.tickerpanle_maine_view {
    text-align: center;
    background-color: #253898;
    line-height: 42px;
    color: #fff;
    font-weight: bold;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}

</style>
<style>


.content {
  max-width: 90%;
  
  background: white;
  padding: 0px;
}
</style>
<style>
button .linkloginicon
{
    color: #000!important;
}
button .linkloginicon:hover
{
    color: #fff!important;
}

</style>
</head>
<style>
button .linkloginicon
{
    color: #000!important;
}
button .linkloginicon:hover
{
    color: #fff!important;
}

</style>
<body>
	
  
         <?php
include('header.php');
?>
        
         <div class="row content">    

		<div class="row newspanelmain" style="margin: 0;">
			<div class="container">
				<h3 class="box-title headingmain_top">About Us</strong></h3>

<p style="text-align: justify;">Information security management system defines and manages controls that an organization needs to implement to ensure that it is sensibly protecting the confidentiality, availability, and integrity of assets from threats and vulnerabilities.</p>

<p style="text-align: justify;">It includes the processes, people, technology, and procedures that are designed to protect against unauthorized access, use, disclosure, disruption, modification, or destruction of information.</p>
<p style="text-align: justify;">Information security management system defines and manages controls that an organization needs to implement to ensure that it is sensibly protecting the confidentiality, availability, and integrity of assets from threats and vulnerabilities.</p>
<p style="text-align: justify;">It includes the processes, people, technology, and procedures that are designed to protect against unauthorized access, use, disclosure, disruption, modification, or destruction of information.</p>

<!-- <p style="text-align: justify;">The Export Promotion Cell in the Department of Defence Production (DDP) facilitates export and import of Munitions List items by way of issue of export authorisation/license and import license to the defence industry.</p>

<ul style="list-style: upper-alpha;text-align: justify;">
	<li><strong>Export Regulation</strong>
		<ol>
			<li>DGFT vide Notification No. 5/2015-2020 dated 24th April, 2017, has notified the	Munitions List in Category 6 of Special Chemicals, Organisms, Materials, Equipment and Technologies (SCOMET). The export of Items specified in Category 6 of SCOMET (Munitions List), (except those covered under Note 2 and 3 of Commodity Identification Note of the SCOMET and items in Category 6A007 and 6A008 of SCOMET) is governed by the extant Standard Operating Procedure (SOP) issued by the Department of Defence Production in the Ministry of Defence vide No.1(4)/2016-D(EPC) dated 1st Nov., 2018.  Unless prohibited, export of Munitions List item is permitted	against an Authorisation issued by the Department of Defence Production. The detailed Procedure is provided in SOP for export of Munitions List Items for different purposes such as actual export, export for testing and evaluation purposes, participation in tenders/ exhibitions, exploring business opportunities abroad and transfer of technology/software.</li>
			<li>MHA vide Notification No. V11026/164/2018-Arms dated 01/11/2018 has delegated its powers & functions exercised performed by it under Section 10 of 	the Arms Act 1959 to Department of Defence Production for export of Arms & Ammunition specified in Schedule I of the Arms Rule 2016. The export licence  in Form-X-A for the fire arms and nine  (9) parts specified in para 2(vi) of the MHA Notification dated 01/11/2018.</li>
		</ol>
	</li>
	<li><strong>Export Profile of Indian Defence Industry</strong>
		<ol>
			<li>The value of export by Defence Public Sector Undertakings (DPSUs), Ordnance Factory Boards (OFBs) and private defence industry (based on the authorisations issued) for the financial year <strong>2018-19  is Rs.10745.77 Crores</strong>.</li>
			<li>About 50 Indian companies in the private sector have contributed to defence exports.  Some of the major export destinations for defence products have been Italy, 	Maldives, Sri Lanka, Russia, France, Nepal, Mauritius, Sri Lanka, Israel, Egypt, UAE, Bhutan, Ethiopia, Saudi Arabia, Philippines, Poland, Spain and Chile etc.  The major defence items being exported are Personal Protective items, Offshore Patrol Vessels, ALH Helicopter, SU Avionics, Bharati Radio, Coastal Surveillance Systems, Kavach MoD II Launcher and FCS, Spares for Radar, Electronic System and Light Engineering Mechanical Parts etc.</li>
		</ol>
	</li>
	<li><strong>Import Regulation</strong>
		<ol>
			<li>The Directorate General of Foreign Trade (DGFT) vide Order dated 28/05/2018 authorized the Department of Defence Production for the items enclosed therewith to grant or renew or refuse to grant or renew licence or to suspend or cancel a licence for the purpose of import of such class or classes of goods or services or technologies.</li>
			<li>Standard Operating Procedure (SOP) for issue of Import License is notified by the Department of Defence Production in the Ministry of Defence vide .No. 19(2)/2018/D(EPC) dated 7th Jan 2019.  Unless prohibited, import of restricted items as mentioned in the annexure to the DGFT order dated 28.5.2018 is permitted against license issued by the Department of Defence Production. The detailed Procedure is provided in SOP for export of Munitions List Items.</li>
		</ol>

	</li>
	<li>Export Leads</li>
</ul> -->
			</div>
		</div>

		<div class="row">    
			<!-- <div class="row" style=" padding-top: 0px; margin: 0; ">
  <div class="signup " id="signup">
   <div class="container" style="padding: 0px;">
     <div class="span12" style="background-color: #fff; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; margin: 0;"><img src="images/botomicon.jpg" width="100%" /></div>     
   </div>
 </div>
</div> -->
 <?php
include('footer.php');
?>


</body>

</html>