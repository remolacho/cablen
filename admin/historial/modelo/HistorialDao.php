<?php

	include_once("../../../helppers/Conexion.php");
	include("Historial.php");
	
	class HistorialDao extends Conexion{
		
		private $listaHistorial;
		
		public function buscar($id){
			
			$cnn = $this->objConexion();
			
			$sql = "SELECT * FROM historial_pagos_procesados WHERE id=".$id;
			
			$result = $cnn->query($sql);
			 			    
			if($result->num_rows > 0){		
   		   			
					while($fila = $result->fetch_assoc()){					    
						
						$objHistorial = new Historial();
						$objHistorial->setId($fila["id"]);
						$objHistorial->setIdPago($fila["id_pago"]); 
						$objHistorial->setCedula($fila["cedula"]); 
						$objHistorial->setFechaR($fila["fecha_registro"]);
						$objHistorial->setFechaM($fila["fecha_modificado"]);
						$objHistorial->setObservacion($fila["observacion"]);
						$objHistorial->setEstatus($fila["estatus"]);
						$objHistorial->setIdBanco($fila["id_banco"]);
						$objHistorial->setCuenta($fila["cuenta"]);
						$objHistorial->setMonto($fila["monto"]);
						$objHistorial->setNumDep($fila["num_deposito"]);
						$objHistorial->setFechaDep($fila["fecha_deposito"]);
									
					}
						
				}		
				
				$cnn->close();
				return $objHistorial;
					
		}
		
		public function listByUserFilter($strSql){
		
			$cnn = $this->objConexion();
		
			$sql = "SELECT u.cedula,u.nombre,u.apellido,h.id,h.id_pago,h.fecha_registro,".
				   "h.fecha_deposito,h.monto,h.num_deposito,h.cuenta,".
				   "b.banco FROM usuarios u INNER JOIN historial_pagos_procesados h ON (u.cedula = h.cedula) ". 
				   "INNER JOIN bancos b ON (h.id_banco  = b.id_banco) WHERE ".$strSql;	
					
			$result = $cnn->query($sql);
			 
			    
			if($result->num_rows > 0){		
   		   			
					$i=0;
					
					while($fila = $result->fetch_assoc()){					    
					
						$objBanco = new Banco();
						$objUser = new Usuario();
						$objHistorial = new Historial();
						
						$objHistorial->setId($fila["id"]);
						$objHistorial->setIdPago($fila["id_pago"]); 
						$objHistorial->setFechaR($fila["fecha_registro"]);
						$objHistorial->setCuenta($fila["cuenta"]);
						$objHistorial->setMonto($fila["monto"]);
						$objHistorial->setNumDep($fila["num_deposito"]);
						$objHistorial->setFechaDep($fila["fecha_deposito"]);
						$objBanco->setBanco($fila["banco"]);
						$objUser->setCedula($fila["cedula"]);
						
					    $objHistorial->setObjBanco($objBanco);
						$objHistorial->setObjUser($objUser);
						
						$listaHistorial[$i] = $objHistorial; 

						unset($objBanco);
						unset($objUser);
						unset($objHistorial);
						
						$i++;
					}

				}
				
				$cnn->close();
				return $listaHistorial;	
			
		}
		
		/*solo para administradores del sistema*/
		public function listByAllUserFilter($strSql){}
		/*fin*/
		
		
		public function agregar($objProc){
		
			$cnn = $this->objConexion();			  			   
				   
			$sql = "INSERT INTO historial_pagos_procesados (cedula,id_pago,fecha_registro,fecha_modificado,".
			       "observacion,estatus,id_banco,fecha_deposito,cuenta,monto,num_deposito) VALUES ('".
				   $objProc->getCedula()."',".
				   $objProc->getIdPago().",'".
				   $objProc->getFechaR()."','".
				   $objProc->getFechaM()."','".
				   $objProc->getObservacion()."',".
				   $objProc->getEstatus().",".
				   $objProc->getIdBanco().",'".
				   $objProc->getFechaDep()."','".
				   $objProc->getCuenta()."',".
				   $objProc->getMonto().",'".
				   $objProc->getNumDep()."')";
				   		  

			if (!$cnn->query($sql)){
					    echo $cnn->error;				
						echo '</br>';
						echo $sql;
						/*$cnn->rollback();*/
						$cnn->close();
						//header("Location: ../vista/Error.html");
						return false;	
			}else{
						/*$cnn->commit();*/
						$cnn->close();
						return true;	
			}
			
		}
		
		public function eliminar($id){}
		
		public function modificar($objProc){}
		
	}

?>