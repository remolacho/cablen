<?php

	include_once("../../../helppers/Conexion.php");
	include("Pago.php");

	class PagoDao extends Conexion{
		
			private $objPago;
			private $listaPagos;
			/*private $cnn;*/

			public function guardar($objP){
				  
				   $cnn = $this->objConexion();			  			   
				   
				   $sql= "INSERT INTO pagos (codigo_abonado,monto,octeto_cuenta_bancaria,".
				         "id_banco,num_deposito,fecha_deposito,fecha_registro,fecha_modificado,estatus,". 
						 "banco_origen,imagen_pago) VALUES ('".
						 $objP->getCodigo_abonado()."',".
						 $objP->getMonto().",'".
						 $objP->getOcteto()."',".
						 $objP->getId_banco().",'".
						 $objP->getNum_deposito()."','".
						 $objP->getFecha_deposito()."','".
						 $objP->getFecha_registro()."','".
						 $objP->getFecha_modificado()."',0,'".
						 $objP->getBancoOrigen()."','".
						 $objP->getImg_pago()."')";
					
					if (!$cnn->query($sql)){
					    /*echo $cnn->error;*/			
						$cnn->close();
						/*echo $sql;*/
						header("Location: ../vista/Error.html");
						return false;	
					}else{
						$cnn->close();
						return true;	
					}
			}
			
			public function actualizar($objP){
				  
				   $cnn = $this->objConexion();			  			   
				   
				   $sql= "UPDATE pagos SET monto=".$objP->getMonto().
										   ",octeto_cuenta_bancaria='".$objP->getOcteto().
										   "',id_banco=".$objP->getId_banco().
										   ",num_deposito='".$objP->getNum_deposito().
										   "',fecha_deposito='".$objP->getFecha_deposito().
										   "',fecha_modificado='".$objP->getFecha_modificado().
										   "',observacion='".$objP->getObservacion().
										   "',estatus=".$objP->getEstatus().
										   ",banco_origen=".$objP->getBancoOrigen().
										   " WHERE id=".$objP->getId();
				 
					if (!$cnn->query($sql)){
						/*echo $cnn->error;
						echo '</br>';
						echo $sql;*/
						$cnn->close();
					    header("Location: ../vista/Error.html");
						return false;	
					}else{
						$cnn->close();
						return true;	
					}
				
			}
			
			public function eliminar($argId){
				
				
			}

			public function buscar($argId){
				
				$cnn = $this->objConexion();
		        
		        $sql = "SELECT * FROM pagos WHERE id=".$argId;
		
		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
				    
					$objPago = new Pago();	
   		   			
					while($fila = $result->fetch_assoc()){
						$objPago->setId($fila["id"]);  
						$objPago->setCodigo_abonado($fila["codigo_abonado"]); 
						$objPago->setMonto($fila["monto"]);
						$objPago->setOcteto($fila["octeto_cuenta_bancaria"]);
						$objPago->setId_banco($fila["id_banco"]);
						$objPago->setNum_deposito($fila["num_deposito"]);
						$objPago->setFecha_deposito($fila["fecha_deposito"]);
						$objPago->setFecha_registro($fila["fecha_registro"]); 
						$objPago->setFecha_modificado($fila["fecha_modificado"]); 
						$objPago->setEstatus($fila["estatus"]);
						$objPago->setObservacion($fila["observacion"]);
						$objPago->setBancoOrigen($fila["banco_origen"]);
						$objPago->setImg_pago($fila["imagen_pago"]);
					}
						
				}			
				
				$cnn->close();
	
				return $objPago;
			
			}
			
			public function totalRegistros($argId){
			
				$cnn = $this->objConexion();
		        
		        $sql = "SELECT count(*) AS filas FROM pagos WHERE codigo_abonado='".$argId."'";
		
		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
					while($fila = $result->fetch_assoc()){    
						$total = $fila["filas"];
					}
						
				}			
				
				$cnn->close();
				return $total;
				
			}
			
			
			public function octenerMaxId(){
			
				$cnn = $this->objConexion();
		        
		        $sql = "SELECT max(id) AS pago FROM pagos";
		
		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
					while($fila = $result->fetch_assoc()){    
						$total = $fila["pago"];
					}
						
				}			
				
				$cnn->close();
				return $total;
				
			}
			
			
			public function lista($argId,$min,$max){
				
				$cnn = $this->objConexion();
		        
		        $sql = "SELECT * FROM pagos WHERE codigo_abonado='".$argId."' LIMIT ".$min.",".$max;
		
		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
   		   			$i=0;
					while($fila = $result->fetch_assoc()){
					    $objPago = new Pago();
						$objPago->setId($fila["id"]);  
						$objPago->setCodigo_abonado($fila["codigo_abonado"]); 
						$objPago->setMonto($fila["monto"]);
						$objPago->setOcteto($fila["octeto_cuenta_bancaria"]);
						$objPago->setId_banco($fila["id_banco"]);
						$objPago->setNum_deposito($fila["num_deposito"]);
						$objPago->setFecha_deposito($fila["fecha_deposito"]);
						$objPago->setFecha_registro($fila["fecha_registro"]); 
						$objPago->setFecha_modificado($fila["fecha_modificado"]); 
						$objPago->setEstatus($fila["estatus"]);
						$objPago->setObservacion($fila["observacion"]);
						$objPago->setBancoOrigen($fila["banco_origen"]);
						$listaPagos[$i] = $objPago; 
						unset($objPago);
						$i++;
					}
						
				}			
				
				$cnn->close();
				return $listaPagos;
				
			}
			
			public function listByProcess(){
				
				$cnn = $this->objConexion();
		        
		        $sql = "SELECT * FROM pagos WHERE estatus=0 ORDER BY id_banco";
		
		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){						    
   		   			$i=0;
					while($fila = $result->fetch_assoc()){
					    $objPago = new Pago();
						$objPago->setId($fila["id"]);  
						$objPago->setCodigo_abonado($fila["codigo_abonado"]); 
						$objPago->setMonto($fila["monto"]);
						$objPago->setOcteto($fila["octeto_cuenta_bancaria"]);
						$objPago->setId_banco($fila["id_banco"]);
						$objPago->setNum_deposito($fila["num_deposito"]);
						$objPago->setFecha_deposito($fila["fecha_deposito"]);
						$objPago->setFecha_registro($fila["fecha_registro"]); 
						$objPago->setFecha_modificado($fila["fecha_modificado"]); 
						$objPago->setEstatus($fila["estatus"]);
						$objPago->setObservacion($fila["observacion"]);
						$objPago->setBancoOrigen($fila["banco_origen"]);
						$listaPagos[$i] = $objPago; 
						unset($objPago);
						$i++;
					}
						
				}			
				
				$cnn->close();
				return $listaPagos;
				
			}
			
			public function listByFilter($strSql){
				
				$cnn = $this->objConexion();

				if ($strSql != "")
					$sql = "SELECT * FROM pagos WHERE estatus=0 AND ".$strSql;
				else
				    $sql = "SELECT * FROM pagos WHERE estatus=0 ORDER BY id_banco";

		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
   		   			$i=0;
					while($fila = $result->fetch_assoc()){
					    $objPago = new Pago();
						$objPago->setId($fila["id"]);  
						$objPago->setCodigo_abonado($fila["codigo_abonado"]); 
						$objPago->setMonto($fila["monto"]);
						$objPago->setOcteto($fila["octeto_cuenta_bancaria"]);
						$objPago->setId_banco($fila["id_banco"]);
						$objPago->setNum_deposito($fila["num_deposito"]);
						$objPago->setFecha_deposito($fila["fecha_deposito"]);
						$objPago->setFecha_registro($fila["fecha_registro"]); 
						$objPago->setFecha_modificado($fila["fecha_modificado"]); 
						$objPago->setEstatus($fila["estatus"]);
						$objPago->setObservacion($fila["observacion"]);
						$objPago->setBancoOrigen($fila["banco_origen"]);
						$listaPagos[$i] = $objPago; 
						unset($objPago);
						$i++;
					}
						
				}			
				
				$cnn->close();
				return $listaPagos;	
				
			}
			
			public function listByClient($strSql){
				
				$cnn = $this->objConexion();

				if ($strSql != "")
					$sql = "SELECT * FROM pagos WHERE ".$strSql;
				else
				    $sql = "SELECT * FROM pagos ORDER BY id_banco";

		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
   		   			$i=0;
					while($fila = $result->fetch_assoc()){
					    $objPago = new Pago();
						$objPago->setId($fila["id"]);  
						$objPago->setCodigo_abonado($fila["codigo_abonado"]); 
						$objPago->setMonto($fila["monto"]);
						$objPago->setOcteto($fila["octeto_cuenta_bancaria"]);
						$objPago->setId_banco($fila["id_banco"]);
						$objPago->setNum_deposito($fila["num_deposito"]);
						$objPago->setFecha_deposito($fila["fecha_deposito"]);
						$objPago->setFecha_registro($fila["fecha_registro"]); 
						$objPago->setFecha_modificado($fila["fecha_modificado"]); 
						$objPago->setEstatus($fila["estatus"]);
						$objPago->setObservacion($fila["observacion"]);
						$objPago->setBancoOrigen($fila["banco_origen"]);
						$listaPagos[$i] = $objPago; 
						unset($objPago);
						$i++;
					}
						
				}			
				
				$cnn->close();
				return $listaPagos;	
				
			}	
			
			
				
	}
		
?>
