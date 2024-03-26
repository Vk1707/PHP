<?php

include_once("../dal/dal.php");

$id = $_GET['id'];
DeleteInventory($id);
header('location:inventory-list.php');

?>