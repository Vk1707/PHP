<?php

//preserving control state during postback

$data=['name'=>'','city'=>'','gender'=>''];
$error=[];

if(isset($_GET['submitted'])){
    //Validating text fields
    if(empty($_GET['name'])){
        $error['name'] = '*Name is required';    
    } elseif(strlen($_GET['name']) < 4){
        $error['name'] = '*Minimum 4 characters is required';
    } elseif(strlen($_GET['name']) > 20){
        $error['name'] = '*Maximum 20 characters are allowed';
    } elseif(!preg_match("/[a-zA-Z]/",$_GET['name'])){
        $error['name'] = '*Only alphabets are allowed';
    } else{
        $data['name'] = $_GET['name'];
    }
    //Validating radio buttons and checkbox
    if(!isset($_GET['gender'])){
        $error['gender'] = '*Please specify your gender';    
    } else{
        $data['gender'] = $_GET['gender'];
    }
    //Validating Select/Drop down list
    if($_GET['city']=='Select City'){
        $error['city'] = '*Please specify your City';    
    } 
    else{
        $data['city'] = $_GET['city'];
    }      

}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM 9 VAL & ERROR</title>
</head>
<body>
    <?php if(isset($_GET['submitted']) && count($error)==0) { ?>
        <h1> Welcome <?= $_GET['name']??'';?></h1>
        <h1> Gender <?= $_GET['gender']??'';?></h1>
        <h1> City <?= $_GET['city']??'';?></h1>
        <?php print_r($data);?>
    <?php } else { ?>    
        <form method="get">
            <input type="hidden" name="submitted" value="true">  
            Name :  <input type="text" name="name" value="<?= $data['name']??'' ?>" > <?= $error['name']??'' ?><br>
            Gender :  <input type="radio" name="gender" value="Male" <?= $data['gender']=='Male'?'checked':'' ?>> Male 
                      <input type="radio" name="gender" value="Female" <?= $data['gender']=='Female'?'checked':'' ?>> Female  <?= $error['gender']??'' ?><br>
            City :  <select name="city">
                        <option selected >Select City</option>
                        <option <?= $data['city']=='Delhi'?'selected':'' ?>>Delhi</option>
                        <option <?= $data['city']=='Mumbai'?'selected':'' ?>>Mumbai</option>
                        <option <?= $data['city']=='Chennai'?'selected':'' ?>>Chennai</option>
                    </select> <?= $error['city']??'' ?> <br>
             <input type="submit" value="Submit">
        </form>     
    <?php } ?>
</body>
</html>
