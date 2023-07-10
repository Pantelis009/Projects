<!--Pantelis Xiourouppas - 160056307 -->
<?php

include 'connect.php';

//toyota table dete
if (isset($_GET['idDeleteVolkswagen'])) {
    $id_volkswagen = $_GET['idDeleteVolkswagen'];

    $sql = "delete from `volkswagen` where id_volkswagen = $id_volkswagen";
    $result = mysqli_query($con, $sql);

    if ($result) {

        header('location:adminvolkswagen.php');
    } else {
        die(mysqli_error($con));
    }
}
?>