<?php

	include ("../../../content/ciudad/modelo/CiudadDao.php");
	
	function listaCiudad(){
		
		$id = $_GET['id'];	
		$objDao = new CiudadDao();
	
		$lista = $objDao->lista($id);
		
		$cantidad = sizeof($lista);
		/*echo "<option>".$_GET['id'].$cantidad."</option>";*/
		echo "<option value=''>Seleccione una ciudad</option>";
		for ($i=0;$i<$cantidad;$i++){
		
			$objCiudad = $lista[$i];
			echo "<option value=".$objCiudad->getId().">".$objCiudad->getCiudad()."</option>";	
			unset($objCiudad);
		}
		
		unset($lista);
		unset($objDao);
		
	}
	
	listaCiudad();


?>