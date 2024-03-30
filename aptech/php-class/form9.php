<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $terms = $_POST['terms'];
        $country = $_POST['country'];
    }

//     echo "<pre>";
// print_r($_SERVER);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    <form id="myForm" method="post" action="process_form.php">
        <input type="hidden" name="submitted" value="true">
        <input type="text" name="name" id="name" placeholder="Name"><br>
        <span id="nameError" class="error"></span><br>
    
        <input type="email" name="email" id="email" placeholder="Email"><br>
        <span id="emailError" class="error"></span><br>
    
        <input type="text" name="mobile" id="mobile" placeholder="Mobile Number"><br>
        <span id="mobileError" class="error"></span><br>
    
        Gender:
        <input type="radio" name="gender" id="male" value="male"> Male
        <input type="radio" name="gender" id="female" value="female"> Female<br>
        <span id="genderError" class="error"></span><br>
    
        <input type="checkbox" name="terms" id="terms" value="accepted"> Accept Terms and Conditions<br>
        <span id="termsError" class="error"></span><br>
    
        <select name="country" id="country">
            <option value="">Select Country</option>
            <option value="usa">USA</option>
            <option value="uk">UK</option>
            <option value="canada">Canada</option>
        </select><br>
        <span id="countryError" class="error"></span><br>
    
        <input type="submit" value="Submit">
    </form>
    
    <script>
        // JavaScript for form validation
        document.getElementById("myForm").addEventListener("submit", function(event) {
            let name = document.getElementById("name").value;
            let email = document.getElementById("email").value;
            let mobile = document.getElementById("mobile").value;
            let gender = document.querySelector('input[name="gender"]:checked');
            let terms = document.getElementById("terms").checked;
            let country = document.getElementById("country").value;[]
            let isValid = true;
    
            // Clear previous error messages
            let errorElements = document.getElementsByClassName("error");
            for (let i = 0; i < errorElements.length; i++) {
                errorElements[i].innerHTML = "";
            }
    
            // Name validation
            if (name === "") {
                document.getElementById("nameError").innerHTML = "Name is required.";
                isValid = false;
            }
    
            // Email validation
            if (email === "") {
                document.getElementById("emailError").innerHTML = "Email is required.";
                isValid = false;
            } else if (!isValidEmail(email)) {
                document.getElementById("emailError").innerHTML = "Invalid email format.";
                isValid = false;
            }
    
            // Mobile number validation
            if (mobile === "") {
                document.getElementById("mobileError").innerHTML = "Mobile number is required.";
                isValid = false;
            } else if (!isValidMobile(mobile)) {
                document.getElementById("mobileError").innerHTML = "Invalid mobile number format.";
                isValid = false;
            }
    
            // Gender validation
            if (!gender) {
                document.getElementById("genderError").innerHTML = "Gender is required.";
                isValid = false;
            }
    
            // Terms validation
            if (!terms) {
                document.getElementById("termsError").innerHTML = "You must accept the terms and conditions.";
                isValid = false;
            }
    
            // Country validation
            if (country === "") {
                document.getElementById("countryError").innerHTML = "Country is required.";
                isValid = false;
            }
    
            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
            }
        });
    
        // Function to validate email format
        function isValidEmail(email) {
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    
        // Function to validate mobile number format
        function isValidMobile(mobile) {
            let mobileRegex = /^[0-9]{10}$/;
            return mobileRegex.test(mobile);
        }
    </script>
</body>
</html>

