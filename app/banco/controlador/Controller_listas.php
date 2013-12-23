<?php
    
	include_once("../../../admin/historial/modelo/HistorialDao.php");
	/*include_once("../../../app/banco/modelo/BancoDao.php");*/
	/*include_once("./../../banco/modelo/Banco.php");*/
	
	class ControllerLista{
		
		public function listaBanco(){

			$objBancoDao = new BancoDao();
			$lista = $objBancoDao->lista();
			$tamano = sizeof($lista);
			
			for ($i=0;$i< $tamano;$i++){			
				$objBanco = $lista[$i];			
				$arrayBanco[$i] = '<option value='.$objBanco->getId().'>'.$objBanco->getBanco().'</option>';	
				unset($objBanco); 
			}
			
			unset($objSectorDao);
			
			return $arrayBanco;
			
		}
			
	}

?>