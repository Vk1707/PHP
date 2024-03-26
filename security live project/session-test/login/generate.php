<?php
include('header.php');
?>



<?php


if($_SERVER['REQUEST_METHOD']=="POST"){

if(isset($_POST['g_password'])){

$password= $_POST['password'];
$cpassword= $_POST['cpassword'];


if($password !="" and $cpassword !=""){


if($password==$cpassword){

$qry= "UPDATE sc_batch_trainee SET password = '$password' WHERE  id= $_GET[tmpid]";
$qry_res= $conn->query($qry);
if($qry){

echo "
<script>
alert('password Genrated');
window.location.href='../login';
</script>

";
}



}

else
{

 echo "<script>
 alert('PAssword Mismatch ');
window.location.href='../session-test/test/index.php'
</script>";
}
}
else
{

 echo "<script>
 alert('Enter Password And COnfirm Password ');
window.location.href='../session-test/test/index.php'
</script>";
}

}
}

?>
<body id="top">

<div class="page_loader"></div>

<!-- Login 36 start -->
<div class="login-36">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 bg-img">
                <div class="info clearfix">
                    <div class="name_wrap"><h1><span>Welcome To </span> ISMS </h1></div>
                    <p>Information security management system defines and manages controls that an organization needs to implement to ensure that it is sensibly protecting the confidentiality, availability, and integrity of assets from threats and vulnerabilities.</p>
                </div>
            </div>
            <div class="col-lg-6 form-section">
                <div class="form-inner">
                    <a href="login-36.html" class="logo">
                        <img src="assets/img/logos/logo.png" alt="logo">
                    </a>
                    <h3>Login To Start Your Test </h3>
                   <form action="#" method="POST">
                        <div class="form-group form-box">
                            <input type="password" name="password" class="form-control" placeholder="Generate Password" aria-label="Email Address">
                            <input type="password" name="cpassword" class="form-control" placeholder="Re-Enter Password" aria-label="Email Address">
                            <i class="flaticon-mail-2"></i>
                        </div>
                       
                        <div class="form-group">
                            <button name="g_password" type="submit" class="btn-md btn-theme w-100">Start Your Test Now</button>
                        </div>
                        
                    </form>
                    <div class="clearfix"></div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 36 end -->

<!-- External JS libraries -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS Script -->

</body>
</html>