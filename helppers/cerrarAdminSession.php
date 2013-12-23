<?php 
	session_name("loginAdmin"); 
	session_start(); 
	$_SESSION = array();
	if ($_SESSION[´usuario´] == "" ){
        session_destroy ();		
		header("location: ../admin/index.php");
   	} 
	 
?>