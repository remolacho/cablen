<?php

	class Paquete{
		
		private $id;
		private $nombre;
		private $sector;
		private $senal;
		private $tarifa;
		private $id_producto;
		private $producto;
	
		public function getId(){return $this->id;}
		public function getNombre(){return $this->nombre;}
		public function getSector(){return $this->sector;}
		public function getSenal(){return $this->senal;}
		public function getTarifa(){return $this->tarifa;}
		public function getIdProd(){return $this->id_producto;}
		public function getProducto(){return $this->producto;}
		
		public function setId($value){$this->id=$value;}
		public function setNombre($value){$this->nombre=$value;}
		public function setSector($value){$this->sector=$value;}
		public function setSenal($value){$this->senal=$value;}
		public function setTarifa($value){$this->tarifa=$value;}
		public function setIdProd($value){$this->id_producto=$value;}
		public function setProducto($value){$this->producto=$value;}
		
	
	}
?>