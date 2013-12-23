<?php

	include_once("../../../helppers/Conexion.php");
	include("Pais.php");
	
	class PaisDao extends Conexion {
		
		public function buscar($id){}
		
		public function agregar($objPais){}
		public function actualizar($objPais){}
		public function eliminar($id){}
		
		public function lista(){
		
				$cnn  = $this->objConexion();
				$sql = "SELECT * FROM paises";
				$result = $cnn->query($sql);
				
				if($result->num_rows > 0){		
   		   			
					$i=0;
					
					while($fila = $result->fetch_assoc()){
					   
					    $objPais = new Pais();
						$objPais->setId($fila["id"]);  
						$objPais->setPais($fila["pais"]); 
						
						$listaPaises[$i] = $objPais; 
						unset($objPais);
						$i++;
						
					}
						
				}			
				
				$cnn->close();
				return $listaPaises;
			
		}
		
	}

?>