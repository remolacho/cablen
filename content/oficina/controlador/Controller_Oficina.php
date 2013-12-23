<?php

	include_once("../../../content/oficina/modelo/OficinaDao.php");

	$objDao = new OficinaDao();
	$objOficina = $objDao->buscar($_GET['id']);
	
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

	unset($objDao);
	unset($objOficina);


?>