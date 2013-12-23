<?php
	require_once("../../../helppers/Conexion.php");
	require("Pregunta.php");
	
	class PreguntaDao extends Conexion{
		
			private $cnn;
			private $objPregunta;
			
			public function guardar($ObjQ){	
			}
			
			public function actualizar($ObjQ){	
			}
			
			public function eliminar($argId){	
			}
			
			public function buscar($argId){
				
				$cnn = $this->objConexion();
		        
		        $sql = "SELECT * FROM preguntas WHERE id_pregunta=".$argId;
		
		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
				    
					$objPregunta = new Pregunta();	
   		   			
					while($fila = $result->fetch_assoc()){
						$objPregunta->setId($fila["id_pregunta"]);
						$objPregunta->setPregunta($fila["pregunta"]);
					}
						
				}			
				
				$cnn->close();
	
				return $objPregunta;
			}
			
			public function lista(){
			
				$cnn = $this->objConexion();
				$sql = "SELECT * FROM preguntas";
				$result = $cnn->query($sql);
				$i=0;
		     	
				if($result->num_rows > 0){				
   		   			while($fila = $result->fetch_assoc()){
						$objPregunta = new Pregunta();
						$objPregunta->setId($fila["id_pregunta"]);  
						$objPregunta->setPregunta($fila["pregunta"]);
						$listaPreguntas[$i] = $objPregunta; 
						unset($objPregunta); 
						$i++;
					}	
				}			
				
				$cnn->close();
				
				return $listaPreguntas;
				
			}
		
	}

?>