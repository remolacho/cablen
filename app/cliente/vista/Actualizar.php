<?php

	session_name("loginUsuario"); 
	session_start(); 
      
    if (empty($_SESSION[´abonado´])){    	
		header("location: ../../session/vista/InicioSession.php");
	}
	
	include_once("../controlador/Controller_consultas.php");
	include_once("../../session/controlador/Controller_lista.php");

	$objPregunta = new Controller_Lista();  
	$objContolCli  = new ControllerConsultas();
	$objCliente = $objContolCli->buscarCliente();
	$objPre = $objContolCli->buscarPregunta();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/perfil.dwt" codeOutsideHTMLIsLocked="false" -->

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>::Cable Norte::</title>

<meta name="description" content="website description" />

<meta name="keywords" content="website keywords, website keywords" />

<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<link href="../../../css/perfil.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../../helppers/js/validacion_event.js"></script>	 
<script type="text/javascript" src="../../../js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(   
 	function() {
		$("#infoC").hide();//css("display", "none");
  });
  
  function construccion() {
	  $("#infoC").show();
  	  $("#formulario").hide();
  }
</script>
<!-- InstanceBeginEditable name="scripts" -->
<script type="text/javascript" src="../../../helppers/js/cliente.js"></script>
<link href="../../../css/listas.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->

</head>

<body>
<div id="cuerpoTotal">
<div id="cabecera">
    <img src="../../../img/main/banner.jpg" width="100%" height="118"/>	
    <div class="redesSociales"><a href="https://twitter.com/cablenortetv"><img src="../../../img/main/logo2twitter.png"></a> 
    </div> 
    <div class="redesSociales"><img src="../../../img/main/facebook_logo1.png" /></div>
	<div id="limpiar"></div>
</div>
<div id="perfil">Bienvenido: <?php echo $_SESSION[´nombre´]." ".$_SESSION[´apellido´]; ?>  </div>
<div id="contenedor">
	<div id="menuLeft">
	 	<article>

                  <div class="item"><a href="#" class="linkItem">Mi Cuenta</a></div>
				      <div class="subItem"><a href="MisDatos.php" class="linkSubIten"
                      >Mis Datos</a></div>
				      <div class="subItem">
                      	<a href="Actualizar.php" class="linkSubIten">Actualizar Datos</a></div>
				      <div></div>
                      <div class="subItem">
                      	<a href="CambioClave.php" class="linkSubIten">Cambio de Clave</a></div>
				      <div></div>
                  <hr/>
                  <div class="item"><a href="#" class="linkItem">Pagos en linea</a></div>                
                  	<div class="subItem"><a href="../../pago/vista/CargarPago.php" class="linkSubIten">
                    Cargar Pagos</a></div>
                    <div class="subItem"><a href="../../pago/vista/ListPagos.php" class="linkSubIten">
                    Visualizar Pagos</a></div>
                  <hr/>
                  <div class="item"><a href="#" class="linkItem">Consultas</a></div>
                  	<div class="subItem"><a href="../../saldo/vista/Saldo.php" class="linkSubIten"
                     onclick="construccion()">Saldo en Linea</a></div>
                    <div class="subItem"><a href="../../historial_abonado/vista/historial.php" 
                    class="linkSubIten" onclick="construccion()">Historial</a></div>
                  <hr/>
                  <div class="item"><a href="../../../helppers/cerrarSession.php" class="linkItem">Cerrar Session</a></div>
		</article>
	</div>
    <div id="contenido">
	 	<article>
		<!-- InstanceBeginEditable name="contenido" -->  
        <div align="center" id="formulario">
        	<div align="center" class="frmTitulo"><h2>Actualizar sus Datos</h2></div>
            	<strong><form name="frmCliente" action="../controlador/Controller_actualizar.php" method="post">
                	<table border="0">
                        <tr align="left" class="coloRowI">
                    		<td>Codigo Abonado: <font color="#FF0000">*</font></td>
                            <td><input type="text" id="Abonado" name="txtAbonado"  
                            value="<?php echo $objCliente->getCodigo_abononado(); ?>"  maxlength="11"
                            onKeyDown="return bloqueo(event)"/></td>
                            <td rowspan="12"><img src="../../../img/app/internet.png" width="150" height="150" /></td>
                    	</tr>
                        <tr  align="left" class="coloRowP">
                    		<td>Primer Nombre:  <font color="#FF0000">*</font></td>
                            <td><input type="text" id="1erNombre" name="txtNombreP" 
                            value="<?php echo $objCliente->getPrimer_nombre(); ?>"  maxlength="15" /></td>
                    	</tr>
                        <tr  align="left" class="coloRowI">
                        	<td>Segundo Nombre:</td><td><input type="text" name="txtNombreS" 
                            value="<?php echo $objCliente->getSegundo_nombre(); ?>"  maxlength="15" /></td></tr>
                        <tr  align="left" class="coloRowP">
                    		<td>Primer Apellido:  <font color="#FF0000">*</font></td>
                            <td><input type="text" id="1erApellido" name="txtApellidoP" 
                            value="<?php echo $objCliente->getPrimer_apellido(); ?>"  maxlength="15" /></td>
                    	</tr>
                        <tr  align="left" class="coloRowI">
                            <td>Segundo Apellido:</td><td><input type="text" name="txtApellidoS" 
                            value="<?php echo $objCliente->getSegundo_apellido(); ?>"  maxlength="15" /></td>
                        </tr>
                        <tr  align="left" class="coloRowP">
                    		<td>Telefono Fijo:</td><td><input type="text" name="txtTelefonoF" 
                            value="<?php echo $objCliente->getTelefono_fijo(); ?>"  maxlength="11"
                            onKeyDown="return solo_numeros(event)" /></td>
                    	</tr>
                        <tr  align="left" class="coloRowI">
                           <td>Telefono Movil: <font color="#FF0000">*</font>
                           </td><td><input type="text" id="Telefono_Movil" name="txtTelefonoM" 
                           value="<?php echo $objCliente->getTelefono_movil(); ?>"  maxlength="11"
                           onKeyDown="return solo_numeros(event)" /></td>
                        </tr>
                        <tr  align="left" class="coloRowP">
                         <td>Correo: <font color="#FF0000">*</font></td><td><input type="text"  id="Correo"
                         name="txtCorreo" value="<?php echo $objCliente->getCorreo(); ?>"  maxlength="30" /></td>
                        </tr>
                        <tr  align="left" class="coloRowI">
                    		<td> Sector: <font color="#FF0000">*</font></td>
                            <td><input type="text" id="sector" name="txtSector"  
                            value="<?php echo $objCliente->getSector(); ?>"  maxlength="30"
                            onKeyDown="return bloqueo(event)"/></td>
                    	</tr>
                       	<tr  align="left" class="coloRowP">
                            <td>Pregunta Secreta:  <font color="#FF0000">*</font></td>
                            <td><select name="cmbPregunta">
									<?php
									
										echo '<option value="'.$objPre->getID().'">'.$objPre->getPregunta().'</option>';				
										
										$preguntas = $objPregunta->listaPregunta(); 	
										$tamano = sizeof($preguntas);		
		       			
										for($i=0; $i < $tamano;$i++){
											$objP = $preguntas[$i];
							
											echo '<option value="'.$objP->getID().'">'.$objP->getPregunta().'</option>';
											unset($objP);
							
										}						
										unset($objPre);
		           						unset($objPregunta);
										unset($preguntas);
										
									?>
							</select></td>
                        </tr>
                        <tr  align="left" class="coloRowI">
                         	<td>Respuesta:  <font color="#FF0000">*</font></td>
                            <td><input type="text" name="txtRespuesta" id="Respuesta" 
                            value="<?php echo $objCliente->getRespuesta();?>"  maxlength="50" /></td>
                        </tr>
                        <tr  align="left" class="coloRowP">
                        	<td><input type="button" value="Actualizar" name="btmEnviar" onclick="enviar(frmCliente)" />
                            <input type="reset" value="Limpiar" /></td>
                            <td><b>Los campos con el <font color="#FF0000">*</font> SON OBLIGATORIOS</b></td>
                        </tr>
                	</table>  
                        <input type="hidden" id="Cedula" name="txtCedula" 
                        value="<?php echo $objCliente->getCedula();  unset($objCliente);?>" />         
                </form></strong>
    		</div>	
	<!-- InstanceEndEditable -->	
		</article>
	</div>
	<div id="limpiar"></section>
</div>
<div id="pie">
	<footer>Todos los derechos reservados | Cable Norte C.A RIF J-31216176-0 | Telf. 0501-6678300 
      | Correo contacto@cablenorte.net
    </footer>
</div>
</div>
</body>
<!-- InstanceEnd --></html>
