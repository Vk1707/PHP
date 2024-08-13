<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<input type="text" name="inputnum" id="num1">
	<button onclick="check()" type="submit">Submit</button>

	<span id="result"></span>

	<script>
		
		const check = () => {
			let num = document.getElementById("num1").value;
			let pattern = /^[^2345]\d{10}$/;
			let matches = pattern.test(num); // Check if input matches the pattern
			console.log(matches);
			console.log(num);
			let result = document.getElementById("result");
			if (matches){
				result.innerHTML = "Pattern matched successfully!";
			}
			else{
				result.innerHTML = "Pattern does not match!";
			}
		}
	</script>
</body>

</html>