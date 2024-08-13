<?php
include_once("connec.php");


// Update Active Selected checkbox
if(isset($_POST['multi_active'])){    
    if(isset($_POST['checked'])){
        foreach($_POST['checked'] as $id){
            UpdateStatus($id);
            echo "Updated";
        }
    }
}

// Update No Active Selected checkbox
if(isset($_POST['no_active'])){    
    if(isset($_POST['checked'])){
        foreach($_POST['checked'] as $id){
            $updateno = "update userdetails set status = 'No' where id=".$id;
            mysqli_query($db,$updateno);
            echo "Updated";
        }
    }
}

// Mark Deleted Selected checkbox
if(isset($_POST['mark_delete'])){    
    if(isset($_POST['checked'])){
        foreach($_POST['checked'] as $id){
            MarkDelete($id);
            echo "Mark Deleted";
        }
    }
}

// Delete Selected checkbox
if(isset($_POST['multi_delete'])){    
    if(isset($_POST['checked'])){
        foreach($_POST['checked'] as $id){
            DeleteUser($id);
            echo "Deleted";
        }
    }
}
header("location:user-list.php");
?>
