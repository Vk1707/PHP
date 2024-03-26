<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form action="./login_action.php" method="post">
					<input type="email" name="logemail" class="trity" required placeholder="Email..." style=" width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; ">
					<input type="password" name="logpass" class="trity" required placeholder="Password...">
					<input type="submit" name="login" class="btn btn-info" required>
				  </form>
					
				  <div class="login-help">
					<a href="#">Register</a> - <a href="reset.php">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>
<div class="modal fade" id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form action="./login_action.php" method="post">
					<input type="email" name="logemail" class="trity" required placeholder="Email..." style=" width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; ">
					<input type="password" name="logpass" class="trity" required placeholder="Password...">
					<input type="submit" name="login" class="btn btn-info" required>
				  </form>
					
				  <div class="login-help">
					<a href="#">Register</a> - <a href="reset.php">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>
<div class="modal fade" id="login-modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form action="./login_action.php" method="post">
					<input type="email" name="logemail" class="trity" required placeholder="Email..." style=" width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; ">
					<input type="password" name="logpass" class="trity" required placeholder="Password...">
					<input type="submit" name="login" class="btn btn-info" required>
				  </form>
					
				  <div class="login-help">
					<a href="#">Register</a> - <a href="reset.php">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>
<script type="text/javascript">
     fnBrowserDetect('83jjuh9qmi4vr60vb6uuok26m4');
</script>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>





<script type="text/javascript">
      $(".modal-dialog").css("width", "550px");
      $("input[type='radio']").change(function(){
        var log_as = $("input[type='radio'][name='log_as']:checked").val();
        if(log_as==1){
          $("#log_label").text("Login (IEC Number)");
          $('#T1').attr("placeholder", "IEC Number");
        }
        else{
          $("#log_label").text("Login");
          $('#T1').attr("placeholder", "Email ID");
        }
      })
</script><div class="modal-container"></div>
 <script>//setCookie("hitcount","1");</script>
 

<footer id="footer">
  <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="container text-center">

      <a href="#" title="Discalaimer">Disclaimer</a>   |   
      <!-- <a href="#">Accessibility Options</a>   |    -->
      <a href="#" title="Copyright Policy">Copyright Policy</a>   |   
      <!-- <a href="show_content.php?id=10" >Website Policies</a>   |    -->
      <a href="#" title="Terms & Conditions">Terms & Conditions</a>   |   
      <a href="#" title="Help">Help</a></li>    |   
      
      <!-- <a href="show_content3a9f.html?id=6" title="MIS">MIS</a>    |    -->
      <a href="#" title="FAQs">FAQs</a>   |   
      <a href="#" title="Contact Us">Contact Us</a>
      
      
             
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-sm-12" style=" text-align: center; ">
          <p>&copy; 2023 || Information Security Management System <a style=" color: red; font-size: 18px; " href="isms-admin">Admin Access</a></p>
        </div>

        <!-- <div class="col-sm-2 visitor_counter" >
          <strong>Visitor Counter:</strong>  992178        </div> -->

      </div>
    </div>
  </div>
</footer>


<script src="captcha/captcha.js" defer=""></script>
<!-- <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- for footer links smooth scroll -->
<script type="text/javascript" src="assetst/ddpnoc/js/lay/wow.min.js"></script>
<script type="text/javascript" src="assetst/ddpnoc/js/lay/mousescroll.js"></script>  
<script type="text/javascript" src="assetst/ddpnoc/js/lay/main.js"></script>

<script type="text/javascript">
 $(document).ready(function(){
  $('#frmsub').click(function(){
    $('#formLogin').submit();
  })
  $('#T2,#T1,#T3').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
      $('#formLogin').submit();
    }
  });
        //refreshCaptcha();
        $('#formLogin').formChecks({addlFunc:CallBackME(),ajaxSubFunc:verifyMe}).SetToFirstFocus();
        var url = "resetPass.html";
        jQuery('#passForgot').click(function(e) {
          $('#exampleModalCenter').modal('toggle');
          $('.modal-container').load(url,function(result){
            $('#PopWind').modal({show:true});
          });
        });

        $('#flexCarousel').flexslider({
            animation: "slide",
            animationLoop: true,
            controlNav: false,
            itemWidth: 200,
            // itemMargin: 105,
            });


      });

 function verifyMe(){
  $.ajax({
    type     : "POST",
    dataType: "json",
    cache    : false,
    url      : $('#formLogin').attr('action'),
    data     : $('#formLogin').serialize(),
    beforeSend: function(){
      $.fn.ajaxLoading();
    },
    success  : function(data) {
                // console.log(data[3]);
                if(data[0]){
                  if(data[3]!= undefined && data[3][0]==false){
                        //console.log(data[3][1])
                        window.location.replace(data[3][1]);
                      }
                    }
                    else{
                      $('#formLogin')[0].reset();
                      $('#hash').val('');
                      $('#hash1,#hash2').val('eaa8b15e3da7076629b470c5ad5445e5');
                      refreshCaptcha();
                      if(data[1]!= undefined && data[1][0]==true){
                        FEror=data[1][1];
                        //console.log(FEror)
                        $.fn.ShowError(FEror);
                      }
                      else if(data[2]!= undefined && data[2][0]==true){
                        MEror=data[2][1];
                        //console.log(MEror);
                        $('#ShowMsg').html("<div class='alert fade in col-md-10 col-xs-offset-1 model-width "+data[2][2]+"'><a href='#' class='close' data-dismiss='alert'>&times;</a>"+MEror+"</div>");
                      }
                      else{
                        $.fn.custom_alert({msg:'Request not Completed Successfully!'});
                      }
                    }
                  },
                  error:function(){
                    $('#ShowMsg').html("<div class='alert fade in col-md-10 col-xs-offset-1 model-width alert-info'><a href='#' class='close' data-dismiss='alert'>&times;</a>Something went wrong, Please try again!</div>");
                  },
                  complete: function(){
                    $.fn.ajaxLoading({show:false});
                  },
                });
}

function CallBackME(){
  $('#hash').val('');
  $('#hash1,#hash2').val('eaa8b15e3da7076629b470c5ad5445e5');
}
console.log('LiveUsers:' +9);
</script></div>


<?php
if(isset($_POST['login']))
{

  $logemail = $_POST['logemail'];
  $logpass = $_POST['logpass'];


  $sql = "SELECT * FROM `sc_users` WHERE sc_email='$logemail' AND sc_pass='$logpass' AND sc_status='1'";
  $res = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($res);
  $welpost = @$row['sc_post'];
  $_SESSION['ademail'] = @$row['sc_email'];
  $_SESSION['adname'] = @$row['sc_name'];
  $_SESSION['adid'] = @$row['sc_emapid'];
  $_SESSION['adepart'] = @$row['sc_process'];
  $_SESSION['adpost'] = @$row['sc_post'];

  $build = @$row['sc_building'];
  $d1= @$row['sc_uploadon'] ;
   $d2=date_create("$d1");
   date_format($d2,'Y-m-d');
   $d3= date('Y-m-d');
   $d4= date_create($d3);
   date_format($d4, 'Y-m-d');
   $d5=date_diff($d2,$d4);
   $d6=$d5->format('%R%a');
   if($d6>30)
   {
     
     echo "<script>
     window.location.href = 'password-expired.php?em=$logemail';
      alert('Your Password has been Expired!');</script>";
   

   }
  else  if($row == true)
  {
    switch($welpost)
    {
      case"User":
      if($_SESSION['ademail']=='isms.backend@silaris.in')
      {
        header ('Location:isms_backend/dashboard.php');
      }
      else if($_SESSION['ademail']=='rajat.chopra@silaris.in')
      {
        header ('Location:IT-AM/dashboard.php');
      }
      else if($_SESSION['ademail']=='ekta.it@silaris.in')
      {
        header ('Location:IT-backend/dashboard.php');
      }
        else if($_SESSION['ademail']=='tariq.zubair@silaris.in')
      {
        header ('Location:finance/dashboard.php');
      }
      else
      {
      header('Location:user/dashboard.php');
      }
      break;
      case"HR":
      header('Location:hr/dashboard.php');
      break;
      case"VP":
      if($_SESSION['ademail']=='samarth.jain@silaris.in')
      { header('Location:itvp/dashboard.php');
      }
      else
      { header('Location:vp/dashboard.php');
      }
      break;
      case"ISMS":
      header('Location:itisms/dashboard.php');
      break;
      case"Network":
      header('Location:itnetwork/dashboard.php');
      break;
      case"CEO":
      header('Location:ceo/dashboard.php');
      break;
      case"CIO":
      header('Location:cio/dashboard.php');
      break;
          case"AVP_Master":
      header('Location:avpmaster/dashboard.php');
      break;
      case"AVP":
      if($_SESSION['ademail']=='sunita.yadav@silaris.in')
      { 
            header('Location:hravp/dashboard.php');
        }
        else
        {
      header('Location:avp/dashboard.php');
        }
      break;
          case"SRMGR":
      header('Location:srmgr/dashboard.php');
      break;
      case"Email":
      header('Location:itemail/dashboard.php');
      break;
          case"Guard":
          switch($build)
            {
              case"14A":
              header('Location:guard/s14-1.php');
              break;
              case"14B":
              header('Location:guard/s14-2.php');
              break;
              case"14C":
              header('Location:guard/s14-3.php');
              break;
              case"A6":
              header('Location:guard/a-6.php');
              break;
              case"A7":
              header('Location:guard/a-1.php');
              break;
              case"A1":
              header('Location:guard/a-1.php');
              break;
            }
      
      break;
    }
  }
  else
  {
    echo "<script>alert('User Password Wrong! Try Again')</script>";
  }

  }
?>