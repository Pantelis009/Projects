<!--Pantelis Xiourouppas - 160056307 -->
<?php
session_start();
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
    <!-- This is the line you need -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.rtl.min.css">

    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title>Orders</title>

    <style>

    </style>
</head>

<body>
    <?php include 'adminnavbar.php' ?>


    <div class="containerAdmin">
         <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <div class="container-md">
                    <h1>Order Database Table</h1>
                </div>
            </div>

    </div>
    <div class="row">
        <div class="col">
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Postcode</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Total Cost</th>
                        <th scope="col">Order Status</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = " SELECT * FROM `orders` ";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $OrderId = $row['OrderId'];
                            $CustomerId = $row['CustomerId'];
                            $Name = $row['Name'];
                            $Email = $row['Email'];
                            $Address = $row['Address'];
                            $Postcode = $row['Postcode'];
                            $PaymentMethod = $row['PaymentMethod'];
                            $OrderTime = $row['OrderTime'];
                            $TotalCost = $row['TotalCost'];
                            $OrderStatus = $row['OrderStatus'];

                            echo '
                <tr>
              <td scope="row">' . $OrderId . '</td>
              <td>' . $CustomerId . '</td>
              <td>' . $Name . '</td>
              <td>' . $Email . '</td>
              <td>' .  $Address . '</td>
              <td>' . $Postcode . '</td>
              <td>' . $PaymentMethod . '</td>
              <td>' . $OrderTime . '</td>
              <td>' . $TotalCost . '</td>
              <td>' . $OrderStatus . '</td>
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