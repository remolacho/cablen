<?php
	
	class Informacion{
		
		private $id;
		private $titulo;
		private $fechaInicio;
		private $fechaFin;
		private $imagen;
		private $contenido;
		private $estatus;
		
		public function getId(){return $this->id;}
		public function getTitulo(){return $this->titulo;}
		public function getFechaI(){return $this->fechaInicio;}
		public function getFechaF(){return $this->fechaFin;}
		public function getImagen(){return $this->imagen;}
		public function getContenido(){return $this->contenido;}
		public function getEstatus(){return $this->estatus;}
		
		public function setId($value){$this->id;}
		public function setTitulo($value){$this->titulo=$value;}
		public function setFechaI($value){$this->fechaInicio=$value;}
		public function setFechaF($value){$this->fechaFin=$value;}
		public function setImagen($value){$this->imagen=$value;}
		public function setContenido($value){$this->contenido=$value;}
		public function setEstatus($value){$this->estatus=$value;}
		
	}
?>