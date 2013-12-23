<?php

	include_once("../../../helppers/Conexion.php");
	include("Senal.php");
	
	class SenalDao extends Conexion{
	
		public function guardarCanal($objCanal){}	
		public function guardarSenal($objSenal){}
		
		public function actualizarCanal($objCanal){}	
		public function actualizarSenal($objSenal){}
		
		public function buscarSenalById($id){}
		public function buscarCanalById($id){}
		
		public function listSenal(){
		
				$cnn  = $this->objConexion();
				$sql = "SELECT * FROM senales";
				$result = $cnn->query($sql);
				
				if($result->num_rows > 0){		
   		   			
					$i=0;
					
					while($fila = $result->fetch_assoc()){
					   
					    $objSenal = new Senal();
						$objSenal->setIdSenal($fila["id"]);  
						$objSenal->setSenal($fila["descripcion"]); 
						$listSenal[$i] = $objSenal; 
						unset($objSenal);
						$i++;
						
					}
						
				}			
				
				$cnn->close();
				return $listSenal;	
			
		}
		
		public  function listCiudadesReg(){
		
				$cnn  = $this->objConexion();
				$sql = "SELECT DISTINCT(id_ciudad) FROM grillas";
				
				$result = $cnn->query($sql);
				
				if($result->num_rows > 0){		
   		   			
					$i=0;
					
					while($fila = $result->fetch_assoc()){
					
						$listCiudades[$i] = $fila["id_ciudad"]; 
						$i++;
						
					}
						
				}			
				
				$cnn->close();
				return $listCiudades;		
			
			
		}/*carga los id de las ciudades registradas en la grilla*/
		
		
		public function listGrillaByfilter($strSql){
			
				$cnn  = $this->objConexion();
				$sql = "SELECT* FROM grillas WHERE ".$strSql;
				
				$result = $cnn->query($sql);
				
				$i=0;
				
				if($result->num_rows > 0){		
   		   			while($fila = $result->fetch_assoc()){
 						$objCanal = new Senal();
						$objCanal->setId($fila["id"]);
						$objCanal->setCanal($fila["canal"]);
						$objCanal->setNombre($fila["nombre"]);
						$objCanal->setCantidad($fila["cantidad"]);
						$objCanal->setImg($fila["imagen"]);
						$grilla[$i] = $objCanal; 
						unset($objCanal);
						$i++;
					}
				}			
				
				$cnn->close();
				return $grilla;	
			
		}
		
		
			public function totalRegistros($strSql){
			
				$cnn = $this->objConexion();
		        
		        $sql = "SELECT count(*) AS filas FROM grillas WHERE ".$strSql;
		
		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
					while($fila = $result->fetch_assoc()){    
						$total = $fila["filas"];
					}
						
				}			
				
				$cnn->close();
				return $total;
				
			}
		
		
	}
	
	

?>