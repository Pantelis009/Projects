<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master\src\Exception.php';
require 'PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer-master\src\SMTP.php';
//PHPMailer-master library file was found on GitHub. Link is below:
//https://github.com/PHPMailer/PHPMailer

include("connect.php");

if (isset($_POST['book'])) {


    // get form data
    $email =  $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $make = $_POST['make'];
    $model = $_POST['model'];



    // generates an 8 digit booking number which starts with AA
    $booking_number = 'AA' . substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);

    $sql = "INSERT INTO appointments (email, first_name, last_name, date, time, booking_number, make, model) VALUES ('$email', '$first_name', '$last_name', '$date', '$time', '$booking_number', '$make', '$model')";
    if (mysqli_query($con, $sql)) {

        // send confirmation email
        $mail = new PHPMailer(true);
        try {
            //server settings, connecting the email to the code so it can access the email to send the confirmation email
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'smtp-mail.outlook.com';
            $mail->Port = 587;
            $mail->Username = 'aautos2023@outlook.com';
            $mail->Password = 'Gio9cash023';

            //recipients
            $mail->setFrom('aautos2023@outlook.com', 'Aston Autos'); // from
            $mail->addAddress($email, $first_name . ' ' . $last_name); // to

            //content of email
            $mail->isHTML(true);
            $mail->Subject = 'Appointment Confirmation';
            $mail->Body = 'BOOKING NUMBER:' . $booking_number . '</br>
            Your test drive has been scheduled for ' . $date . ' at ' . $time . ', please ensure to bring your driver\'s license with you. Your booking number is ' . $booking_number . '.<br><br>'
                . 'If for any reason you are unable to attend the appointment, please email us with your booking number to request a cancellation.<br>
                You have booked the make and model: ' . $make . ' ' . $model . '';
            //dont test this more than 25 times a day or the email will get marked as spam and suspended!!

            $mail->send();
            echo "<script> alert('Test Drive Confirmed, Email confirmation  has been sent'); window.location = 'products_drive_test.php'</script>";
        } catch (Exception $e) {
            echo "<script> alert('Error sending email!!!'); window.location = 'book_volkswagen_appointment.php'</script>";
            '' . $mail->ErrorInfo;
        }
    } else {
        echo "<script> alert('Error!!!'); window.location = 'book_volkswagen_appointment.php'</script>";
        '' . $sql . "<br>" . mysqli_error($con);
    }
}
?>

<?php
$id = $_GET['idBookVolkswagen'];
$sql = "SELECT * FROM volkswagen WHERE id_volkswagen=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$make = $row['make'];
$model = $row['model'];
$image = $row['image'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,intitial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Contact Us</title>


</head>
<style>
    body {
        background-image: url("images/backgroundAboutUs.jpg");
        background-size: 100% 100%;
    }

    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active,
    .accordion:hover {
        background-color: #ccc;
    }

    .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
    }
</style>


<body>

    <?php
    include('navbar.php')
    ?>

    <div class="container">
        <div class="form signup">
            <div class="content">
                <span class="title"> Book a Test Drive </span>

                <form method="POST" autocomplete="off">

                    <img src='images/<?php echo $row['image']; ?>' style='width:50%'>

                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Make</span>
                            <input type="text" name="make" value="<?php echo $make ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Model</span>
                            <input type="text" name="model" value="<?php echo $model ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">First Name</span>
                            <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Second Name</span>
                            <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>

                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" name="phone" placeholder="Enter your number" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Pick a date</span>
                            <input type="date" id="date" name="date">
                        </div>
                        <div class="input-box">
                            <span class="details">Pick a time</span>
                            <input type="time" id="time" name="time">
                        </div>
                    </div>


                    <div class="button">
                        <input type="submit" name="book" value="Book Test">

                    </div>
            </div>


            </form>
        </div>











        <?php
        include('footer.php')
        ?>

</body>

</html>