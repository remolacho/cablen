<?php

	include ("../../../content/pregunta_frecuente/modelo/Pregunta_FrecuenteDao.php");
	
	class Controller_consultas{
	
		public function listAll(){
	
			$objDao = new Pregunta_FrecuenteDao();
			$listPre = $objDao->listAll();
			unset($objDao);
			return $listPre;
	
		}
		
	}

?>