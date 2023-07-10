<?php
session_start();
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];



    // Filtering and sanitizing the variables for security
    $email = strip_tags(mysqli_real_escape_string($con, trim($email)));
    $password = strip_tags(mysqli_real_escape_string($con, trim($password)));


    // Password requirements
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@!%*?&])[A-Za-z\d$@!%*?&]{8,}$/', $password)) {
        echo "<script> alert('Password must contain at least 8 characters including uppercase letters, lowercase letters, numbers, and special characters'); window.location = 'employeesignup.php'</script>";
        exit();
    }
    // Password hashing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Invalid email address'); window.location = 'employeesignup.php'</script>";
        exit();
    }

    // SQL injection prevention 
    $stmt = $con->prepare("SELECT * FROM `employee` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script> alert('Email already in use'); window.location = 'employeesignup.php'</script>";
        exit();
    } else {
        $stmt = $con->prepare("INSERT INTO `employee` ( email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashed_password);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "<script> alert('Registration Successful'); window.location = 'employeelogin.php'</script>";
            exit();
        } else {
            die(mysqli_errno($con));
        }
    }
}
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<style>
    img {
        width: 500px;
    }
</style>

<body>
    <img src="images/logo-removebg.png" />

    <div class="container">
        <div class="form signup">
            <div class="content">
                <span class="title"> Employee Register </span>
                <form method="POST" autocomplete="off">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" name="password" placeholder="Enter your password" required>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Register">
                    </div>
            </div>


            </form>
        </div>
        <div class="login-signup">
            <span class="text">Already have an account?<a href="employeelogin.php" class="text signup-link"> Employee Login</a></span>

        </div>
    </div>
    </div>


    <script src="script/script.js"></script>

</body>

</html>

<script src="script/script.js">
    function validateForm() {
        var password = document.getElementById("password").value;
        var name = document.getElementById("name");
        var username = document.getElementById("username");
        var confpassword = documen.getElementById("confpassword");
        var email = document.getElementById("email");

        if (email == "") {
            alert("Email field cannot be empty");
            return false;
        }
        if (name == "") {
            alert("Please enter your name!");
            return false;
        }
        if (username == "") {
            alert("Please enter a username!");
            return false;
        }
        if (password == "") {
            alert("Password field cannot be empty");
            return false;
        }
        return true;
    }
</script>