<?php
	session_name("loginUsuario"); 
	session_start();  
	
	/*esta lib tiene las que estan comentadas PagoDao y BancoDao por ende no incluimos esas dos daria error*/
	include_once("../../../admin/historial/modelo/HistorialDao.php");
	/*include_once("../../../app/pago/modelo/PagoDao.php");*/
	/*include_once("../../../app/banco/modelo/BancoDao.php");*/
	include_once("../../../app/cliente/modelo/ClienteDao.php");
	
	class Controller_Pagos {
		
		public function listaPagos($min,$max){
	 
		    $abonado  = $_SESSION[´abonado´];	
			$objPagoDao = new PagoDao();
			$objBancoDao = new BancoDao(); 
			$objListaPago  = $objPagoDao->lista($abonado,$min,$max); 
			$tamano = sizeof($objListaPago);
			
			for ($i=0;$i< $tamano;$i++){
			
				$objPago = 	$objListaPago[$i];
				$objBanco  = $objBancoDao->buscar($objPago->getId_banco());
				
				switch ($objPago->getEstatus()) {
					case 0:
						$estado= "Recibido";
						break;
					case 1:
					    $estado= $estado= "<font color='#009900'><strong>Procesado</strong></font>";
						break;
					default:
					    $estado= "<font color='#FF0000'><strong>Error</strong></font>";
					    break; 
				}
				
					 
				$result[$i] = "<tr class='fondoLista' id=".$objPago->getId().
				" onclick='udpPago(frmPago,this);'><td id=".$objPago->getId().">".$objPago->getId().
				"</td><td>".$objBanco->getBanco()."</td><td>".$objPago->getNum_deposito().
				"</td><td>".$objPago->getMonto()."</td><td>".$objPago->getFecha_deposito().
				"</td><td>".$objPago->getFecha_registro()."</td><td>".$objPago->getFecha_modificado().
				"</td><td id=".$objPago->getEstatus().">".$estado."</td></tr>";
				
				unset ($objPago);
				unset ($objBanco);
			}
			
			unset ($objPagoDao);
			unset ($objListaPago);
			unset ($objBancoDao);
			return $result;
			
		}
		
		public function numRegistros(){
			$abonado  = $_SESSION[´abonado´];	
			$objPagoDao = new PagoDao();
			$total = $objPagoDao->totalRegistros($abonado); 		
			unset($objPagoDao);
			return $total;
			
		}
		
		
		public function listaByProcces(){
	 
			$objPadoDao = new PagoDao();
			$objBancoDao = new BancoDao(); 
			$objListaPago  = $objPadoDao->listByProcess(); 
			$tamano = sizeof($objListaPago);
			
			for ($i=0;$i< $tamano;$i++){
			
				$objPago = 	$objListaPago[$i];
				$objBanco  = $objBancoDao->buscar($objPago->getId_banco());

				$estado= "Recibido";
					 
				$result[$i] = "<tr class='fondoLista' id=".$objPago->getId().
				" onclick='udpPago(frmPago,this);'><td id=".$objPago->getId().">".$objPago->getId().
				"</td><td>".$objBanco->getBanco()."</td><td>".$objPago->getNum_deposito().
				"</td><td>".$objPago->getMonto()."</td><td>".$objPago->getFecha_deposito().
				"</td><td>".$objPago->getFecha_registro()."</td><td>".$objPago->getFecha_modificado().
				"</td><td id=".$objPago->getEstatus().">".$estado."</td></tr>";
				
				unset ($objPago);
				unset ($objBanco);
				
			}
			
			unset ($objPadoDao);
			unset ($objListaPago);
			unset ($objBancoDao);
			return $result;
			
		}
		
		
		public function nombreBanco($id){
		    
			$objPadoDao = new PagoDao();
			$objBancoDao = new BancoDao();			
			$pago = $objPadoDao->buscar($id);
			
			if ($pago != ""){	
				$banco = $objBancoDao->buscar($pago->getId_banco()); 
				return $banco->getBanco();
			}else{ 
				return "";
			}
			
									
		}
		
		public function nombreBancoOrigen($id){
		    
			$objPadoDao = new PagoDao();
			$objBancoDao = new BancoDao();			
			$pago = $objPadoDao->buscar($id);
			
			if ($pago != ""){	
				$banco = $objBancoDao->buscar($pago->getBancoOrigen()); 
				if ($banco != "")
					return $banco->getBanco();
				else
				    return "Seleccione tu banco";
			}else{ 
				return "";
			}
			
									
		}
		
		public function historial($id){
			$objHistD = new HistorialDao();
			$objHistorial = $objHistD->buscar($id);
			
			switch ($objHistorial->getEstatus()){
					case 1:
						$objHistorial->setEstatus("<font color='#009900'>Procesado</font>");
						break;
					case 2:
						$objHistorial->setEstatus("<font color='#FF0000'>Error</font>");
						break;
					default:
						$objHistorial->setEstatus("");
						break;	
			}
			
			return $objHistorial;
		}
		
		public function buscar($id){
		    
			$abonado  = $_SESSION[´abonado´];	
			$objPadoDao = new PagoDao();			
			$pago = $objPadoDao->buscar($id);
			
			if ($pago != ""){				
				$dia=substr($pago->getFecha_deposito(),8,2);
				$mes=substr($pago->getFecha_deposito(),5,2);
				$ano=substr($pago->getFecha_deposito(),0,4);
	        	$pago->setFecha_deposito($dia."-".$mes."-".$ano);
				
				switch ($pago->getEstatus()){
					case 1:
						$pago->setEstatus("<font color='#009900'>Procesado</font>");
						break;
					case 2:
						$pago->setEstatus("<font color='#FF0000'>Error</font>");
						break;
					default:
						$pago->setEstatus("");
						break;	
				}
							
				return $pago;
			}else{
				return $pago;
			}
									
		}
		
		public function buscarPorAbonado($parm){
			$objCliemteDao = new ClienteDao();
		    $objCliente = $objCliemteDao->searchByAbonado($parm); 
			unset($objCliemteDao);
			return $objCliente;
		}
				
	}

?>