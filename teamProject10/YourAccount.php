<?php
//Start the session
session_start();
//Include the database connection file
require_once 'connect.php';

if (!isset($_SESSION['email'])) {
    //If no session value is present, redirect the user
    header("Location: login.php");
    exit(); //Quit the script
}
// User information of the logged in person.  
$email = $_SESSION['email'];
$sql = "SELECT * FROM customers WHERE email = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Customer Details</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    <?php include('navbar.php') ?>
    <!-- Displays account information -->
    <div class="container">
        <div class="form signup">
            <div class="content">
                <span class="title"> Your Account</span>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
                    </div>
                    <!-- 2 Buttons that take users to required pages -->
                    <div class="button">
                        <input type="submit" value="View Account details" onclick="AccountDetails()">

                        <input type="submit" value="View past Orders" onclick="PastOrders()">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>

</body>
<!--  Js functions that allow users to navigate to different page depending on needs -->
<script>
    function AccountDetails() {
        window.location.href = "account_details.php";
    }

    function PastOrders() {
        window.location.href = "PastOrders.php";
    }
</script>

</html>