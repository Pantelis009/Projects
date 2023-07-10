<?php
session_start();
//disallows any and all access to this page UNLESS you sign in
include("connect.php");
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>

    <?php
    // Gets the car's id  and passes it in the sql query to find the product 

    $id = $_GET['id'];
    $productssql = "SELECT id,Quantity FROM carProducts WHERE id =$id";
    $car_products = $con->query($productssql);
    $car_products_row = mysqli_fetch_assoc($car_products);
    // If the  user quantity requst is  greater than or equal to the quantity(stock) of the car is  the user adds the product to their basket. And a message 'product added to cart' is displayed(technically the messaged is stored in the variable $message to be used later)
    $_SESSION['Quantity'] = $car_products_row['Quantity'];
    $carid = $car_products_row['id'];

    if (!isset($Quantity)) {
        $Quantity = count(array_keys($_SESSION['cart'], $carid));
    }
    if ($Quantity < $_SESSION['Quantity']) {
        array_push($_SESSION['cart'], $_GET['id']);
        $message = 'Product added to cart';
        ++$Quantity;
    } else {
        //If the amount the user has selected is less than the stock quanitty for that item then the product is not added to the user's basket and a message 'out of stock' is displayed(technically the messaged is stored in the variable $message to be used later)
        $message = 'out of stock';
        echo "<script>window.alert('Sorry, out of stock')</script>";
    }
  //This redirects the user back to the current basket page and the relevant message is displayed to the user
  header("location:CurrentBasket.php?message=" . urlencode($message));
    ?>