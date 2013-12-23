<?php

	include_once("../../../helppers/Conexion.php");
	include("Sector.php");

	class SectorDao extends Conexion {
		
		public function buscar($id){}
		public function agregar($objSector){}
		public function actualizar($objSector){}
		public function eliminar($id){}

		public function lista($id){
		
				$cnn  = $this->objConexion();
				$sql = "SELECT * FROM sector WHERE id_ciudad=".$id;
				$result = $cnn->query($sql);
				
				if($result->num_rows > 0){		
   		   			
					$i=0;
					
					while($fila = $result->fetch_assoc()){
					   
					    $objSector = new Sector();
						$objSector->setId($fila["id"]);  
						$objSector->setSector($fila["sector"]); 
						$objSector->setIdCiudad($fila["id_ciudad"]); 
						$listaSectores[$i] = $objSector; 
						unset($objSector);
						$i++;
						
					}
						
				}			
				
				$cnn->close();
				return $listaSectores;	
			
		}

		
	}

?>