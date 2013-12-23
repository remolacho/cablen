<?php
	session_name("loginUsuario"); 
	session_start();
	
	include_once ("../../../app/session/modelo/SessionDao.php");
	
	$pass =  $_POST['txtPass'];
	$nPass = $_POST['txtNPass'];
	$cPass = $_POST['txtCPass'];
	$cedula = $_SESSION[´cedula´];
	
	$objDao = new SessionDao(); 
	$objCliente = $objDao->buscar($cedula);
	
	if($pass != $objCliente->getContrasena()){
		echo '<h2>'.utf8_decode("error de contraseña actual").'</h2>';	
		echo '<a href="../vista/CambioClave.php">Intentar de Nuevo</a>';
		unset ($objCliente);
	    unset ($objDao);
	}else if ($nPass == $pass){
		echo '<h2>'.utf8_decode("La nueva contraseña es igual a la anterior").'</h2>';
		echo '<a href="../vista/CambioClave.php">Intentar de Nuevo</a>';
		unset ($objCliente);
	    unset ($objDao);
	}else if ($nPass != $cPass){
		echo '<h2>'.utf8_decode("La nueva contraseña es diferente a la confirmacion").'</h2>';
		echo '<a href="../vista/CambioClave.php">Intentar de Nuevo</a>';
		unset ($objCliente);
	    unset ($objDao);
	}else {
		$objCliente->setContrasena($nPass);
		$sw = $objDao->actualizar($objCliente);
		unset ($objCliente);
	    unset ($objDao);
		if ($sw){
			header('Location: ../../../app/index.php');
		}
	}
	
	

	
	
	


	
?>