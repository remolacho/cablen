<?php

	class Forma_Pago{
	
		private $id;
		private $forma_pago;
		private $imagen;
		
		public function getId(){return $this->id; }	
		public function getForma(){return $this->forma_pago; }	
		public function getImagen(){return $this->imagen; }	
		
		public function setId($value){ $this->id=$value; }	
		public function setForma($value){ $this->forma_pago=$value; }	
		public function setImagen($value){ $this->imagen=$value; }
		
	}

?>