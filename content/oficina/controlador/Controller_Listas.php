<?php

	include_once("../../../content/oficina/modelo/OficinaDao.php");

	$objDao = new OficinaDao();
	$listaOficina = $objDao->lista($_GET['id']);
	$cantidad = sizeof($listaOficina);
	echo "<table>";
	for ($i=0;$i<$cantidad;$i++){
		$objOficina = $listaOficina[$i];	
		echo "<tr id=".$objOficina->getId()." onclick='cargarOficina(this.id);' 
		     class='lista'><td>".$objOficina->getNombre()."</td></tr>";		
		unset($objOficina);	
	}
	
	echo "</table>";
	
	unset($listaOficina);
	unset($objDao);

?>