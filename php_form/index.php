<!DOCTYPE html>
<html>
<head>
    <title>Form Validation and Database Handling</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function validateForm() {
            var name = document.forms["myForm"]["name"].value;
            var email = document.forms["myForm"]["email"].value;
            var mobile = document.forms["myForm"]["mobile"].value;
            var checkboxes = document.getElementsByName("interests[]");
            var select = document.forms["myForm"]["select"].value;
            var radio = document.querySelector('input[name="gender"]:checked');

            if (name == "" || email == "" || mobile == "" || select == "" || !radio) {
                alert("Please fill in all required fields.");
                return false;
            }

            var checked = false;
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    checked = true;
                    break;
                }
            }
            if (!checked) {
                alert("Please select at least one interest.");
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Form Validation and Database Handling</h2>
        <form name="myForm" action="submit.php" onsubmit="return validateForm()" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" id="mobile" name="mobile">
            </div>

            <div class="form-group">
                <label>Interests:</label><br>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="interest1" name="interests[]" value="Interest 1">
                    <label class="form-check-label" for="interest1">Interest 1</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="interest2" name="interests[]" value="Interest 2">
                    <label class="form-check-label" for="interest2">Interest 2</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="interest3" name="interests[]" value="Interest 3">
                    <label class="form-check-label" for="interest3">Interest 3</label>
                </div>
            </div>

            <div class="form-group">
                <label for="select">Select:</label>
                <select class="form-control" id="select" name="select">
                    <option value="">Choose an option</option>
                    <option value="Option 1">Option 1</option>
                    <option value="Option 2">Option 2</option>
                    <option value="Option 3">Option 3</option>
                </select>
            </div>

            <div class="form-group">
                <label>Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
