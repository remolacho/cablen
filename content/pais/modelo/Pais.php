<?php

	class Pais{
		
		private $id;
		private $pais;
		
		public function getId(){
			return $this->id;	
		}
		
		public function getPais(){
			return $this->pais;	
		}
		
		public function setId($value){
			$this->id=$value;	
		}
		
		public function setPais($value){
			$this->pais=$value;	
		}
		
	}

?>