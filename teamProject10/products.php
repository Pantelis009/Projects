<?php
session_start();
//disallows any and all access to this page UNLESS you sign in
include("public_html/connect.php");




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
    <title>Home</title>
</head>

<style>
    body {
        padding-top: 50px;
    }

    h1 {
        text-align: center;
        font-size: 10em;
    }



    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        margin-top: 40px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    .bottomright {
        position: absolute;

        margin-top: -600px;
        margin-left: -1800px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    .FilterButton {
        border: none;
        outline: 0;
        padding: 12px;
        color: black;
        background-color: white;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }
</style>

<body>

    <!--START OF FILTER FUNCTION -->
    <form id="filter-form" method="post" action="products.php">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a>
                <label for="make">Make:</label>
                <select name="make" id="make">
                    <option value="">Any</option>
                    <option value="Audi">Audi</option>
                    <option value="BMW">BMW</option>
                    <option value="Mercedes">Mercedes</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Volkswagen">Volkswagen</option>
                </select> <!-- this code is a simple form which takes all of the makes for the cars  -->
            </a>
            <a>
                <label for="model">Model:</label>
                <select name="model" id="model">
                    <option value="">Any</option>
                    <option value="A1">A1</option>
                    <option value="A3">A3</option>
                    <option value="A5">A5</option>
                    <option value="Q5">Q5</option>
                    <option value="Q7">Q7</option>
                    <option value="3 Series">3 Series</option>
                    <option value="5 Series">5 Series</option>
                    <option value="4 Series">4 Series</option>
                    <option value="X3">X3</option>
                    <option value="X5">X5</option>
                    <option value="A Class">A Class</option>
                    <option value="B Class">B Class</option>
                    <option value="C Class">C Class</option>
                    <option value="E Class">E Class</option>
                    <option value="S Class">S Class</option>
                    <option value="C-HR">C-HR</option>
                    <option value="Aygo">Aygo</option>
                    <option value="Prius">Prius</option>
                    <option value="RAV4">RAV4</option>
                    <option value="Corolla">Corolla</option>
                    <option value="Avensis">Avensis</option>
                    <option value="Golf">Golf</option>
                    <option value="Passat">Passat</option>
                    <option value="Touran">Touran</option>
                    <option value="Up">Up</option>
                    <option value="Tiguan">Tiguan</option>
                </select> <!-- this code takes the models for each car. they yet have not been assigned to their respective make-->
            </a>
            <a>
                <!-- this form below continues to take inputs from the user to filter the 
                       price, year mileage, fueltype, drivetype(gearbox), color and condition -->
                <label for="price">Price:</label>
                <select name="price" id="price">
                    <option value="">Any</option>
                    <option value="1">Less than £10,000</option>
                    <option value="2">£10,000 to £15,000</option>
                    <option value="3">£15,000 to £20,000</option>
                    <option value="4">£20,000 to £30,000</option>
                    <option value="5">£30,000 to £40,000</option>
                    <option value="6">£40,000 to £50,000</option>
                    <option value="7">£50,000 to £100,000</option>
                </select>
            </a>
            <a>
                <label for="mileage">Mileage:</label>
                <select name="mileage" id="mileage">
                    <option value="">Any</option>
                    <option value="10000">Below 10,000</option>
                    <option value="15000">Below 15,000</option>
                    <option value="20000">Below 20,000</option>
                    <option value="25000">Below 25,000</option>
                    <option value="30000">Below 30,000</option>
                    <option value="35000">Below 35,000</option>
                    <option value="40000">Below 40,000</option>
                    <option value="45000">Below 45,000</option>
                    <option value="50000">Below 50,000</option>
                    <option value="55000">Below 55,000</option>
                    <option value="60000">Below 60,000</option>
                    <option value="65000">Below 65,000</option>
                    <option value="70000">Below 70,000</option>
                    <option value="75000">Below 75,000</option>
                    <option value="80000">Below 80,000</option>
                    <option value="85000">Below 85,000</option>
                    <option value="90000">Below 90,000</option>
                    <option value="95000">Below 95,000</option>
                    <option value="100000">Below 100,000</option>
                </select>
            </a>
            <a>
                <label for="year">Year:</label>
                <select name="year" id="year">
                    <option value="">Any</option>
                    <option value="2010">Below 2010</option>
                    <option value="2015">Below 2015</option>
                    <option value="2020">Below 2020</option>
                    <option value="2023r">Below 2023 or Newer</option>
                </select>
            </a>
            <a>
                <label for="fueltype">Fuel Type:</label>
                <select name="fueltype" id="fueltype">
                    <option value="">Any</option>
                    <option value="petrol">Petrol</option>
                    <option value="diesel">Diesel</option>
                    <option value="electric">Electric</option>
                </select>
            </a>

            <a>
                <label for="drivetype">Gearbox:</label>
                <select name="drivetype" id="drivetype">
                    <option value="">Any</option>
                    <option value="manual">Manual</option>
                    <option value="automatic">Automatic</option>
                </select>
            </a>

            <a>
                <label for="color">Color:</label>
                <select name="color" id="color">
                    <option value="">Any</option>
                    <option value="green">Green</option>
                    <option value="black">Black</option>
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="white">White</option>
                    <option value="grey">Grey</option>
                </select>



            </a>
            <button type="submit" class="FilterButton" name="action" value="Filter">Filter</button>
        </div>

    </form>
    <div class="bottomright">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Filter</span>
    </div>
    <!--SCRIPT FOR ANIMATION NAVBAR -->
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <!--END OF FILTER FUNCTION -->
    <script>
        /*this below code assigns each model to their respective make. in order to keep it logically correct.
              and to make sure that each model reflects their respective make when being filtered.*/
        const models = { //this tells the code what make each model should be assigned to
            Volkswagen: ["Golf", "Passat", "Tiguan", "Touran", "Up"],
            Mercedes: ["A Class", "B Class", "E Class", "C Class", "S Class"],
            Audi: ["A1", "A3", "A5", "Q5", "Q7"],
            BMW: ["3 Series", "4 Series", "5 Series", "X3", "X5"],
            Toyota: ["C-HR", "Aygo", "Prius", "RAV4", "Corolla", "Avensis"]
        };
        /*in this part of the code below, the EventListener listens for a change in a drop-down menu called "make". when the value in that drop-down menu changes,
         the code looks up an array of models for that make and updates another drop-down menu called "model" with the list of models. 
         if there are no models for that make, the "model" drop-down menu is cleared. and the code adds a default option to the "model" drop-down menu with the text "Select model".*/
        const makeSelect = document.getElementById("make");
        const modelSelect = document.getElementById("model");
        makeSelect.addEventListener("change", (event) => {
            const selectedMake = event.target.value;
            const selectedModels = models[selectedMake] || [];
            while (modelSelect.firstChild) {
                modelSelect.removeChild(modelSelect.firstChild);
            }
            const defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = "Select model";
            modelSelect.appendChild(defaultOption);
            selectedModels.forEach((model) => {
                const option = document.createElement("option");
                option.value = model;
                option.textContent = model;
                modelSelect.appendChild(option);
            });
        });
    </script>
    <?php include 'navbar.php' ?>

    <script>
        function toggleInfo() {
            var info = document.getElementById("info");
            if (info.style.display === "none") {
                info.style.display = "block";
            } else {
                info.style.display = "none";
            }
        }
    </script>

    <main>
        <?php
        //connects to database, if theres any issues kill the connection and throw the sql error
        if (!$con) {
            die(mysqli_error($con));
        }


        // create the SQL query to retrieve car data from the database
        $sql = "SELECT * FROM cars1 WHERE 1=1";

        /*add filters to the SQL query based on the user input from the search form, 
if the values for each filter elements have been submitted through the POST request, 
it assigns the value to their respective "$" variable and adds a filter to the SQL query 
that includes records where their column name matches the value of their "$" variable name.*/
        if (!empty($_POST['make'])) {
            $make = $_POST['make'];
            $sql .= " AND make='$make'";
        }

        if (!empty($_POST['model'])) {
            $model = $_POST['model'];
            $sql .= " AND model='$model'";
        }

        if (!empty($_POST['price'])) {
            $price = $_POST['price'];
            switch ($price) {
                case '1':
                    $min_price = 0;
                    $max_price = 10000;
                    break;
                case '2':
                    $min_price = 10000;
                    $max_price = 15000;
                    break;
                case '3':
                    $min_price = 15000;
                    $max_price = 20000;
                    break;
                case '4':
                    $min_price = 20000;
                    $max_price = 30000;
                    break;
                case '5':
                    $min_price = 30000;
                    $max_price = 40000;
                    break;
                case '6':
                    $min_price = 40000;
                    $max_price = 50000;
                    break;
                case '7':
                    $min_price = 50000;
                    $max_price = 100000;
                    break;
            }
            $sql .= " AND price BETWEEN $min_price AND $max_price";
        }

        if (!empty($_POST['year'])) {
            $year = $_POST['year'];
            switch ($year) {
                case '2010':
                    $sql .= " AND year < '2010' ";
                    break;
                case '2015':
                    $sql .= " AND year < '2015' ";
                    break;
                case '2020':
                    $sql .= " AND year < '2020' ";
                    break;
                case '2023':
                    $sql .= " AND year >= '2023' ";
                    break;
                default:
                    // handle invalid input
                    break;
            }
        }
        if (!empty($_POST['mileage'])) {
            $mileage = $_POST['mileage'];
            switch ($mileage) {
                case '10000':
                    $sql .= " AND mileage < 10000";
                    break;
                case '15000':
                    $sql .= " AND mileage < 15000";
                    break;
                case '20000':
                    $sql .= " AND mileage < 20000";
                    break;
                case '25000':
                    $sql .= " AND mileage < 25000";
                    break;
                case '30000':
                    $sql .= " AND mileage < 30000";
                    break;
                case '35000':
                    $sql .= " AND mileage < 35000";
                    break;
                case '40000':
                    $sql .= " AND mileage < 40000";
                    break;
                case '45000':
                    $sql .= " AND mileage < 45000";
                    break;
                case '50000':
                    $sql .= " AND mileage < 50000";
                    break;
                case '55000':
                    $sql .= " AND mileage < 55000";
                    break;
                case '60000':
                    $sql .= " AND mileage < 60000";
                    break;
                case '65000':
                    $sql .= " AND mileage < 65000";
                    break;
                case '70000':
                    $sql .= " AND mileage < 70000";
                    break;
                case '75000':
                    $sql .= " AND mileage < 75000";
                    break;
                case '80000':
                    $sql .= " AND mileage < 80000";
                    break;
                case '85000':
                    $sql .= " AND mileage < 85000";
                    break;
                case '90000':
                    $sql .= " AND mileage < 90000";
                    break;
                case '95000':
                    $sql .= " AND mileage < 95000";
                    break;
                case '100000':
                    $sql .= " AND mileage < 100000";
                    break;
                default:
                    // do nothing
                    break;
            }
        }

        if (!empty($_POST['fueltype'])) {
            $fueltype = $_POST['fueltype'];
            $sql .= " AND fueltype='$fueltype'";
        }
        if (!empty($_POST['drivetype'])) {
            $drivetype = $_POST['drivetype'];
            $sql .= " AND drivetype='$drivetype'";
        }
        if (!empty($_POST['color'])) {
            $color = $_POST['color'];
            $sql .= " AND color='$color'";
        }

        // execute the SQL query and retrieve results
        $result = $con->query($sql);


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $cars_id = $row['cars_id'];
                $make = $row['make'];
                $model = $row['model'];
                $price = $row['price'];
                $year = $row['year'];
                $mileage = $row['mileage'];
                $fueltype = $row['fueltype'];
                $drivetype = $row['drivetype'];
                $color = $row['color'];
                $image = $row['image'];
                $url = $row['url']; // get the URL for the car

                // create the HTML for the car data and link
                echo " <div class='vidbox'> ";
                echo " <div class='card'>";
                echo " <div class='caption'>";
                echo " <div class='image'>";
                echo "<img src='images/$image ' style='width:100%'>";
                echo " </div>";

                echo "<h2 > $make $model</h2>
                               
                               <h2 >£$price</h2>
                               <p class='price'> Mileage:  $mileage </p>
                               <p class='price'> Fuel Type: $fueltype</p>
                               <p class='price'> Colour: $color</p>
                               <p class='price'> Transmission: $drivetype</p> ";
                echo "<a href='$url.php'>View Details</a>"; // create the link

                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No cars found.";
        }

        // close the database connection
        $con->close();
        //NOTE THIS IS STILL A WORK IN PROGRESS AND CHANGES MAY BE INFLICTED IF NECESSARY
        ?>
    </main>


    <?php include 'footer.php' ?>
</body>




</html>