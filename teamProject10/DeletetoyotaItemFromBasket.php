<?php 
    session_start();
		//remove the id from our cart array
		$key = array_search($_GET['id'], $_SESSION['toyotacart']);	
		unset($_SESSION['toyotacart'][$key]);
	 
		// unset($_SESSION['qty_array'][$_GET['index']]);
		//rearrange array after unset
		$_SESSION['toyotaqty_array'] = array_values($_SESSION['toyotaqty_array']);
	 
		
		header("location:CurrentBasket.php");
?>