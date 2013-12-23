<?php
		
	session_name("loginAdmin"); 
	session_start(); 
		
	include("../../../admin/usuario/modelo/UsuarioDao.php");
    include_once("../../../admin/historial/modelo/EventoDao.php");

	
	class ControllerSession {
		
		private $login;
		private $pass;
		private $objUsuario;
		private $objUserDao;
	    private $objEventDao;
			
		public function validarUsuario($ced,$cla){
			
			$objUserDao  = new UsuarioDao();
			$objEventDao = new EventoDao();
			
			$objUsuario = $objUserDao->buscarByCed($ced);
			
			if ($objUsuario != null){
				
				$login = $objUsuario->getCedula();
				$pass = $objUsuario->getPass();
				$estatus = $objUsuario->getEstatus();
				
				unset($objUserDao);
			
				if ($login == $ced && $pass == $cla){
					
					if($estatus == 1){
						
						
						$_SESSION[´usuario´] = $objUsuario->getId(); 
			   	 		$_SESSION[´cedula´] = $objUsuario->getCedula(); 
						$_SESSION[´nombre´] =  $objUsuario->getNombre(); 
						$_SESSION[´apellido´] =  $objUsuario->getApellido(); 
						$_SESSION[´privilegio´] = $objUsuario->getPrivilegio();
                        $_SESSION[´correo´] = $objUsuario->getCorreo();
						
						$datetime = new DateTime();
						$objEvent = new Evento();
						$objEvent->setCedula($_SESSION[´cedula´]);
						$objEvent->setFechaHora($datetime->format('Y/m/d H:i:s'));
						$objEvent->setEnvent("Inicio de Session");
						$objEventDao->agregar($objEvent);
						
						unset($objUsuario);
						unset ($objEvent);
						unset ($objEvent);
						unset ($datetime);
						
						return true; //header("Location: ../index.php");
					}else{
						return false;
					}
				}else{ 
					unset($objUsuario);
			   		return false; // header("Location: ../../session/vista/InicioSession.php");  
				}
			}	
		}
						
	}

?>