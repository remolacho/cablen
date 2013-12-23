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
   	
	$objHist = $objControl->historial($_POST["txtPago"]);
	$objPago =	$objControl->buscar($objHist->getIdPago());
	$objCliente = $objControl->buscarPorAbonado($objPago->getCodigo_abonado());
	$nomBanco = $objControl->nombreBanco($objHist->getIdPago());

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
        	<div class="frmTitulo"><h2>Pago N#  <?php echo $objPago->getId();  ?></h2></div>
                    <table border="0">                       
                		<tr align="left" class="coloRowI">
                    		<td width="200">Codigo Abonado:</td>
                            <td width="200"><?php echo $objPago->getCodigo_abonado(); ?></td>
                            <td rowspan="12"><img src="../../../img/app/internet.png" width="150" height="150" /></td>
                    	</tr>
                        <tr align="left" class="colorRowP">
                            <td>Cedula: </td>
                            <td><?php echo $objCliente->getCedula(); ?></td>
                        </tr>
                        <tr align="left" class="coloRowI">
                    		<td>Nombre: </td>
                            <td><?php echo $objCliente->getPrimer_nombre(); ?></td>
                    	</tr>                        
                        <tr align="left" class="coloRowP">
                    		<td>Apellido: </td>
                            <td><?php echo $objCliente->getPrimer_apellido(); ?></td>
                    	</tr>                            
                        <tr align="left" class="coloRowI">
                    		<td>Sector: </td>
                            <td><?php echo $objCliente->getSector(); ?></td>
                    	</tr> 
                        <tr align="left" class="colorRowP">
                    		<td>Banco: </td>
                            <td><?php echo $nomBanco; ?></td>
                    	</tr>
                       	<tr align="left" class="coloRowI">
                            <td>10 Ult.Digs.Cuenta: </td>
                            <td><?php echo $objPago->getOcteto(); ?></td>
                        </tr>
                        <tr align="left" class="colorRowP">
                         	<td>N° Deposito: </td>
                            <td><?php echo $objPago->getNum_deposito(); ?></td>
                        </tr>
                        <tr align="left" class="coloRowI">
                         	<td>Monto: </td>
                            <td><?php echo $objPago->getMonto(); ?></td>
                        </tr>
                        <tr align="left" class="colorRowP">
                         	<td>Fecha Deposito: </td>
                                <td><?php echo $objPago->getFecha_deposito();  ?></td>
                        </tr>
                        <tr align="left" class="coloRowI">
                        	<td>Estatus:</td>
                            <td><?php echo $objHist->getEstatus(); ?></td>
                        </tr>
                        <tr align="left" class="coloRowP">
                        	<td>Observacion:</td>
                            <td><textarea onKeyDown="return bloqueo(event)" cols="30" rows="3" >
                             <?php 		
							 	echo $objHist->getObservacion(); 	
							 ?>
                            </textarea></td>
                        </tr>
                        <?php 
							if($objPago->getImg_pago() != ""){
								echo '<tr><td>';
								echo '<a href="'.$objPago->getImg_pago().'">Visualizar Comprobante</a></td></tr>';
								unset($objControl);
								unset($objHist); 
								unset($objPago);
								unset($objCliente);
							}
						?>
                	</table> 
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
