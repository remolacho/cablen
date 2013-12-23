<?php

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

function cargarPagos(){
	
  $objBancoDao = new BancoDao(); 
  $objPagoDao = new PagoDao();
  
  $filtro = $_POST["filtro"];
  $like   = "";
  
  echo '<tr class="tituloLitas" align="center"><td><b>ID</b></td><td><b>Banco</b></td><td><b>N° Deposito</b></td>
       <td><b>Monto</b></td><td><b>F.Pago</b></td><td><b>F.Registro</b></td><td><b>F.Modificado</b></td>
       <td><b>Estado</b></td></tr>';
 
  $desde = convertDate($_POST["desde"]);
  $hasta = convertDate($_POST["hasta"]);

  if($desde == "" || $hasta == ""){
	  
	   switch ($filtro) {
		case 'abo':  
		    $like = "codigo_abonado='".$_POST["abonado"]."'";
	    	/*echo '<tr><td>'.$like.'</td></tr>';*/
			break;
		case 'banco':
		    $like = "id_banco=".$_POST["banco"];
	    	/*echo '<tr><td>'.$like.'</td></tr>';*/
			break;
		default:
		    $like="";
	    	/*echo '<tr><td>Busqueda Total</td></tr>';*/
			break;  
  	  }
	  
  }else{
	  
	  switch ($filtro) {
		case 'abo':
			$like = "codigo_abonado='".$_POST["abonado"]."' AND fecha_modificado BETWEEN '"
			        .$desde."' AND '".$hasta."'";
	    	/*echo '<tr><td>'.$like.'</td></tr>';*/
			break;
		case 'banco':
			$like = "id_banco=".$_POST["banco"]." AND fecha_modificado BETWEEN '"
			        .$desde."' AND '".$hasta."'";
	       /* echo '<tr><td>'.$like.'</td></tr>';*/
			break;
		default:
		    $like = "fecha_modificado BETWEEN '".$desde."' AND '".$hasta."'";
	    	/*echo '<tr><td>'.$like.'</td></tr>';*/
			break;  
  	  }
	  
  }
  
  $listaDePagos = $objPagoDao->listByFilter($like);
  $tamano = sizeof($listaDePagos); 
  
  for ($i=0;$i< $tamano;$i++){
	
	$objPago = $listaDePagos[$i];
	$objBanco = $objBancoDao->buscar($objPago->getId_banco());
	$estado= "Recibido";
	
	echo "<tr class='fondoLista' id=".$objPago->getId().
		 " onclick='udpPago(frmPago,this);'><td id=".$objPago->getId().">".$objPago->getId().
		 "</td><td>".$objBanco->getBanco()."</td><td>".$objPago->getNum_deposito().
		 "</td><td>".$objPago->getMonto()."</td><td>".$objPago->getFecha_deposito().
		 "</td><td>".$objPago->getFecha_registro()."</td><td>".$objPago->getFecha_modificado().
		 "</td><td id=".$objPago->getEstatus().">".$estado."</td></tr>";
	
	unset ($objPago);
	unset ($objBanco); 
	 
  }
  
  unset ($objBancoDao);
  unset ($objPagoDao);
  unset ($listaDePagos);

  
}

cargarPagos();

?>