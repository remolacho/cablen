<?php
	
	session_name("loginAdmin"); 
	session_start(); 
	
	if ($_SESSION[´usuario´] == "" ){   	
		header("location: usuario/vista/session.php");
	}else{
		header("location: AdminSession.php");
	}

	
?>