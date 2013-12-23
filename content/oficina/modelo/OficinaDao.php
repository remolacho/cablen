<?php

	include_once("../../../helppers/Conexion.php");
	include("Oficina.php");
	
	
	class OficinaDao extends Conexion {
		
		public function buscar($id){
		
				$cnn  = $this->objConexion();
				$sql = "SELECT o.*,f.forma_pago,f.imagen FROM oficinas o INNER JOIN forma_pagos f ". 
				       "ON (o.id_forma_pago = f.id) WHERE o.id=".$id;
					   
				$result = $cnn->query($sql);
				
				if($result->num_rows > 0){		
				
   		   			$objOficina = new Oficina();
					
					while($fila = $result->fetch_assoc()){
					   
					   
						$objOficina->setId($fila["id"]);  
						$objOficina->setNombre($fila["nombre"]); 
						$objOficina->setDireccion($fila["direccion"]);
						$objOficina->setTelefonoF($fila["telefono_fijo"]);
						$objOficina->setTelefonoM($fila["telefono_movil"]);
						$objOficina->setHorarioN($fila["horario_normal"]);
						$objOficina->setHorarioF($fila["horario_festivo"]);
						$objOficina->setForma($fila["forma_pago"]);
						$objOficina->setImagen($fila["imagen"]);
						$objOficina->setCorreo($fila["correo"]);

						
					}
						
				}			
				
				$cnn->close();
				return $objOficina;	
			
		}
		
		public function buscarPrincipal(){
		
				$cnn  = $this->objConexion();
				
				$sql = "SELECT o.*,f.forma_pago,f.imagen FROM oficinas o INNER JOIN forma_pagos f ". 
				       "ON (o.id_forma_pago = f.id) WHERE o.id = 1";
				
				$result = $cnn->query($sql);
				
				if($result->num_rows > 0){		
				
   		   			$objOficina = new Oficina();
					
					while($fila = $result->fetch_assoc()){
					   
					   
						$objOficina->setId($fila["id"]);  
						$objOficina->setNombre($fila["nombre"]); 
						$objOficina->setDireccion($fila["direccion"]);
						$objOficina->setTelefonoF($fila["telefono_fijo"]);
						$objOficina->setTelefonoM($fila["telefono_movil"]);
						$objOficina->setHorarioN($fila["horario_normal"]);
						$objOficina->setHorarioF($fila["horario_festivo"]);
						$objOficina->setForma($fila["forma_pago"]);
						$objOficina->setImagen($fila["imagen"]);
						$objOficina->setCorreo($fila["correo"]); 

					}
						
				}			
				
				$cnn->close();
				return $objOficina;		
		
		}
		
		public function lista($id){
			
				$cnn  = $this->objConexion();
				$sql = "SELECT o.*,f.forma_pago,f.imagen FROM oficinas o INNER JOIN forma_pagos f ". 
				       "ON (o.id_forma_pago = f.id) WHERE o.id_ciudad =".$id;
					   
				$result = $cnn->query($sql);
				
				if($result->num_rows > 0){		
   		   			
					$i=0;
					
					while($fila = $result->fetch_assoc()){
					   
					    $objOficina = new Oficina();
						$objOficina->setId($fila["id"]);  
						$objOficina->setNombre($fila["nombre"]); 
						$objOficina->setDireccion($fila["direccion"]);
						$objOficina->setTelefonoF($fila["telefono_fijo"]);
						$objOficina->setTelefonoM($fila["telefono_movil"]);
						$objOficina->setHorarioN($fila["horario_normal"]);
						$objOficina->setHorarioF($fila["horario_festivo"]);
						$objOficina->setForma($fila["forma_pago"]);
						$objOficina->setImagen($fila["imagen"]);
						$objOficina->setCorreo($fila["correo"]); 
						$listaOficinas[$i] =  $objOficina;
						unset($objOficina);
						$i++;
						
					}
						
				}			
				
				$cnn->close();
				return $listaOficinas;	
			
			
		}
		
		
		public function agregar($objPais){}
		public function actualizar($objPais){}
		public function eliminar($id){}
		
	}

?>
