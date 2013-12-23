<?php

		session_name("loginUsuario"); 
		session_start(); 
		
	    include_once("../../../app/banco/modelo/BancoDao.php");
        include_once("../../../app/pago/modelo/PagoDao.php");
		
		$pago = new Pago();
		$pagoDao = new PagoDao();
		$bancoDao  = new BancoDao();
		
		$banco = $bancoDao->buscar($_POST["cmbBanco"]);
		//para darle formato a la fecha que se registrara en la bd 
		$dia=substr($_POST["txtFecha"],0,2);
		$mes=substr($_POST["txtFecha"],3,2);
		$ano=substr($_POST["txtFecha"],6,4);
		$pago->setId($_POST["txtId"]);
		$pago->setCodigo_abonado($_POST["txtAbonado"]);
		$pago->setId_banco($_POST["cmbBanco"]);
		$pago->setOcteto($_POST["cmbCuenta"]);
		$pago->setFecha_deposito($ano."/".$mes."/".$dia);
		$pago->setMonto($_POST["txtMonto"]);
		$pago->setNum_deposito($_POST["txtDeposito"]);
       	$pago->setFecha_registro(date('Y-m-d'));
		$pago->setFecha_modificado(date('Y-m-d'));
		$pago->setEstatus(0);
		$pago->setObservacion("");
		$pago->setBancoOrigen($_POST["cmbBancoOrigen"]);
		
		$sw = $pagoDao->actualizar($pago);

         if ($sw){
			
			$para= $_SESSION[´correo´].",soporteweb@cablenorte.net";
			$asunto= "Cable Norte: Proceso de Pago #".$_POST["txtDeposito"];
			
			$mensaje= "<body><b><h1><font color='#036'>Actualizacion de Pago</font></h1></b><br/><p>Sr(a) ".
            $_SESSION[´nombre´]." ".$_SESSION[´apellido´]." se ha modificado el pago con el ".
            "identificador numero ".$_POST["txtId"]. " procedente de ".
			$banco->getBanco()." N# de cuenta ".$_POST["cmbCuenta"]." Deposito # ".$_POST["txtDeposito"].
			" con un Monto de ".$_POST["txtMonto"].
			" Bs Para la Fecha ".date('d-m-Y'). 
			" la transaccion sera procesada en un lapso de 24 horas si es del mismo banco en caso contrario ". 
			"sera procesada en un lapso de 2 dias habiles. si ud no realizo esta operacion llamar al ".
			"0501-6678300.</p><br/>".
            "<div style='background:#036';><img src='www.cablenorte.net/img/main/logoblanco.png' width='260' height='118' />".
			"<h4><font color='#FFF'><b>Television Para Todos <br/>Servicio al Cliente 0501-6678300<br/>RIF J-31216176-0</b>
			</font></h4></div></body>";
			
			$de= "contacto@cablenorte.net"; 
			$headers ="MIME-Version:1.0;\r\n";
			$headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
			$headers .= "FROM: $de \r\n";
			$headers .= "To: $para; \r\n Subject:$asunto \r\n";
			unset($pagoDao);
			unset($bancoDao);
			unset($banco);
			unset($pago);
			if (mail($para, $asunto, $mensaje, $headers))
				header("Location: ../vista/ListPagos.php");
            else
                echo "<script language='javascript'>
				alert('Estamos presentando problemas con el servidor de correos ".$para."');
				window.location.href = '../vista/ListPagos.php';
				</script>";
		          	
		}
		
?>