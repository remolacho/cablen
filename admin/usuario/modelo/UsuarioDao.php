<?php

	include_once("../../../helppers/Conexion.php");
	include("Usuario.php");
	
	class UsuarioDao extends Conexion{
		
		public function buscarByCed($ced){
		
				$cnn = $this->objConexion();
		        
		        $sql = "SELECT * FROM usuarios WHERE cedula='".$ced."'";
		
		  	    $result = $cnn->query($sql);
			   
			    $objUser = new Usuario();	
				
				if($result->num_rows > 0){		
	   			    
					$objUser = new Usuario();
					
					while($fila = $result->fetch_assoc()){
						$objUser->setId($fila["id"]);  
						$objUser->setCedula($fila["cedula"]); 
						$objUser->setNombre($fila["nombre"]);
						$objUser->setApellido($fila["apellido"]);
						$objUser->setCorreo($fila["correo"]);
						$objUser->setTelefono($fila["telefono"]);
						$objUser->setPass($fila["password"]);
						$objUser->setEstatus($fila["estatus"]);
						$objUser->setPrivilegio($fila["id_privilegio"]);
					}
						
				}			
				
				$cnn->close();
	
				return $objUser;
	
		}
		
		public function agregar($objUser){}
		public function eliminar($id){}
		public function modificar($objUser){}
		
	}

?>