<?php

// ini_set('display_errors','off');

//Error : Notice and Warning Errors are Not caught in catch block And can be supressed by turning off the Display Error property.

$array=["vivek","123","1234566"];

try{
    echo $array[3];
}
catch(Exception $e){
    echo "Sytem Error Occured";
}

echo "Print this line";

?>