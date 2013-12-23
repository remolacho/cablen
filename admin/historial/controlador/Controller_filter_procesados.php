<?php
	session_name("loginAdmin"); 
	session_start(); 
	
	include_once("../../../admin/historial/modelo/HistorialDao.php");
	
	function convertDate($parm){
	
		if ($parm == ""){
			return $parm;
		}else{
			$dia=substr($parm,0,2);
			$mes=substr($parm,3,2);
			$ano=substr($parm,6,4);
			return $ano."-".$mes."-".$dia;	
		}
   	
	}


	function cargarCabecera(){
		
		echo '<tr class="tituloLitas" align="center"><td><b>Pago</b></td><td><b>Usuario</b></td>
    	<td><b>F.Proceso</b></td><td><b>Banco</b></td><td><b>N° Deposito</b></td>
    	<td><b>Cuenta</b></td><td><b>Monto</b></td><td><b>F.Deposito</b></td></tr>';
		
	}

	function cargarContenido(){
		
		$objHisDao  = new HistorialDao();
       	$ced =$_SESSION[´cedula´];
		$desde = convertDate($_POST["desde"]);
  		$hasta = convertDate($_POST["hasta"]);

        if($desde == "" || $hasta == ""){
			if ($_POST["banco"] == 0){
				$like = "u.cedula='".$ced."'";	
			/*	echo "<tr><td>Total</td></tr>";*/
			}else{
				$like = "u.cedula='".$ced."' AND h.id_banco=".$_POST["banco"];
				/*echo "<tr><td>Por Banco</td></tr>";*/
			}			
		}else{
			if ($_POST["banco"] == 0){
				$like = "u.cedula='".$ced."' AND h.fecha_registro BETWEEN '"
			            .$desde."' AND '".$hasta."'";
				/*echo "<tr><td>Por fecha</td></tr>";*/
			}else{
				$like = "u.cedula='".$ced."' AND h.id_banco=".$_POST["banco"].
				        " AND h.fecha_registro BETWEEN '".$desde."' AND '".$hasta."'";
			/*	echo "<tr><td>Por fecha y banco</td></tr>";*/
			}
		}
		
		$objLista = $objHisDao->listByUserFilter($like);
		$cantidad = sizeof($objLista);
        /*echo "<tr><td>".$cantidad."</td></tr>";*/
		for($i=0; $i < $cantidad; $i++){
			
			$objHist = $objLista[$i];
			$objBanco = $objHist->getObjBanco();
			$objUser = $objHist->getObjUser();
			
			echo "<tr class='fondoLista' id='".$objHist->getId()."' onclick='udpPago(frmPago,this);'>";
			echo "<td>".$objHist->getIdPago()."</td>";
			echo "<td>".$objUser->getCedula()."</td>";
			echo "<td>".$objHist->getFechaR()."</td>";
			echo "<td>".$objBanco->getBanco()."</td>";
			echo "<td>".$objHist->getNumDep()."</td>";
			echo "<td>".$objHist->getCuenta()."</td>";
			echo "<td>".$objHist->getMonto()."</td>";
			echo "<td>".$objHist->getFechaDep()."</td></tr>";
			
			unset($objHist);
			unset($objPago);
			unset($objBanco);
			unset($objUser);
		
		}
       /* echo "<tr><td>".$objLista."</td></tr>";*/
		unset ($objLista);
		
	}
	
	function cargarTabla(){
	
		cargarCabecera();
		cargarContenido();
		
	}
	
	cargarTabla();

?>