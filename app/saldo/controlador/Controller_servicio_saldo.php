<?php
	session_name("loginUsuario"); 
	session_start();
	
	include_once("../../../lib/nusoap.php");
	
	
	function cargarFormulario(){
		$abonjado = $_SESSION[´abonado´];
		$nombre  =  $_SESSION[´nombre´];
		$apellido = $_SESSION[´apellido´];
		$boxy = $_SESSION[´boxy´];
		
		if ($boxy=="Interior"){/*valida hacia que boxy se va  adirigir*/
			$oSoapClient = new nusoap_client('http://200.47.182.77:8080/saldoBoxyInt/wsdl/Servicio.wsdl', "wsdl");
		}else{
			$oSoapClient = new nusoap_client('http://200.47.182.77:8080/saldoBoxyCCS/wsdl/ServicioC.wsdl', "wsdl");
			/*$oSoapClient = new nusoap_client('http://localhost:8088/saldoBoxyCCS/wsdl/ServicioC.wsdl', "wsdl");*/
		}

		$errCli = $oSoapClient->getError();
		
		
		echo '<div align="center" id="formulario">';
	
			
		if ($errCli == false) {
			
			$aParametros = array("codAbo" => $abonjado);
			$respuesta = $oSoapClient->call("resultSaldo",$aParametros);
			$error = $respuesta['resultSaldoReturn']['err'];
			
			echo'<div align="center" class="frmTitulo"><h2>Saldo en linea</h2></div>';
			
			switch ($error){
				case 0:
					
					echo '<strong><table border="0">';
					echo '<tr align="left" class="coloRowI">';
					echo '<td>Nombre</td>';
					echo '<td>'.$nombre.'</td>';
					echo '<td rowspan="8"><img src="../../../img/app/internet.png" width="150" height="150" /></td>';
					echo '</tr>';
					
					echo '<tr align="left" class="coloRowP">';
					echo '<td>Apellido</td>';
					echo '<td>'.$apellido.'</td>';
					echo '</tr>';
					
					echo '<tr align="left" class="coloRowI">';
					echo '<td>Saldo Actual</td>';
					echo '<td>'.$respuesta['resultSaldoReturn']['saldo'].'</td>';
					echo '</tr>';
					
					echo '<tr align="left" class="coloRowP">';
					echo '<td>Ultimo Pago</td>';
					echo '<td>'.$respuesta['resultSaldoReturn']['ult_pago'].'</td>';
					echo '</tr>';
					
					echo '<tr align="left" class="coloRowI">';
					echo '<td>ID Pago</td>';
					echo '<td>'.$respuesta['resultSaldoReturn']['id'].'</td>';
					echo '</tr>';
					
					echo '<tr align="left" class="coloRowP">';
					echo '<td>Fecha Ult. Pago</td>';
					echo '<td>'.$respuesta['resultSaldoReturn']['fecha_ult_pago'].'</td>';
					echo '</tr>';
					
					echo '<tr align="left" class="coloRowI">';
					echo '<td>Referencia</td>';
					echo '<td>'.$respuesta['resultSaldoReturn']['comentario'].'</td>';
					echo '</tr>';
					
					echo '<tr>';
					echo '<td>Estatus</td>';
					
					if ($respuesta['resultSaldoReturn']['tipo'] == 'Activo'){
						$estatus = '<font color="#006600">'. $respuesta['resultSaldoReturn']['tipo'].'</font>';
					}else {
						$estatus = '<font color="#FF0000">'. $respuesta['resultSaldoReturn']['tipo'].'</font>';
					}
					
					echo '<td>'. $estatus.'</td>';
					echo '</tr>';
					
					echo '</table></strong>';
					
					break;
				case -1:
					echo '<br/><br/><h2>';
					echo  $respuesta['resultSaldoReturn']['descErr'];
					echo '</h2>';
					break;
				case -2:	
					echo '<br/><br/><h2>';
					echo  $respuesta['resultSaldoReturn']['descErr'];
					echo '</h2>';
					break;
			}
		}else{
			echo 'error';
		}
		
		echo '<br />
               <div id"imgBanner" align="center">
               		<img src="../../../img/app/banner_historial.jpg" width="70%" />  
      		   </div>';
		echo '</div>';
		unset($oSoapClient);                                  
	}
	
	cargarFormulario();

?>