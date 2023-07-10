<?php 
        session_start();
		//remove the id from our cart array
		$key = array_search($_GET['id'], $_SESSION['mercedescart']);	
		unset($_SESSION['mercedescart'][$key]);
	 
		// unset($_SESSION['qty_array'][$_GET['index']]);
		//rearrange array after unset
		$_SESSION['mercedesqty_array'] = array_values($_SESSION['mercedesqty_array']);
	 
		
		header("location:CurrentBasket.php");
?>