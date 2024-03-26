<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
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
    <script src="assetst/dataTables/jquery.dataTables.min.js"></script>
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

<body>
 
  <?php
include('header.php');
?>


  

  <div class="row content">    
        <header>
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
                                      
                  <!-- Wrapper for slides -->
                
                                         <div class="item active slidermainheight" style="background-repeat: no-repeat; background-position: top center; background-size: contain; background-image: url(WriteReadData/MD32145/1.jpg)">
                        
                       
                          </div>
                                               <div class="item  slidermainheight" style="background-repeat: no-repeat; background-position: top center; background-size: contain; background-image: url(WriteReadData/MD32145/2.jpg)">
                        
                       
                          </div>
                                               <div class="item  slidermainheight" style="background-repeat: no-repeat; background-position: top center; background-size: contain; background-image: url(WriteReadData/MD32145/3.jpg)">
                        
                       
                          </div>
                                               
                                               
                                                  </div>
                      <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                     <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

    
</div>
 <div class="row tickerpanle_maine">
        <div class="container" style="padding-top: 0px;padding-bottom: 0px;">
            <div class="row">
              <marquee><h4>This website helps you to get in touch with ISMS/Cyber Security awareness/critical updates related to information security & policy.</h4></marquee>
                
            </div>
        </div>
    
    </div>

</header>
    
    
    
    
    
    
      
    
    
    
    
    
    
    
  
    
    
      </div>





<div class="row newspanelmain content">
  <div class="container" style="margin-top: -25px;">
    <style type="text/css">
  .fa-file-pdf-o{
    color: red!important;
  }
</style>

        <div class="row" style="margin-top: 1%;">
       

      <div class="col-sm-8" style="background-color: #f1f1f1!important; padding: 20px 20px 10px 20px;">
        <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
     
                      <a class=""  title='Welcome to Defence Exports Promotion' href='#'><h2  class="newsheading">Welcome to Information Security Management System</h2>
                      </a>                    
                     <p class="textmatter_content">
<p style="text-align: justify;"><span style="color: #000000; font-family: verdana, geneva, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #f1f1f1; text-decoration-style: initial; text-decoration-color: initial; float: none; display: inline !important;">Information security management system defines and manages controls that an organization needs to implement to ensure that it is sensibly protecting the confidentiality, availability, and integrity of assets from threats and vulnerabilities.<br>It includes the processes, people, technology, and procedures that are designed to protect against unauthorized access, use, disclosure, disruption, modification, or destruction of information.<br>Information security management system defines and manages controls that an organization needs to implement to ensure that it is sensibly protecting the confidentiality, availability, and integrity of assets from threats and vulnerabilities.<br>It includes the processes, people, technology, and procedures that are designed to protect against unauthorized access, use, disclosure, disruption, modification, or destruction of information.</span></p>
</p>
                 
                          
                           </div>
                           </div>
                                                       <div class="col-sm-4" style=" padding: 20px 20px 10px 20px;">
        <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <a class=""  title='What&#039;s New' href='#'><h2  class="newsheading">What&#039;s New</h2>
                      </a>        </div>
        <div class="newspanellink">
                           <div class="newslinktext vertical_scroller" id="news_scroll">    
                                                <ul class="scrollingtext">
                                                        <li><a class="analysislinks" target="_blank" title='Cabinet approves export of Akash Missile System' href='#'>Information Security Management System</a></li>

                                                            <li><a class="analysislinks" target="_blank" title='Lines of Credit-Related issues' href='#'>Information Security Management System</a></li>

                                                            <li><a class="analysislinks" target="_blank" title='OGEL Notification for ToT' href='#'>Information Security Management System</a></li>

                                                            <li><a class="analysislinks" target="_blank" title='OGEL Notification for Parts and Components' href='#'>Information Security Management System</a></li>

                                                            <li><a class="analysislinks" target="_blank" title='Scheme for Promotion of MSMEs in Defence' href='#'>Information Security Management System</a></li>

                                                            <li><a class="analysislinks" target="_blank" title='Defence Attache Scheme for Export Promotion' href='#'>Information Security Management System</a></li>

                                                            <li><a class="analysislinks" target="_blank" title='Sending commercial proposals for Export of Defence equipments' href='#'>Information Security Management System</a></li>

                                                            <li><a class="analysislinks" target="_blank" title='Appointment of channel partners / agents Overseas' href='#'>Information Security Management System</a></li>

                                                            <li><a class="analysislinks" target="_blank" title='Export Lead- Sending information obtained during visit abroad to Export Promotion Cell' href='#'>Information Security Management System</a></li>

                                                            <li><a class="analysislinks" target="_blank" title='Enhancement of Defence Exports- Allocation of Geographical region to DPSUs/OFB Published On :  09, October 2020' href='#'>Information Security Management System</a></li>
                                                        
                        </ul>
                                                        </div>
            <div style="float:left;"  class="viewallwhats">
              <a href="javascript:void(0);"><i class="fa fa-pause" id="new_pause"></i></a> &nbsp;&nbsp;&nbsp;
              <a href="javascript:void(0);"><i class="fa fa-play" id="new_play"></i></a> </div>
          
          <!--  Whats New Close  --->
        </div>
      </div>
      
                            

           
    </div>

         <script type="text/javascript">
        $(function(){    
            $('.vertical_scroller').SetScroller({ velocity: 80,
                          direction:   'vertical',
                          startfrom:   'bottom',
                          loop:    'infinite',
                          movetype:    'linear',
                          onmouseover: 'pause',
                          onmouseout:  'play',
                          onstartup:   'play',
                          cursor:    'pointer',
                        });
            if($('.scrollingtext').length<=0){
                $('.vertical_scroller').hide();
            }
            $('#new_pause, #new_play').click(function(){
              if($(this).closest(".vertical_scroller")){
                
              if($(this).hasClass('fa-play'))
                $("#news_scroll").PlayScroller();
              else
                $("#news_scroll").PauseScroller();
              }
            })

        $('.fa-pause, .fa-play').click(function(event) {
          var tarDom=$(this).data('target');
          if($(this).hasClass('fa-pause'))
            $(tarDom).carousel('pause');
          else
            $(tarDom).carousel('cycle');
          // console.log($(tarDom).attr("data-interval").length)
        });
      })
    </script>


  </div>
</div>

<div class="row">    
  <!-- <div class="row" style=" padding-top: 0px; margin: 0; ">
  <div class="signup " id="signup">
   <div class="container" style="padding: 0px;">
     <div class="span12" style="background-color: #fff; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; margin: 0;"><img src="imagest/botomicon.jpg" width="100%" /></div>     
   </div>
 </div>
</div> -->



  <?php
include('footer.php');
?>

</body>

</html>