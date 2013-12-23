<?php

		session_name("loginUsuario"); 
		session_start(); 
		
	    include_once("../../../app/banco/modelo/BancoDao.php");
        include_once("../../../app/pago/modelo/PagoDao.php");
		include_once("../../../lib/class_imgUpldr.php");
		
		$dia=substr($_POST["txtFecha"],0,2);
		$mes=substr($_POST["txtFecha"],3,2);
		$ano=substr($_POST["txtFecha"],6,4);
		$pago = new Pago();
		$pagoDao = new PagoDao();
		$bancoDao  = new BancoDao();
		
		$id = $pagoDao->octenerMaxId()  + 1;
		$rutaImg = '../../../img/pagos/';
		$ext = end(explode(".",$_FILES['txtBauche']['name']));
		$sizefile = $_FILES['txtBauche']['size'];
		
		$banco = $bancoDao->buscar($_POST["cmbBanco"]);
		$pago->setCodigo_abonado($_POST["txtAbonado"]);
		$pago->setId_banco($_POST["cmbBanco"]);
		$pago->setOcteto($_POST["cmbCuenta"]);
		$pago->setFecha_deposito($ano."/".$mes."/".$dia);
		$pago->setMonto($_POST["txtMonto"]);
		$pago->setNum_deposito($_POST["txtDeposito"]);
       	$pago->setFecha_registro(date('Y-m-d'));
		$pago->setFecha_modificado(date('Y-m-d'));
		$pago->setBancoOrigen($_POST["cmbBancoOrigen"]);
	    
		if ($ext != ""){
			$ext = ".".$ext;	
		}
		
		
		
		$bauche = new imgUpldr();

		$bauche->_size = 307200;
		$bauche->_dest = $rutaImg;
		$bauche->_name = $id.$ext;
		$bauche->_exts = array($_FILES['txtBauche']['type']); // Arreglo, acepta valores "image/jpeg", "image/gif", "image/png"
		$result = $bauche->init($_FILES['txtBauche']);

	    if (substr($result,0,3) == "[4]" || $result == ""){	//el result devuelve el numero de error en un string se toma el 4 por que la img no es obligatoria
			
			if ($result == ""){
				$pago->setImg_pago($rutaImg.$id.$ext);
			}
			
			$sw = $pagoDao->guardar($pago);
             
       		if ($sw){

				$para= $_SESSION[´correo´].",soporteweb@cablenorte.net";
				$asunto= "Cable Norte: Proceso de Pago #".$_POST["txtDeposito"];
				$mensaje= "<body><b><h1><font color='#036'>Registro Exitoso</font></h1></b><br/><p>Sr(a) ".
            	$_SESSION[´nombre´]." ".$_SESSION[´apellido´]." se ha recibido un pago desde el ".
            	$banco->getBanco()." N# de cuenta ".$_POST["cmbCuenta"]." Deposito # ".$_POST["txtDeposito"].
				" con un Monto de ".$_POST["txtMonto"]." Bs Para la Fecha ".
				date('d-m-Y')." la transaccion con identificador # ".$id." sera procesada en un lapso de 24 horas si es del mismo banco en". 
				" caso contrario sera procesada en un lapso de 2 dias habiles. gracias por registrar su pago.</p><br/>".
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
			
		}else{
					$msg  = utf8_decode("El tamaño del archivo sobrepasa los 300 KB reduscalo");
				    echo "<script language='javascript'>
					alert('".$msg."');
					window.location.href = '../vista/CargarPago.php';
					</script>";
		}
		
?>