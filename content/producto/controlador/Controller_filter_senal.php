<?php

	include_once ("../../../content/producto/modelo/SenalDao.php");

	$id_senal = $_POST['senal'];
	$id_ciudad = $_POST['ciudad'];
	$pag =  $_POST['pag'];
	
	/*echo $id_senal.$id_ciudad.$pag;*/
	$strFiltro = " id_senal=".$id_senal." AND id_ciudad=".$id_ciudad;
	
	$objDao = new SenalDao();
	
	$numRow = 15;
	$registros =  $objDao->totalRegistros($strFiltro);
	$totalPag = ceil($registros/$numRow);
	$acum  = 1;
	
	/*echo $registros;*/
	
	if ($pag <= 1){
	 	/*echo "primera pag";*/
		$min = 0;
	}else{
	/*echo "otra pagina";*/
		$min = (($pag - 1) * $numRow);
	}
	
	$strFiltro = " id_senal=".$id_senal." AND id_ciudad=".$id_ciudad.' LIMIT '.$min.','.$numRow;
	/*echo $strFiltro;*/
	$objGrilla = $objDao->listGrillaByfilter($strFiltro);
	
	$cantCanales = sizeof($objGrilla);
	
	if ($cantCanales > 0){
	
		echo '<div id="cabeceraInformativa"><h1>Cantidad de Canales '.$objGrilla[0]->getCantidad().'</h1></div>';
	
		echo '<table border="0">';
		echo '<tr class="tituloLitas">';
		echo '<td width="300">Canal</td>';
		echo '<td>Numero</td>';
		echo '</tr>';
	
		$colorP= "#fff";
		$colorI ="#F0FFFF";
	
		for($i=0;$i<$cantCanales;$i++){
	     
			$objCanal = $objGrilla[$i];	
			$par = $i % 2;
		
			if ($par == 0){
				echo '<tr bgcolor="'.$colorP.'">';
			}else{
				echo '<tr bgcolor="'.$colorI.'">';
			}
		
			echo '<td>'.$objCanal->getNombre().'</td>';
			echo '<td align="center">'.$objCanal->getCanal().'</td>';
			echo '</tr>';
	
			unset($objCanal);
		}
		unset ($objGrilla);
		unset ($objDao);
	
		echo '</table>';

		echo '<br/>';

		echo '<div>';
	
		for ($i=1;$i<=$totalPag;$i++){
			echo '<a class="paginar" id="'.$i.'" onclick="paginarGrilla(this.id)"><font color="#036">'.
			$i.'-</font></a>';	
		}
	
		echo '<a class="paginar" id="primer" onclick="paginarGrilla(this.id)">
	     <font color="#036">Primer Registro</font></a>';	
	
		echo '</div>';
		
		echo '<br />';
		
	}else{
		if ($id_senal > 1000)
			echo '<h1> No posee servicio de señal codificada</h1>';
		else
			echo '<h1> No posee servicio de señal Libre</h1>';
		
	}
	
?>