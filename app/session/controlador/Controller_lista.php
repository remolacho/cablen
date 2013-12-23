<?php
    require_once("../../../app/session/modelo/PreguntaDao.php");   
	/*include_once("../../session/modelo/Pregunta.php");*/
	
	class Controller_Lista{
		
		public function listaPregunta(){
			
			$objPreguntaDao = new PreguntaDao();
			$lista = $objPreguntaDao->lista();
			
			unset($objPreguntaDao);
			return $lista;
			
		}
			
	}

?>