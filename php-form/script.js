// script.js

function validateForm() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let mobile = document.getElementById('mobile').value;
    let city = document.getElementById('city').value;

    // Name validation
    if (!name.match(/[A-Za-z ]{1,}/)) {
        alert("Please enter a valid name.");
        return false;
    }

    // Email validation (HTML5 built-in validation)
    if (!email) {
        alert("Please enter an email.");
        return false;
    }

    // Mobile validation
    if (!mobile.match(/[0-9]{10}/)) {
        alert("Please enter a valid 10-digit mobile number.");
        return false;
    }

    // City validation
    if (!city.match(/[A-Za-z ]{1,}/)) {
        alert("Please enter a valid city name.");
        return false;
    }

    return true;
}

function addUser() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let mobile = document.getElementById('mobile').value;
    let gender = document.getElementById('gender').value;
    let city = document.getElementById('city').value;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'add_user.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('userList').innerHTML = xhr.responseText;
        }
    }
    xhr.send('name='+name+'&email='+email+'&mobile='+mobile+'&gender='+gender+'&city='+city);

    return false; // Prevent default form submission
}

// Function to load user list
function loadUserList() {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_users.php', true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('userList').innerHTML = xhr.responseText;
        }
    }
    xhr.send();
}
// Function to delete user
function deleteUser(id) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'delete_user.php?id=' + id, true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            loadUserList(); // Reload user list after deletion
        }
    }
    xhr.send();
}
// Load initial user list
loadUserList();
