<?php

	class Evento{
		
		private $id;
		private $cedula;
		private $fechaHora;
		private $envent;
		
		public function getId(){return $this->id;}
		public function getCedula(){return $this->cedula;}
		public function getFechaHora(){return $this->fechaHora;}
		public function getEnvent(){return $this->envent;}
		
		public function setId($value){$this->id = $value;}
		public function setCedula($value){$this->cedula = $value;}
		public function setFechaHora($value){$this->fechaHora = $value;}
		public function setEnvent($value){$this->envent = $value;}
		
	}

?>