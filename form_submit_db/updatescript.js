
// Add Evenet Listener on Form
document.getElementById("myForm").addEventListener("submit", function(event) {

    // Form Value Selectors
    let uname = document.getElementById("username").value;
    let email = document.getElementById("useremail").value;
    let mobileno = document.getElementById("phoneno").value;
    let gender = document.querySelector('input[name="Gender"]:checked');
    let checkboxes = document.querySelectorAll('input[name="checkbox[]"]:checked').length;
    let select = document.getElementById("select").value;
    let profile_image = document.getElementById("profileimg");
    // let fsize = profile_image.files[0].size / 1024;

    // Form Span Tag Selectors for display error
    let nameError = document.getElementById("nameError");
    let emailError = document.getElementById("emailError");
    let mobileError = document.getElementById("mobileError");
    let profileError = document.getElementById("profileError");
    let checkError = document.getElementById("checkboxError");
    let radioError = document.getElementById("radioError");
    let selectError = document.getElementById("selectError");
    let status = true;
    
    // Remove All Error From Span Tag
    let errorElements = document.getElementsByClassName("error");
        for (let i = 0; i < errorElements.length; i++) {
            errorElements[i].innerHTML = "";
        }
   

    //Name Validation
    if (uname === "") {
        nameError.innerHTML = "*Please Enter Name";
        status = false;
    }

    //Email Validation
    if (email === "" || !isValidEmail(email)) {
        emailError.innerHTML = "*Please Enter Your Valid Email";
        status = false;
    }
    
    //Mobile Validation
    if (mobileno === "" || !isValidMobile(mobileno)) {
        mobileError.innerHTML = "*Please Enter Valid Mobile No.";
        status = false;
    }


    if((profile_image.value)){
        let allowedType = /(\.jpg|\.jpeg|\.png|\.gif)$/i;   
        if (!allowedType.exec(profile_image.value)) {
            profileError.innerHTML = "Invalid File Type";
            profile_image.value = '';
            status = false;
        }
    }

    if((profile_image.value)){
        let fsize = profile_image.files[0].size / 1024;
        if(fsize > 4096){
            profileError.innerHTML = "File Size is Too Large";
            status = false;
        }
    }

    //Checkbox Validation
    if (checkboxes == 0) {
        checkError.innerHTML = "*Please Select Your Gender Please";
        status = false;
    }
    
    //Radio Validation
    if (!gender) {
        radioError.innerHTML = "*Please Select Your Gender Please";
        status = false;
    }
    
    //Select Validation
    if (select === "") {
        selectError.innerHTML = "*Please Select Any Option Please";
        status = false;
    }

    if (!status) {
        event.preventDefault();
    } else{
        let errorElements = document.getElementsByClassName("error");
        for (let i = 0; i < errorElements.length; i++) {
            errorElements[i].innerHTML = "";
        }
        alert("Record Update Successfully");
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

let phoneField = document.getElementById('phoneno');
phoneField.addEventListener('keyup', function(){
let phoneValue = phoneField.value;
phoneValue = phoneValue.replace(/[^0-9]/g,'');
phoneField.value = phoneValue.substr(0, 10);
});