<!-- Youll need line 23, 38,39 54-59 -->
<?php
session_start();
//disallows any and all access to this page UNLESS you sign in
include("connect.php");

//Just add this at the top of the product pages Pantelis.
// Code by Xavier Walker(the initalising of the product's cart and search functionality)
//If if cart is empty  reset the cart to an empty array. Then get all the cars' details from the sql query
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
unset($_SESSION['qty_array']);
$productsql = "SELECT * FROM cars1";
$cars_product = $con->query($productsql);

if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}
$cars_id = $_GET['cars_id'];
echo $cars_id;
?>

<!-- Youll need  line 23 -->
<form method="post" action="AddToBasket.php?action=add&id=<?php echo $id; ?>">

    <?php
    //Gets the order the user(that is signed in) clicked and displays the order details and the order items
    $PastOrderssql = " SELECT * FROM cars1 WHERE cars_id = $cars_id ";
    $PastOrder_products = $con->query($PastOrderssql);

    $PastOrderrow = mysqli_fetch_assoc($PastOrder_products); ?>
    <?php echo $PastOrderrow['Make'] . " " . $PastOrderrow['Model']; ?>
    <?php echo $PastOrderrow['Quantity'];
    $cost = $PastOrderrow['price'];
    $CostFormat = number_format($cost);
    echo "£" . $CostFormat; ?>
    <input type=submit class="submitButton" name="addToBasket" value="Add To Basket" />
</form>

<?php
echo 'yooooo';
while ($PastOrderrow = mysqli_fetch_assoc($PastOrder_products)) {


?>




<?php

} ?>
<?php
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script>window.alert('$message')</script>";
}
?>
<div></div>