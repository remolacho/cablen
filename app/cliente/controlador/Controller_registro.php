<?php

		include_once("../../../app/cliente/modelo/ClienteDao.php");
        /*include_once("../modelo/Cliente.php");*/
		
		if( empty($_POST["txtCedula"]) || empty($_POST["txtBoxy"]) || empty($_POST["txtSenal"])){
		
			header("Location: ../vista/Error.html");
			
		}
		
		
		$cliente = new Cliente();
		$clienteDao = new ClienteDao();
		$cliente->setCodigo_abononado($_POST["txtAbonado"]);
		$cliente->setCedula($_POST["txtCedula"]);
		$cliente->setPrimer_nombre($_POST["txtNombreP"]);
		$cliente->setSegundo_nombre($_POST["txtNombreS"]);
		$cliente->setPrimer_apellido($_POST["txtApellidoP"]);
		$cliente->setSegundo_apellido($_POST["txtApellidoS"]);
		$cliente->setTelefono_fijo($_POST["txtTelefonoF"]);
		$cliente->setTelefono_movil($_POST["txtTelefonoM"]);
		$cliente->setDireccion("");
		$cliente->setCorreo($_POST["txtCorreo"]);
		$cliente->setId_pregunta($_POST["cmbPregunta"]);
		$cliente->setRespuesta($_POST["txtRespuesta"]);
		$cliente->setContrasena($_POST["txtPass"]);
		$cliente->setSector($_POST["txtSector"]);
        $cliente->setBoxy($_POST["txtBoxy"]);
		$cliente->setSenal($_POST["txtSenal"]);
		
		$sw = $clienteDao->guardar($cliente);

        if ($sw){
			header("Location: ../../session/vista/InicioSession.php");
		}		
?>