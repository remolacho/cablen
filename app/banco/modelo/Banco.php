<?php

	class Banco{
		
		private $id;
		private $banco;	

		
		public function getId(){	
			return $this->id;	
		}
		
		public function getBanco(){
			return $this->banco;
		}
		
		
		public function setId($valor){	
			$this->id=$valor;	
		}
		
		public function setBanco($valor){
			$this->banco=$valor;
		}
					
	}	

?>