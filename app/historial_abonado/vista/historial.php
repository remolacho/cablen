<?php

	session_name("loginUsuario"); 
	session_start(); 
	
	if (empty($_SESSION[´abonado´])){    	
		header("location: ../../../app/session/vista/InicioSession.php");
	}

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
	
     <link href="../../../css/datepicker.css" rel="stylesheet" type="text/css" />
     <link href="../../../css/listas.css" rel="stylesheet" type="text/css" />
     <script type="text/javascript" src="../../../js/jquery-ui-1.10.3.custom.min.js"></script>
     <script type="text/javascript" src="../../../helppers/js/filterPagos.js" ></script>
     <script type="text/javascript" src="../../../js/uidatepicker-es.js"></script>
     <script type="text/javascript" src="../../../helppers/js/paginador.js"></script>

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
                  	<div class="subItem"><a href="../../pago/vista/CargarPago.php" class="linkSubIten">
                    Cargar Pagos</a></div>
                    <div class="subItem"><a href="../../pago/vista/ListPagos.php" class="linkSubIten">
                    Visualizar Pagos</a></div>
                  <hr/>
                  <div class="item"><a href="#" class="linkItem">Consultas</a></div>
                  	<div class="subItem"><a href="../../saldo/vista/Saldo.php" class="linkSubIten"
                     onclick="construccion()">Saldo en Linea</a></div>
                    <div class="subItem"><a href="historial.php" 
                    class="linkSubIten" onclick="construccion()">Historial</a></div>
                  <hr/>
                  <div class="item"><a href="../../../helppers/cerrarSession.php" class="linkItem">Cerrar Session</a></div>
		</article>
	</div>
    <div id="contenido">
	 	<article>
		<!-- InstanceBeginEditable name="contenido" -->
        <div align="center" id="formulario">
        	<div align="center" class="frmTitulo"><h2>Historial de la Cuenta</h2></div>	
                seleccione rango de fecha
                <strong><form name="frmFiltro"  id="frmFiltro">   
                     <table border="0">
                        <tr  align="left" class="coloRowP">
                         	<td>Desde:  <font color="#FF0000">*</font></td>
                            <td><input type="text" name="txtFecha1" id="desde"  maxlength="10"
                            class="fecha" size="8" /></td>
                            <td>Hasta:  <font color="#FF0000">*</font></td>
                            <td><input type="text" name="txtFecha2" id="hasta" maxlength="10"
                            class="fecha"  size="8" /></td>
                            <td><input type="button" onclick="historial_por_abonado()" value="Filtrar" /></td>
                        </tr>
                	</table>
                    
                </form></strong>
				
                <table id="carga"></table>
                <br />
                <hr />
                <table border="0" id="tblPagos"></table> 
               <div align="center">
               		<img src="../../../img/app/banner_historial.jpg" width="70%" id="imgBanner" />  
      		   </div>
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
