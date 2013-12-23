<?php

	include_once("../../../helppers/Conexion.php");
	include("Cuenta.php");
	
	class CuentaDao extends Conexion{
		
			private $cnn;
			private $objCuenta;
			
			public function guardar($objC){	
			}
			
			public function actualizar($objC){	
			}
			
			public function eliminar($argId){	
			}
			
			public function buscar($argId){	
				
				$cnn = $this->objConexion();
				
				$sql = "SELECT * FROM cuentas_bancarias WHERE id_cuenta=".$argId;
				
				$result = $cnn->query($sql);
	
		     	
				if($result->num_rows > 0){
					
					$objCuenta = new Cuenta();
									
   		   			while($fila = $result->fetch_assoc()){
						$objCuenta->setId($fila["id_cuenta"]);
						$objCuenta->setNum_cuenta($fila["num_cuenta"]);  
						$objCuenta->setIdBanco($fila["id_banco"]);
					}	
				}			
				
				$cnn->close();

				return $objCuenta;
			}
			
			public function lista($id){
			
				$cnn = $this->objConexion();
				$sql = "SELECT * FROM cuentas_bancarias WHERE id_banco=".$id;
				$result = $cnn->query($sql);
				$i=0;
		     	
				if($result->num_rows > 0){				
   		   			while($fila = $result->fetch_assoc()){
						$objCuenta = new Cuenta();
						$objCuenta->setId($fila["id_cuenta"]);
						$objCuenta->setNum_cuenta($fila["num_cuenta"]);  
						$objCuenta->setIdBanco($fila["id_banco"]);
						$listaCuenta[$i] = $objCuenta; 
						unset($objCuenta); 
						$i++;
					}	
				}			
				
				$cnn->close();
				
				return $listaCuenta;
				
			}
		
	}

?>