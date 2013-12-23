<?php

	class Oficina{
		
		private $id;
		private $nombre;
		private $direccion;
		private $telefonoF;
		private $telefonoM;
		private $horarioN;
		private $horarioF;
		private $correo;
		private $idForma;
		private $idCiudad;
		private $forma;
		private $imagen;
		
		public function getId(){
			return $this->id;	
		}
		
		public function getNombre(){
			return $this->nombre;	
		}
		
		public function getDireccion(){
			return $this->direccion;	
		}	
		
		public function getTelefonoF(){
			return $this->telefonoF;	
		}	
		
		public function getTelefonoM(){
			return $this->telefonoM;	
		}
		
		public function getCorreo(){
			return $this->correo;	
		}
		
		public function getIdForma(){
			return $this->idForma;	
		}
		
		public function getIdCiudad(){
			return $this->idCiudad;	
		}
		
		public function getForma(){
			return $this->forma;	
		}
		
		public function getHorarioN(){
			return $this->horarioN;	
		}
		
		public function getHorarioF(){
			return $this->horarioF;	
		}
		
		public function getImagen(){
			return $this->imagen;	
		}		
		
		public function setId($value){
			 $this->id=$value;	
		}
		
		public function setNombre($value){
			 $this->nombre=$value;	
		}
		
		public function setDireccion($value){
			 $this->direccion=$value;	
		}	
		
		public function setTelefonoF($value){
			 $this->telefonoF=$value;	
		}	
		
		public function setTelefonoM($value){
			 $this->telefonoM=$value;	
		}
		
		public function setCorreo($value){
			 $this->correo=$value;	
		}
		
		public function setIdForma($value){
			 $this->idForma=$value;	
		}
		
		public function setIdCiudad($value){
			 $this->idCiudad=$value;	
		}
			
		public function setForma($value){
			 $this->forma=$value;	
		}
		
		public function setImagen($value){
			 $this->imagen=$value;	
		}
		
		public function setHorarioN($value){
			return $this->horarioN=$value;	
		}
		
		public function setHorarioF($value){
			return $this->horarioF=$value;	
		}
		
	}

?>