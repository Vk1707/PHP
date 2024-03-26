<?php
include('header.html');
include_once("config.php");
include_once("emailconfig.php");
?>
 <?php
if(isset($_POST['sentd']))
{
    $fullname = $_POST['fullname'];
    $fullempid = strtoupper($_POST['fullempid']);
    $fullsubject = $_POST['fullsubject'];
    $yourmesg = $_POST['yourmesg'];

    date_default_timezone_set('Asia/Kolkata');
    $uploadon = date('Y-m-d');
    $daytime = date('Y-m-d h:i:s');

    $tst = "INSERT INTO sc_contactus (sc_empname,sc_empid,sc_subject,sc_message,sc_uploadon,sc_status) VALUES('$fullname','$fullempid','$fullsubject','$yourmesg','$daytime','1')";
    $tres = mysqli_query($conn,$tst);

        $mail->addAddress('isms@silaris.in', 'Tanay Dobhal');
        $mail->addCC('samarth.jain@silaris.in','Samarth Jain');
        $mail->Subject = $fullsubject;
        $mail->Body.= $yourmesg;
        $mail->Body.='<br><br>';
        $mail->Body.='Thank you!';
		$mail->Body.='<br>';
        $mail->Body.= $fullname;
		$mail->Body.='<br>';
        $mail->Body.= $fullempid;
		$mail->Body.='<br><br><br>';
		$mail->Body.= 'This mail generate form ISMS website, Contact Page.';
        $mail->send();

        if($tres == true)
        {
            echo "<script>alert('Message Sent Successfully!')</script>";
        }

}

 ?>       
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Contact Us</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>Get In Touch</p>
                    <h2>Contact for any query</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h2>Quick Contact Info</h2>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Opening Hour</h3>
                                    <p>Mon - Sat, 10:00 - 6:00</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Call Us</h3>
                                    <p>+91-11-66158716</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3>Email Us</h3>
                                    <p>isms@silaris.in</p>
                                    <p>isms.backend@silaris.in</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form method="POST" action="contact.php">
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" name="fullname" placeholder="Your Name" required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" name="fullempid" class="form-control" id="email" placeholder="Employee ID" required="required" >
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" name="fullsubject" class="form-control" id="subject" placeholder="Subject" required="required" >
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" name="yourmesg" id="message" placeholder="Message" required="required" ></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <button class="btn btn-custom" type="submit" name="sentd">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.5347025046512!2d77.14329241508284!3d28.643704382413468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d031efa1515e1%3A0xcf29803cecdf2106!2sSilaris%20Informations%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1651551838999!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


       <?php
    include('footer.html');
   ?>
