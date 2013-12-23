<?php

	session_name("loginAdmin"); 
	session_start(); 

	include_once("../../../admin/historial/modelo/EventoDao.php");
	
	class Controller_consultas{
		
    	public function listaDeEventos($min,$max){
				$objEventDao = new EventoDao();
				$user = $_SESSION[´cedula´];
				$listaEvent = $objEventDao->listByUser($user,$min,$max);				
				return $listaEvent;	
		}
		
		public function numFilas(){
			$objEventDao = new EventoDao();
		    $user = $_SESSION[´cedula´];
			$numFilas  = $objEventDao->totalRegistros($user);	
			unset($objEventDao);
			return $numFilas;
		}
	
	}

?>