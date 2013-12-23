<?php

	session_name("loginAdmin"); 
	session_start(); 

	include_once ("../controlador/Controller_consultas.php");

	if (empty($_SESSION[´usuario´])){ 	
		header("location: ../../index.php");
	}
	
	$objCtlUser = new Controller_consultas();
	$objUser  = $objCtlUser->buscarUser();

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
                     	<a href="MisDatos.php" class="linkSubIten">Mis Datos</a>
                   </div>
                   <div class="subItem">
                     	<a href="../../historial/vista/ListaPagoProcesados.php" class="linkSubIten">Pagos Procesados</a>
                   </div>
                   <div class="subItem">
                     	<a href="../../historial/vista/ListEvent.php" class="linkSubIten">Conexiones</a>
                   </div>
                   <hr/>
                  <div class="item"><a href="#" class="linkItem">Pagos</a></div>
                     <div class="subItem">
                     	<a href="../../../app/pago/vista/ListProcesar.php" class="linkSubIten">Por procesar</a>
                     </div>
				     <div class="subItem">
                     	<a href="../../../app/pago/vista/ListaFiltroProcesar.php" class="linkSubIten">Filtrar y Procesar</a>
                     </div>
                  <hr/>
                  <div class="item"><a href="../../../helppers/cerrarAdminSession.php" class="linkItem">Cerrar Session</a></div>
		</article>
	</div>
    <div id="contenido">
	 	<article>
		<!-- InstanceBeginEditable name="cuerpo" -->
		
          <div align="center" id="formulario">
        		<div align="center" class="frmTitulo"><h2>Mis Datos</h2></div>
            	<strong>
                	<table border="0">
                        <tr align="left"  class="coloRowI">
                    		<td width="150">Id: </td>
                            <td width="300"><?php echo $objUser->getId(); ?></td>
                            <td rowspan="8"><img src="../../../img/app/internet.png" width="150" height="150" /></td>
                    	</tr>
                        <tr  align="left" class="coloRowP">
                    		<td>Cedula:</td>
                            <td><?php echo $objUser->getCedula();  ?></td>
                    	</tr>
                        <tr  align="left"  class="coloRowI">
                        	<td>Nombre:</td>
                            <td><?php  echo $objUser->getNombre(); ?></td>
                        </tr>
                        <tr  align="left" class="coloRowP">
                    		<td>Apellido:</td>
                            <td><?php echo $objUser->getApellido(); ?></td>
                    	</tr>
                        <tr  align="left" class="coloRowI">
                    		<td>Telefono:</td>
                            <td><?php  echo $objUser->getTelefono(); ?></td>
                    	</tr>
                        <tr  align="left" class="coloRowP">
                         <td>Correo:</td>
                         <td><?php echo $objUser->getCorreo(); ?> </td>
                        </tr>
                        <tr  align="left" class="coloRowI">
                    	  <td> Privilegio:</td>
                          <td><?php echo $objUser->getPrivilegio(); ?></td>
                    	</tr>
                       	<tr  align="left" class="coloRowP">
                          <td>Estatus:</td>
                          <td><?php echo $objUser->getEstatus(); 	unset($objCtlUser);
									unset($objUser);?></td>
                        </tr>                     
                	</table> </strong> 
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
