<?php

	include_once ("../../../content/oficina/controlador/Controller_Consulta.php");
	
	/*include_once("../../../content/estado/controlador/Controller_Listas.php");*/
	
	$objCtlOficina = new Controllar_ConsultaOficina();
	$objOficina = $objCtlOficina->principal();
	$listaEstados = $objCtlOficina->listaEstados();
	$cantidad = sizeof($listaEstados);
	/*echo $cantidad;*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>::Cable Norte::</title>
<!-- InstanceEndEditable -->
<meta name="description" content="website description" />
<meta name="keywords" content="website keywords, website keywords" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../../../css/main.css" />
<link rel="stylesheet" href="../../../css/jquery.superbox.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../../../css/index.css" />
<link rel="stylesheet" type="text/css" href="../../../css/highlight.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bannerLateral.css" />
<script type="text/javascript" src="../../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../../js/jquery.superbox-min.js"></script>
<script type="text/javascript" src="../../../helppers/js/validacion_event.js"></script>
<script type="text/javascript" src="../../../helppers/js/main.js"></script>
<script src="../../../js/cufon-yui.js" type="text/javascript"></script>
<script src="../../../js/Bebas_400.font.js" type="text/javascript"></script>
<script type="text/javascript" src="../../../js/jquery.easing.1.3.js"></script>
<script src="../../../js/jquery.transform-0.8.0.min.js"></script>
<script src="../../../js/jquery.banner.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){	 	
			$.superbox();
			
			$('#ca_banner2').banner({
					steps : [
						[
							//1 step:
							[{"to" : "2"}, {"effect": "slideOutTop-slideInTop"}],
							[{"to" : "2"}, {"effect": "slideOutTop-slideInTop"}]
						],
						[
							//2 step:
							[{"to" : "1"}, {"effect": "slideOutRight-slideInRight"}],
							[{"to" : "1"}, {"effect": "slideOutLeft-slideInLeft"}],
						],
						[
							//3 step:
							[{"to" : "2"}, {"effect": "slideOutLeft-slideInLeft"}],
							[{"to" : "2"}, {"effect": "slideOutRight-slideInRight"}]
						],
						[
							//4 step:
							[{"to" : "1"}, {"effect":"zoomOutRotated-zoomInRotated"}],
							[{"to" : "1"}, {"effect": "zoomOutRotated-zoomInRotated"}],
						]
					],
					total_steps	: 4,
					speed 		: 10000
				});
			
			
	});
	
	
</script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>
<body>
<div id="cuerpoTotal">
<div id="menuTop">
   <div class="itemTop">
  	 <a href="../../../contacto.html" class="linkItemTop" rel="superbox[iframe][700x500]">Contactanos</a>
   </div>
 
   <div class="itemTop"><a href="index.php" class="linkItemTop">Nuestras Oficinas</a></div>

   <div class="itemTop"><a href="../../pregunta_frecuente/vista/index.php" class="linkItemTop">Preguntas</a></div>

   <div class="itemTop"><a href="../../../somos.html" class="linkItemTop">Quienes Somos</a></div>

   <div class="itemTop"><a href="../../../index.php" class="linkItemTop" >Inicio </a></div> 
   <div class="clear"></div> 
</div>
<!-- InstanceBeginEditable name="script" -->
	<link rel="stylesheet" type="text/css"  href="../../../css/content.css" />
	<script src="../../../helppers/js/oficinas.js" type="text/jscript"></script>
<!-- InstanceEndEditable -->
<div id="cabecera">
  <img src="../../../img/main/banner.jpg" width="100%" height="118"/>	
  <div class="redesSociales"><a href="https://twitter.com/cablenortetv"><img src="../../../img/main/logo2twitter.png"></a> 
  </div> 
  <div class="redesSociales"><img src="../../../img/main/facebook_logo1.png" /></div>
  <div class="clear"></div>
  <!-- InstanceBeginEditable name="informacion" -->
  
  
  <!-- InstanceEndEditable -->
</div>
<div id="contenedor">
   <br />
   <div id="menuRight">
   		<div id="banner" class="sombraClara"><img src="../../../img/main/bannerItem2.jpg" width="100%"/> </div>
   		<br />
        <div><a href="../../../app/index.php" class="linkItemL"><img id="cnLinea" src="../../../img/main/online.png"/></a></div>    
        <br /> 
        <div class="sombraClara">
		<div id="ca_banner2" class="ca_banner ca_banner2">
				<div class="ca_slide ca_bg2">                 
					<div class="ca_zone ca_zone1"><!--Product Top-->
						<div class="ca_wrap ca_wrap1">
							<a href="../../../app/cliente/vista/Registrar.php">
                            <img src="../../../img/bannerLateral/smallProduct2.png"  alt=""/></a>
                            <img src="../../../img/bannerLateral/smallProduct4.png" alt="" style="display:none;"/>
						</div>
					</div>
					<div class="ca_zone ca_zone2"><!--Product Middle-->
						<div class="ca_wrap ca_wrap2">
                            <a href="../../pregunta_frecuente/vista/index.php">
							<img src="../../../img/bannerLateral/smallProduct1.png" alt=""/></a>                          
							<img src="../../../img/bannerLateral/smallProduct3.png" alt="" style="display:none;"/>
						</div>
					</div>
				</div> 
		</div>
      </div>
   </div>
   		<!-- InstanceBeginEditable name="Informacion" -->
		
		   <div class="seccionBorde">
            <div align="center"><img src="../../../img/oficina/banner_oficina.jpg" width="100%" /></div>
			<br />
            <?php
				
					echo '<div id="OficinaP">';
					echo '<div class="titulo" align="center"><h2>'.utf8_encode($objOficina->getNombre()).'</h2></div>';
					echo '<div class="fondoContent"><b>Direccion:</b> '.utf8_encode($objOficina->getDireccion()).'</div>';
					echo '<div class="fondoContent"><b>Atencion al Cliente:</b> '
					     .utf8_encode($objOficina->getTelefonoF()).
					     '</div>';
					echo '<div class="fondoContent"><b>Atencion al Cliente:</b> '.
						  utf8_encode($objOficina->getTelefonoM()).
						 '</div>';
					echo '<div class="fondoContent"><b><font color="#036">'.
						 utf8_encode($objOficina->getHorarioN()).
					     '</font></b></div>';
					echo '<div class="fondoContent"><b><font color="#036">'.
						 utf8_encode($objOficina->getHorarioF()).
					     '</font></b></div>';
					echo '<div class="fondoContent"><b>E-Mail:</b> '.utf8_encode($objOficina->getCorreo()).'</div>';
					echo '<div class="fondoContent"><b>Puedes Cancelar Con: </b></div>';
					echo '<div  class="fondoContent"><img src="'.
						 $objOficina->getImagen().'" width="100" /></div>';
					echo '</div>';
					
					echo '<br/>';
					
					echo '<div class="fondoContent">Estados: <select id="estado" onchange="cargarCiudad()">
						 <option value="">Seleccione un estado</option>';
					
					for($i=0;$i<$cantidad;$i++){
						$objEstado = $listaEstados[$i];
						echo '<option value='.$objEstado->getId().'>'.$objEstado->getEstado().'</option>';
						unset($objEstado);
					}
					
					unset($objCtlOficina);
					unset($objOficina);
					unset($listaEstados);
					
					echo '</select>';
			?>
      
            	Ciudad:<select id="ciudad" onchange="cargarListaOficina()">
                	<option value="">Esperando....</option>
                </select>
            </div>
            <br />
			<div id="listOficce"></div>
            <div id='oficina'></div>
            </div>
            
		    <div class="seccionBorde">
                <div class="itemLargo">
         		   <div class="titulo"><a href="#info2" class="linkItemL">Como cargar tus pagos</a></div>
                   <div class="subItem" id="info2">
           		   <ul>                     
				   <strong><p>Tomar los siguientes datos y registrarlos en tu cuenta Bancaria</p>
                        <li>Rif J-31216176-0</li>
                        <li>Nombre Cable Norte C.A.</li> 
                        <li>Cuenta Corriente</li>           
						<li>contacto@cablenorte.net</li>
				<p>una vez registrada y hecha la transacción
				puede dirigirse a la sección Cable Norte en Linea en el menú lateral derecho
		    	deberas registrarte, una vez registrado inicias session dando click nuevamente en 
            	Cable Norte en Linea accederas a tu cuenta donde podras cargar tu pago una vez hecho 
            	el pago recibirás un correo que confirmara tu transaccion. Es muy fácil!!!  0 colas 0 estrés.
                </p></strong>
            	   </ul>
        		   </div> 
               </div>
        </div>
		<!-- InstanceEndEditable -->    	
   <div class="clear">
   </div>
</div>
<div id="pie">
   	<footer>Todos los derechos reservados | Cable Norte C.A RIF J-31216176-0 | Telf. 0501-6678300 
      | Correo contacto@cablenorte.net
    </footer>
</div>
</div>
</body>
<!-- InstanceEnd --></html>