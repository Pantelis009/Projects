<?php
session_start();
include("connect.php");
//disallows any and all access to this page UNLESS you sign in
if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $textarea = $_POST['textarea'];

    // Filtering and sanitizing the variables 
    $name = strip_tags(mysqli_real_escape_string($con, trim($name)));
    $email = strip_tags(mysqli_real_escape_string($con, trim($email)));
    $subject = strip_tags(mysqli_real_escape_string($con, trim($subject)));
    $textarea = strip_tags(mysqli_real_escape_string($con, trim($textarea)));

    // SQL injection prevention 
    $stmt = $con->prepare("INSERT INTO `contact_us` (name, email, subject, textarea) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $textarea);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script> alert('Thank you for your inquiry, we aim to respond with 24 hours!'); window.location = 'contactus.php'</script>";
    } else {
        die(mysqli_errno($con));
    }
}

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
    <!--start of the infomation on the contact us page-->
    <div class="containerContactUs">
        <div class="form">
            <div class="content">
                <form method="POST">
                    <h1 style="text-align:center">How can we help you?</h1>
                    <div class="user-details">

                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" name="name" placeholder="Enter your full name" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" id="email" name="email" placeholder="Email" required>
                        </div>

                        <div class="input-box">
                            <select name="subject">
                                <option value="Where is my order?">Choose option</option>
                                <option value="Where is my order?">Where is my order?</option>
                                <option value="Delivery Enquiry">Delivery Enquiry</option>
                                <option value="Order Query">Order Query</option>
                                <option value="Return Query">Return Query</option>
                                <option value="Account/Techincal Query">Account/Techincal Query</option>
                                <option value="Store Query">Store Query</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="input-box">
                            <input type="text" id="textarea" name="textarea" placeholder="Elaborate on your query.." style="height:200px" required>
                        </div>

                        <div class="input-field button">
                            <input type="submit" name="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->





    <div class="containerContactUs">
        <h2>FAQ!
        </h2>

        <button class="accordion">1. Can the car be financed ?</button>
        <div class="panel">
            <p>This all depends on the type of car you are considering leasing. Because it will need to be eligible for it but if it
                is not when you book a viewing the dealer maybe able to recommend you pay in instalments.
        </div>

        <button class="accordion">2. Is there a maximum amount of cars that can be purchased? </button>
        <div class="panel">
            <p>Yes, there is. You can buy up to a max of 3 cars at once.</p>
        </div>

        <button class="accordion">3. Are there any incentives that come when purchasing the car? </button>
        <div class="panel">
            <p>They are not any incentives as of yet. But if you get in touch with a salesperson via the “How can I help you form” on the Contact Us page.
                They should be in touch with you within 2-3 working days and should be able to provide you with more information about what the car comes with.</p>
        </div>
        <button class="accordion">4. Can the balance of a financed car be paid outright? </button>
        <div class="panel">
            <p>Yes, the balance of the car can be paid outright but it also depends on the terms and conditions of your contract.</p>
        </div>
        <button class="accordion">5. Do the cars have a warranty and for how long?</button>
        <div class="panel">
            <p>Yes, the warranty lasts three years.</p>
        </div>
        <button class="accordion">6. Can a financed car be sold? </button>
        <div class="panel">
            <p>No, you are not able to sell a financed car.</p>
        </div>
        <button class="accordion">7. How long is the pickup after purchase? </button>
        <div class="panel">
            <p>It depends on the car and if it’s in stock but it should usually take about 1-2 weeks.
                Hey you can edit these answers but his is what I have come up with</p>
        </div>
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
        </script>
    </div>



    <?php
    include('footer.php')
    ?>

</body>

</html>