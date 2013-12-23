<?php
	session_name("loginAdmin"); 
	session_start(); 
	
	include_once ("../../../admin/usuario/modelo/UsuarioDao.php");

	class Controller_consultas{
		
		public function buscarUser(){
			$objUserDao = new UsuarioDao();
			$objUser = $objUserDao->buscarByCed($_SESSION[´cedula´]);
			$objUser->setEstatus("<font color='#00CC00'>Activo</font>");
			
			switch ($objUser->getPrivilegio()){
				case 1000:
					$objUser->setPrivilegio("<font color='#000033'>Administrador</font>");
					break;
				case 1001:
					$objUser->setPrivilegio("<font color='#000033'>Supervisor</font>");
					break;
				case 1002:
					$objUser->setPrivilegio("<font color='#000033'>Operador</font>");
					break;
				default:
					break;	
			}
			
			unset($objUserDao);
			return $objUser;
		}
	
		
	}

?>