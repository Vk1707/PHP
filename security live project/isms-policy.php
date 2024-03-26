<?php
include('header.html');
include_once("config.php");
include_once("emailconfig.php");
?>
      
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>ISMS Policy</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="isms-policy.php">isms policy</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-3">
                        <div class="contact-info">
                            <ul class="typelist">
                          <?php
								$sql = "SELECT * FROM `sc_ismsfile`";
								$res = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($res))
								{
									?>
									<li><a href="uploads/<?php echo $row['sc_filetemp']?>" target="iframe_a"><i class="fa fa-angle-double-right"></i> <?php echo $row['sc_filename']?></a></li>
									<?php
								}
							?>
                        </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="contact-info">
                          <iframe src="" name="iframe_a" class="iframeclass">			
						</iframe>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Contact End -->


       <?php
    include('footer.html');
   ?>
