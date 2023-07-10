<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

</head>
<style type="text/css">
    * {
        padding: 0;
        margin: 0;
        text-decoration: none;
    }

    #navbar {
        position: absolute;
        top: 0;
        width: 100%;
        height: 60px;
        background: white;
        border-bottom: 2px solid black;
        z-index: 1;
        display: flex;
    }

    #navbar ul {
        list-style-type: none;
        text-align: right;
        margin-left: 400px;
    }

    #navbar li {
        display: inline-block;
        padding: 15px;
        margin-top: -10px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 20px;
        color: grey;
        margin-right: 10px;
    }

    a:visited {
        text-decoration: none;
        color: grey;
        text-decoration: none;
    }

    .logo {
        max-width: 10%;
        float: left;
    }

    .button1 {
        background-color: #bf1E2E;
        border: none;
        color: #292525;
        border-radius: 10px;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    .button2 {
        background-color: #36454F;
        border: none;
        color: red;
        border-radius: 10px;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    #navbar li:hover a {
        color: #bf1E2E;
    }

    .button1:hover {
        background-color: #bf1E2E;
        color: white;
    }

    .button2:hover {
        background-color: #36454F;
        color: white;
    }
</style>


<body>

    <div id="navbar">


        <img src="images/logo-removebg.png" class="logo" style="width: 140px; cursor:pointer;" onclick="logoFunction()" />




        <li>

        </li>


        <ul>

            <li><a href="index.php">HOME</a></li>
            <li><a href="products.php">CARS FOR SALE</a></li>
            <li><a href="products_drive_test.php">BOOK TEST DRIVE</a></li>
            <li><a href="aboutus.php">ABOUT US</a></li>
            <li><a href="contactus.php">CONTACT US</a></li>
            <li><a href="Currentbasket.php">BASKET</a></li>
            <?php

            if (isset($_SESSION["id"])) {
                echo "<li><a href='logout.php'>Log Out</a></li>";
            } else {
                echo "<li><a href='login.php'>Log In</a></li>";
            }
            ?>
        </ul>
    </div>
    <script>
        function logoFunction() {
            window.location.href = "YourAccount.php";
        }
    </script>