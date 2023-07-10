<?php
session_start();



//disallows any and all access to this page UNLESS you sign in
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aston Autos</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<style>
    .body-content {
        margin-top: 600px;
    }

    .main-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .image-text-main {
        text-align: center;
        margin-top: 1rem;
    }

    .column-container {
        display: flex;
        align-items: center;
        width: 80%;
        margin: 0 auto;
    }

    .column-container .column {
        flex: 1;
        padding: 1rem;
    }

    .column-container .column h2 {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .column-container .column p {
        font-size: 1rem;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .column-container .column img {
        width: 100%;
        max-width: 700px;
        margin-right: 1rem;
    }

    .centered-button {
        display: inline-block;
        background-color: black;
        color: white !important;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.25rem;
        text-align: center;
        text-decoration: none;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease-out;
    }

    .centered-button:hover {
        background-color: #bf1e2e;
    }
</style>

<body>
    <?php include 'navbar.php' ?>

    <body class="body-content">

        <div class="main-container">
            <img src="images/main.png">

            <div class="image-text-main">
                <p>We Provide <span class="highlight">Luxury Cars</span></p>
                <p>at Low cost.</p>
            </div>

            <div class="column-container">
                <div class="column">
                    <h2>Cars For Sale</h2>
                    <p>Aston Autos is a highly reputable and reliable car dealership that offers a wide range of top-quality vehicles
                        to customers. With a team of experienced and knowledgeable salespeople, Aston Autos provides exceptional customer
                        service, ensuring that every customer gets the best possible experience when purchasing a car.
                        We also offer extended warranties, making it easy for customers to get the car of their dreams without
                        breaking the bank. Moreover, Aston Autos carries some of the most sought-after and highly-rated car brands
                        in the market, providing customers with a wide selection of vehicles to choose from. Whether you're
                        looking for a sports car, SUV, or family sedan, Aston Autos has got you covered. In summary, purchasing a car
                        from Aston Autos guarantees you top-quality cars, excellent customer service, and value for your money.</p>
                    <a href="products.php" class="centered-button">Shop For Cars</a>
                </div>
                <div class="column">
                    <img src="images/column1.jpg">
                </div>
            </div>

            <div class="column-container">
                <div class="column">
                    <img src="images/column2.jpg">
                </div>
                <div class="column">
                    <h2>Book A Test Drive</h2>
                    <p>If you're interested in test driving a car from Aston Autos, the process is quite simple. First, browse our inventory
                        to find the car you're interested in test driving. Once you've found a car you
                        like, you can book a test drive straight from our website button or option nearby. Then you simply fill in a form where you
                        can enter your contact information and preferred date and time for the test drive. After
                        submitting the form, you should receive a confirmation email from a representative at Aston Autos
                        to confirm your appointment. On the day of the test drive, make sure to bring your driver's license and any other
                        necessary documents, and arrive at the dealership on time. The representative will provide you with a
                        brief overview of the car's features and take you on a test drive, allowing you to get a feel for the car and ask
                        any questions you may have.</p>
                    <a href="products_drive_test.php" class="centered-button">Book A Test Drive</a>
                </div>
            </div>

            <div class="column-container">
                <div class="column">
                    <h2>About Us</h2>
                    <p>Aston Autos is a premier car dealership that specializes in providing top-of-the-line luxury vehicles to discerning
                        customers. With years of experience in the automotive industry, our team of experts is dedicated to providing our
                        clients with the best possible buying experience. At Aston Autos, we pride ourselves on our commitment to customer
                        satisfaction, and we go above and beyond to ensure that each and every one of our clients finds the perfect car to
                        suit their needs. Whether you're in the market for a sleek sports car or a spacious SUV, we have an extensive
                        inventory of high-quality vehicles to choose from. Our knowledgeable sales staff is always on hand to answer any
                        questions you may have and to help you make an informed decision. When you choose Aston Autos, you can rest assured
                        that you're getting a top-quality vehicle and exceptional customer service.</p>
                    <a href="aboutus.php" class="centered-button">Learn More</a>
                </div>
                <div class="column">
                    <img src="images/column3.jpg">
                </div>
            </div>

        </div>

        <?php include 'footer.php' ?>
    </body>



</html>