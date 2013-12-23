<?php

	class Senal {
		
		private $id;
		private $canal;
		private $nombre;
		private $cantidad;
		private $img;
		private $id_senal;
		private $senal;
		private $ciudad;
		
		
		public function getId(){return $this->id;}
		public function getCanal(){return $this->canal;}
		public function getNombre(){return $this->nombre;}
		public function getCantidad(){return $this->cantidad;}
		public function getImg(){return $this->img;}
		public function getIdSenal(){return $this->id_senal;}
		public function getSenal(){return $this->senal;}
		public function getCiudad(){return $this->ciudad;}
	
		public function setId($value){ $this->id = $value;}
		public function setCanal($value){ $this->canal= $value;}
		public function setNombre($value){ $this->nombre= $value;}
		public function setCantidad($value){ $this->cantidad= $value;}
		public function setImg($value){ $this->img= $value;}
		public function setIdSenal($value){ $this->id_senal= $value;}
		public function setSenal($value){ $this->senal= $value;}
		public function setCiudad($value){ $this->ciudad= $value;}
	
	
	}

?>