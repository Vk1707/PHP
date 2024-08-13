<?php
include_once("../country-state rohini/connec.php");

$countries = GetCountries();

include_once("../country-state rohini/template/header.php");

?>

<!-- Country Dropdown -->
<div>
    <div>
        <select name="country" id="country">
            <option selected disabled>Select Country</option>
            <?php foreach ($countries as $country) { ?>
                <option value="<?= $country['id'] ?>"><?= $country['name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <select name="state" id="state">
            <option selected disabled>Select State</option>
        </select>
    </div>
    <div>
        <select name="city" id="city">
            <option selected disabled>Select City</option>
        </select>
    </div>
</div>
<?php include_once("../country-state rohini/template/footer.php");
?>

<script>
    // country
    $('#country').on('change', function() {
        var country_id = this.value;
        // console.log(country_id);
        $.ajax({
            url: 'ajax/state.php',
            type: "POST",
            data: {
                country_data: country_id
            },
            success: function(result) {
                $('#state').html(result);
                // console.log(result);
            }
        })
    });

    // city
    $('#state').on('change', function() {
        var state_id = this.value;
        $.ajax({
            url: 'ajax/city.php',
            type: "POST",
            data: {
                state_data: state_id
            },
            success: function(data) {
                console.log(data);
                $('#city').html(data);
            }
        })
    });
</script>