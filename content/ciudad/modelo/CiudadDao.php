<?php

	include_once("../../../helppers/Conexion.php");
	include("Ciudad.php");
	
	class CiudadDao extends Conexion {
		
		public function buscar($id){}
		public function agregar($objCiudad){}
		public function actualizar($objCiudad){}
		public function eliminar($id){}
		
		public function lista($id){
		
				$cnn  = $this->objConexion();
				$sql = "SELECT * FROM ciudades WHERE id_estado=".$id;
				$result = $cnn->query($sql);
				
				if($result->num_rows > 0){		
   		   			
					$i=0;
					
					while($fila = $result->fetch_assoc()){
					   
					    $objCiudad = new Ciudad();
						$objCiudad->setId($fila["id"]);  
						$objCiudad->setCiudad($fila["ciudad"]); 
						$objCiudad->setIdEstado($fila["id_estado"]); 
						$listaCiudades[$i] = $objCiudad; 
						unset($objCiudad);
						$i++;
						
					}
						
				}			
				
				$cnn->close();
				return $listaCiudades;	
			
		}
		
		
		public function listaByIds($strId){
		
				$cnn  = $this->objConexion();
				$sql = "SELECT * FROM ciudades WHERE id IN(".$strId.")";
				$result = $cnn->query($sql);
				
				if($result->num_rows > 0){		
   		   			
					$i=0;
					
					while($fila = $result->fetch_assoc()){
					   
					    $objCiudad = new Ciudad();
						$objCiudad->setId($fila["id"]);  
						$objCiudad->setCiudad($fila["ciudad"]); 
						$objCiudad->setIdEstado($fila["id_estado"]); 
						$listaCiudades[$i] = $objCiudad; 
						unset($objCiudad);
						$i++;
						
					}
						
				}			
				
				$cnn->close();
				return $listaCiudades;	
			
		}
		
	}

?>