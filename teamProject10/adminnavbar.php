<!--Pantelis Xiourouppas - 160056307 -->

<!DOCTYPE html>
<html lang="en">

<head>

</head>
<style type="text/css">
    * {
        padding: 0;
        margin: 0;
        text-decoration: none;
    }

    #navbar {
        position: fixed;
        top: 0;
        width: 100%;
        height: auto;
        background: white;
        border-bottom: 1px solid black;
        z-index: 1;
    }

    #navbar ul {
        list-style-type: none;
        text-align: right;
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
        <ul>
            <img src="images/logo-removebg.png" class="logo" />
        </ul>
        <ul>
            <li><a href="admindashboard.php">Dashboard</a></li>
            <li><a href="admincustomers.php">Customers</a></li>
            <li><a href="admintoyota.php">Toyota</a></li>
            <li><a href="adminaudi.php">Audi</a></li>
            <li><a href="adminvolkswagen.php">Volkswagen</a></li>
            <li><a href="adminbmw.php">BMW</a></li>
            <li><a href="adminmercedes.php">Mercedes Benz</a></li>

            <?php


            if (isset($_SESSION["id"])) {
                echo "<li><a href='adminlogout.php'>Log Out</a></li>";
            } else {
                echo "<li><a href='adminlogin.php'>Log In</a></li>";
            }
            ?>
        </ul>
    </div>

</body>

</html>