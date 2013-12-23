<?php

	include_once("../../../helppers/Conexion.php");
	include("Cliente.php");

	class ClienteDao extends Conexion{
		
			private $objCliente;
			private $listaClientes;
			private $cnn;

			public function guardar($ObjCli){
				  
				   $cnn = $this->objConexion();			  			   
				   
				   $sql = "INSERT INTO clientes (codigo_abonado,cedula,primer_nombre,segundo_nombre,
				                                primer_apellido,segundo_apellido,telefono_fijo,telefono_movil,
												direccion,sector,correo,contrasena,id_pregunta,".
												"respuesta,boxy,senal) VALUES ('".
												$ObjCli->getCodigo_abononado()."','".
												$ObjCli->getCedula()."','".
						              			utf8_decode($ObjCli->getPrimer_nombre())."','".
												utf8_decode($ObjCli->getSegundo_nombre())."','".
									  			utf8_decode($ObjCli->getPrimer_apellido())."','".
												utf8_decode($ObjCli->getSegundo_apellido())."','".
									  			$ObjCli->getTelefono_fijo()."','".
												$ObjCli->getTelefono_movil()."','".
									  			$ObjCli->getDireccion()."','".
												$ObjCli->getSector()."','".
									  			$ObjCli->getCorreo()."','".
												utf8_decode($ObjCli->getContrasena())."',".
									  			$ObjCli->getId_pregunta().",'".
												utf8_decode($ObjCli->getRespuesta())."','".
												$ObjCli->getBoxy()."','".
												$ObjCli->getSenal()."')";					  

					if (!$cnn->query($sql)){
					    /*echo $cnn->error;				
						echo $sql;*/
						$cnn->close();
						header("Location: ../vista/Error.html");
						return false;	
					}else{
						$cnn->close();
						return true;	
					}
				
			}
			
			public function actualizar($ObjCli){
				  
				   $cnn = $this->objConexion();			  			   
				   
				   $sql = "UPDATE clientes SET codigo_abonado='".$ObjCli->getCodigo_abononado().
				          					 "',cedula='".$ObjCli->getCedula().
											 "',primer_nombre='".$ObjCli->getPrimer_nombre().
						 					 "',segundo_nombre='".$ObjCli->getSegundo_nombre().
											 "',primer_apellido='".$ObjCli->getPrimer_apellido().
											 "',segundo_apellido='".$ObjCli->getSegundo_apellido().
						  					 "',telefono_fijo='".$ObjCli->getTelefono_fijo().
											 "',telefono_movil='".$ObjCli->getTelefono_movil().
											 "',direccion='".$ObjCli->getDireccion().
						  					 "',sector='".$ObjCli->getSector().
											 "',correo='".$ObjCli->getCorreo().
						  					 "',id_pregunta=".$ObjCli->getId_pregunta().
											 ",respuesta='".$ObjCli->getRespuesta().
						  					 "' WHERE id=".$ObjCli->getId();
				 
					if (!$cnn->query($sql)){
						header("Location: ../vista/Error.html");
						return false;	
					}else{
						$cnn->close();
						return true;	
					}
				
			}
			
			public function cabioClave($abonado){
				
							   $cnn = $this->objConexion();			  			   
				   
				   $sql = "UPDATE clientes SET contrasena='".$pass.
				          					 "',cedula='".$ObjCli->getCedula().
											 "',primer_nombre='".utf8_decode($ObjCli->getPrimer_nombre()).
						 					 "',segundo_nombre='".utf8_decode($ObjCli->getSegundo_nombre()).
											 "',primer_apellido='".utf8_decode($ObjCli->getPrimer_apellido()).
											 "',segundo_apellido='".utf8_decode($ObjCli->getSegundo_apellido()).
						  					 "',telefono_fijo='".$ObjCli->getTelefono_fijo().
											 "',telefono_movil='".$ObjCli->getTelefono_movil().
											 "',direccion='".$ObjCli->getDireccion().
						  					 "',sector='".$ObjCli->getSector().
											 "',correo='".$ObjCli->getCorreo().
						  					 "',id_pregunta=".$ObjCli->getId_pregunta().
											 ",respuesta='".utf8_decode($ObjCli->getRespuesta()).
						  					 "' WHERE id=".$ObjCli->getId();
				 
					if (!$cnn->query($sql)){
						header("Location: ../vista/Error.html");
						return false;	
					}else{
						$cnn->close();
						return true;	
					}	
				
			}
			
			public function eliminar($argId){
				
				
			}
			
			public function buscar($argId){
				
				$cnn = $this->objConexion();
		        
		        $sql = "SELECT * FROM clientes WHERE id=".$argId;
		
		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
				    
					$objCliente = new Cliente();	
   		   			
					while($fila = $result->fetch_assoc()){
						$objCliente->setCodigo_abononado($fila["codigo_abonado"]);  
						$objCliente->setCedula($fila["cedula"]); 
						$objCliente->setPrimer_nombre(utf8_encode($fila["primer_nombre"]));
						$objCliente->setSegundo_nombre(utf8_encode($fila["segundo_nombre"]));
						$objCliente->setPrimer_apellido(utf8_encode($fila["primer_apellido"]));
						$objCliente->setSegundo_apellido(utf8_encode($fila["segundo_apellido"]));
						$objCliente->setDireccion($fila["direccion"]);
						$objCliente->setCorreo($fila["correo"]);
						$objCliente->setTelefono_fijo($fila["telefono_fijo"]);
						$objCliente->setTelefono_movil($fila["telefono_movil"]);
						$objCliente->setContrasena(utf8_encode($fila["contrasena"]));
						$objCliente->setRespuesta(utf8_encode($fila["respuesta"]));
						$objCliente->setId($fila["id"]);
						$objCliente->setId_pregunta($fila["id_pregunta"]);
						$objCliente->setSector($fila["sector"]);
						$objCliente->setBoxy($fila["boxy"]);
						$objCliente->setSenal($fila["senal"]);
					}
						
				}			
				
				$cnn->close();
	
				return $objCliente;
			
			}
			
			
			public function searchByAbonado($argId){
				
				$cnn = $this->objConexion();
		        
		        $sql = "SELECT * FROM clientes WHERE codigo_abonado='".$argId."'";
		
		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
				    
					$objCliente = new Cliente();	
   		   			
					while($fila = $result->fetch_assoc()){
						$objCliente->setCodigo_abononado($fila["codigo_abonado"]);  
						$objCliente->setCedula($fila["cedula"]); 
						$objCliente->setPrimer_nombre(utf8_encode($fila["primer_nombre"]));
						$objCliente->setSegundo_nombre(utf8_encode($fila["segundo_nombre"]));
						$objCliente->setPrimer_apellido(utf8_encode($fila["primer_apellido"]));
						$objCliente->setSegundo_apellido(utf8_encode($fila["segundo_apellido"]));
						$objCliente->setDireccion($fila["direccion"]);
						$objCliente->setCorreo($fila["correo"]);
						$objCliente->setTelefono_fijo($fila["telefono_fijo"]);
						$objCliente->setTelefono_movil($fila["telefono_movil"]);
						$objCliente->setContrasena(utf8_encode($fila["contrasena"]));
						$objCliente->setRespuesta(utf8_encode($fila["respuesta"]));
						$objCliente->setId($fila["id"]);
						$objCliente->setId_pregunta($fila["id_pregunta"]);
						$objCliente->setSector($fila["sector"]);
						$objCliente->setBoxy($fila["boxy"]);
						$objCliente->setSenal($fila["senal"]);
					}
						
				}			
				
				$cnn->close();
	
				return $objCliente;
			
			}
			
			public function lista($argId){
				
				return $listaClientes;
				
			}
		
	}
		
?>