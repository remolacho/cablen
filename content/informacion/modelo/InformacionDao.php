<?php

	include_once ("../../../helppers/Conexion.php");
	include ("Informacion.php");
	
	class InformacionDao extends Conexion{
	
			public function buscar($argId){
				
				$cnn  = $this->objConexion();
				$sql ="SELECT * FROM informacion_cablen WHERE estatus=1  ORDER BY id DESC";
				$result = $cnn->query($sql);
			
				if($result->num_rows > 0){		
					
					$objInfo = new Informacion();
					
					while($fila = $result->fetch_assoc()){

						$objInfo->setId($fila["id"]);  
						$objInfo->setTitulo($fila["titulo"]); 
						$objInfo->setFechaI($fila["fecha_inicio"]);
						$objInfo->setFechaF($fila["fecha_fin"]);
						$objInfo->setImagen($fila["imagen"]);
						$objInfo->setContenido($fila["contenido"]);
						$objInfo->setEstatus($fila["estatus"]);

					}
					
					
				}
				
				return $objInfo;
				
			}
			
			
			public function agregar($objInfo){
			
				$cnn = $this->objConexion();
				$sql ="INSERT INTO informacion_cablen INTO (titulo,fecha_inicio,fecha_fin,imagen,contenido,estatus) VALUES ('".
				      $objInfo->getTitulo()."','".
					  $objInfo->getFechaI()."','".
					  $objInfo->getFechaF()."','".
					  $objInfo->getImagen()."','".
					  $objInfo->getContenido()."',".
					  $objInfo->getEstatus().")";	
			
				if (!$cnn->query($sql)){
					    //echo $cnn->error;				
						$cnn->close();
						//echo $sql;
						header("Location: ../vista/Error.html");
						return false;	
				}else{
						$cnn->close();
						return true;	
				}
			
			
			}
			
			
			public function actualizar($objInfo){
			
				$cnn = $this->objConexion();
				
				$sql ="UPDATE informacion_cablen SET ".
				      "titulo='".$objInfo->getTitulo()."',".
					  "fecha_inicio='".$objInfo->getFechaI()."',".
					  "fecha_fin='".$objInfo->getFechaF()."',".
					  "imagen='".$objInfo->getImagen()."',".
					  "contenido='".$objInfo->getContenido()."',".
					  "estatus=".$objInfo->getEstatus().
					  " WHERE id=".$objInfo->getId();
					
			
				if (!$cnn->query($sql)){
					    //echo $cnn->error;				
						$cnn->close();
						//echo $sql;
						header("Location: ../vista/Error.html");
						return false;	
				}else{
						$cnn->close();
						return true;	
				}	
				
			}
			
			
			public function eliminar($argId){
			
				$cnn = $this->objConexion();
				
				$sql ="DELETE FROM informacion_cablen WHERE id=".$objInfo->getId();
					
			
				if (!$cnn->query($sql)){
					    //echo $cnn->error;				
						$cnn->close();
						//echo $sql;
						header("Location: ../vista/Error.html");
						return false;	
				}else{
						$cnn->close();
						return true;	
				}	
				
			}
			
			public function lista(){
			    
				$cnn  = $this->objConexion();
				$sql = "SELECT * FROM informacion_cablen WHERE estatus=1 ORDER BY id DESC";
				$result = $cnn->query($sql);
				
				if($result->num_rows > 0){		
   		   			
					$i=0;
					
					while($fila = $result->fetch_assoc()){
					   
					    $objInfo = new Informacion();
						$objInfo->setId($fila["id"]);  
						$objInfo->setTitulo($fila["titulo"]); 
						$objInfo->setFechaI($fila["fecha_inicio"]);
						$objInfo->setFechaF($fila["fecha_fin"]);
						$objInfo->setImagen($fila["imagen"]);
						$objInfo->setContenido($fila["contenido"]);
						$objInfo->setEstatus($fila["estatus"]);
						
						$listaInformacion[$i] = $objInfo; 
						unset($objInfo);
						$i++;
						
					}
						
				}			
				
				$cnn->close();
				return $listaInformacion;
								
			}
	
	}

?>