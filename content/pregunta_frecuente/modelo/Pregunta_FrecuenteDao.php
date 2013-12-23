<?php

	include ("../../../helppers/Conexion.php");
	include_once ("Pregunta_Frecuente.php");
	
	class Pregunta_FrecuenteDao extends Conexion{
	
	
			public function guardar($objPre){}
			public function actualizar($objPre){}
			public function eliminar($id){}
			public function buscar($id){}
			
			public function listFilter($str){
			
				$cnn = $this->objConexion();

				$sql = "SELECT * FROM preguntas_frecuentes WHERE pregunta LIKE '%".$str."%'";
				
		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
   		   		
					$i=0;
				
					while($fila = $result->fetch_assoc()){
					   
					    $objPre = new Pregunta_Frecuente();
						$objPre->setId($fila["id"]);  
						$objPre->setPregunta($fila["pregunta"]); 
						$objPre->setRespuesta($fila["respuesta"]);
						
						$listaPreguntas[$i] = $objPre; 
						unset($objPre);
						$i++;
					}
						
				}	
				
				$cnn->close();
				return $listaPreguntas;	
				
			}
			
			public function listAll(){
				
				$cnn = $this->objConexion();

				$sql = "SELECT * FROM preguntas_frecuentes";
				
		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
   		   		
					$i=0;
				
					while($fila = $result->fetch_assoc()){
					   
					    $objPre = new Pregunta_Frecuente();
						$objPre->setId($fila["id"]);  
						$objPre->setPregunta($fila["pregunta"]); 
						$objPre->setRespuesta($fila["respuesta"]);
						
						$listaPreguntas[$i] = $objPre; 
						unset($objPre);
						$i++;
					}
						
				}			
				
				$cnn->close();
				return $listaPreguntas;					
				
			}
	
		
	}
?>