<!--Pantelis Xiourouppas - 160056307 -->

<?php
session_start();
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $email = $_POST['email'];
    $password = $_POST['password'];

    //Filtering the variables for security
    $email = strip_tags(mysqli_real_escape_string($con, trim($email)));
    $password =  strip_tags(mysqli_real_escape_string($con, trim($password)));


    $sql = "Select * from `admin` where email= '$email' ";

    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "<script> alert('Email already in use'); window.location = 'adminsignup.php'</script>";
        } else {
            $sql = "insert into `admin` ( email, password) values ('$email','$password')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<script> alert('Registration Successful'); window.location = 'adminlogin.php'</script>";
            } else {
                die(mysqli_errno($con));
            }
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
                <span class="title"> Admin Register </span>
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
            <span class="text">Already have an account?<a href="adminlogin.php" class="text signup-link"> Admin Login</a></span>
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