<?php

	class Cuenta{
		
		private $id;
		private $num_cuenta;	
	    private $idBanco;
		
		public function getId(){	
			return $this->id;	
		}
		
		public function getNum_cuenta(){
			return $this->num_cuenta;
		}
		
		public function getIdBanco(){	
			return $this->idBanco;	
		}
		
	
		
		public function setId($valor){	
			$this->id=$valor;	
		}
		
		public function setNum_cuenta($valor){
			 $this->num_cuenta = $valor;
		}
		
		public function setIdBanco($valor){	
			 $this->idBanco = $valor;	
		}
		
			
	}	

?>