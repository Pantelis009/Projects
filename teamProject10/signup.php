<?php
session_start();
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];


    // Filtering and sanitizing the variables for security
    $name = strip_tags(mysqli_real_escape_string($con, trim($name)));
    $email = strip_tags(mysqli_real_escape_string($con, trim($email)));
    $password = strip_tags(mysqli_real_escape_string($con, trim($password)));
    $phone = strip_tags(mysqli_real_escape_string($con, trim($phone)));
    $gender = strip_tags(mysqli_real_escape_string($con, trim($gender)));

    // Password requirements
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@!%*?&])[A-Za-z\d$@!%*?&]{8,}$/', $password)) {
        echo "<script> alert('Password must contain at least 8 characters including uppercase letters, lowercase letters, numbers, and special characters'); window.location = 'signup.php'</script>";
        exit();
    }
    // Password hashing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Invalid email address'); window.location = 'signup.php'</script>";
        exit();
    }

    // SQL injection prevention 
    $stmt = $con->prepare("SELECT * FROM `customers` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script> alert('Email already in use'); window.location = 'signup.php'</script>";
        exit();
    } else {
        $stmt = $con->prepare("INSERT INTO `customers` (name, email, password, phone, gender) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $hashed_password, $phone, $gender);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "<script> alert('Registration Successful'); window.location = 'login.php'</script>";
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
                <span class="title"> Register </span>
                <form method="POST" autocomplete="off">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" name="name" placeholder="Enter your full name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" name="phone" placeholder="Enter your number" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Confirm Password</span>
                            <input type="password" name="confpassword" placeholder="Enter your password" required>
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
                        <input type="submit" value="Register">
                        <input type="reset" value="Clear" />
                    </div>
            </div>


            </form>
        </div>
        <div class="login-signup">
            <span class="text">Already have an account?<a href="login.php" class="text signup-link"> Login</a></span>
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