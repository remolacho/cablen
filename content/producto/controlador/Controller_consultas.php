<?php
    
	include_once ("../../../content/ciudad/modelo/CiudadDao.php");
	include_once ("../../../content/producto/modelo/SenalDao.php");
	include_once ("../../../content/producto/modelo/PaqueteDao.php");
	
	class Controller_consultas{
		
		public function listaSenales(){
			
			$objDao = new SenalDao();
			$listSenales=$objDao->listSenal();  
			unset($objDao);
			return $listSenales;
		
		}
		
		public function listaCiudades(){
			
			$objCiudadDao = new CiudadDao();
			$objSenalDao = new SenalDao();
			
			$listIds = $objSenalDao->listCiudadesReg();
			$strIds = implode(",",$listIds);	
			
			$listCiudades = $objCiudadDao->listaByIds($strIds);
				
			unset($objCiudadDao);
			unset($objSenalDao);
			return $listCiudades;
			
		}
		
		public function listaPaquetesTv(){
		
			$objPaqueteDao  = new PaqueteDao();
			$list = $objPaqueteDao->listPaquetesTv();
			unset ($objPaqueteDao);
			return $list;
	
		}
		
	}

?>