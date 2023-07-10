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
    <title>Admin Page</title>

    <style>

    </style>
</head>

<body>
    <?php include 'adminnavbar.php' ?>


    <div class="containerAdmin">
        <a href="admin_add_customer.php">
            <button class="adminMenuButtons">Add Customer</button>
        </a>
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <div class="container-md">
                    <h1>Customer Database Table</h1>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <table class="table">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password [#hashed#]</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = " SELECT * FROM `customers` ";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id_customer'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $password = $row['password'];
                                $phone = $row['phone'];
                                $gender = $row['gender'];
                                echo '
                <tr>
              <td scope="row">' . $id . '</td>
              <td>' . $name . '</td>
              <td>' . $email . '</td>
              <td>' . $password . '</td>
              <td>' . $phone . '</td>
              <td>' . $gender . '</td>

              <td>                 

               <a class="button-update" title="Update" href = "admin_update_customer.php? idUpdateCustomer= ' . $id . '">Update</a>
               <a class="button-delete" title="Delete" href = "admin_delete_customer.php? idDeleteCustomer=' . $id . '">Delete</a>                                           
               
              </td>
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