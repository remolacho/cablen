<?php

    include_once("../../../helppers/Conexion.php");
    include("../../cliente/modelo/Cliente.php");

	class SessionDao extends Conexion{
		
			private $objCliente;
			private $listaClientes;
			private $cnn;

			public function guardar($ObjCli){		
			}
			
			public function actualizar($ObjCli){
				 	$cnn = $this->objConexion();			  			   
				   
				   $sql = "UPDATE clientes SET contrasena='".
				   		  utf8_decode($ObjCli->getContrasena()).
				          "' WHERE codigo_abonado=".$ObjCli->getCodigo_abononado().
						  " AND cedula='".$ObjCli->getCedula()."'";					  

					if (!$cnn->query($sql)){
					    /*echo $cnn->error;				
						$cnn->close();*/
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
		        
		        $sql = "SELECT * FROM clientes WHERE cedula='".$argId."'";
		
		  	    $result = $cnn->query($sql);
			    
				if($result->num_rows > 0){		
				    
					$objCliente = new Cliente();	
   		   			
					while($fila = $result->fetch_assoc()){
						$objCliente->setCodigo_abononado($fila["codigo_abonado"]);  
						$objCliente->setCedula($fila["cedula"]); 
						$objCliente->setPrimer_nombre(utf8_encode($fila["primer_nombre"]));
						$objCliente->setPrimer_apellido(utf8_encode($fila["primer_apellido"]));
						$objCliente->setContrasena(utf8_encode($fila["contrasena"]));
						$objCliente->setRespuesta(utf8_encode($fila["respuesta"]));
						$objCliente->setId($fila["id"]);
						$objCliente->setId_pregunta($fila["id_pregunta"]);
                        $objCliente->setCorreo($fila["correo"]);
						$objCliente->setBoxy($fila["boxy"]);
					}
						
				}			
				
				$cnn->close();
				
				return  $objCliente;
		   		
		   }
		   
			public function lista($argId){
				return $listaClientes;
			}
		
	}
		
?>