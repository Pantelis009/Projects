<!--PANTELIS XIOUROUPPAS - 160056307 -->

<?php


//$con = new mysqli('localhost', 'root', '', 'inventory');

/*if (!$con) {
    die(mysqli_error($con));
}*/


$host_name = 'db5012532127.hosting-data.io';
$database = 'dbs10534011';
$user_name = 'dbu1879997';
$password = '@qwe123@{asd}!!!';

$con = new mysqli($host_name, $user_name, $password, $database);




if ($con->connect_error) {
    die('<p>Failed to connect to MySQL: ' . $con->connect_error . '</p>');
} else {
}
?>