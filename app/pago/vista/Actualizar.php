<?php

	session_name("loginUsuario"); 
	session_start(); 
	
	include_once("../../banco/controlador/Controller_listas.php");
	include_once("../../pago/controlador/Controller_consulta.php");
	/*include_once("../../pago/modelo/Pago.php");*/

	
	if (empty($_SESSION[´abonado´])){    	
		header("location: ../../session/vista/InicioSession.php");
	}
	
    $objBanco = new ControllerLista();	
	$objControl = new Controller_Pagos();	
	$objPago =	$objControl->buscar($_POST["txtPago"]);
	$nomBanco = $objControl->nombreBanco($_POST["txtPago"]);
	$nomBancoOrigen = $objControl->nombreBancoOrigen($_POST["txtPago"]);
	//echo $objPago->getObservacion();
	unset($objControl);

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
        <link href="../../../css/listas.css" rel="stylesheet" type="text/css" />
		<link href="../../../css/datepicker.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="../../../js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="../../../js/uidatepicker-es.js"></script>
		<script type="text/javascript" src="../../../helppers/js/pagos.js" ></script>
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
				      <div class="subItem"><a href="../../cliente/vista/MisDatos.php" class="linkSubIten"
                      >Mis Datos</a></div>
				      <div class="subItem">
                      	<a href="../../cliente/vista/Actualizar.php" class="linkSubIten">Actualizar Datos</a></div>
				      <div></div>
                      <div class="subItem">
                      	<a href="../../cliente/vista/CambioClave.php" class="linkSubIten">Cambio de Clave</a></div>
				      <div></div>
                  <hr/>
                  <div class="item"><a href="#" class="linkItem">Pagos en linea</a></div>                
                  	<div class="subItem"><a href="CargarPago.php" class="linkSubIten">
                    Cargar Pagos</a></div>
                    <div class="subItem"><a href="ListPagos.php" class="linkSubIten">
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
		
       <strong> <div align="center" id="formulario">
        	<div class="frmTitulo"><h2>Actualizar Pago</h2></div>
            <?php	

						echo "<div>".$objPago->getEstatus()."</div>";
						echo "</br><div class='divError' id='error'>".$objPago->getObservacion()."</div>";

			 ?>
            	<form name="frmPago" action="../controlador/Controller_actualizar.php" method="post">
                    <table border="0">                       
                		<tr align="left" class="coloRowI">
                    		<td>Codigo Abonado:</td>
                            <td><input type="text" id="Abonado" name="txtAbonado"  
                            value= "<?php echo $_SESSION[´abonado´];  ?>"  maxlength="10"
                            onKeyDown="return bloqueo(event)" /></td>
                            <td rowspan="11"><img src="../../../img/app/internet.png" width="150" height="150" /></td>
                    	</tr>
                        <tr align="left" class="colorRowP">
                            <td>Cedula: </td>
                            <td><input type="text" id="Cedula" name="txtCedula" 
                            value="<?php echo $_SESSION[´cedula´];  ?>"  maxlength="10"
                            onKeyDown="return bloqueo(event)" /></td>
                        </tr>
                        <tr align="left" class="coloRowI">
                    		<td>Nombre: </td>
                            <td><input type="text" id="1erNombre" name="txtNombre" 
                            value="<?php echo $_SESSION[´nombre´];  ?>"  maxlength="15"
                            onKeyDown="return bloqueo(event)" /></td>
                    	</tr>
                        <tr align="left" class="colorRowP">
                        	<td>Apellido:</td><td><input type="text" name="txtApellido" 
                            value="<?php echo $_SESSION[´apellido´];  ?>"  maxlength="15"
                            onKeyDown="return bloqueo(event)" /></td></tr>
                    	</tr>
                        
                        
                        <tr  align="left" class="coloRowI">
                    		<td>Banco de Origen:  <font color="#FF0000">*</font></td>
                            <td><select id="bOrigen" name="cmbBancoOrigen">
									<option value='<?php echo $objPago->getBancoOrigen();?>'>
                                    	<?php echo $nomBancoOrigen; ?>
                                    </option>
									<?php	
										$bancos=  $objBanco->listaBanco();
										$tamano = sizeof($bancos);	
										foreach ($bancos as $indice => $banco)
											echo $banco;	
										
									?>
									</select>
                            </td>
                    	</tr>
                        
                        
                        
                        <tr align="left" class="coloRowP">
                    		<td>Banco de Destino:  <font color="#FF0000">*</font></td>
                            <td><select id="banco" name="cmbBanco" onchange="cargarCuenta()">
									<option value='<?php echo $objPago->getId_banco();?>'>
										<?php echo $nomBanco; ?>
                                    </option>
									<?php
			
										foreach ($bancos as $indice => $banco)
											echo $banco;	
										 unset($objBanco);											

									?>
									</select>
                            </td>
                    	</tr>
                        
                        
                       <tr align="left" class="coloRowI">
                            <td>10 Ult.Digs.Cuenta: <font color="#FF0000">*</font></td><td>
                            <select id="cuenta" name="cmbCuenta">
									<option><?php echo $objPago->getOcteto(); ?></option>
							</select></td>
                        </tr>
                        
                        <tr align="left" class="coloRowP">
                         	<td>N° Deposito:  <font color="#FF0000">*</font></td>
                            <td><input type="text" name="txtDeposito" id="depo" 
                            value="<?php echo $objPago->getNum_deposito(); ?>" 
                            onKeyDown="return solo_numeros(event)"
                            maxlength="30" /></td>
                        </tr>
                        <tr  align="left" class="coloRowI">
                         	<td>Monto:  <font color="#FF0000">*</font></td>
                            <td><input type="text" name="txtMonto" id="monto" 
                            value="<?php echo $objPago->getMonto(); ?>"  onKeyDown="return solo_montos(event)"
                            maxlength="30" /></td>
                        </tr>
                        <tr align="left" class="coloRowP">
                         	<td>Fecha Deposito:  <font color="#FF0000">*</font></td>
                                <td><input type="text" name="txtFecha" id="fecha" 
                                value="<?php echo $objPago->getFecha_deposito(); unset($objPago); ?>" maxlength="10" 
                                class="fecha"/>
                                </td>
                        </tr>
                        <tr align="left">
                            <input type="hidden" name="txtId" value="<?php echo $_POST["txtPago"] ?>"/>
                        	<td><input type="button" value="Actualizar" name="btmEnviar"
                            onclick="enviarPago(frmPago)" />
                            <input type="reset" value="Limpiar" /></td>
                            <td><b>Los campos con el  <font color="#FF0000">*
                            </font> SON OBLIGATORIOS</b></td>
                        </tr>
                	</table>                
                </form>
    	</div>	</strong>
    
		
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
