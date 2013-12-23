<?php

	class Pregunta{
		
		private $id;
		private $pregunta;	
	
		public function getId(){	
			return $this->id;	
		}
		
		public function getPregunta(){
			return $this->pregunta;
		}
		
		public function setId($valor){	
			$this->id=$valor;	
		}
		
		public function setPregunta($valor){
			$this->pregunta=$valor;
		}
			
	}	

?>