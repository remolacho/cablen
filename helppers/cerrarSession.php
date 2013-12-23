<?php 
	session_name("loginUsuario"); 
	session_start(); 
	$_SESSION = array();
	if ($_SESSION[´abonado´] == "" ){
        session_destroy ();		
		header("location: ../app/session/vista/InicioSession.php");
   	} 
	 
?>