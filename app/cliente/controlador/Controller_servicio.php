<?php
	
	include_once("../../../lib/nusoap.php");
	include_once("../../../app/session/controlador/Controller_lista.php");
	include_once("../../../app/session/modelo/SessionDao.php");
	/*include_once("../modelo/Cliente.php");*/
	
	$objSessionDao = new SessionDao();
	$objCliente =  $objSessionDao->buscar($_POST['id']);
	
	if($objCliente != ""){
	    echo  '<tr><td><h1>El usuario ya esta registrado</h1></td></tr>';
		echo  '<tr><td><a href="Registrar.php">Intentar una vez mas</a></td></tr>';
	}else{
	    unset($objCliente);
		cargarFormulario();
	}    
	
	function cargarFormulario(){	
	
		$url = 'http://200.47.182.77:8080/abonadoBoxy/wsdl/Service.wsdl';
	
		if(servidor_acitivo($url)){
		
			$objPregunta = new Controller_Lista();
	    	//$oSoapClient = new nusoap_client('http://localhost:8088/abonadoBoxy/wsdl/Service.wsdl', "wsdl");
	    	$oSoapClient = new nusoap_client($url,true);
   	    	$id = $_POST['id'];
			$senal= $_POST['senal'];
			$errCli = $oSoapClient->getError();
			echo $oSoapClient->getError();
			
			if (!$errCli) {
		
				$aParametros = array("ci" => $id);
	   			$respuesta = $oSoapClient->call("resultAbonado",$aParametros);
	        	$error = $respuesta['resultAbonadoReturn']['error'];
		        //0 ok -1 sin conexion -2 no existe
				switch ($error){
		            
					case 0:
					
			   			echo  '<tr align="left"><td>Codigo Abonado: <font color="#FF0000">*</font></td><td>
		       			<input type="text" id="Abonado" name="txtAbonado" value="'.
			   			rtrim($respuesta['resultAbonadoReturn']['abonado']).'" maxlength="11"
               			onKeyDown="return bloqueo(event)"/></td>';
			  			echo '<tr align="left"><td>Primer Nombre:  <font color="#FF0000">*</font></td>
			  			<td><input type="text" id="1erNombre" name="txtNombreP" value="'.
			  			utf8_encode(rtrim($respuesta['resultAbonadoReturn']['nombre'])).'" maxlength="25" /></td </tr>';
			   			echo '<tr align="left"><td>Segundo Nombre:</td><td><input type="text" 
			   			name="txtNombreS" maxlength="15" /></td></tr>';
			   			echo '<tr align="left"><td>Primer Apellido:  <font color="#FF0000">*</font></td>
               			<td><input type="text" id="1erApellido" name="txtApellidoP" value="'.
			  		    utf8_encode(rtrim($respuesta['resultAbonadoReturn']['apellido'])).'" maxlength="15" /></td></tr>';
			   			echo '<tr align="left"><td>Segundo Apellido:</td><td>
			   			<input type="text" name="txtApellidoS" maxlength="15" /></td></tr>';
			   			echo '<tr align="left"><td>Telefono Fijo:</td><td><input type="text" name="txtTelefonoF"  
						maxlength="11" onKeyDown="return solo_numeros(event)" /></td></tr>';
			   			echo '<tr align="left"><td>Telefono Movil: <font color="#FF0000">*</font></td>
			   			<td><input type="text" name="txtTelefonoM" id="Telefono_Movil" maxlength="11"
               			onKeyDown="return solo_numeros(event)" /></td></tr>';
               			echo'<tr align="left"><td>Correo: <font color="#FF0000">*</font>
               			</td><td><input type="text" name="txtCorreo" id="Correo"  maxlength="40" /></td></tr>';

			   			echo  '<tr align="left"><td>Sector: <font color="#FF0000">*</font></td><td>
		       			<input type="text" id="sector" name="txtSector" value="'.
			   			rtrim($respuesta['resultAbonadoReturn']['sector']).'" maxlength="30"
               			onKeyDown="return bloqueo(event)"/></td>';

		       			echo '<tr align="left"><td>Pregunta Secreta: <font color="#FF0000">*
						</font></td><td><select name="cmbPregunta">';	
		       			
						$preguntas = $objPregunta->listaPregunta(); 	
						$tamano = sizeof($preguntas);		
		       			
						for($i=0; $i < $tamano;$i++){
							$objP = $preguntas[$i];
							
							echo '<option value="'.$objP->getID().'">'.$objP->getPregunta().'</option>';
							unset($objP);
							
						}						
										
		           		unset($objPregunta);
						unset($preguntas);
						
		       			echo '</select></td></tr>';
			   
			   			echo '<tr align="left"><td>Respuesta:  <font color="#FF0000">*</font></td>
                    	<td><input type="text" name="txtRespuesta" id="Respuesta"  maxlength="50" /></td></tr>';
               			echo '<tr align="left"><td>Contraseña:  <font color="#FF0000">*</font></td>
                     	<td><input type="password" id="contraseña" name="txtPass"  maxlength="20" /></td></tr>';
               			echo '<tr align="left"><td>Confirmar Contraseña:  <font color="#FF0000">*</font></td>
                    	<td><input type="password" id="Conf.contraseña" name="txtConfPass"  maxlength="20" /></td></tr>';
						echo '<input type="hidden" name="txtBoxy" id="boxy" value="'.
						$respuesta['resultAbonadoReturn']['boxy'].'" maxlength="15" />';
			   			echo '<input type="hidden" name="txtCedula" id="ced" value="'.$id.'" maxlength="15" /> ';
						echo '<input type="hidden" name="txtSenal" id="senal" value="'.$senal.'" maxlength="15" /> ';
               			echo '<tr align="left"><td><input type="button" value="Guardar" 
						name="btmEnviar" onclick="enviar(frmCliente)" />
                    	<input type="reset" value="Limpiar" /></td><td><b>Los campos con el caracter  
						<font color="#FF0000">*</font> SON OBLIGATORIOS</b></td></tr>';
						break;
					default:
			   			echo  '<tr align="left"><td><h1>'.$respuesta['resultAbonadoReturn']['descError'].'</h1></td></tr>';
						echo  '<tr align="left"><td><a href="Registrar.php">Intentar una vez mas</a></td></tr>';
			   			break; 	
		
				}
			}else{
				 echo  '<tr align="left"><td><h1>'.$errCli.' Problemas con nuestro servicio ofrecemos disculpas.</h1></td></tr>';
			 	echo  '<tr align="left"><td><a href="Registrar.php">Intentar una vez mas</a></td></tr>';	
			}
		}
	}
	
	function servidor_acitivo( $url ) 
    { 
        $a = explode('//',$url); 
        $b = explode('/',$a[1]); 
        $fin = explode(':',$b[0]); 
        $port = '8080'; 
        if(isset( $fin[1] ) ) 
        $port = $fin[1]; 

        $da = @fsockopen($fin[0], $port, $errno, $errstr, 5); 

        if (!$da) {
			echo "Falla en el Servidor ".$fin[0]." ".$fin[1];
            return false; 
        }else{ 
		    //echo "Activo";
            return true;
		} 
    }  
	
	
?>