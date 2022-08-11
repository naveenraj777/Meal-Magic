<?php 
session_start();
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food_order');
define('SITEURL','http://localhost/foodapp/');

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
$select_db = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());


?>