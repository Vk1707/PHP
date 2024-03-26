<?php
$cities=array("New Delhi","Mumbai","Chennai","Kolkata","Hyderabad","Kochi","Bengaluru");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	City : <select>
		<option>Select City</option>
		<?php foreach($cities as $city) { ?>
		<option><?php echo $city; ?></option>		
		<?php } ?>
	</select>
</body>
</html>