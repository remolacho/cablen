<?php
	session_name("loginUsuario"); 
	session_start(); 
	
	include_once("../../../lib/nusoap.php");
	
	function convertFecha($parm){
		if ($parm == ""){
			return $parm;
		}else{
			$dia=substr($parm,0,2);
			$mes=substr($parm,3,2);
			$ano=substr($parm,6,4);
			return $ano."-".$mes."-".$dia;
		}	
	}
	
	function cargarFormulario(){
		
		$abonado = $_SESSION[´abonado´];
		$boxy = $_SESSION[´boxy´];
		
		/*el formato debe se mes-dia-ano*/
		$desde = convertFecha($_POST['desde']);
		$hasta = convertFecha($_POST['hasta']);
		
		if ($boxy=="Interior"){/*valida hacia que boxy se va  adirigir*/
			$oSoapClient = new nusoap_client(
				'http://200.47.182.77:8080/historialBoxyInt/wsdl/ServcioHistorialInt.wsdl', "wsdl"
		);
			}else{
			$oSoapClient = new nusoap_client(
				'http://200.47.182.77:8080/historialBoxyCCS/wsdl/ServcioHistorialCCS.wsdl', "wsdl"
			);
		}

	    $errCli = $oSoapClient->getError();
	
		if ($errCli == false) {
		/*"02800000019  00660001191"*/
			$aParametros = array("codAbo" => $abonado, "desde" => $desde, "hasta" => $hasta);	
			$respuesta = $oSoapClient->call("resultHistorial",$aParametros);

			$result = $respuesta["resultHistorialReturn"][0];

			if (sizeof($result) > 0){/*si existe result es > 0*/
				
				$numRegistros = sizeof($respuesta["resultHistorialReturn"]);

			    echo '<tr class="tituloLitas" align="center">';
				echo '<td>ID</td>';
				echo '<td width="320" align="left">Referencia</td>';
				echo '<td>Monto</td>';
				echo '<td>Fecha</td>';
				echo '<td>Registro</td></tr>';
				
				for($i=0;$i<$numRegistros;$i++){
					$historial = $respuesta["resultHistorialReturn"][$i];
					
					if ($historial['monto'] < 0){
						$monto = '<font color="#FF0000"><b>'.$historial['monto'].'</b></font>';	
					}else{
						$monto = '<font color="#036"><b>'.$historial['monto'].'</b></font>';
					}
					
					echo '<tr class="fondoLista">';
					echo '<td>'.$historial['id'].'</td>';
					echo '<td align="left">'.utf8_encode($historial['comentario']).'</td>';
					echo '<td align="right">'.$monto.'</td>';
					echo '<td>'.$historial['fecha'].'</td>';
					echo '<td>'.$historial['ref'].'</td>';
					echo '</tr>';
					/* print_r($historial['descErr']);*/
				}
				
			}else{
				
				$err = $respuesta["resultHistorialReturn"]["err"];
				
				if ($err == 0) {

			    	echo '<tr class="tituloLitas" align="center">';
					echo '<td>ID</td>';
					echo '<td width="320" align="left">Referencia</td>';
					echo '<td>Monto</td>';
					echo '<td>Fecha</td>';
					echo '<td>Registro</td></tr>';
					
					if ($respuesta["resultHistorialReturn"]["monto"] < 0){
						$monto = '<font color="#FF0000"><b>'.$respuesta["resultHistorialReturn"]["monto"].'</b></font>';	
					}else{
						$monto = '<font color="#036"><b>'.$respuesta["resultHistorialReturn"]["monto"].'</b></font>';
					}
					
					echo '<tr class="fondoLista">';
					echo '<td>'.$respuesta["resultHistorialReturn"]["id"].'</td>';
					echo '<td align="left">'.utf8_encode($respuesta["resultHistorialReturn"]['comentario']).'</td>';
					echo '<td align="right">'.$monto.'</td>';
					echo '<td>'.$respuesta["resultHistorialReturn"]['fecha'].'</td>';
					echo '<td>'.$respuesta["resultHistorialReturn"]['ref'].'</td>';
					echo '</tr>';
					
				}else{
					
					echo '<br/><br/><h2>';
					echo $respuesta["resultHistorialReturn"]["descErr"];
					echo '</h2>';	
				
				}
				

			}
			
		}
	}
	
	cargarFormulario();
	
?>