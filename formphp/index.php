<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>User Registration</h2>
    <form id="registrationForm" method="post" action="process.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
        <div id="nameError" class="text-danger"></div>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
        <div id="emailError" class="text-danger"></div>
      </div>
      <div class="form-group">
        <label for="mobile">Mobile:</label>
        <input type="text" class="form-control" id="mobile" name="mobile" required>
        <div id="mobileError" class="text-danger"></div>
      </div>
      <div class="form-group">
        <label for="image">Profile Image:</label>
        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
        <div id="imageError" class="text-danger"></div>
      </div>
      <div class="form-group">
        <label>Interests:</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="interest1" name="interests[]" value="Sports">
          <label class="form-check-label" for="interest1">Sports</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="interest2" name="interests[]" value="Music">
          <label class="form-check-label" for="interest2">Music</label>
        </div>
        <!-- Add more checkboxes as needed -->
        <div id="interestsError" class="text-danger"></div>
      </div>
      <div class="form-group">
        <label for="city">City:</label>
        <select class="form-control" id="city" name="city" required>
          <option value="">Select City</option>
          <option value="New York">New York</option>
          <option value="Los Angeles">Los Angeles</option>
          <!-- Add more options as needed -->
        </select>
        <div id="cityError" class="text-danger"></div>
      </div>
      <div class="form-group">
        <label>Gender:</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="male" name="gender" value="Male" required>
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="female" name="gender" value="Female" required>
          <label class="form-check-label" for="female">Female</label>
        </div>
        <div id="genderError" class="text-danger"></div>
      </div>
      <button type="button" onclick="validateForm()" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script>
    function validateForm() {
      var name = document.getElementById('name').value;
      var email = document.getElementById('email').value;
      var mobile = document.getElementById('mobile').value;
      var image = document.getElementById('image').value;
      var interests = document.querySelectorAll('input[name="interests[]"]:checked').length;
      var city = document.getElementById('city').value;
      var gender = document.querySelector('input[name="gender"]:checked');
      console.log(interests)
      console.log(gender)
      var isValid = true;

      // Name validation
      if (name.trim() == '') {
        document.getElementById('nameError').innerHTML = 'Name is required';
        isValid = false;
      } else {
        document.getElementById('nameError').innerHTML = '';
      }

      // Email validation
      if (email.trim() == '') {
        document.getElementById('emailError').innerHTML = 'Email is required';
        isValid = false;
      } else {
        document.getElementById('emailError').innerHTML = '';
      }

      // Mobile validation
      if (mobile.trim() == '') {
        document.getElementById('mobileError').innerHTML = 'Mobile is required';
        isValid = false;
      } else {
        document.getElementById('mobileError').innerHTML = '';
      }

      // Image validation
      if (image.trim() == '') {
        document.getElementById('imageError').innerHTML = 'Image is required';
        isValid = false;
      } else {
        document.getElementById('imageError').innerHTML = '';
      }

      // Interests validation
      if (interests == 0) {
        document.getElementById('interestsError').innerHTML = 'Select at least one interest';
        isValid = false;
      } else {
        document.getElementById('interestsError').innerHTML = '';
      }

      // City validation
      if (city.trim() == '') {
        document.getElementById('cityError').innerHTML = 'City is required';
        isValid = false;
      } else {
        document.getElementById('cityError').innerHTML = '';
      }

      // Gender validation
      if (!gender) {
        document.getElementById('genderError').innerHTML = 'Gender is required';
        isValid = false;
      } else {
        document.getElementById('genderError').innerHTML = '';
      }

      // If all fields are valid, submit the form
      if (isValid) {
        document.getElementById('registrationForm').submit();
      }
    }
  </script>
</body>
</html>
