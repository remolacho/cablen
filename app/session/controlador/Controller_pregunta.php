<?php

	include_once("Controller_session.php");
	
	$objControl = new ControllerSession();
	$cedula = $_GET['id'];
	echo $objControl->secretQ($cedula);

?>