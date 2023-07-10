<!--Pantelis Xiourouppas - 160056307 -->
<?php

include 'connect.php';

//toyota table dete
if (isset($_GET['idDeleteToyota'])) {
    $idToyota = $_GET['idDeleteToyota'];

    $sql = "delete from `toyota` where id_toyota = $idToyota";
    $result = mysqli_query($con, $sql);

    if ($result) {

        header('location:admintoyota.php');
    } else {
        die(mysqli_error($con));
    }
}
?>