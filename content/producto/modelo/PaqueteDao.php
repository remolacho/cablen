<?php

		include_once("../../../helppers/Conexion.php");
		include("Paquete.php");
		
		class PaqueteDao extends Conexion{
			
			public function listPaquetesTv(){
		
				$cnn  = $this->objConexion();
				$sql = "SELECT * FROM paquetes where id_producto = 1000 ";
				$result = $cnn->query($sql);
				
				if($result->num_rows > 0){		
   		   			
					$i=0;
					
					while($fila = $result->fetch_assoc()){
					   
					    $objPaquete = new Paquete();
						$objPaquete->setId($fila["id"]);  
						$objPaquete->setNombre($fila["nombre"]); 
						$objPaquete->setTarifa($fila["tarifa"]);  
						$objPaquete->setSector($fila["sector"]); 
						$objPaquete->setSenal($fila["senal"]);  
						
						$listPaquetes[$i] = $objPaquete; 
						unset($objPaquete);
						$i++;
						
					}
						
				}			
				
				$cnn->close();
				return $listPaquetes;	
			
			}
			
	   }

?>