<?php

	include_once("../../../app/cuenta/modelo/CuentaDao.php");
	
	$id = $_GET['id'];
	
	$objCuentaDao = new CuentaDao(); 
	
	$listaCuenta = $objCuentaDao->lista($id);
	
	$tamano = sizeof($listaCuenta);
	
	for ($i=0;$i< $tamano;$i++){			
				$objCuenta = $listaCuenta[$i];			
				echo '<option>'.$objCuenta->getNum_cuenta().'</option>';	
				unset($objCuenta); 
	}
	

?>