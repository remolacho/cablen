<?php
	
	include ("../../../app/pago/controlador/Controller_consulta.php");

	$objPagoConsulta = new Controller_Pagos();
	
	$numRow = 10;
	$registros = $objPagoConsulta->numRegistros();
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
	
	$pagos = $objPagoConsulta->listaPagos($min,$numRow);
	$tamano = sizeof($pagos);
	echo ' <div align="center" class="frmTitulo"><h2>Pagos Realizados</h2></div>';				
	echo '<table border="0">
                <tr class="tituloLitas" align="center">
                    <td><b>ID</b></td>
                    <td º><b>Banco</b></td>
                    <td><b>N° Deposito</b></td>
                    <td><b>Monto</b></td>
                    <td><b>F.Pago</b></td>
                    <td><b>F.Registro</b></td>
                    <td><b>F.Modificado</b></td>
                    <td><b>Estado</b></td>
                 </tr>';

	if ($tamano > 0){
		foreach ($pagos as $indice => $pago)
			echo $pago;	
	}
		
	echo ' </table>';
	
	echo '<div>';
	
	for ($i=1;$i<=$totalPag;$i++){
		echo '<a class="paginar" id="'.$i.'" onclick="paginarPagosByAbonado(this.id)"><font color="#036">'.
		$i.'-</font></a>';	
	}
	
	echo '<a class="paginar" id="primer" onclick="paginarPagosByAbonado(this.id)">
	     <font color="#036">Primer Registro</font></a>';	
	
	echo '</div>';	
			
	
	unset($objPagoConsulta);
	
	
?>