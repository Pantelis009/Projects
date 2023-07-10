<!--Pantelis Xiourouppas - 160056307 -->

<?php
session_start();
include("connect.php");
$id = $_GET['idUpdateCustomer'];
$sql = "SELECT * FROM customers WHERE id_customer = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$password = $row['password'];
$phone = $row['phone'];
$gender = $row['gender'];

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
        echo "<script> alert('Invalid email address'); window.location = 'admin_add_customer.php'</script>";
        exit();
    }

    // SQL injection prevention 
    $stmt = $con->prepare("SELECT * FROM `customers` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script> alert('Email already in use'); window.location = 'admin_add_customer.php'</script>";
        exit();
    } else {
        $stmt = $con->prepare("INSERT INTO `customers` (name, email, password, phone, gender) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $hashed_password, $phone, $gender);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "<script> alert('Registration Successful'); window.location = 'admincustomers.php'</script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.rtl.min.css">
</head>
<style>
    img {
        width: 300px;
    }
</style>

<body>
    <?php include 'adminnavbar.php' ?>

    <div class="containerAddInventory">
        <div class="form signup">
            <div class="content">
                <span class="title"> Add Customer</span>
                <form method="POST" autocomplete="off">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" name="name" value="<?php echo "$name" ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email" value="<?php echo "$email" ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="number" name="phone" value="<?php echo "$phone" ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="text" name="password" value="<?php echo "$password" ?>" required>
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



        </form>
    </div>





</body>

</html>