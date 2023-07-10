<!--Pantelis Xiourouppas - 160056307 -->
<?php
session_start();
//disallows any and all access to this page UNLESS you sign in
include("connect.php");

if (!isset($_SESSION['id'])) {
    header("Location:adminlogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.rtl.min.css">
    <title>Toyota</title>

    <style>

    </style>
</head>

<body>
    <?php include 'adminnavbar.php' ?>







    <div class="containerAdmin">
        <a href="admin_add_toyota_car.php">
            <button class="adminMenuButtons">Add to Inventory</button>
        </a>
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <div class="container-md">
                    <h1>Toyota Database Table</h1>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Make</th>
                            <th scope="col">Model </th>
                            <th scope="col">Price</th>
                            <th scope="col">Year</th>
                            <th scope="col">Fuel Type </th>
                            <th scope="col">Color</th>
                            <th scope="col">Break Horse Power</th>
                            <th scope="col">Transmission</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Mileage</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = " SELECT * FROM `toyota` ";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $idToyota = $row['id_toyota'];
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
                                echo '
                        <tr>
                      <td scope="row">' . $idToyota . '</td>
                      <td> <img src="images/' . $image . '" width="300" /></d>
                      <td>' . $make . '</td>
                      <td>' . $model . '</td>
                      <td>£' . $price . '</td>  
                      <td>' . $year . '</td>
                      <td>' . $fueltype . '</td>
                      <td>' . $color . '</td>
                      <td>' . $bhpower . '</td>
                      <td>' . $drivetype . '</td>
                      <td>' . $quantity . '</td>
                      <td>' . $mileage . '</td>
                      

                      <td>
                      <a class="button-update" title="Relevant Title" href = "admin_update_toyota_car.php? idUpdateToyota= ' . $idToyota . '">Update</a>
                      <a class="button-delete" title="Relevant Title" href = "admin_delete_toyota_car.php? idDeleteToyota=' . $idToyota . '" >Delete</a>
                      
                      </tr>';
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</body>

</html>