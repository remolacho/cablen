<?php

	include_once("../../../admin/historial/controlador/Controller_consultas.php");
	
	$objConsultEvent = new Controller_consultas();
	
	$numRow = 10;
	$registros = $objConsultEvent->numFilas();				
	
	$totalPag = ceil($registros/$numRow);
	$acum  = 1;
	
	$pag = $_POST["pag"];
	
	if ($pag <= 1){
		/*echo "primera pag";*/
		$min = 0;
	}else{
		/*echo "otra pagina";*/
		$min = (($pag - 1) * $numRow);
	}

	$eventos = $objConsultEvent->listaDeEventos($min,$numRow);
	$cantidad = sizeof($eventos);
	
	if ($cantidad > 0){
			echo '<div align="center" class="frmTitulo"><h2>Eventos</h2></div>';
			echo '<table border="0">
                    <tr class="tituloLitas" align="center">
                    	<td width="50"><b>ID</b></td>
                        <td  width="70"><b>Cedula</b></td>
                        <td width="120"><b>Nombre</b></td>
                        <td width="120"><b>Aellido</b></td>
                        <td ><b>Evento</b></td>
                        <td><b>Fecha y hora</b></td>                        
                    </tr>';
			
			for($i=0; $i < $cantidad; $i++){
								
					$objEvent = $eventos[$i];
	
					echo '<tr class="fondoLista">';
					echo '<td align="center">'.$objEvent->getId().'</td>';
					echo '<td align="center">'.$objEvent->getCedula().'</td>';
					echo '<td align="center">'.$_SESSION[´nombre´].'</td>';
					echo '<td align="center">'.$_SESSION[´apellido´].'</td>';
					echo '<td>'.$objEvent->getEnvent().'</td>';
					echo '<td>'.$objEvent->getFechaHora().'</td>';
					echo '</tr>';
					unset($objEvent);

			}
			
			echo ' </table>';
			
	}
	
	echo '<div>';
	for ($i=1;$i<=$totalPag;$i++){
		echo '<a class="paginar" id="'.$i.'" onclick="paginarEvent(this.id)"><font color="#036">'.$i.'-</font></a>';	
	}
	echo '<a class="paginar" id="primer" onclick="paginarEvent(this.id)"><font color="#036">Primer Registro</font></a>';	
	echo '</div>';								
	unset($objConsultEvent);

?>