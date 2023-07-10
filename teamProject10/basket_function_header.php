<?php
session_start();

include("connect.php");


if (!isset($_SESSION['id'])) {
    header("Location:adminlogin.php");
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
unset($_SESSION['qty_array']);

$cars_id = mysqli_insert_id($con);
$currentcar = '$cars_id';
$productsql = "SELECT * FROM cars1 ";
$cars_product = $con->query($productsql);




?>