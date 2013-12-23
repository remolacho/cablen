<?php

	include_once("../../../content/oficina/modelo/OficinaDao.php");
	include_once("../../../content/estado/modelo/EstadoDao.php");
	
	class Controllar_ConsultaOficina{
		
		public function principal(){			
			$objDao = new OficinaDao();
			$objOficina = $objDao->buscarPrincipal();
			unset($objDao);
			return $objOficina;
		}
		
		public function listaEstados(){
			$id = 1000 /*$_POST['cmbPais']*/;	
			$objDao = new EstadoDao();
			$lista = $objDao->lista($id);
			unset ($objDao);	
			return($lista);
		}

	
	}

?>