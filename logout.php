<?php
session_start();
include 'Property.php';

$obj=new Property;

if(isset($_SESSION['email'])){
    $obj->logout(); // logging out user and destroying session
}else{
    echo"no session";
}
header("location:./index.php"); // redirecting to homepage
?>