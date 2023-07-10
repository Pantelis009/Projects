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
//Retrieve customer details from the database
$email = $_SESSION['email'];
$sql = "SELECT * FROM customers WHERE email = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Retrieve data from form
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $username = $_POST['uname'];
    $password = $_POST['password'];

    // Filtering and sanitizing the variables for security
    $name = strip_tags(mysqli_real_escape_string($con, trim($name)));
    $email = strip_tags(mysqli_real_escape_string($con, trim($email)));
    $username = strip_tags(mysqli_real_escape_string($con, trim($username)));
    $password = strip_tags(mysqli_real_escape_string($con, trim($password)));
    $phone = strip_tags(mysqli_real_escape_string($con, trim($phone)));
    $gender = strip_tags(mysqli_real_escape_string($con, trim($gender)));
    $confpassword = strip_tags(mysqli_real_escape_string($con, trim($confpassword)));

    // Password requirements
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@!%*?&])[A-Za-z\d$@!%*?&]{8,}$/', $password)) {
        echo "<script> alert('Password must contain at least 8 characters including uppercase letters, lowercase letters, numbers, and special characters'); window.location = 'signup.php'</script>";
        exit();
    }
    //Double password verification
    if ($password != $confpassword) {
        echo "<script> alert('Passwords must match!'); window.location = 'accountdetails.php'</script>";
    }
    // Password hashing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    //SQL statement to update the customer details
    $sql = "UPDATE customers SET Name = ?, Phone = ?, Username = ?, Password = ? WHERE email = ?";
    $smt = $con->prepare($sql);
    $smt->bind_param("sssss", $name, $phone, $username, $hashed_password, $email);
    $smt->execute();

    //Redirect user back to page
    header("Location: login.php");
    exit();
}
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
    <div class="container">
        <div class="form signup">
            <div class="content">
                <span class="title"> Customer Details </span>
                <form method="POST" autocomplete="off">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" name="uname" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" name="password" value="<?php echo $row['password']; ?>" required>
                        </div>
                    </div>
                    <div class="input-details">

                        <input type="radio" value="male" name="gender" id="dot-1">
                        <input type="radio" value="female" name="gender" id="dot-2">
                        <input type="radio" value="other" name="gender" id="dot-3">
                        <span class="gender-title">Select a gender:</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Male</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Female</span>
                            </label>
                            <label for="dot-3">
                                <span class="dot three"></span>
                                <span class="gender">Prefer not to say</span>
                            </label>
                        </div>


                    </div>

                    <div class="button">
                        <input type="submit" value="Save">
                        <input type="reset" value="Clear" />
                    </div>

    <?php include ('footer.php') ?>

</body>

</html>