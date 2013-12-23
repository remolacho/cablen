<?php
		session_name("loginUsuario"); 
		session_start();
		
		include_once("../../../app/cliente/modelo/ClienteDao.php");
		
		$cliente = new Cliente();
		$clienteDao = new ClienteDao();
		
		$cliente->setId($_SESSION[´id´]);
		$cliente->setCodigo_abononado($_POST["txtAbonado"]);
		$cliente->setCedula($_POST["txtCedula"]);
		$cliente->setPrimer_nombre($_POST["txtNombreP"]);
		$cliente->setSegundo_nombre($_POST["txtNombreS"]);
		$cliente->setPrimer_apellido($_POST["txtApellidoP"]);
		$cliente->setSegundo_apellido($_POST["txtApellidoS"]);
		$cliente->setTelefono_fijo($_POST["txtTelefonoF"]);
		$cliente->setTelefono_movil($_POST["txtTelefonoM"]);
		$cliente->setCorreo($_POST["txtCorreo"]);
		$cliente->setId_pregunta($_POST["cmbPregunta"]);
		$cliente->setRespuesta($_POST["txtRespuesta"]);
		$cliente->setSector($_POST["txtSector"]);
		
		$sw = $clienteDao->actualizar($cliente);

        if ($sw){
			header("location:../../../helppers/cerrarSession.php");
		}		
?>