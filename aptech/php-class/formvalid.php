<?php
// Define variables and initialize with empty values
$data =['name'=>'','email'=>'','mobile'=>'','gender'=>'','terms'=>'','country'=>''];
$error = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $email = $mobile = $gender = $terms = $country = "";
    // Validate name
    if (empty($_POST["name"])) {
        $error['name'] = "Name is required.";
    } else {
        $data['name'] = $name;
        $name = test_input($_POST["name"]);
        // Check if name contains only letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $error['name'] = "Only letters and white space allowed.";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $error['email'] = "Email is required.";
    } else {
        $data['email'] = $email;
        $email = test_input($_POST["email"]);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['mobile'] = "Invalid email format.";
        }
    }

    // Validate mobile number
    if (empty($_POST["mobile"])) {
        $error['mobile'] = "Mobile number is required.";
    } else {
        $data['mobile'] = $mobile;
        $mobile = test_input($_POST["mobile"]);
        // Check if mobile number is valid
        if (!preg_match("/^[0-9]{10}$/", $mobile)) {
            $error['mobile'] = "Invalid mobile number format.";
        }
    }

    // Validate gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required.";
    } else {
        $data['gender'] = $gender;
        $error['gender'] = test_input($_POST["gender"]);
    }

    // Validate terms acceptance
    if (empty($_POST["terms"])) {
        $error['terms'] = "You must accept the terms and conditions.";
    } else {
        $data['terms'] = $terms;
        $terms = test_input($_POST["terms"]);
    }

    // Validate country
    if (empty($_POST["country"])) {
        $error['country'] = "Country is required.";
    } else {
        $data['country'] = $country;
        $country = test_input($_POST["country"]);
    }

    // Function to sanitize and validate input
}
function test_input($datat) {
    $datat = trim($datat);
    $datat = stripslashes($datat);
    $datat = htmlspecialchars($datat);
    return $datat;
}
?>

<?php if(isset($_POST['submitted'])) { ?>
    <h1> Welcome <?= $_POST['name']??'';?></h1>
    <h1> Welcome <?= $_POST['email']??'';?></h1>
    <h1> Welcome <?= $_POST['mobile']??'';?></h1>
    <h1> Gender <?= $_POST['gender']??'';?></h1>
    <h1> City <?= $_POST['country']??'';?></h1>
        <?php print_r($data);?>
    <?php } else { ?>  
<!-- HTML Form with error messages -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="submitted" value="True">
    <input type="text" name="name" placeholder="Name" value="<?= $data['name']??''?>">
    <span class="error"><?php echo $error['name']; ?></span><br>
    <input type="text" name="email" placeholder="Email">
    <span class="error"><?php echo $emailErr; ?></span><br>
    <input type="text" name="mobile" placeholder="Mobile Number">
    <span class="error"><?php echo $mobileErr; ?></span><br>
    Gender:
    <input type="radio" name="gender" value="male"> Male
    <input type="radio" name="gender" value="female"> Female
    <span class="error"><?php echo $genderErr; ?></span><br>
    <input type="checkbox" name="terms" value="accepted"> Accept Terms and Conditions
    <span class="error"><?php echo $termsErr; ?></span><br>
    <select name="country">
        <option value="">Select Country</option>
        <option value="usa">USA</option>
        <option value="uk">UK</option>
        <option value="canada">Canada</option>
    </select>
    <span class="error"><?php echo $countryErr; ?></span><br>
    <input type="submit" value="Submit">
</form>
<?php } ?>