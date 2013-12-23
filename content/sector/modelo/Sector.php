<?php

	class Sector{
	
		private $id;
		private $sector;
		private $id_ciudad;
		
		public function getId(){return $this->id; }	
		public function getSector(){return $this->sector; }	
		public function getIdCiudad(){return $this->id_ciudad; }	
		
		public function setId($value){ $this->id=$value; }	
		public function setSector($value){ $this->sector=$value; }	
		public function setIdCiudad($value){ $this->id_ciudad=$value; }
		
	}

?>