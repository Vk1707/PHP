<?php
include_once("connec.php");
$id = $_GET['id'];
$user = GetUser($id);

$lang = explode(",",$user['language']);
// gettype($lang);
// print_r($lang);
// $english = "english";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: Border-Box;
        /* background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%); */
    }

    body {
        background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);

    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        height: auto;
        width: 100%;
        flex-direction: column;
    }

    .formbox1 {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px;
        border-radius: 10px;
        margin-top: 25px;
    }

    .error {
        color: red;
    }

    .form-input {
        text-align: start;
        border-radius: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="formbox1 w-75 text-dark fw-semibold fs-6 bg-info-subtle">
            <form id="myForm" action="update_validation.php" method="POST" class="w-100" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="title">
                    <h1 style="text-align:center" class="bg-primary rounded w-100 p-2 text-white">Update User</h1>
                </div>
                <div id="txtHint" class=" text-center rounded w-100 p-2">
                    <!-- Status Of Data is Store Or Not -->
                </div>
                <input type="hidden" name="submitted" value="True">
                <div class="mb-3">
                    <label for="username" class="form-label">Name</label>
                    <input type="text" class="form-control " value="<?= $user['name'] ?>" name="Name" id="username"
                        placeholder="Enter Your Name*">
                    <span id="nameError" class="error"> </span>
                </div>
                <div class="mb-3">
                    <label for="useremail" class="form-label">Email address</label>
                    <input type="text" class="form-control" name="Email" id="useremail" value="<?= $user['email'] ?>"
                        placeholder="Enter Your Email*">
                    <span id="emailError" class="error"> </span>
                </div>
                <div class="mb-3">
                    <label for="phoneno" class="form-label">Mobile No.</label>
                    <input type="text" class="form-control" name="Mobileno" id="phoneno"
                        value="<?= $user['mobileno'] ?>" placeholder="Enter Your Mobile No*">
                    <span id="mobileError" class="error"> </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Current Profile Image: <spans style="color:blue;"><?= $user['profile_img']?></spans></label><br>
                    <img src="uploads/<?= $user['profile_img']?>" width='100' alt='Current Image' class=""><br>
                </div>
                <div class="mb-3">
                    <label for="profileimg" class="form-label">New Profile Image</label>
                    <input type="file" class="form-control" name="New_Image" id="profileimg" >
                    <span id="profileError" class="error"> </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Speaking Languages :&nbsp;</label>
                    <input type="checkbox" class="form-check-input interest" name="checkbox[]" value="english" id="language1" <?= (in_array('english', $lang))?'checked':''; ?>>
                    <label class="form-check-label " for="language1">English</label>
                    <input type="checkbox" class="form-check-input interest" name="checkbox[]" value="hindi" id="language2" <?= (in_array('hindi', $lang))?'checked':''; ?>>
                    <label class="form-check-label " for="language2">Hindi</label>
                    <input type="checkbox" class="form-check-input interest" name="checkbox[]" value="spanish" id="language3" <?= (in_array('spanish', $lang))?'checked':''; ?>>
                    <label class="form-check-label " for="language3">Spanish</label>
                    <span id="checkboxError" class="error"> </span>
                </div>
                <div class="mb-3 ">
                    <input class="form-check-input" type="radio" name="Gender" id="male" value="Male"
                        <?= $user['gender']=='Male'?'checked':'' ?>>
                    <label class="form-check-label " for="male">Male</label>
                    <input class="form-check-input" type="radio" name="Gender" id="female" value="Female"
                        <?= $user['gender']=='Female'?'checked':'' ?>>
                    <label class="form-check-label " for="female">Female </label>
                    <span id="radioError" class="error"> </span>
                </div>
                <div class="mb-3">
                    <select name="optionval" id="select" class="form-select" aria-label="Select Box">
                        <option value="" selected>Open this & Select menu</option>
                        <option value="HTML" <?= $user['skill']=='HTML'?'selected':''?>>HTML</option>
                        <option value="CSS" <?= $user['skill']=='CSS'?'selected':''?>>CSS</option>
                        <option value="Javascript" <?= $user['skill']=='Javascript'?'selected':''?>>Javascript</option>
                    </select>
                    <span id="selectError" class="error"> </span>
                </div>
                <button value="submit" name="submit" type="submit" class="btn btn-primary w-100">Update Details</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="updatescript.js"></script>
    <?php
    ?>
</body>

</html>