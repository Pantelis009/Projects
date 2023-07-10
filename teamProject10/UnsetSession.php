<!-- Code by Xavier Walker -->
<?php 
// Unsets all session variables, then destroys the session, which 
// redirects the user to the login page as theyve been effectively signed out
session_start();
session_unset();
session_destroy();

if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}
?>