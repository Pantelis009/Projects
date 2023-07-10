<?php
//Include database config file
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) {

        //Prepare the SQL statement
        $stmt = $con->prepare("SELECT * FROM `customers` WHERE email = ? LIMIT 1");

        //Bind the parameters and execute the statement
        $stmt->bind_param("s", $email);
        $stmt->execute();

        //Get the result of the query
        $result = $stmt->get_result();

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                //Verify the hashed password
                if (password_verify($password, $user_data['password'])) {

                    //Start the session
                    session_start();
                    //Store the user ID and email in the session
                    $_SESSION['id'] = $user_data['id_customer'];
                    $_SESSION['email'] = $email;

                    //Redirect the user to the dashboard page
                    echo "<script> alert ('You have entered correct credentials');window.location='index.php'</script>";
                    die();
                }
            }
        }

        //Invalid username or password!!
        echo "<script>             alert ('Wrong Email or Password!!!');window.location='login.php'              </script>";
    } else {
        //Invalid input
        echo "<script>             alert ('Wrong Input!!!');window.location='login.php'                </script>";
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


        <span class="title">Login</span>

        <form method="POST">
            <div class="form">
                <div class="content">
                    <div class="input-field">
                        <input type="email" id="email" name="email" placeholder="Email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password" class="password" placeholder="Password" required>
                        <i class="uil uil-lock icon"></i>

                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login">
                    </div>
                </div>

            </div>
        </form>

        <div class="login-signup">
            <span class="text">Not a member?
                <a href="signup.php" class="text signup-link">Signup Now</a>
            </span>
        </div>
        <span>Part of Our Team?</span>
        <div class="login-signup">

            <a href="adminlogin.php" class="text signup-link">Admin Login</a>
            <a href="employeelogin.php" class="text signup-link">Employee Login</a>

        </div>






    </div>
</body>

</html>