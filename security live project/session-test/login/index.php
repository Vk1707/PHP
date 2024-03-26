<?php include 'header.php';?>

<?php 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        print_r($_POST);
        $username = $_POST["username"];
            $username= str_replace("ISMSTMP"," ",$username);

        $password = $_POST["password"];

        if ($username != "" && $password != "") {


            $qry = "SELECT * FROM `sc_batch_trainee` WHERE id='$username'";
            
            $qry_res = $conn->query($qry);
            if (mysqli_num_rows($qry_res) > 0) {

                $row = mysqli_fetch_array($qry_res);
                $is_password = $row["password"];

                if ($is_password != 0) {


                    if ($is_password == $password) {

                        $_SESSION["userid"] = $row["id"];
                        $_SESSION["username"] = $row["trainee_name"];

                        echo "<script>
                    window.location.href='../../session-test/test/index.php'
                        </script>";
                    }
                } else {




                    echo "<script>
                window.location.href='generate.php?tmpid=$row[id]'
                </script>";
                }
            }
        } else {
            echo "<script>
            alert('wrong credential');
            
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
            <div class="col-lg-6 form-section" id="agentlogin">
                <div class="form-inner">
                    <a href="login-36.html" class="logo">
                        <img src="assets/img/logos/logo.png" alt="logo">
                    </a>
                    <h3>Login To Start Your Test </h3>
                    <form action="#" method="POST">
                        <div class="form-group form-box">
                            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Employee ID">
                            
 			                       </div>
 										 <div class="form-group form-box">
                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Employee ID">
                            
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" name="login" class="btn-md btn-theme w-100">Generate Password</button>
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