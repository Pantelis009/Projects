<!--Pantelis Xiourouppas - 160056307 -->
<?php

include 'connect.php';

//toyota table dete
if (isset($_GET['idDeleteAudi'])) {
    $id_audi = $_GET['idDeleteAudi'];

    $sql = "delete from `audi0` where id_audi = $id_audi";
    $result = mysqli_query($con, $sql);

    if ($result) {

        header('location:adminaudi.php');
    } else {
        die(mysqli_error($con));
    }
}
?>