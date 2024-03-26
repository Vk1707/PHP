<?php
include_once("../employee_table/conc.php");
include_once("../template/header.php");

?>

<div>
    <h2>Employee Table</h2>
    <table border="1px Solid black" cellpadding="10px">
        <tr>
            <th>First Name <input type="text" id="fname" name="fname"> <br>
                 Last Name <input type="text" id="lname" name="lname"> <br>
                 Hire Date <input type="text" id="hdate" name="hdate"> <br>
                 <input type="submit" value="button" id="save-data">
            </th>
        </tr>
    </table>
    <br>
    <br>
    <table border="1px Solid black" cellpadding="10px">
    <tr>
            <th>1</th>
            <th>Vivek</th>
            <th>Kumar</th>
            <th>05/04/2023</th>
        </tr>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<script>
    
    $(document).ready(function(){
        $("#save-data").on("click",function(e){
            e.preventDefault();
            var first_name = $("fname").val();
            var last_name = $("lname").val();
            var hire_date = $("hdate").val();

            $.ajax({
                url : "data.php",
                type: "POST",
                data: {first_name: fname, last_name: lname,hire_date: hdate },
                success: function(data) {
                    console.log(data);
            }
            });
        });
    });

</script>

<?php
include_once("../template/footer.php");
?>