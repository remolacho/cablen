<?php

	include_once("../../../helppers/Conexion.php");
	include("Evento.php");

	class EventoDao extends Conexion{
		
		private $listEvent;
		
		public function agregar($objEvent){
		
			$cnn = $this->objConexion();			  			   
				   
			$sql = "INSERT INTO eventos_usuarios (cedula_usuario,fecha_evento,evento) VALUES ('".
				   $objEvent->getCedula()."','".
				   $objEvent->getFechaHora()."','".
				   $objEvent->getEnvent()."')";  

			if (!$cnn->query($sql)){
					    echo $cnn->error;				
						echo '</br>';
						echo $sql;
						/*$cnn->rollback();*/
						$cnn->close();
						//header("Location: ../vista/Error.html");
						return false;	
			}else{
						/*$cnn->commit();*/
						$cnn->close();
						return true;	
			}
			
		}
		
		public function listByUser($user,$min,$max){
			
				$cnn = $this->objConexion();
		        
		        $sql = "SELECT * FROM eventos_usuarios WHERE cedula_usuario='".$user."' LIMIT ".$min.",".$max;
		
		  	    $result = $cnn->query($sql);

				if($result->num_rows > 0){		
					
					$i=0; /*inicializar la variable si no el obj llega vacio*/
					
					while($fila = $result->fetch_assoc()){
						
						$objEvento = new Evento();
						
						$objEvento->setId($fila["id"]);  
						$objEvento->setCedula($fila["cedula_usuario"]); 
						$objEvento->setEnvent($fila["evento"]);
						$objEvento->setFechaHora($fila["fecha_evento"]);
						
						$listEvent[$i] = $objEvento; 
						unset($objEvento);
						$i++;
					}
						
				}			
				
				$cnn->close();
	
				return $listEvent;
			
		}
		
		
		public function totalRegistros($user){
			
				$cnn = $this->objConexion();
		        
		        $sql = "SELECT count(*) as Filas FROM eventos_usuarios WHERE cedula_usuario='".$user."'";
		
		  	    $result = $cnn->query($sql);

				if($result->num_rows > 0){		
					while($fila = $result->fetch_assoc()){
						$total=($fila["Filas"]); 
					}
				}			
				
				$cnn->close();
                return $total;
		}
	
		
	}

?>