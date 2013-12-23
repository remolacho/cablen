<?php

	class Estado{
	
		private $id;
		private $estado;
		private $id_pais;
		
		public function getId(){return $this->id; }	
		public function getEstado(){return $this->estado; }	
		public function getIdPais(){return $this->id_pais; }	
		
		public function setId($value){ $this->id=$value; }	
		public function setEstado($value){ $this->estado=$value; }	
		public function setIdPais($value){ $this->id_pais=$value; }
		
	}

?>