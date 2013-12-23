<?php

		session_name("loginAdmin"); 
		session_start(); 
		
		/*no hace falta llamar estas lib ya las trea el hist y el Event con el include*/
	    /* include_once("../../../app/banco/modelo/BancoDao.php");*/
        /*include_once("../../../app/pago/modelo/PagoDao.php");*/
		
		include_once("../../../admin/historial/modelo/HistorialDao.php");
		include_once("../../../admin/historial/modelo/EventoDao.php");
		
		$pago = new Pago();
		$pagoDao = new PagoDao();
		$bancoDao  = new BancoDao();
		$objHist = new Historial();
		$objEventDao = new EventoDao();
		$objHistDao = new HistorialDao();
		$datetime = new DateTime();
		$objEvent = new Evento();
		
		$banco = $bancoDao->buscar($_POST["cmbBanco"]);
		
		//para darle formato a la fecha que se registrara en la bd 
		$dia=substr($_POST["txtFecha"],0,2);
		$mes=substr($_POST["txtFecha"],3,2);
		$ano=substr($_POST["txtFecha"],6,4);
		$pago->setId($_POST["txtId"]);
		$pago->setCodigo_abonado($_POST["txtAbonado"]);
		$pago->setId_banco($_POST["cmbBanco"]);
		$pago->setOcteto($_POST["txtCuenta"]);
		$pago->setFecha_deposito($ano."/".$mes."/".$dia);
		$pago->setMonto($_POST["txtMonto"]);
		$pago->setNum_deposito($_POST["txtDeposito"]);
       	$pago->setFecha_registro(date('Y-m-d'));
		$pago->setFecha_modificado(date('Y-m-d'));
		$pago->setEstatus($_POST["cmbEstatus"]);
		$pago->setObservacion($_POST["comentario"]);
		$pago->setBancoOrigen($_POST["txtBO"]);
		/*historial de pagos procesados*/
		$objHist->setCedula($_SESSION[´cedula´]);
		$objHist->setIdPago($_POST["txtId"]);
		$objHist->setFechaR(date('Y-m-d'));
		$objHist->setFechaM(date('Y-m-d'));
		$objHist->setObservacion($_POST["comentario"]);
		$objHist->setEstatus($_POST["cmbEstatus"]);
		$objHist->setCuenta($_POST["txtCuenta"]);
		$objHist->setIdBanco($_POST["cmbBanco"]);
		$objHist->setMonto($_POST["txtMonto"]);
		$objHist->setNumDep($_POST["txtDeposito"]);
		$objHist->setFechaDep($ano."/".$mes."/".$dia);	
		
		/*historial de eventos por parte del user*/
		$objEvent->setCedula($_SESSION[´cedula´]);
		$objEvent->setFechaHora($datetime->format('Y/m/d H:i:s'));
		$objEvent->setEnvent("Proceso pago n# ".$_POST["txtId"]);
		
		
		$sw = $pagoDao->actualizar($pago);

         if ($sw){			
		   
			$objHistDao->agregar($objHist);
            $objEventDao->agregar($objEvent);
			
			if ($_POST["cmbEstatus"] == 1){
			
			      $mensaje= "<body><b><h1><font color='#036'>Proceso Exitoso</font></h1></b><br/><p>".
                              "Sr(a) ".$_POST["txtNombre"]." ".$_POST["txtApellido"]." se ha procesado con exito ".
                              "el pago numero ".$_POST["txtId"]. " procedente de ".
			      $banco->getBanco()." Deposito # ".$_POST["txtDeposito"]." con un Monto de ".$_POST["txtMonto"]. 
		              " Bs con fecha ".$_POST["txtFecha"]. 
			      " si ud no realizo esta operacion llamar al ".
		              "0501-6678300.</p><br/>".
                              "<div style='background:#036';><img src='www.cablenorte.net/images/logoblanco.png' width='260' height='118' />".
			      "<h4><font color='#FFF'><b>Television Para Todos <br/>Servicio al Cliente 0501-6678300<br/>RIF J-31216176-0</b></font></h4></div></body>";
            	
			}else{	
			
			      $mensaje= "<body><b><h1><font color='#FF0000'>Error en el Pago</font></h1></b><br/><p>".
                              "Sr(a) ".$_POST["txtNombre"]." ".$_POST["txtApellido"]." se ha presentado ". 
                              "un error con su pago numero ".$_POST["txtId"]. " procedente de ".
			      $banco->getBanco()." Deposito # ".$_POST["txtDeposito"]." con un Monto de ".$_POST["txtMonto"]. 
			      " Bs con fecha ".$_POST["txtFecha"]. 
			      " le invitamos a ingressar en nuestra pagina Seccion visualizar pagos para verificar el error ". 
			      "que se presento y ser modificado de lo contrario no podra ser procesado.</p><br/>".
                              "<div style='background:#036';><img src='www.cablenorte.net/img/main/logoblanco.png' width='260' height='118' />".
			      "<h4><font color='#FFF'><b>Television Para Todos <br/>Servicio al Cliente 0501-6678300<br/>RIF J-31216176-0</b></font></h4></div></body>";

			}
			
			
			
			$para= $_POST["txtCorreo"];
			$asunto= "Cable Norte contacto: Info PagoWeb";			
			$de= "contacto@cablenorte.net"; 
			$headers ="MIME-Version:1.0;\r\n";
			$headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
			$headers .= "FROM: $de \r\n";
			$headers .= "To: $para; \r\n Subject:$asunto \r\n";
					
			unset($pagoDao);
			unset($bancoDao);
			unset($banco);
			unset($pago);
			unset($objHistDao);
			unset($objHist);
			unset($objEventDao);
			unset($objEvent);
			unset($datetime);
						
			if (mail($para, $asunto, $mensaje, $headers))
				header("Location: ../vista/ListProcesar.php");
            else
                echo "<script language='javascript'>
				alert('Estamos presentando problemas con el servidor de correos ".$para."');
				window.location.href = '../vista/ListProcesar.php';
				</script>";
		          	
		}

?>