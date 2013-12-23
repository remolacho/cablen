<?php

	session_name("loginAdmin"); 
	session_start(); 
	
	include_once("../../banco/controlador/Controller_listas.php");
	
	if (empty($_SESSION[´usuario´])){ 	
		header("location: ../../../admin/index.php");
	}
	
	$objBanco = new ControllerLista();

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
		<link href="../../../css/datepicker.css" rel="stylesheet" type="text/css" />
        <link href="../../../css/listas.css" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="../../../helppers/js/filterPagos.js" ></script>
        <script type="text/javascript" src="../../../helppers/js/pagos.js" ></script>
		<script type="text/javascript" src="../../../js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="../../../js/uidatepicker-es.js"></script>
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
		
        <div align="center" id="formulario">
        	<div align="center" class="frmTitulo"><h2>Filtrar Pagos</h2></div>

            	<strong><form name="frmFiltro"  id="frmFiltro">
                	<table border="0">
                        <tr  align="left" class="coloRowP">
                         	<td>Desde:  <font color="#FF0000">*</font></td>
                            <td><input type="text" name="txtFecha1" id="desde"  maxlength="10"
                            class="fecha" size="8" /></td>
                            <td>Hasta:  <font color="#FF0000">*</font></td>
                            <td><input type="text" name="txtFecha2" id="hasta" maxlength="10"
                            class="fecha"  size="8" /></td>
                        </tr>
                	</table>
                    <hr />
                    <table>
                        <tr align="left" class="coloRowP">
                        	<td><input type="radio" name="rFilter" id="abonado" value="abo"
                                onclick="valOptions(this,ban);" />Abonado</td>
                            <td><input type="radio" name="rFilter" id="ban"  value="banco"
                                onclick="valOptions(this,abonado);" />Banco</td>
                        </tr>
                        <tr align="left" class="coloRowP">
                        	<td id="colAbo"><input type="text" name="txtAbonado" value="" 
                            onKeyDown="return solo_numeros(event)" maxlength="12" size="10" id='txtAbonado'/></td>

                            <td><select id="banco" name="cmbBanco">
									<option value="0">Seleccione un Banco</option>
									<?php
										$bancos=  $objBanco->listaBanco();
										$tamano = sizeof($bancos);				
										foreach ($bancos as $indice => $banco)
											echo $banco;	
										
										 unset($objBanco);
									?>
									</select>
                            </td>
                            <td><input type="button" onclick="lista_por_procesar()" value="Filtrar" /></td>
                            <td><input type="reset"  value="Limpiar" /></td>
                        </tr>
                    </table>               
                </form></strong>
                <hr />
                <table id="carga"></table>
                <table border="0" id="tblPagos"></table> 
    	</div>	
		<form method="post" name="frmPago" action="Procesar.php">
      			  <input type="hidden" name="txtPago" />
  		</form>
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
