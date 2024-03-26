<?php
$arr = ["id"=>"1" ,
 "name"=>"vivek",
 "course"=>"PHP"];
?>

<!-- method 1 -->
<?php
echo $arr["course"];
?>

<br>
<hr>

<!-- method 2 -->
<?php foreach($arr as $value) {
  echo $value;  
} ?>

<br>
<hr>

<!-- method 3 -->
<?php foreach($arr as $key=>$value) {
  echo "$key = $value";
  echo "<br>";  
} ?>




