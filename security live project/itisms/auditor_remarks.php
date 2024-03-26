<?php
include('header.php');
include_once("../emailconfig.php");

?>

<div class="main-dash">
    <div class="top-dash">
        <nav class="navbar navbar-expand-md bgdark navbar-dark">
            <!-- Brand -->
            <a class="navbar-brand" href="#">VERSION : 1.0.1</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <!-- <li class="nav-item">
			        <a class="nav-link" href="#">Home</a>
			      </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="#">Employee Formate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="isms-topics.php">ISMS Topics</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navbardrop"><i class="fa fa-user-circle"></i> <?php echo $adname ?></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.php"> <i class="fa fa-user"></i> Profile</a>
                            <a class="dropdown-item" href="password.php"><i class="fa fa-lock"></i> Password</a>
                            <a class="dropdown-item" href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
    <div class="side-dash">
        <?php include('sidebar.php'); ?>
    </div>
    <?php
    if (isset($_POST['add_trainee'])) {


        $sql_up = "UPDATE `sc_inventory` SET checker='$_POST[review_done]',auditor='$_POST[audit]',review='$_POST[reviewer]'";

        $sql_run = $conn->query($sql_up);
        if ($sql_run) {
            echo '<script>
                        
                        window.location.href="./software-data.php";
                        </script>';
        }
    }

    ?>




    <div class="" id="internal1">
        <div class="infernal-disp">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Remark</label>
                    <textarea class="form-control" name="_review" placeholder="Enter review"> </textarea>

                </div>

                <button type="submit" class="btn btn-primary" name="_submit_review">Submit</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_SERVER["REQUEST_METHOD"]) == "POST") {
        if (isset($_POST['_submit_review'])) {
            $revie_data = $_POST["_review"];

            if ($revie_data == " ") { ?>
                <script>
                    alert("Please Enter Review Details !");
                    window.location.href = './auditor_remarks.php';
                </script>
            <?php }

            $qry = "UPDATE `sc_inventory` SET `auditor_remark`='$revie_data'";
            $qry_run = $conn->query($qry);
            if ($qry_run) { ?>
                <script>
                    alert("Updated");
                    window.location.href = './software-data.php';
                </script>
    <?php }
        }
    }

    ?>
    <?php
    include('footer.php');
    ?>