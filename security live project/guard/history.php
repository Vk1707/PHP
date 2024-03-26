
<?php
include_once('header.php');
if(isset($_POST['fine']))
{
    $pid = $_GET['p'];
    $tsql = "UPDATE `sc_getpass` SET `sc_action`='1' WHERE `sc_sno`='$pid'";
    $tres = mysqli_query($conn,$tsql);
    if($tres == true)
    {
        header('Location:history.php');
    }

}
?>

<div class="guard-lp">
    <div class="guard-sidebar">
        <div class="guard-logo">
            <img src="../assets/img/ismslog-new.png" class="img-fluid">
        </div>
        <div class="guard-menu">
            <p>History</p>
            <?php
            $sql = "SELECT * FROM `sc_getpass` WHERE `sc_action`='1'";
            $res = mysqli_query($conn,$sql);
            if(mysqli_num_rows($res) > 0)
            {
                while($row = mysqli_fetch_array($res))
                {
                    ?>
                    <ul>
                        <li><a href="history.php?p=<?php echo $row['sc_sno'];?>"><?php echo $row['sc_empname'];?></a></li>
                    </ul>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="guard-mainbar">
        <div class="guard-mainbar-top">
            
                <ul>
                    <li>
                        
                        <a href="getpass-request.php"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li>

                        <a href="history.php"><i class="fa fa-history"></i> History</a>
                    </li>
                    <li>
                        <i class="fa fa-user"></i> Security Guard
                    </li>
                    <li>

                        <a href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
                
           
        </div>
        <div class="guard-pass">
            <div class="dis-file-view">
                <table class="table text-dark table-bordered">
            <?php
                if(isset($_GET['p']))
                {
                    $pid = $_GET['p'];
                    $esql = "SELECT * FROM `sc_getpass` WHERE sc_sno='$pid'";
                    $eres = mysqli_query($conn,$esql);
                    $erow = mysqli_fetch_array($eres);
                    echo "
                                        <tr>
                                            <td colspan='2' class='text-center'> Gete Pass For Employee<br>
                                            <small>Timing 9:30 to 18:30</small>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Building Number</td><td>".$erow['sc_building']."</td>

                                        </tr>
                                        <tr>
                                            <td>Name of Employee</td><td>".$erow['sc_empname']."</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Employee ID</td><td>".$erow['sc_empid']."</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Will Employee Return</td><td>".$erow['sc_willreturn']."</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Process / Department</td><td>".$erow['sc_process']."</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Name of Manager</td><td>".$erow['sc_manager']."</td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td>Reason For Going Out</td><td>".$erow['sc_description']."</td>
                                            
                                        </tr>
                                        </table>
                                        <br>
                                        <table class='table text-dark table-bordered'>
                                        <tr>
                                            <td>Approved By</td><td>".$erow['sc_generator']."</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Date</td><td>".$erow['sc_getdate']."</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Time</td><td>".$erow['sc_gettime']."</td>
                                            
                                        </tr>
                                        
                                        

                                        

                                    ";

                }

            ?>
                </table>
            </div>
        </div>
        
    </div>
</div>

     <!-- Footer Start -->
        <div class="guard-footer">
            
            <div class="container copyright">
                <p><?php echo date('Y')?> &copy; <a href="#" style="color:red">Silaris Informations Pvt Ltd</a> | All Right Reserved.</p>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/js/bootstrap.js"></script>
        <script src="../lib/easing/easing.min.js"></script>
        <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="../lib/waypoints/waypoints.min.js"></script>
        <script src="../lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="../mail/jqBootstrapValidation.min.js"></script>
        <script src="../mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="../js/main.js"></script>
    </body>
</html>