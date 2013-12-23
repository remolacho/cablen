<?php

	include ("../../../content/informacion/modelo/InformacionDao.php");

	class Controller_consultas{
		
		public function lista(){
		
			$objInfoDao = new InformacionDao();
			$listaInfo = $objInfoDao->lista();
			unset($objInfoDao);
			return $listaInfo;
			
		}
		
	}
?>