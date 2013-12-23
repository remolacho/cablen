<?php

	class Ciudad{
	
		private $id;
		private $ciudad;
		private $id_estado;
		
		public function getId(){return $this->id; }	
		public function getCiudad(){return $this->ciudad; }	
		public function getIdEstado(){return $this->id_estado; }	
		
		public function setId($value){ $this->id=$value; }	
		public function setCiudad($value){ $this->ciudad=$value; }	
		public function setIdEstado($value){ $this->id_estado=$value; }
		
	}

?>