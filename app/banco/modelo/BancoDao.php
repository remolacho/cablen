<?php

	include_once("../../../helppers/Conexion.php");
	include("Banco.php");
	
	class BancoDao extends Conexion{
		
			private $cnn;
			private $objBanco;
			
			public function guardar($objB){	
			}
			
			public function actualizar($objB){	
			}
			
			public function eliminar($argId){	
			}
			
			public function buscar($argId){	
				
				$cnn = $this->objConexion();
				
				$sql = "SELECT * FROM bancos WHERE id_banco=".$argId;
				
				$result = $cnn->query($sql);
		
				if($result->num_rows > 0){
					
					$objBanco = new Banco();
									
   		   			while($fila = $result->fetch_assoc()){
						$objBanco->setId($fila["id_banco"]);
						$objBanco->setBanco($fila["banco"]);  
					}	
				}			
				
				$cnn->close();

				return $objBanco;
			}
			
			public function lista(){
			
				$cnn = $this->objConexion();
				$sql = "SELECT * FROM bancos";
				$result = $cnn->query($sql);
				$i=0;
		     	
				if($result->num_rows > 0){				
   		   			while($fila = $result->fetch_assoc()){
						$objBanco = new Banco();
						$objBanco->setId($fila["id_banco"]);
						$objBanco->setBanco($fila["banco"]); 
						$listaBanco[$i] = $objBanco; 
						unset($objBanco); 
						$i++;
					}	
				}			
				
				$cnn->close();
				return $listaBanco;
				
			}
		
	}

?>