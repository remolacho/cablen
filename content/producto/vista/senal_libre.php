<?php
	include_once ("../../../content/producto/controlador/Controller_consultas.php");
	
	$objCtl = new Controller_consultas();
	$listaSenal =  $objCtl->listaSenales();
	$listCiudades = $objCtl->listaCiudades();
	
	$tamSenal = sizeof($listaSenal);
	$tamCiudad =  sizeof($listCiudades);
	
	unset($objCtl);
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
 
   <div class="itemTop"><a href="../../oficina/vista/index.php" class="linkItemTop">Nuestras Oficinas</a></div>

   <div class="itemTop"><a href="../../pregunta_frecuente/vista/index.php" class="linkItemTop">Preguntas</a></div>

   <div class="itemTop"><a href="../../../somos.html" class="linkItemTop">Quienes Somos</a></div>

   <div class="itemTop"><a href="../../../index.php" class="linkItemTop" >Inicio </a></div> 
   <div class="clear"></div> 
</div>
<!-- InstanceBeginEditable name="script" -->

    <link rel="stylesheet" href="../../../css/content.css" />
    <link rel="stylesheet" type="text/css" href="../../../css/frmVistas.css"/>
    <link href="../../../css/listas.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../../../helppers/js/filtrarSenal.js"></script>
    <script type="text/javascript" src="../../../helppers/js/paginador.js"></script>

<!-- InstanceEndEditable -->
<div id="cabecera">
  <img src="../../../img/main/banner.jpg" width="100%" height="118"/>	
  <div class="redesSociales"><a href="https://twitter.com/cablenortetv"><img src="../../../img/main/logo2twitter.png"></a> 
  </div> 
  <div class="redesSociales"><img src="../../../img/main/facebook_logo1.png" /></div>
  <div class="clear"></div>
  <!-- InstanceBeginEditable name="informacion" --><!-- InstanceEndEditable -->
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
         	<div align="center" id="cabeceraInformativa"><img src="../../../img/senal/senallibre.jpg" width="100%" /></div>
			<br />

             <div>Tipo de Señal:<select id="senal" onchange="">
                	<?php
                    
						for($i=0;$i<$tamSenal;$i++){
						    $objSenal = $listaSenal[$i];
							
							if ($objSenal->getIdSenal() == 1000)
								echo '<option value='.$objSenal->getIdSenal().'>'.$objSenal->getSenal().'</option>';
							
							unset($objSenal);
						}
						unset($listaSenal);
					?>
                </select>
                
                Ciudad:<select id="ciudad" onchange="">
                	<?php
                    
						for($i=0;$i<$tamCiudad;$i++){
						    $objCiudad = $listCiudades[$i];
							echo '<option value='.$objCiudad->getId().'>'.$objCiudad->getCiudad().'</option>';
							unset($objCiudad);
						}
						unset($listCiudades);
					?>
                  </select>
                  <input type="button" name="btmBuscar" value="Buscar" onclick="cargarGrilla()" />
            </div>
            
            <br />
            <div id='carga' align="center"></div>
            <div id='formulario' align="center" class="sombraClara"></div>
            
            
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