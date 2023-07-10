<!--Pantelis Xiourouppas - 160056307 -->
<?php

include 'connect.php';

//toyota table dete
if (isset($_GET['idDeleteMercedes'])) {
    $id_mercedes = $_GET['idDeleteMercedes'];

    $sql = "delete from `mercedes` where id_mercedes = $id_mercedes";
    $result = mysqli_query($con, $sql);

    if ($result) {

        header('location:adminmercedes.php');
    } else {
        die(mysqli_error($con));
    }
}
?>