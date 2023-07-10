<?php
session_start();
include("connect.php");
//disallows any and all access to this page UNLESS you sign in
if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>About Us</title>
</head>

<style>
    .maintitle {
        font-size: 70px;
        text-align: center;
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        color: #bf1e2e;
    }

    .main {
        font-size: 25px;
        text-align: center;
        width: 100%;
        display: center;
    }

    .main2 {
        font-size: 25px;
        text-align: center;
        width: 100%;
        display: center;
        position: absolute;
        margin-top: 70%;
    }

    .cover {
        text-align: center;
        width: 100%;
        display: flex;
    }

    .box1 h2 {
        color: #bf1e2e;
    }

    .box2 h2 {
        color: #bf1e2e;
    }

    .box3 h2 {
        color: #bf1e2e;
    }

    .box1,
    .box2,
    .box3 p {
        color: rgb(0, 0, 0);
    }

    .box1 {
        margin-top: 30px;
        font-size: 25px;
    }

    .box2 {
        margin-top: 30px;
        font-size: 25px;
    }

    .box3 {
        margin-top: 30px;
        font-size: 25px;
    }

    .teamtitle {
        font-size: 50px;
        text-align: center;
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        color: #bf1e2e;
        margin-top: -40%;
    }

    .team-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin: 20px 0;
    }

    .team-member {
        width: 150px;
        margin: 30px;
    }

    .team-member img {
        width: 100px;
        height: 100px;
    }

    .team-member h3 {
        font-size: 24px;
        margin: 5px 0;
    }

    .team-member p {
        font-size: 18px;
        margin: 2px 0;
    }

    .containerAboutUs {
        width: 100%;
        padding: -140px 30px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        display: flex;
    }

    .containerAboutUsTeamMember {
        width: 100%;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        margin-top: 50%;
        float: right;
    }
</style>

<body>
    <?php include 'navbar.php' ?>


    <div class="mainAboutUs">
        <div class="maintitle">
            <p>About Us</p>
        </div>

        <div class="containerAboutUs">
            <p>"At Aston Autos, our main goal is to give our clients a calm, straightforward and pleasant
                vehicle purchasing experience. We are focused on offering a different scope of great vehicles,
                serious valuing, and uncommon client care. We want to assemble durable associations with our clients and
                to be their confided in hotspot for their car needs in general. We endeavour to establish a positive and steady
                workplace for our representatives, and to be a capable and contributing individual from our local area.”</p>
        </div>

        <div class="containerAboutUs">

            <div class="box1">
                <h2>Why Choose Us?</h2>
                <p>"Aston Autos prides itself on offering a wide range of high-quality vehicles that have been thoroughly inspected and
                    maintained to ensure maximum reliability and safety. Whether you're in the market for a sleek sports car or a spacious SUV,
                    Aston Autos has something to suit your needs and budget. Additionally, the team at Aston Autos is committed to providing exceptional customer service,
                    from helping you find the perfect car to securing financing and ensuring a seamless buying process.</p>
            </div>

            <div class="box2">
                <h2>Our Promises:</h2>
                <p>Quality assurance: Promise that the car has been thoroughly inspected and is of high quality.
                    Fair pricing: Promise to offer fair and competitive pricing. Customer service: Promise to provide excellent customer service throughout the buying process and beyond.
                    Delivery and after-sales support: Promise to deliver the car promptly and to provide after-sales support, such as maintenance and repairs</p>
            </div>


            <div class="box3">
                <h2>Reviews:</h2>
                <p>"I recently purchased a car from a website and was blown away by the exceptional service I received. The website was easy to navigate and had detailed information
                    on each vehicle." - John. "I had a great experience buying a car from this website. The website was well-designed and provided all the information I needed
                    to make an informed decision. The customer service was excellent, and the sales representative was very helpful throughout the entire process." - Steve</p>
            </div>
        </div>


    </div>

    <div class="main2">
        <div class="containerAboutUs">
            <div class="containerAboutUsTeamMember">
                <div class="teamtitle">
                    <p>Meet The Team:</p>
                </div>
                <div class="team-container">
                    <div class="team-member">
                        <img src="images/person.png">
                        <h3>SHAHED ABDULALEEM</h3>
                        <p>Front-end</p>
                    </div>
                    <div class="team-member">
                        <img src="images/person.png">
                        <h3>AHDIL</br> BUTT</h3>
                        <p>Front-end</p>
                    </div>
                    <div class="team-member">
                        <img src="images/person.png">
                        <h3>RENIECE BALAMAGA</h3>
                        <p>Front-end</p>
                    </div>
                    <div class="team-member">
                        <img src="images/person.png">
                        <h3>AVJIT BASRA</h3>
                        <p>Front-end</p>
                    </div>
                    <div class="team-member">
                        <img src="images/person.png">
                        <h3>PARAMVEER HUNDAL</h3>
                        <p>Front-end</p>
                    </div>
                </div>

                <div class="team-container">
                    <div class="team-member">
                        <img src="images/person.png">
                        <h3>ZISHAN ASHFAQ</h3>
                        <p>Back-end</p>
                    </div>
                    <div class="team-member">
                        <img src="images/person.png">
                        <h3>OLUWATOMISIN OGUNNUSI</h3>
                        <p>Back-end</p>
                    </div>
                    <div class="team-member">
                        <img src="images/person.png">
                        <h3>XAVIER WALKER</h3>
                        <p>Back-end</p>
                    </div>
                    <div class="team-member">
                        <img src="images/person.png">
                        <h3>PANTELIS XIOUROUPPAS</h3>
                        <p>Back-end</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>

</body>

</html>