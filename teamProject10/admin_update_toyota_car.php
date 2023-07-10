<!--Pantelis Xiourouppas - 160056307 -->
<?php
include 'connect.php';


$id = $_GET['idUpdateToyota'];
$sql = "SELECT * FROM toyota WHERE id_toyota=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$make = $row['make'];
$model = $row['model'];
$price = $row['price'];
$year = $row['year'];
$fueltype = $row['fueltype'];
$color = $row['color'];
$bhpower = $row['bhpower'];
$drivetype = $row['drivetype'];
$quantity = $row['quantity'];
$mileage = $row['mileage'];
$image = $row['image'];

if (isset($_POST['UpdateButton'])) {
    $image = $_FILES['image']['name'];
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



    $sql = "UPDATE toyota SET make='$make', model='$model', price='$price', year='$year', fueltype='$fueltype', color='$color', bhpower='$bhpower', drivetype='$drivetype', quantity='$quantity', mileage='$mileage', image='$image' WHERE id_toyota = $id";
    $sql2 = "UPDATE cars1 SET make='$make', model='$model', price='$price', year='$year', fueltype='$fueltype', color='$color', bhpower='$bhpower', drivetype='$drivetype', quantity='$quantity', mileage='$mileage', image='$image' WHERE cars_id = $id";

    $result = mysqli_query($con, $sql, $sql2);
    if ($result) {

        move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $_FILES["image"]["name"]);
        $_SESSION['success'] = "Data published successfully";
        echo "<script> alert('Data published successfully'); window.location = 'admintoyota.php'</script>";
    } else {
        $_SESSION['success'] = "Data not Inserted";
        echo "<script> alert('Data not Inserted'); window.location = 'admin_add_toyota_car.php'</script>";
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

    <div class="containerAddInventory ">
        <div class="form signup">
            <div class="content">
                <!--<img src="images/logo-toyota.png"> -->
                <span class="title">Update Toyota Car Id # <?php echo $id ?> </span>

                <form method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Make</span>
                            <input type="text" name="make" value="<?php echo $make ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Model</span>
                            <input type="number" name="model" value="<?php echo $model ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Price</span>
                            <input type="number" name="price" value="<?php echo $price ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Year</span>
                            <input type="number" name="year" value="<?php echo $year ?>" required>
                        </div>
                    </div>
                    <div class="input-details">
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
                            <input type="text" name="color" value="<?php echo $color ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Break Horse Power</span>
                            <input type="number" name="bhpower" value="<?php echo $bhpower ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Quantity</span>
                            <input type="number" name="quantity" value="<?php echo $quantity ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Mileage</span>
                            <input type="number" name="mileage" value="<?php echo $mileage ?>" required>
                        </div>

                    </div>
                    <div class="input-details">
                        <input type="radio" value="Automatic" name="drivetype" id="dot-5">
                        <input type="radio" value="Manual" name="drivetype" id="dot-6">
                        <span class="gender-title">Select a Transmission Type:</span>
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
                        <br>
                        <span class="gender-title">Please Re-select Correct Image:</span>
                        <img src="images/<?php echo $image ?>"><?php echo $image ?>
                        <input type="file" name="image" class="gender">
                    </div>

                    <div class="button">
                        <input type="submit" name="UpdateButton" value="Update" />

                    </div>
            </div>


            </form>
        </div>

    </div>




</body>

</html>