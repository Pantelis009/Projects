<!--Pantelis Xiourouppas - 160056307 -->
<?php

include 'connect.php';

//toyota table dete
if (isset($_GET['idDeleteCustomer'])) {
    $id_customer = $_GET['idDeleteCustomer'];

    $sql = "delete from `customers` where id_customer = $id_customer";
    $result = mysqli_query($con, $sql);

    if ($result) {

        header('location:admincustomers.php');
    } else {
        die(mysqli_error($con));
    }
}
?>