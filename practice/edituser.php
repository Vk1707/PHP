<?php
include("action.php");
$id = $_GET['id'];
$user = GetUser($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container p-4 m-auto my-5">
        <form method="post" action="updateuser.php" id="myForm" class="row g-4  rounded  p-2  text-dark fw-semibold fs-6 bg-info-subtle">
            <h1 class="text-center">User Form</h1>
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <div class="col-12">
              <label for="inputName4" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="inputName4" value="<?= $user['name']?>">
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail4" value="<?= $user['email']?>">
            </div>
            <div class="col-12">
              <label for="inputMobile" class="form-label">Mobile No.</label>
              <input type="text" name="mobile" class="form-control" id="inputMobile" placeholder="Enter Your Mobile No." value="<?= $user['mobile']?>">
            </div>
            <div class="col-12">
              <label for="inputState" class="form-label">State</label>
              <select id="inputState" name="state" class="form-select">
                <option selected>Choose...</option>
                <option value="delhi" <?= $user['state']=='delhi'?'selected':''?>>Delhi</option>
                <option value="mumbai" <?= $user['state']=='mumbai'?'selected':''?>>Mumbai</option>
                <option value="haryana" <?= $user['state']=='haryana'?'selected':''?>>Haryana</option>
                <option value="jaipur" <?= $user['state']=='jaipur'?'selected':''?>>Jaipur</option>
              </select>
            </div>
            <div class="col-12">
                <label class="form-label">Gender : </label>
                <input class="form-check-input" type="radio" name="gender" value="male" <?= $user['gender']=='male'?'checked':''?> id="male">
                <label class="form-check-label" for="flexRadioDefault1">Male</label>
                <input class="form-check-input" type="radio" name="gender" value="female" <?= $user['gender']=='female'?'checked':''?> id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">Female</label>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Submit Form </button>
            </div>
          </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- <script src="script.js"></script> -->
</body>
</html>
