<?php
session_start();
//disallows any and all access to this page UNLESS you sign in
include("connect.php");

//Just add this at the top of the product pages Pantelis.
// Code by Xavier Walker(the initalising of the product's cart and search functionality)
//If if cart is empty  reset the cart to an empty array. Then get all the cars' details from the sql query
if (!isset($_SESSION['mercedescart'])) {
    $_SESSION['mercedescart'] = array();
}
unset($_SESSION['mercedesqty_array']);
$mercedessql = "SELECT * FROM mercedes";
$mercedes_products = $con->query($mercedessql);

if (!isset($_SESSION['audicart'])) {
    $_SESSION['audicart'] = array();
}
unset($_SESSION['audiqty_array']);
$audisql = "SELECT * FROM audi";
$audi_products = $con->query($audisql);


if (!isset($_SESSION['vwcart'])) {
    $_SESSION['vwcart'] = array();
}
unset($_SESSION['vwqty_array']);
$vwsql = "SELECT * FROM volkswagen";
$vw_products = $con->query($vwsql);


if (!isset($_SESSION['toyotacart'])) {
    $_SESSION['toyotacart'] = array();
}
unset($_SESSION['toyotaqty_array']);
$toyotasql = "SELECT * FROM toyota";
$toyota_products = $con->query($toyotasql);

if (!isset($_SESSION['bmwcart'])) {
    $_SESSION['bmwcart'] = array();
}
unset($_SESSION['bmw_array']);
$bmwsql = "SELECT * FROM bmw";
$bmw_products = $con->query($bmwsql);

if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Home</title>
</head>

<style>
    body {
        padding-top: 50px;
    }

    h1 {
        text-align: center;
        font-size: 10em;
    }
</style>

<body>
    <?php include 'navbar.php' ?>
    <!-- Creates a search bar -->
    <div class="form signup" style="margin-bottom:800px;">
        <form method="POST" action="products_drive_test.php" class="" style{margin-top: 20px;}>
            <input class="formInput" type="text" name="criteria" placeholder="Search...">
            <input class="formInput" type="submit" name="search" value="Search" />
            <input class="formInput" type="submit" name="reset" value="Reset" />
            <input type="hidden" name="searched" value="true" />
        </form>
    </div>
    <main>


        <?php
        // If the search button is pressed it checks all tables for products similar to the entered word
        if (isset($_POST["searched"])) {
            if (isset($_POST["criteria"])) {
                $search = $_POST["criteria"];
                $Audisql = "SELECT * FROM audi WHERE make LIKE '%{$search}%' or model LIKE '%{$search}%'";
                $AudiResult = mysqli_query($con, $Audisql);
                $bmwsql = "SELECT * FROM bmw WHERE make LIKE '%{$search}%' or model LIKE '%{$search}%'";
                $bmwResult = mysqli_query($con, $bmwsql);
                $mercedessql = "SELECT * FROM mercedes WHERE make LIKE '%{$search}%' or model LIKE '%{$search}%'";
                $mercedesResult = mysqli_query($con, $mercedessql);
                $toyotasql = "SELECT * FROM toyota WHERE make LIKE '%{$search}%' or model LIKE '%{$search}%'";
                $toyotaResult = mysqli_query($con, $toyotasql);
                $vwsql = "SELECT * FROM volkswagen WHERE make LIKE '%{$search}%' or model LIKE '%{$search}%'";
                $vwResult = mysqli_query($con, $vwsql);


                if (mysqli_num_rows($AudiResult) > 0) {
                    while ($row = mysqli_fetch_assoc($AudiResult)) {

                        $id_audi = $row['id_audi'];
        ?>

                        <div class="vidbox">
                            <div class="card">
                                <div class="caption">
                                    <img src='images/<?php echo $row['image']; ?>' style='width:100%'>
                                    <p class="price"><?php echo $row['make']; ?> <?php echo $row['model']; ?></p>
                                    <p class="hello"></p>
                                </div>


                                <form method="post" action="book_audi_appointment.php? idBookAudi= <?php echo $row["id_audi"]; ?>">
                                    <input type=hidden name="hiddenProductmake" value="<?php echo $row['make']; ?>">
                                    <input type=hidden name="hiddenProductmodel" value="<?php echo $row['model']; ?>">
                                    <input type=submit class="submitButton" name="addToBasket" value="Book Test Drive" />
                                </form>

                            </div>
                        </div>
                    <?php }
                }

                if (mysqli_num_rows($bmwResult) > 0) {
                    while ($row = mysqli_fetch_assoc($bmwResult)) { ?>
                        <div class="vidbox">
                            <div class="card">
                                <div class="caption">

                                    <img src='images/<?php echo $row['image']; ?>' style='width:100%'>
                                    <p class="price"><?php echo $row['make']; ?> <?php echo $row['model']; ?></p>
                                    <p class="hello"></p>
                                </div>
                                <form method="post" action="book_bmw_appointment.php? idBookBmw=<?php echo $row["id_bmw"]; ?>">
                                    <input type=hidden name="hiddenProductmake" value="<?php echo $row['make']; ?>">
                                    <input type=hidden name="hiddenProductmodel" value="<?php echo $row['model']; ?>">
                                    <input type=submit class="submitButton" name="addToBasket" value="Book Test Drive" />
                                </form>

                            </div>
                        </div>
                    <?php }
                }


                if (mysqli_num_rows($mercedesResult) > 0) {
                    while ($row = mysqli_fetch_assoc($mercedesResult)) { ?>
                        <div class="vidbox">
                            <div class="card">
                                <div class="caption">

                                    <img src='images/<?php echo $row['image']; ?>' style='width:100%'>
                                    <p class="price"><?php echo $row['make']; ?> <?php echo $row['model']; ?></p>
                                    <p class="hello"></p>
                                </div>


                                <form method="post" action="book_mercedes_appointment.php? idBookMercedes=<?php echo $row["id_mercedes"]; ?>">
                                    <input type=hidden name="hiddenProductmake" value="<?php echo $row['make']; ?>">
                                    <input type=hidden name="hiddenProductmodel" value="<?php echo $row['model']; ?>">
                                    <input type=submit class="submitButton" name="addToBasket" value="Book Test Drive" />
                                </form>

                            </div>
                        </div>
                    <?php }
                }
                if (mysqli_num_rows($toyotaResult) > 0) {
                    while ($row = mysqli_fetch_assoc($toyotaResult)) { ?>
                        <div class="vidbox">
                            <div class="card">
                                <div class="caption">

                                    <img src='images/<?php echo $row['image']; ?>' style='width:100%'>
                                    <p class="price"><?php echo $row['make']; ?> <?php echo $row['model']; ?></p>
                                    <p class="hello"></p>
                                </div>


                                <form method="post" action="book_toyota_appointment.php? idBookToyota=<?php echo $row["id_toyota"]; ?>">
                                    <input type=hidden name="hiddenProductmake" value="<?php echo $row['make']; ?>">
                                    <input type=hidden name="hiddenProductmodel" value="<?php echo $row['model']; ?>">
                                    <input type=submit class="submitButton" name="addToBasket" value="Book Test Drive" />
                                </form>

                            </div>
                        </div>
                    <?php }
                }

                if (mysqli_num_rows($vwResult) > 0) {
                    while ($row = mysqli_fetch_assoc($vwResult)) { ?>
                        <div class="vidbox">
                            <div class="card">
                                <div class="caption">

                                    <img src='images/<?php echo $row['image']; ?>' style='width:100%'>
                                    <p class="price"><?php echo $row['make']; ?> <?php echo $row['model']; ?></p>
                                    <p class="hello"></p>
                                </div>


                                <form method="post" action="book_volkswagen_appointment.php? idBookVolkswagen=<?php echo $row["id_volkswagen"]; ?>">
                                    <input type=hidden name="hiddenProductmake" value="<?php echo $row['make']; ?>">
                                    <input type=hidden name="hiddenProductmodel" value="<?php echo $row['model']; ?>">
                                    <input type=submit class="submitButton" name="addToBasket" value="Book Test Drive" />
                                </form>

                            </div>
                        </div>
            <?php }
                }
            }
            // If the reset button is pressed select all data. The part below will display every item in the dabtabase
        } elseif (isset($_POST["reset"])) {
            $mercedessql = "SELECT * FROM mercedes";
            $mercedes_products = $con->query($mercedessql);
            $audisql = "SELECT * FROM audi";
            $audi_products = $con->query($audisql);
            $vwsql = "SELECT * FROM volswagen";
            $vw_products = $con->query($vwsql);
            $toyotasql = "SELECT * FROM toyota";
            $toyota_products = $con->query($toyotasql);
            $bmwsql = "SELECT * FROM bmw";
            $bmw_products = $con->query($bmwsql);
        } else {
            ?>

            <!-- If nothing is presssed display all items -->

            <?php while ($row = mysqli_fetch_assoc($mercedes_products)) { ?>
                <div class="vidbox">
                    <div class="card">
                        <div class="caption">

                            <img src='images/<?php echo $row['image']; ?>' style='width:100%'>
                            <p class="price"><?php echo $row['make']; ?> <?php echo $row['model']; ?></p>
                            <p class="hello"></p>
                        </div>


                        <form method="post" action="book_mercedes_appointment.php? idBookMercedes=<?php echo $row["id_mercedes"]; ?>">
                            <input type=hidden name="hiddenProductmake" value="<?php echo $row['make']; ?>">
                            <input type=hidden name="hiddenProductmodel" value="<?php echo $row['model']; ?>">
                            <input type=submit class="submitButton" name="addToBasket" value="Book Test Drive" />
                        </form>

                    </div>
                </div>
            <?php } ?>

            <?php

            while ($row = mysqli_fetch_assoc($audi_products)) { ?>
                <div class="vidbox">
                    <div class="card">
                        <div class="caption">
                            <img src='images/<?php echo $row['image']; ?>' style='width:100%'>
                            <p class="price"><?php echo $row['make']; ?> <?php echo $row['model']; ?></p>
                            <p class="hello"></p>
                        </div>


                        <form method="post" action="book_audi_appointment.php? idBookAudi= <?php echo $row["id_audi"]; ?>">
                            <input type=hidden name="hiddenProductmake" value="<?php echo $row['make']; ?>">
                            <input type=hidden name="hiddenProductmodel" value="<?php echo $row['model']; ?>">
                            <input type=submit class="submitButton" name="addToBasket" value="Book Test Drive" />
                        </form>

                    </div>
                </div>
            <?php } ?>


            <?php while ($row = mysqli_fetch_assoc($vw_products)) { ?>
                <div class="vidbox">
                    <div class="card">
                        <div class="caption">

                            <img src='images/<?php echo $row['image']; ?>' style='width:100%'>
                            <p class="price"><?php echo $row['make']; ?> <?php echo $row['model']; ?></p>
                            <p class="hello"></p>
                        </div>


                        <form method="post" action="AddVWToBasket.php?action=add&id=<?php echo $row["id_volkswagen"]; ?>">
                            <input type=hidden name="hiddenProductmake" value="<?php echo $row['make']; ?>">
                            <input type=hidden name="hiddenProductmodel" value="<?php echo $row['model']; ?>">
                            <input type=hidden name="hiddenProductPrice" value="<?php echo $row['price']; ?>">
                            <input type=submit class="submitButton" name="addToBasket" value="Book Test Drive" />
                        </form>
                    </div>
                </div>
            <?php } ?>



            <?php while ($row = mysqli_fetch_assoc($toyota_products)) { ?>
                <div class="vidbox">
                    <div class="card">
                        <div class="caption">

                            <img src='images/<?php echo $row['image']; ?>' style='width:100%'>
                            <p class="price"><?php echo $row['make']; ?> <?php echo $row['model']; ?></p>
                            <p class="hello"></p>
                        </div>


                        <form method="post" action="book_toyota_appointment.php? idBookToyota=<?php echo $row["id_toyota"]; ?>">
                            <input type=hidden name="hiddenProductmake" value="<?php echo $row['make']; ?>">
                            <input type=hidden name="hiddenProductmodel" value="<?php echo $row['model']; ?>">
                            <input type=submit class="submitButton" name="addToBasket" value="Book Test Drive" />
                        </form>

                    </div>
                </div>
            <?php } ?>



            <?php while ($row = mysqli_fetch_assoc($bmw_products)) { ?>
                <div class="vidbox">
                    <div class="card">
                        <div class="caption">

                            <img src='images/<?php echo $row['image']; ?>' style='width:100%'>
                            <p class="price"><?php echo $row['make']; ?> <?php echo $row['model']; ?></p>
                            <p class="hello"></p>
                        </div>
                        <form method="post" action="book_bmw_appointment.php? idBookBmw=<?php echo $row["id_bmw"]; ?>">
                            <input type=hidden name="hiddenProductmake" value="<?php echo $row['make']; ?>">
                            <input type=hidden name="hiddenProductmodel" value="<?php echo $row['model']; ?>">
                            <input type=submit class="submitButton" name="addToBasket" value="Book Test Drive" />
                        </form>

                    </div>
                </div>
        <?php }
        } ?>

        <!-- This php block gets the message passed from the url and displays whether a product has been added to the cart or not
    based on the quantity of the item left in stock
    -->
        <?php
        if (isset($_GET['message'])) {
            $message = $_GET['message'];
            echo "<script>window.alert('$message')</script>";
        }
        ?>
    </main>


    <?php include 'footer.php' ?>
</body>




</html>