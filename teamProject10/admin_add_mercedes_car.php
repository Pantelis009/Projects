<!--Pantelis Xiourouppas - 160056307 -->

<?php
session_start();

include("connect.php");

if (!isset($_SESSION['id'])) {
    header("Location:adminlogin.php");
}

if (isset($_POST['submit'])) {
    $image = $_FILES['image']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];
    $image4 = $_FILES['image4']['name'];
    $image5 = $_FILES['image5']['name'];
    $image6 = $_FILES['image6']['name'];


    $make = $_POST['make'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $year = $_POST['year'];
    $fueltype = $_POST['fueltype'];
    $color = $_POST['color'];
    $bhpower = $_POST['bhpower'];
    $drivetype = $_POST['drivetype'];
    $quantity = $_POST['quantity'];
    $mileage = $_POST['mileage'];

    // Generate the URL for the car page
    $url = strtolower(str_replace(" ", "-", $make . "-" . $model . "-" . $mileage));

    // Insert the car data into the corresponding table
    $sql = "INSERT INTO mercedes (make, model, price, year, fueltype, color, bhpower, drivetype, quantity, mileage, image, image2, image3, image4, image5, image6, url) VALUES ('$make', '$model', '$price', '$year', '$fueltype', '$color', '$bhpower', '$drivetype', '$quantity', '$mileage', '$image','$image2','$image3','$image4','$image5','$image6', '$url')";
    $sqlCars = "INSERT INTO cars1 (make, model, price, year, fueltype, color, bhpower, drivetype, quantity, mileage, image, image2, image3, image4, image5, image6, url) VALUES ('$make', '$model', '$price', '$year', '$fueltype', '$color', '$bhpower', '$drivetype', '$quantity', '$mileage', '$image','$image2','$image3','$image4','$image5','$image6', '$url')";

    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $sqlCars);

    if ($result && $result2) {
        // Move the uploaded image to the images folder
        move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image2"]["tmp_name"], "images/" . $_FILES["image2"]["name"]);

        move_uploaded_file($_FILES["image3"]["tmp_name"], "images/" . $_FILES["image3"]["name"]);

        move_uploaded_file($_FILES["image4"]["tmp_name"], "images/" . $_FILES["image4"]["name"]);

        move_uploaded_file($_FILES["image5"]["tmp_name"], "images/" . $_FILES["image5"]["name"]);
        move_uploaded_file($_FILES["image6"]["tmp_name"], "images/" . $_FILES["image6"]["name"]);



        $cars_id = mysqli_insert_id($con);
        $cars_id_to_string = strval($cars_id);
        $currentcar = $cars_id_to_string;
        $template_current_car = '$currentcar';
        $current_row = '$row';
        $current_cars_products = '$cars_product';

        $current_cart = " 'cart' ";
        $current_session_id = " 'id' ";
        $template_cars_id = '$cars_id';
        $current_con = '$con';
        $current_product_sql = '$productsql';
        $current_query = 'query';




        $productsql = "SELECT * FROM cars1 ";
        $current_quantity = "'qty_array'";
        $cars_product = $con->query($productsql);
        // Create the new car page template
        $template = "
        <?php

        

    
           session_start();

           include('connect.php');


if (!isset(\$_SESSION[$current_session_id])) {
    header('Location:adminlogin.php');
}
if (!isset(\$_SESSION[$current_cart])) {
    \$_SESSION[$current_cart] = array();
}
unset(\$_SESSION[$current_quantity]);

$template_cars_id = mysqli_insert_id($current_con);
$template_current_car = '$cars_id';
$current_product_sql = 'SELECT * FROM cars1 ';
$current_cars_products = $current_con->$current_query($current_product_sql);




?>
        

        <!DOCTYPE html>
<html>

<head>
    <title>$make $model - Car Details</title>
    <link href='/TEAM10/css/style.css' rel='stylesheet'>


</head>
<style>
    /*Product information CSS*/

    .right-column {
        width: 50%;
        margin-top: 60px;
    }

    .product-description {
        border-bottom: 1px solid white;
        margin-bottom: 20px;
    }

    .product-description span {
        font-size: 52px;
        color: #358ED7;
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none;
    }

    .product-description h1 {
        font-weight: 300;
        font-size: 52px;
        color: #43484D;
        letter-spacing: -2px;
    }

    .product-description p {
        font-size: 16px;
        font-weight: 300;
        color: #86939E;
        line-height: 24px;
    }

    /* Product Color */
    .product-color {
        margin-bottom: 30px;
    }


    /* Product Price */
    .product-price {
        display: flex;
        align-items: center;
    }

    .product-price span {
        font-size: 26px;
        font-weight: 300;
        color: black;
        margin-right: 20px;
    }

    .cart-btn {
        display: inline-block;
        background-color: blue;
        border-radius: 6px;
        border: 2px black;
        font-size: 20px;
        color: black;
        text-decoration: none;
        padding: 12px 30px;
        transition: all .5s;
    }

    .cart-btn:hover {
        background-color: red;
    }

    /*Slideshow CSS*/



    /* CSS needed to position the left and right arrows */
    .containerIndi {
        position: absolute;
        top: 100px;
        left: 100px;
        width: 55%;
    }

    .containerDetails {
        max-width: 700px;
        width: 100%;
        height: 700px;
        margin-left: 170px;
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        margin-top: -75px;

    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 45%;
        width: auto;
        padding: 20px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 30px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position of the next button to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* hover of next/previous buttons */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Thumbnail */
    .column {
        float: left;
        width: 16.66%;
    }

    .thumbnail {
        opacity: 0.6;
    }

    .active,
    .thumbnail:hover {
        opacity: 1;
    }

    img {
        width: 100%;
    }
</style>

<body>

    <?php
     echo include('/xampp/htdocs/TEAM10/navbar.php');?>
    <div class='right-column'>
        <div class='containerIndi'>
            <div class='productSlides'>
                <img src='/TEAM10/images/$image' style='width:100%'>
            </div>
            <div class='productSlides'>
                <img src='/TEAM10/images/$image2' style='width:100%'>
            </div>
            <div class='productSlides'>
                <img src='/TEAM10/images/$image3' style='width:100%'>
            </div>
            <div class='productSlides'>
                <img src='/TEAM10/images/$image4' style='width:100%'>
            </div>
            <div class='productSlides'>
                <img src='/TEAM10/images/$image5' style='width:100%'>
            </div>       
            <div class='productSlides'>
                <img src='/TEAM10/images/$image6' style='width:100%'>
            </div> 
            <a class='prev' onclick='plusSlides(-1)'> ❮ </a>
            <a class='next' onclick='plusSlides(1)'> ❯ </a>
            <div class='caption-container'>
                <p id='caption'></p>
            </div>
            <div class='row'>
                <div class='column'>
                    <img class='thumbnail cursor' src='/TEAM10/images/$image' style='width:100%' onclick='currentSlide(1)'>
                </div>
                <div class='column'>
                    <img class='thumbnail cursor' src='/TEAM10/images/$image2' style='width:100%' onclick='currentSlide(2)'>
                </div>
                <div class='column'>
                    <img class='thumbnail cursor' src='/TEAM10/images/$image3' style='width:100%' onclick='currentSlide(3)'>
                </div>
                <div class='column'>
                    <img class='thumbnail cursor' src='/TEAM10/images/$image4' style='width:100%' onclick='currentSlide(4)'>
                </div>
                <div class='column'>
                    <img class='thumbnail cursor' src='/TEAM10/images/$image5' style='width:100%' onclick='currentSlide(5)'>
                </div>
                <div class='column'>
                    <img class='thumbnail cursor' src='/TEAM10/images/$image6' style='width:100%' onclick='currentSlide(6)'>
                </div>
            </div>
        </div>
        <script>
            let slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName('productSlides');
                let dots = document.getElementsByClassName('thumbnail');
                let captionText = document.getElementById('caption');
                if (n > slides.length) {
                    slideIndex = 1;
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = 'none';
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(' active', '');
                }
                slides[slideIndex - 1].style.display = 'block';
                dots[slideIndex - 1].className += ' active';
                captionText.innerHTML = dots[slideIndex - 1].alt;
            }
        </script>
    </div>
    </div>
    <!-- Product Description -->
    <div class='containerDetails'>
        <div class='product-description'>
            <span>$make $model </span>
            <p><strong>Year:</strong> 2019</p>

            <p><strong>Total Price:</strong> $price</p>
            <p><strong>Year:</strong> $year</p>
                <p><strong>Fuel Type:</strong> $fueltype</p>
                <p><strong>Color:</strong> $color</p>
                <p><strong>BHP:</strong> $bhpower</p>
                <p><strong>Drive Type:</strong> $drivetype</p>
                <p><strong>Quantity:</strong> $quantity</p>
                <p><strong>Mileage:</strong> $mileage</p>

                <?php if ($current_row = mysqli_fetch_assoc( $current_cars_products)) { ?>
                    <div class='vidbox'>
                        <div class='card'>

    
    
                            <form method='post' action='AddToBasket.php?action=add&cars_id=<?php  echo $currentcar;?> '> 
                                <input type=hidden name='hiddenProductMake' value='<?php echo '$make'; ?>'>
                                <input type=hidden name='hiddenProductModel' value='<?php echo '$model'; ?>'>
                                <input type=hidden name='hiddenProductPrice' value='<?php echo $price; ?>'>
                                <input type=submit class='submitButton' name='addToBasket' value='Add To Basket' />
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>
                
           

            
        </div>
    </div>
    <?php include('/xampp/htdocs/TEAM10/footer.php');?>

</body>


               
        ";

        // Save the new car page template to a file
        $filename = "/xampp/htdocs/TEAM10/$url.php";
        $file = fopen($filename, "w");
        fwrite($file, $template);
        fclose($file);

        // Redirect to the car page
        echo "<script> alert('Data was Inserted!!!'); window.location = 'admin_add_mercedes_car.php'</script>";
        exit();
    } else {
        $_SESSION['success'] = "Data not Inserted";
        echo "<script> alert('Data not Inserted!!!'); window.location = 'admin_add_mercedes_car.php'</script>";
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
    <title>Add Mercedes</title>
</head>
<style>
    img {
        width: 300px;
    }
</style>

<body>
    <?php include 'adminnavbar.php' ?>

    <div class="containerAddInventory ">
        <div class="form signup">
            <div class="content">
                <span class="title">Add to Mercedes </span>
                <form method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Make</span>
                            <input type="text" name="make" placeholder="Enter the Make" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Model</span>
                            <input type="text" name="model" placeholder="Enter the Model" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Price</span>
                            <input type="number" name="price" placeholder="Enter Price" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Year</span>
                            <input type="number" name="year" placeholder="Enter Year" required>
                        </div>
                    </div>

                    <div class="input-box">
                        <input type="radio" value="Petrol" name="fueltype" id="dot-1">
                        <input type="radio" value="Diesel" name="fueltype" id="dot-2">
                        <input type="radio" value="Electric" name="fueltype" id="dot-3">
                        <input type="radio" value="Hybrid" name="fueltype" id="dot-4">
                        <span class="gender-title">Select a Fuel Type:</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Petrol</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Diesel</span>
                            </label>
                            <label for="dot-3">
                                <span class="dot three"></span>
                                <span class="gender">Electric</span>
                            </label>
                            <label for="dot-4">
                                <span class="dot four"></span>
                                <span class="gender">Hybrid</span>
                            </label>
                        </div>
                    </div>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Color</span>
                            <input type="text" name="color" placeholder="Enter Colour" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Break Horse Power</span>
                            <input type="number" name="bhpower" placeholder="Enter the Break Horse Power" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Quantity</span>
                            <input type="number" name="quantity" placeholder="Enter Quantity" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Mileage</span>
                            <input type="number" name="mileage" placeholder="Enter Mileage" required>
                        </div>

                    </div>
                    <div class="input-details">
                        <input type="radio" value="Automatic" name="drivetype" id="dot-5">
                        <input type="radio" value="Manual" name="drivetype" id="dot-6">
                        <span class="details">Select a Transmission Type:</span>
                        <div class="category">
                            <label for="dot-5">
                                <span class="dot five"></span>
                                <span class="gender">Automatic</span>
                            </label>
                            <label for="dot-6">
                                <span class="dot six"></span>
                                <span class="gender">Manual</span>
                            </label>


                        </div>
                        <span class="details">Please select all images required:</span><br>
                        <input type="file" name="image" class="gender">
                        <input type="file" name="image2" class="gender">
                        <input type="file" name="image3" class="gender">
                        <input type="file" name="image4" class="gender">
                        <input type="file" name="image5" class="gender">
                        <input type="file" name="image6" class="gender">

                    </div>

                    <div class="button">
                        <input type="submit" name="submit" value="Submit" />

                    </div>
            </div>


            </form>
        </div>

    </div>




</body>

</html>