<?php

	include ("../../../content/pregunta_frecuente/modelo/Pregunta_FrecuenteDao.php");
	
	$filtro = $_POST['filtro'];
	
	$objDao = new Pregunta_FrecuenteDao();
	$listPre = $objDao->listFilter($filtro);
	
	unset($objDao);
	
	$tamano = sizeof($listPre);
   
    if ($tamano > 0){
		for ($i=0;$i<$tamano;$i++){
				
			$objPre = $listPre[$i];
			echo '<div class="titulo"><h2>'.utf8_encode($objPre->getPregunta()).'</h2></div>';
			echo '<div class="sombra">';
			echo '<p>'.utf8_encode($objPre->getRespuesta()).'</p>';
			echo '</div>';
			unset($objInfo);
					
		}
	}else{
		echo '<h3>No hay coincidencias</h3>';
	}
	unset($listPre);

	

?>