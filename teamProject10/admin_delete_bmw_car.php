<!--Pantelis Xiourouppas - 160056307 -->
<?php

include 'connect.php';

//toyota table dete
if (isset($_GET['idDeleteBmw'])) {
    $id_bmw = $_GET['idDeleteBmw'];

    $sql = "delete from `bmw` where id_bmw = $id_bmw";
    $result = mysqli_query($con, $sql);

    if ($result) {

        header('location:adminbmw.php');
    } else {
        die(mysqli_error($con));
    }
}
?>