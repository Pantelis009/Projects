<!-- Xavier Walker 210067271 -->
<!-- Based on research and trial & error. This is the best approach I came up with for being able to display
multiple products from differnet tables -->

<!-- Creates/resumes a session based on the session identifier. -->
<?php
session_start();
//disallows any and all access to this page UNLESS you sign in
include("connect.php");
include("navbar.php");
if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}
?>
<!-- In order to make the website responsive I used vw(viewpoint) -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="Styling.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="CartFunctionality.js"> </script>
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Design for the table that displays the current basket of the user -->
    <style>
        .tbl-cart {
            font-size: 0.9em;
        }

        .tbl-cart th {
            font-weight: normal;
        }

        th,
        td,
        tr {
            font-size: 2.5vw;
        }
    </style>
</head>

<body>



    <!-- Test: User shouldnt and cant checkout if basket is empty -->

    <!-- Sets the basket total to 0 initially and checks if the carts/baskets have any items in it.
        If it is empty then a message specifying the cart is empty is displayed. Else it displays the items the user selected -->
    <a href="PastOrders.php">HERE</a>
    <?php

    if (empty($_SESSION['cart'])) {
    ?><h1 style="padding-left: auto; padding-right:auto; padding-top:8vw; display: flex; justify-content: center; align-items: center; font-size:6vw;"><?php echo 'Your shopping cart is empty'; ?> </h1>
        <i class="fa fa-shopping-bag" style="font-size:20vw; color:rgba(73, 79, 83,0.3);  display: flex; justify-content: center; align-items: center;"></i>
        <br><a style=" display: flex; justify-content: center; align-items: center; font-size:5vw; color:#9c0f0f" href="products.php">Continue shopping</a>
    <?php } else {
        $totalCost = 0;

    ?>
        <!-- Creates a table with 5 columns -->
        <div style="position:absolute; margin-left:10%; padding-top:3vw">
            <table class="table" cellpadding="100" cellspacing="1" style="margin-left:auto; margin-right:auto;">
                <tbody>
                    <tr><!--These are the table column names -->
                        <th style="text-align:center;">Make</th>
                        <th style="text-align: center;">Model</th>
                        <th style="text-align:center;">Unit Price</th>
                        <th style="text-align:center;">Quantity</th>
                        <th style="text-align:center;">Add </th>
                        <th style="text-align:center;">Remove</th>

                        <?php
                        // this script checks that the  cart is not empty. If its not, all the items are selected and displayed in a table.
                        //The table shows the make,model,unit price,quantity of each item. With an option to increase/decrease the quantity
                        // The cost of the all items in the baskets is also calculated and displayed. And the checkout button sends this data to the checkout page
                        //A clear cart option deletes the whole cart and redirects the user back to the home page
                        if (!empty($_SESSION['cart'])) {
                            $carssql = "SELECT * FROM cars1 WHERE cars_id IN (" . implode(',', $_SESSION['cart']) . ")";;
                            $car_products = $con->query($carssql);

                            if (!isset($_SESSION['qty_array'])) {
                                $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                            } ?>



                    </tr> <?php
                            while ($carrow = mysqli_fetch_assoc($car_products)) {
                                $cars_id = $carrow['cars_id'];
                                //converts the price column value from the sql statement and displays the value with the commas in the right place for user ease of use
                                //displays all the products the user bought from that order
                                $Unitcost = $carrow['price'];
                                $UnitCostFormat = number_format($Unitcost);

                            ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $carrow['make']; ?></td>
                            <td style="text-align: center;"><?php echo $carrow['model'] ?></td>
                            <td style="text-align:center;">£<?php echo $UnitCostFormat; ?></td>
                            <td style="text-align:center;"><?php echo count(array_keys($_SESSION['cart'], $cars_id)); ?></td>
                            <td style="text-align:center;"><a href="AddToBasketInBasket.php?id=<?php echo $carrow['cars_id'] ?>"><span class="glyphicon glyphicon-plus" style="color: grey;"></span></a>
                            <td style="text-align:center;"></span></a><a href="DeleteItemFromBasket.php?id=<?php echo $carrow['cars_id'] ?>"> <span class="glyphicon glyphicon-minus"></span></button></a>

                        </tr>
                <?php
                                // Cost of all mercedes products in mercedes' basket are added to $totalCost
                                $totalCost = $totalCost + $carrow['price'] * count(array_keys($_SESSION['cart'], $cars_id));
                            }
                        }

                        // this script checks that the bmw cart is not empty. If its not, all the items from the bmw are selected and displayed in a table.


                ?>


                </tbody>
                <!-- Total cost is calculated and displayed -->

                <tr>
                    <td colspan="2" text-align="right">Total:</td>
                    <td style="align:right"><?php echo '£' . number_format($totalCost); ?></td>
                    <td><a href="Checkout.php"><button style="  background: linear-gradient(135deg, #e6e6e6, #9c0f0f); color:white;">Checkout securely</button></a></td>

                </tr>
                <tr><a style="font-size: 3vw;" href="DeleteWholeCart.php">Clear Cart</a></tr>
            </table>

        <?php
        //(This is just make sure its 100% set) Session variable is  given the value of $totalCost so it can be passed across the website

        $_SESSION['totalCost'] = $totalCost;
    }

        ?>


        <div style="float: right;">


</body>

</html>