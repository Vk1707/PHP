<?php
$arr = [1,2,3,4,5];

?>

<!-- method 1 -->
<?php
echo $arr[3]
?>

<br>
<hr>

<!-- method 2 -->
<?php for($i=0;$i<5;$i++) {
  echo $arr[$i];  
} ?>

<br>
<hr>

<!-- method 3 -->
<?php foreach($arr as $value) {
  echo $value;  
} ?>




