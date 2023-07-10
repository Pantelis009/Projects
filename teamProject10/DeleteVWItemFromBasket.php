<?php 
    session_start();
		//remove the id from our cart array
		$key = array_search($_GET['id'], $_SESSION['vwcart']);	
		unset($_SESSION['vwcart'][$key]);
	 
		// unset($_SESSION['qty_array'][$_GET['index']]);
		//rearrange array after unset
		$_SESSION['vwqty_array'] = array_values($_SESSION['vwqty_array']);
	 
		
		header("location:CurrentBasket.php");
?>