<?php 
    session_start();
		//remove the id from our cart array
		$key = array_search($_GET['id'], $_SESSION['bmwcart']);	
		unset($_SESSION['bmwcart'][$key]);
	 
		// unset($_SESSION['qty_array'][$_GET['index']]);
		//rearrange array after unset
		$_SESSION['bmwqty_array'] = array_values($_SESSION['bmwqty_array']);
	 
		
		header("location:CurrentBasket.php");
?>