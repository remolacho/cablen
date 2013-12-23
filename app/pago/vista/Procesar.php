<?php

	session_name("loginAdmin"); 
	session_start(); 
	
	include_once("../../banco/controlador/Controller_listas.php");
	include_once("../../pago/controlador/Controller_consulta.php");
	
	if (empty($_SESSION[´usuario´])){ 	
		header("location: ../../../admin/index.php");
	}

	$objBanco = new ControllerLista();	
	$objControl = new Controller_Pagos();
   	
	$objPago =	$objControl->buscar($_POST["txtPago"]);
	$objCliente = $objControl->buscarPorAbonado($objPago->getCodigo_abonado());
	$nomBanco = $objControl->nombreBanco($_POST["txtPago"]);
	unset($objControl);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin.dwt" codeOutsideHTMLIsLocked="false" -->  

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::Cable Norte::</title>
<meta name="description" content="website description" />

<meta name="keywords" content="website keywords, website keywords" />

<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<link href="../../../css/perfil.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../../helppers/js/validacion_event.js"></script>	 
<script type="text/javascript" src="../../../js/jquery-1.10.1.min.js"></script>
<script type="text/javascript"></script>
<!-- InstanceBeginEditable name="script" -->
 <link href="../../../css/listas.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="../../../helppers/js/filterPagos.js" ></script>
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
                   <div class="subItem">
                     	<a href="../../../admin/usuario/vista/MisDatos.php" class="linkSubIten">Mis Datos</a>
                   </div>
                   <div class="subItem">
                     	<a href="../../../admin/historial/vista/ListaPagoProcesados.php" class="linkSubIten">Pagos Procesados</a>
                   </div>
                   <div class="subItem">
                     	<a href="../../../admin/historial/vista/ListEvent.php" class="linkSubIten">Conexiones</a>
                   </div>
                   <hr/>
                  <div class="item"><a href="#" class="linkItem">Pagos</a></div>
                     <div class="subItem">
                     	<a href="ListProcesar.php" class="linkSubIten">Por procesar</a>
                     </div>
				     <div class="subItem">
                     	<a href="ListaFiltroProcesar.php" class="linkSubIten">Filtrar y Procesar</a>
                     </div>
                  <hr/>
                  <div class="item"><a href="../../../helppers/cerrarAdminSession.php" class="linkItem">Cerrar Session</a></div>
		</article>
	</div>
    <div id="contenido">
	 	<article>
		<!-- InstanceBeginEditable name="cuerpo" -->
		
          <strong> <div align="center" id="formulario">
        	<div class="frmTitulo"><h2>Procesar Pago N#  <?php echo $objPago->getId();  ?></h2></div>
                <form name="frmPago" action="../controlador/Controller_procesar.php" method="post">
                    <table border="0">                       
                		<tr align="left" class="coloRowI">
                    		<td>Codigo Abonado:</td>
                            <td><input type="text" id="Abonado" name="txtAbonado"  
                            value= "<?php echo $objPago->getCodigo_abonado(); 	?>"  maxlength="10"
                            onKeyDown="return bloqueo(event)" /></td>
                            <td rowspan="12"><img src="../../../img/app/internet.png" width="150" height="150" /></td>
                    	</tr>
                        <tr align="left" class="colorRowP">
                            <td>Cedula: </td>
                            <td><input type="text" id="Cedula" name="txtCedula" 
                            value="<?php echo $objCliente->getCedula(); ?>"  maxlength="10"
                            onKeyDown="return bloqueo(event)" /></td>
                        </tr>
                        <tr align="left" class="coloRowI">
                    		<td>Nombre: </td>
                            <td><input type="text" id="1erNombre" name="txtNombre" 
                            value="<?php echo $objCliente->getPrimer_nombre(); ?>"  maxlength="15"
                            onKeyDown="return bloqueo(event)" /></td>
                    	</tr>                        
                        <tr align="left" class="coloRowP">
                    		<td>Apellido: </td>
                            <td><input type="text" id="1erApellido" name="txtApellido" 
                            value="<?php echo $objCliente->getPrimer_apellido(); ?>"  maxlength="15"
                            onKeyDown="return bloqueo(event)" /></td>
                    	</tr>                            
                        <tr align="left" class="coloRowI">
                    		<td>Sector: </td>
                            <td><input type="text" id="sector" name="txtSector" 
                            value="<?php echo $objCliente->getSector(); ?>"  maxlength="15"
                            onKeyDown="return bloqueo(event)" /></td>
                    	</tr> 
                        <tr align="left" class="colorRowP">
                    		<td>Banco: </td>
                            <td><select id="banco" name="cmbBanco" onchange="cargarCuenta()">
									<option value='<?php echo $objPago->getId_banco();?>'>
										<?php echo $nomBanco; ?>
                                    </option>	
								</select>
                            </td>
                    	</tr>
                       	<tr align="left" class="coloRowI">
                            <td>10 Ult.Digs.Cuenta: </td><td>
                            <input type="text" name="txtCuenta" 
                            value="<?php echo $objPago->getOcteto(); ?>"  maxlength="15"
                            onKeyDown="return bloqueo(event)" /></td>
                        </tr>
                        <tr align="left" class="colorRowP">
                         	<td>N° Deposito: </td>
                            <td><input type="text" name="txtDeposito" id="depo" 
                            value="<?php echo $objPago->getNum_deposito(); ?>" 
                            onKeyDown="return bloqueo(event)"
                            maxlength="30" /></td>
                        </tr>
                        <tr align="left" class="coloRowI">
                         	<td>Monto: </td>
                            <td><input type="text" name="txtMonto" id="monto" 
                            value="<?php echo $objPago->getMonto(); ?>" 
                            onKeyDown="return bloqueo(event)"
                            maxlength="30" /></td>
                        </tr>
                        <tr align="left" class="colorRowP">
                         	<td>Fecha Deposito: </td>
                                <td><input type="text" name="txtFecha" id="fecha" 
                                value="<?php echo $objPago->getFecha_deposito();  ?>" maxlength="10" 
                                class="fecha" onKeyDown="return bloqueo(event)"/>
                                </td>
                        </tr>
                        <tr align="left" class="coloRowI">
                        	<td>Estatus:  <font color="#FF0000">*</font></td>
                            <td><select id="estatus" name="cmbEstatus" onchange="cargarCuenta()">
                                    <option value=1><font color="#009933">Procesado</font></option>	
                                    <option value=2><font color="#FF0000">Error</font></option>	
								</select>
                            </td>
                        </tr>
                        <tr align="left" class="colorRowP">
                            <td>Comentario:</td>
                            <td><textarea name="comentario" id="comentario" cols="30" rows="3" ></textarea></td>
                            <td id="numero"></td>
                        </tr>
                        <?php 
							if($objPago->getImg_pago() != ""){
								echo '<tr><td>';
								echo '<a href="'.$objPago->getImg_pago().'">Visualizar Comprobante</a></td></tr>';
							}
						?>
                	</table> 
                    <table class="coloRowP">
                    	<tr align="left">
                            <input type="hidden" name="txtId" value="<?php echo $_POST["txtPago"] ?>"/>
                        	<td><input type="button" value="Procesar" name="btmEnviar"
                            onclick="procesarPago(frmPago)" /></td>
                        </tr>
                    </table>    
                    <input type="hidden" name="txtCorreo" value="<?php echo $objCliente->getCorreo();?>" id="correo" />
                    <input type="hidden" name="txtId" value="<?php echo $objPago->getId(); ?>" id="id" />
					<input type="hidden" name="txtBO" value="<?php echo $objPago->getBancoOrigen();unset($objPago);?>" id="id" />
                </form>
		  </div></strong>
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
