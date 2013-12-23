<?php

	session_name("loginAdmin"); 
	session_start(); 
	
	include_once("../controlador/Controller_consulta.php");
	 
	if (empty($_SESSION[´usuario´])){ 	
		header("location: ../../../admin/index.php");
	}
	
	$objPagoConsulta = new Controller_Pagos();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><!-- #BeginTemplate "/Templates/admin.dwt" --><!-- DW6 -->  

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
<!-- #BeginEditable "script" -->
	 <script type="text/javascript" src="../../../helppers/js/pagos.js" ></script>
     <link href="../../../css/listas.css" rel="stylesheet" type="text/css" />
<!-- #EndEditable -->
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
		<!-- #BeginEditable "cuerpo" -->
		
		<div align="center" id="formulario">
        	<div align="center" class="frmTitulo"><h2>Pagos por Procesar</h2></div>
            <table border="0">
                <tr class="tituloLitas" align="center">
                    	<td><b>ID</b></td>
                        <td º><b>Banco</b></td>
                        <td><b>N° Deposito</b></td>
                        <td><b>Monto</b></td>
                        <td><b>F.Pago</b></td>
                        <td><b>F.Registro</b></td>
                        <td><b>F.Modificado</b></td>
                        <td><b>Estado</b></td>
                 </tr>
                 <?php 
					
						$pagos = $objPagoConsulta->listaByProcces();
					    $tamano = sizeof($pagos);				
						if ($tamano > 0){
							foreach ($pagos as $indice => $pago)
								echo $pago;	
						}				
						unset($objPagoConsulta);
			     ?>
            </table>
        </div>	
		<form method="post" name="frmPago" action="Procesar.php">
      			  <input type="hidden" name="txtPago" />
  		</form>
		<!-- #EndEditable -->
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
<!-- #EndTemplate --></html>
