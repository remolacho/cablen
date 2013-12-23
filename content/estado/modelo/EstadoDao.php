<?php

	include_once("../../../helppers/Conexion.php");
	include("Estado.php");
	
	class EstadoDao extends Conexion {
		
		public function buscar($id){}
		public function agregar($objEstado){}
		public function actualizar($objEstado){}
		public function eliminar($id){}
		
		public function lista($id){
		
				$cnn  = $this->objConexion();
				$sql = "SELECT * FROM estados WHERE id_pais=".$id;
				$result = $cnn->query($sql);
				
				if($result->num_rows > 0){		
   		   			
					$i=0;
					
					while($fila = $result->fetch_assoc()){
					   
					    $objEstado = new Estado();
						$objEstado->setId($fila["id"]);  
						$objEstado->setEstado($fila["estado"]); 
						$objEstado->setIdPais($fila["id_pais"]); 
						$listaEstados[$i] = $objEstado; 
						unset($objEstado);
						$i++;
						
					}
						
				}			
				
				$cnn->close();
				return $listaEstados;	
			
		}
		
	}

?>