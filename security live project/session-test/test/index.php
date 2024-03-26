<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISMS Test</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>
<style>
    * {
        margin: 0px;
        padding: 0px;
    }

    body {
        font-family: 'Open Sans', sans-serif;
    }

    #signUpForm {
        /* max-width: 500px; */
        background-color: #ffffff;
        margin: 40px auto;
        padding: 40px;
        box-shadow: 0px 6px 18px rgb(0 0 0 / 9%);
        border-radius: 12px;
    }

    #signUpForm .form-header {
        gap: 5px;
        text-align: center;
        font-size: .9em;
    }

    #signUpForm .form-header .stepIndicator {
        position: relative;
        flex: 1;
        padding-bottom: 30px;
    }

    #signUpForm .form-header .stepIndicator.active {
        font-weight: 600;
    }

    #signUpForm .form-header .stepIndicator.finish {
        font-weight: 600;
        color: #009688;
    }

    #signUpForm .form-header .stepIndicator::before {
        content: "";
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        z-index: 9;
        width: 20px;
        height: 20px;
        background-color: #d5efed;
        border-radius: 50%;
        border: 3px solid #ecf5f4;
    }

    #signUpForm .form-header .stepIndicator.active::before {
        background-color: #a7ede8;
        border: 3px solid #d5f9f6;
    }

    #signUpForm .form-header .stepIndicator.finish::before {
        background-color: #009688;
        border: 3px solid #b7e1dd;
    }

    #signUpForm .form-header .stepIndicator::after {
        content: "";
        position: absolute;
        left: 50%;
        bottom: 8px;
        width: 100%;
        height: 3px;
        background-color: #f3f3f3;
    }

    #signUpForm .form-header .stepIndicator.active::after {
        background-color: #a7ede8;
    }

    #signUpForm .form-header .stepIndicator.finish::after {
        background-color: #009688;
    }

    #signUpForm .form-header .stepIndicator:last-child:after {
        display: none;
    }

    #signUpForm input {}

    #signUpForm input:focus {
        border: 1px solid #009688;
        outline: 0;
    }

    #signUpForm input.invalid {
        border: 1px solid #ffaba5;
    }

    #signUpForm .step {
        display: none;
    }

    #signUpForm .form-footer {
        overflow: auto;
        gap: 20px;
    }

    #signUpForm .form-footer button {
        background-color: #009688;
        border: 1px solid #009688 !important;
        color: #ffffff;
        border: none;
        padding: 13px 30px;
        font-size: 1em;
        cursor: pointer;
        border-radius: 5px;
        flex: 1;
        margin-top: 5px;
    }

    #signUpForm .form-footer button:hover {
        opacity: 0.8;
    }

    #signUpForm .form-footer #prevBtn {
        background-color: #fff;
        color: #009688;
    }

    .inpt-box {
        margin: 10px;
        display: inline-block;
        flex-direction: row;
    }

    .inpt-box:focus {
        background-color: red;
    }

    input[type="radio"] {
        visibility: hidden;
        height: 0;
        width: 0;
    }

    input[type="radio"]:checked+label {
        background-color: #00a447;
        color: rgb(255, 255, 255);
    }

    .inpt-box label {
        padding: 5px 30px 5px 30px;
        border-radius: 10px;
        border: 1px solid rgb(202, 202, 202);
        background-color: rgb(244, 244, 244);
        cursor: pointer;
    }

    .inpt-box label:hover {


        background-color: rgb(202, 227, 255);

    }
</style>

<body>
<div class="row" style="background-color: #004684;padding: 0px 0px 0px 0px;height: 14px;" id="home">
    <div class="container"> </div>
  </div>
   <div class="row header_text" style=" margin-top: -20px; ">
    <div class="container">
      <div style="float: left;margin-left: 58px;padding-top: 10px;" class="col-md-1 emblemb"><img src="emblemb.png" width="59" height="100" style=" margin-top: 18px; "></div>
      <div class="col-md-8 textheadingmain" style="display: inline;">
        <h1 style="font-size: 20px;line-height: 40px;font-weight: bold;font-family: initial;color: #004684;margin: 16PX 0PX 0PX 0PX;padding: 20px 0px 0px 0px;border: 0px solid #fff;">सूचना सुरक्षा प्रबंधन प्रणाली</h1>
        <h1 style="font-size: 28px;line-height: 40px;font-weight: bold;font-family: initial;color: #004684;margin: -8PX 0PX 0PX 0PX;padding: 0px 0px 0px 0px;border: 0px solid #fff;">Information Security Management System</h1>
        <h5 style="margin-top: 5px;color: #333;font-family: 'Open Sans', sans-serif;font-size: 14px;">ISO 27001:2022 | ISO 9001:2015 | PCI DSS Certified Organization</h5>
      </div>

      <div style="float: right;" class="col-md-3 emblemb2 text-center"><img src="silaris.png" height="100px" style=" margin-top: -123px; "></div>
    </div>
  </div>
        
    <div class="container">
        
				<form action="test_submit.php" method= "POST"> 



            <div class="step">

				<div class="px-4  card" style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 1. Which of the following in best password? .</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat1" type="radio" name="q2" id="q2op1"
                                    required="">
                                <label class="form-check-label" for="q2op1"> A. My Secret </label>
                            </div>

                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat1" type="radio" name="q2" id="q2op2"
                                    required="">
                                <label class="form-check-label" for="q2op2"> B. Abc123 </label>
                            </div>

                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat1" type="radio" name="q2" id="q2op3"
                                    required="">
                                <label class="form-check-label" for="q2op3"> C. MK0@79z2 </label>
                            </div>

                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat1" type="radio" name="q2" id="q2op4"
                                    required="">
                                <label class="form-check-label" for="q2op4"> D. xyz@123 </label>
                            </div>

                        </div>


                    </div>



                </div>
               


                <!-- question number 1 -->

                
                <!-- question number 1 -->

               <div class="px-4  card" style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 2.Lock your system in which situation?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat1" type="radio" name="q5" id="q5op1"
                                    required="">
                                <label class="form-check-label" for="q5op1"> A. taking tea break. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat1" type="radio" name="q5" id="q5op2"
                                    required="">
                                <label class="form-check-label" for="q5op2"> B. taking half day</label>
                            </div>

                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat1" type="radio" name="q5" id="q5op3"
                                    required="">
                                <label class="form-check-label" for="q5op3"> C. going to lunch. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat1" type="radio" name="q5" id="q5op4"
                                    required="">
                                <label class="form-check-label" for="q5op4"> D. all of the above. </label>
                            </div>

                        </div>


                    </div>



                </div>     




            </div>
              <div class="px-4  card" style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 3. Share your password with?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat1" type="radio" name="q4" id="q4op1"
                                    required="">
                                <label class="form-check-label" for="q4op1"> A. with your co - worker </label>
                            </div>

                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat1" type="radio" name="q4" id="q4op2"
                                    required="">
                                <label class="form-check-label" for="q4op2"> B. with your manager</label>
                            </div>

                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat1" type="radio" name="q4" id="q4op3"
                                    required="">
                                <label class="form-check-label" for="q4op3"> C. no one </label>
                            </div>

                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat1" type="radio" name="q4" id="q4op4"
                                    required="">
                                <label class="form-check-label" for="q4op4"> D. with your team leader </label>
                            </div>

                        </div>


                    </div>



                </div>                 
                                
                                <!-- step two -->




            <div class="step">

				 <div class="px-4  card"
                    style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px; border-radius: 10px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 4. what is the email id for whistle blow in our organization?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat1" type="radio" name="q3" id="q3op1"
                                    required="">
                                <label class="form-check-label" for="q3op1"> A. Whistle@silaris.in </label>
                            </div>

                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat1" type="radio" name="q3" id="q3op2"
                                    required="">
                                <label class="form-check-label" for="q3op2"> B. Whistle@gmail.in </label>
                            </div>

                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat1" type="radio" name="q3" id="q3op3"
                                    required="">
                                <label class="form-check-label" for="q3op3"> C. Whistleblow@silaris.in </label>
                            </div>

                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat1" type="radio" name="q3" id="q3op4"
                                    required="">
                                <label class="form-check-label" for="q3op4"> D. Whistleblow.com </label>
                            </div>

                        </div>


                    </div>



                </div>

                <!-- question number 1 -->



                
                <div class="px-4  card"
                    style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px; border-radius: 10px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 5. What are the advantage of cyber security?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat2" type="radio" name="q14" id="q14op1"
                                    required="">
                                <label class="form-check-label" for="q14op1"> A. protect bussiness against ransomware, malware. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat2" type="radio" name="q14" id="q14op2"
                                    required="">
                                <label class="form-check-label" for="q14op2"> B. it protect end users. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat2" type="radio" name="q14" id="q14op3"
                                    required="">
                                <label class="form-check-label" for="q14op3"> C. cyber security prevents unauthorized users. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat2" type="radio" name="q14" id="q14op4"
                                    required="">
                                <label class="form-check-label" for="q14op4"> D. all of the above.</label>
                            </div>

                            
                        </div>


                    </div>



                </div>                
				<div class="px-4  card" style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px;">



                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 6. Full form of ISMS?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat1" type="radio" name="q1" id="q1op1"
                                    required="">
                                <label class="form-check-label" for="q1op1"> A. Information Security Management System. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat1" type="radio" name="q1" id="q1op2"
                                    required="">
                                <label class="form-check-label" for="q1op2"> B. Information Security Manager System. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat1" type="radio" name="q1" id="q1op3"
                                    required="">
                                <label class="form-check-label" for="q1op3">C. Information Securing Management System. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat1" type="radio" name="q1" id="q1op4"
                                    required="">
                                <label class="form-check-label" for="q1op4"> D. None of these. </label>
                            </div>

                            

                        </div>


                    </div>



                </div>
                <div class="px-4  card" style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 7. what is our system account lockout duration?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat2" type="radio" name="q11" id="q11op1"
                                    required="">
                                <label class="form-check-label" for="q11op1"> A. 15 min </label>
                            </div>

                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat2" type="radio" name="q11" id="q11op2"
                                    required="">
                                <label class="form-check-label" for="q11op2"> B. 10 min </label>
                            </div>

                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat2" type="radio" name="q11" id="q11op3"
                                    required="">
                                <label class="form-check-label" for="q11op3"> C. 20 min. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat2" type="radio" name="q11" id="q11op4"
                                    required>
                                <label class="form-check-label" for="q11op4"> D. 25 min. </label>
                            </div>


                        </div>


                    </div>



                </div>
                <!-- question number 1 -->
				<div class="px-4  card" style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 8. Password should be update with in?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat2" type="radio" name="q8" id="q8op1"
                                    required="">
                                <label class="form-check-label" for="q8op1"> A. 1 week</label>
                            </div>

                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat2" type="radio" name="q8" id="q8op2"
                                    required="">
                                <label class="form-check-label" for="q8op2"> B. 1 month</label>
                            </div>

                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat2" type="radio" name="q8" id="q8op3"
                                    required="">
                                <label class="form-check-label" for="q8op3"> C. no need to change password.</label>
                            </div>

                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat2" type="radio" name="q8" id="q8op4"
                                    required="">
                                <label class="form-check-label" for="q8op4"> D. 6 months.</label>
                            </div>

                            
                        </div>


                    </div>



                </div>

                


                <!-- question number 1 -->

                


                <!-- question number 1 -->
                <div class="px-4  card"
                    style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px; border-radius: 10px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 9. CIA stands for?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat2" type="radio" name="q9" id="q9op1"
                                    required="">
                                <label class="form-check-label" for="q9op1"> A. confidentally intergity and availability.</label>
                            </div>

                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat2" type="radio" name="q9" id="q9op2"
                                    required="">
                                <label class="form-check-label" for="q9op2"> B. confidence independent and attitude.</label>
                            </div>

                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat2" type="radio" name="q9" id="q9op3"
                                    required="">
                                <label class="form-check-label" for="q9op3"> C. customer incharge authority</label>
                            </div>

                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat2" type="radio" name="q9" id="q9op4"
                                    required="">
                                <label class="form-check-label" for="q9op4"> D. none of the above.</label>
                            </div>

                            
                        </div>


                    </div>



                </div>
                <div class="px-4  card" style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 10. What is allowed to take with you on the floor?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat2" type="radio" name="q6" id="q6op1"
                                    required="">
                                <label class="form-check-label" for="q6op1"> A. mobile phones </label>
                            </div>

                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat2" type="radio" name="q6" id="q6op2"
                                    required="">
                                <label class="form-check-label" for="q6op2"> B. smart watches </label>
                            </div>

                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat2" type="radio" name="q6" id="q6op3"
                                    required="">
                                <label class="form-check-label" for="q6op3"> C. pen & papers </label>
                            </div>

                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat2" type="radio" name="q6" id="q6op4"
                                    required>
                                <label class="form-check-label" for="q6op4"> D. None of these. </label>
                            </div>


                        </div>


                    </div>



                </div>
				
                 <!-- step three -->
           <div class="step">



                <!-- question number 1 -->

				<div class="px-4  card"
                    style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px; border-radius: 10px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 11. ISO standard have based on?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat2" type="radio" name="q10" id="q10op1"
                                    required="">
                                <label class="form-check-label" for="q10op1"> A. articles.</label>
                            </div>

                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat2" type="radio" name="q10" id="q10op2"
                                    required="">
                                <label class="form-check-label" for="q10op2"> B. annexure</label>
                            </div>

                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat2" type="radio" name="q10" id="q10op3"
                                    required="">
                                <label class="form-check-label" for="q10op3"> C. sections.</label>
                            </div>

                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat2" type="radio" name="q10" id="q10op4"
                                    required="">
                                <label class="form-check-label" for="q10op4"> D. none</label>
                            </div>

                            
                        </div>


                    </div>



                </div>






            </div>

                

                <!-- question number 1 -->


                <div class="px-4  card" style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 12. why do we teach policy in ISMS  session?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat2" type="radio" name="q12" id="q12op1"
                                    required="">
                                <label class="form-check-label" for="q12op1"> A. to interact. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat2" type="radio" name="q12" id="q12op2"
                                    required="">
                                <label class="form-check-label" for="q12op2"> B. it is a guidline given by ISO. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat2" type="radio" name="q12" id="q12op3"
                                    required="">
                                <label class="form-check-label" for="q12op3"> C. to make hiring process hand. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat2" type="radio" name="q12" id="q12op4"
                                    required="">
                                <label class="form-check-label" for="q12op4"> D. none of the above. </label>
                            </div>

                            

                        </div>


                    </div>



                </div>


                <!-- question number 1 -->

                


                <!-- question number 1 -->
                
				<div class="px-4  card" style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong>13. why should we wear id cards during office hours?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat2" type="radio" name="q13" id="q13op1"
                                    required="">
                                <label class="form-check-label" for="q13op1"> A. for descipline. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat2" type="radio" name="q13" id="q13op2"
                                    required="">
                                <label class="form-check-label" for="q13op2"> B. for identification. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat2" type="radio" name="q13" id="q13op3"
                                    required="">
                                <label class="form-check-label" for="q13op3"> C. for exception management policy. </label>
                            </div>

                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat2" type="radio" name="q13" id="q13op4"
                                    required="">
                                <label class="form-check-label" for="q13op4"> D. all of the above..</label>
                            </div>

                            
                        </div>


                    </div>



                </div>
                <div class="px-4  card" style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong> 14. Save the information of customer?</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat2" type="radio" name="q7" id="q7op1"
                                    required="">
                                <label class="form-check-label" for="q7op1"> A. on pen and paper</label>
                            </div>

                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat2" type="radio" name="q7" id="q7op2"
                                    required="">
                                <label class="form-check-label" for="q7op2"> B. on bookmark of browser </label>
                            </div>

                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat2" type="radio" name="q7" id="q7op3"
                                    required="">
                                <label class="form-check-label" for="q7op3"> C. on notepad.</label>
                            </div>

                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat2" type="radio" name="q7" id="q7op4"
                                    required="">
                                <label class="form-check-label" for="q7op4"> D. Information never saved anywhere.</label>
                            </div>

                            

                        </div>


                    </div>



                </div>
                <div class="px-4  card"
                    style="margin: 15px 0px 15px 0px; padding: 15px 0px 15px 0px; border-radius: 10px;">




                    <div class="form-check  ">
                        <h5 class="my-4">
                            <strong>15. Human resources management policies are devloped by the:</strong>
                        </h5>

                        <div>
                            <div class="inpt-box">
                                <input value="3" class="form-check-input cat2" type="radio" name="q15" id="q15op1"
                                    required="">
                                <label class="form-check-label" for="q15op1"> A. top management</label>
                            </div>

                            <div class="inpt-box">
                                <input value="2" class="form-check-input cat2" type="radio" name="q15" id="q15op2"
                                    required="">
                                <label class="form-check-label" for="q15op2"> B. line manager</label>
                            </div>

                            <div class="inpt-box">
                                <input value="1" class="form-check-input cat2" type="radio" name="q15" id="q15op3"
                                    required="">
                                <label class="form-check-label" for="q15op3"> C. HR department.</label>
                            </div>

                            <div class="inpt-box">
                                <input value="4" class="form-check-input cat2" type="radio" name="q15" id="q15op4"
                                    required="">
                                <label class="form-check-label" for="q15op4"> D. HR manager.</label>
                            </div>

                            
                        </div>


                    </div>



                </div>






            </div>

            </div>


            
            
              
                <button class="btn btn-primary" type="submit" id="submit" name="submit">Submit</button>
            </div>
            
        </form>
    

    </div>

</body>

</html>