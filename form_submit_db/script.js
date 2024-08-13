// Add Evenet Listener on Form
document.getElementById("myForm").addEventListener("submit", function (event) {
    event.preventDefault();
    
    // Form Value Selectors
    let uname = document.getElementById("username").value;
    let email = document.getElementById("useremail").value;
    let mobileno = document.getElementById("phoneno").value;
    let profile_image = document.getElementById("profileimg");
    let gender = document.querySelector('input[name="Gender"]:checked');
    let checkboxes = document.querySelectorAll('input[name="checkbox[]"]:checked').length;
    // console.log(gender);
    let select = document.getElementById("select").value;
    let txtHint = document.getElementById("txtHint");
    
    // Get Gender Value 
    let gender_val;
    if(gender){
        gender_val = gender.value;
    }

    // Form Span Tag Selectors for display error
    let nameError = document.getElementById("nameError");
    let emailError = document.getElementById("emailError");
    let mobileError = document.getElementById("mobileError");
    let checkboxError = document.getElementById("checkboxError");
    let radioError = document.getElementById("radioError");
    let selectError = document.getElementById("selectError");
    let profileError = document.getElementById("profileError");
    let status = true;
    
    let errorElements = document.getElementsByClassName("error");
    if (errorElements.length > 0){
        txtHint.innerHTML ="";
    }
    for (let i = 0; i < errorElements.length; i++) {
        errorElements[i].innerHTML = "";
    }
    
    if (uname === "") {
        // console.log("Please Enter Name");
        nameError.innerHTML = "*Please Enter Name";
        status = false;
    }
    
    //email Validation
    if (email === "" || !isValidEmail(email)) {
        // console.log("Please Enter Email id ");
        emailError.innerHTML = "*Please Enter Your Valid Email";
        status = false;
    }
    
    //Mobile Validation
    if (mobileno === "" || !isValidMobile(mobileno)) {
        // console.log("Please Enter Mobile No");
        mobileError.innerHTML = "*Please Enter Valid Mobile No.";
        status = false;
        // console.log(mobileno.length)
    }
    
    if(!(profile_image.value == "")){
        let fsize = profile_image.files[0].size / 1024;
        if(fsize > 40096){
            profileError.innerHTML = "File Size is Too Large";
            status = false;
        }
    }
    
    if(profile_image.value == ""){
        let prevdiv = document.getElementById("prevdiv");
        prevdiv.style.display = "none";
        profileError.innerHTML = "*Please Choose Profile Image";
        status = false;
    }
    

    

    // Checkbox Validation
    if (checkboxes == 0) {
        // console.log("Please Check The Checkbox");
        checkboxError.innerHTML = "*Please Check The Checkbox";
        status = false;
    }

    //Radio Validation
    if (!gender) {
        // console.log("Please Select Gender");
        radioError.innerHTML = "*Please Select Your Gender Please";
        status = false;
    }
    
    //Select Validation
    if (select === "") {
        // console.log("Please Select Option", select.value);
        selectError.innerHTML = "*Please Select Any Option Please";
        status = false;
    }

    let form = document.getElementById("myForm");
    let formData = new FormData(form);
    if (status) {
        submitForm(formData);
        console.log("status true function executed")
    }
});

// Function to validate email format
function isValidEmail(email) {
    email = email.trim();
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Function to validate mobile number format
function isValidMobile(mobileno) {
    mobileno = mobileno.trim();
    let mobileRegex = /^[^12345]\d{9}/;
    return mobileRegex.test(mobileno);
}


// Function For Mobile No.
let phoneField = document.getElementById('phoneno');
phoneField.addEventListener('keyup', function(){
  let phoneValue = phoneField.value;
  phoneValue = phoneValue.replace(/[^0-9]/g,'');
  phoneField.value = phoneValue.substr(0, 10);
});



// function to call ajax and save userdetails into database
function submitForm(formData){
    console.log(formData);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "form_validation.php", true);

    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            if (xhr.responseText == "success"){
                alert("Form is Submitted Successfully");
                document.getElementById("myForm").reset();
                window.location.href = "user-list.php";
            } if(xhr.responseText == "fail"){
                alert("*Your Mobile No. & Email is Already Register");
            }
        }
    };

    xhr.send(formData);
}


// Add event listener for the change event on the file input element
document.getElementById("profileimg").addEventListener("change", function(event) {
    document.getElementById("profileError").innerHTML ="";

    let profile_image = document.getElementById("profileimg");
    if(!(profile_image.value =="")){
        let prevdiv = document.getElementById("prevdiv");
        prevdiv.style.display = "block";
        // console.log("hii")
    }

    if((profile_image.value)){
        let allowedType = /(\.jpg|\.jpeg|\.png|\.gif)$/i;   
        if (!allowedType.exec(profile_image.value)) {
            profileError.innerHTML = "Invalid File Type";
            let prevdiv = document.getElementById("prevdiv");
            prevdiv.style.display = "none";
            profile_image.value = '';
            return false;
        }
    }

    let file = event.target.files[0];
    let preview = document.getElementById("preview");
    let reader = new FileReader();
    // console.log(reader);
    // Set up the FileReader onload event
    reader.onload = function(event) {
        let img = new Image();
        img.onload = function() {
            if (this.width < 1000 || this.height < 1000) {
                document.getElementById("profileError").innerHTML = "*Profile image dimensions should be at least 1000x1000 pixels";
                document.getElementById("profileimg").value = "";
                document.getElementById("preview").src = "";
            } else {
                // Clear any previous error message
                document.getElementById("profileError").innerHTML = "";
            }
        };
        preview.src = event.target.result;
        img.src = event.target.result;
    };
    reader.readAsDataURL(file)
});

// import Cropper from 'cropperjs';
document.getElementById('profileimg').addEventListener('change', function(event) {
    let files = event.target.files;
    let image = files[0];
    let reader = new FileReader();
    reader.onload = function() {
        let img = document.getElementById('preview');
        img.src = reader.result;

        // Show the preview div
        document.getElementById('prevdiv').style.display = 'block';

        // Initialize Cropper
        cropper = new Cropper(img, {
            aspectRatio: 1, // You can adjust aspect ratio as needed
            viewMode: 1, // Crop box takes up the whole canvas
            autoCropArea: 0.8, // 80% of the image will be initially selected
        });
    };
    reader.readAsDataURL(image);
});




let cropper; // Declare cropper in the global scope

// Event listener for crop button
document.getElementById('cropButton').addEventListener('click', function(event) {
    // Prevent default form submission
    event.preventDefault();

    // Check if cropper is initialized
    if (cropper) {
        // Get the cropped canvas from Cropper.js
        let canvas = cropper.getCroppedCanvas();

        // Get the cropped image data as a data URL
        let croppedImageDataURL = canvas.toDataURL('image/jpeg');

        // Display the cropped image
        let croppedImage = document.getElementById('croppedImage');
        croppedImage.src = croppedImageDataURL;

        // Show the cropdiv (initially hidden)
        let cropdiv = document.getElementById('cropdiv');
        cropdiv.style.display = 'block';
    } else {
        console.error('Cropper is not initialized.');
    }
});
