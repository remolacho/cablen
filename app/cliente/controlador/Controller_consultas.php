<?php
	session_name("loginUsuario"); 
	session_start();

	include_once("../../../app/cliente/modelo/ClienteDao.php");
	include_once("../../../app/session/modelo/PreguntaDao.php");
	
	class ControllerConsultas{
		
		public function buscarCliente(){
			$objCliemteDao = new ClienteDao();
		    $objCliente = $objCliemteDao->buscar($_SESSION[´id´]); 
			unset($objCliemteDao);
			return $objCliente;
		}
		
		
		public function buscarPregunta(){
			$objPreguntaDao = new PreguntaDao();
			$objCliemteDao = new ClienteDao();
		    $objCliente = $objCliemteDao->buscar($_SESSION[´id´]); 
			$objPregunta = $objPreguntaDao->buscar($objCliente->getId_pregunta());
			unset($objPreguntaDao);
			unset($objCliemteDao);
			unset($objCliente);
			return $objPregunta;
		}
		
				
	}
	
?>