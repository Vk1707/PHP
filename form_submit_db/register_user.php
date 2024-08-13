<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.css" integrity="sha512-087vysR/jM0N5cp13Vlp+ZF9wx6tKbvJLwPO8Iit6J7R+n7uIMMjg37dEgexOshDmDITHYY5useeSmfD1MYiQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
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
        /* max-height: 100vh; */
        width: 100%;
        flex-direction: column;
    }

    .error {
        color: red;
    }

</style>
</head>

<body>
    <div class="container">
        <div class="formbox1 d-flex justify-content-center align-items-center p-3 rounded m-3 w-75 text-dark fw-semibold fs-6 bg-info-subtle">
            <form id="myForm" action="" method="POST" class="w-100" enctype="multipart/form-data">
                <div class="title">
                    <h1 style="text-align:center" class="bg-primary rounded w-100 p-2 text-white">Register User</h1>
                </div>
                <div id="txtHint" class=" text-center rounded w-100 p-2">
                    <!-- <span  class="fs-2">hii</span> -->
                </div>
                <input type="hidden" name="submitted" value="True">
                <div class="mb-3">
                    <label for="username" class="form-label">Name</label>
                    <input type="text" class="form-control " value="" name="Name" id="username"
                        placeholder="Enter Your Name*">
                    <span id="nameError" class="error"> </span>
                </div>
                <div class="mb-3">
                    <label for="useremail" class="form-label">Email address</label>
                    <input type="text" class="form-control" name="Email" id="useremail" value=""
                        placeholder="Enter Your Email*">
                    <span id="emailError" class="error"> </span>
                </div>
                <div class="mb-3">
                    <label for="phoneno" class="form-label">Mobile No.</label>
                    <input  type="text" class="form-control" name="Mobileno" id="phoneno" value=""
                    placeholder="Enter Your Mobile No*">
                    <span id="mobileError" class="error"> </span>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="profileimg" class="form-label" >Profile Image ( .jpg  .jpeg  .png  .gif)</label><br>
                        <input type="file" class="form-control" name="Image" id="profileimg" style="display: inline !important">
                    </div>    
                    <div class="d-flex justify-content-between">
                        <div id="prevdiv" style="display:none">
                            <label class="form-label" style="display: inline !important">Preview :</label><br>
                            <img id="preview" width='100'>
                            <button id="cropButton">Crop Image</button>
                        </div>
                        <div id="cropdiv" style="width:45%; display:none;">
                            <label class="form-label" style="display: inline !important">Cropped Image :</label><br>
                            <input type="hidden" name="croppedImage" id="croppedImageField">

                            <img id="croppedImage" width='100'>
                        </div>
                    </div>
                    <span id="profileError" class="error d-block"> </span>
                </div>
                <div class="mb-3 ">
                    <label class="form-label">Speaking Languages :&nbsp;</label>
                    <input type="checkbox" class="form-check-input interest" name="checkbox[]" value="english" id="language1">
                    <label class="form-check-label " for="language1">English</label>
                    <input type="checkbox" class="form-check-input interest" name="checkbox[]" value="hindi" id="language2">
                    <label class="form-check-label " for="language2">Hindi</label>
                    <input type="checkbox" class="form-check-input interest" name="checkbox[]" value="spanish" id="language3">
                    <label class="form-check-label " for="language3">Spanish</label>
                    <span id="checkboxError" class="error"> </span>
                </div>
                <div class="mb-3 ">
                    <input class="form-check-input" type="radio" name="Gender" id="male" value="Male">
                    <label class="form-check-label " for="male">Male</label>
                    <input class="form-check-input" type="radio" name="Gender" id="female" value="Female">
                    <label class="form-check-label " for="female">Female </label>
                    <span id="radioError" class="error"> </span>
                </div>
                <div class="mb-3">
                    <select name="optionval" id="select" class="form-select" aria-label="Select Box">
                        <option value="" selected>Open this & select menu</option>
                        <option value="HTML">HTML</option>
                        <option value="CSS">CSS</option>
                        <option value="Javascript">Javascript</option>
                    </select>
                    <span id="selectError" class="error"> </span>
                </div>
                <button value="submit" name="submit" type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js" integrity="sha512-JyCZjCOZoyeQZSd5+YEAcFgz2fowJ1F1hyJOXgtKu4llIa0KneLcidn5bwfutiehUTiOuK87A986BZJMko0eWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="script.js"></script>
    <?php
    ?>
</body>

</html>