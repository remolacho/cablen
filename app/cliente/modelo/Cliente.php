<?php

	class Cliente{
		
		private $codigo_abononado;
		private $cedula;
		private $primer_nombre;
		private $segundo_nombre;
		private $primer_apellido;
		private $segundo_apellido;
		private $correo;
		private $telefono_fijo;
		private $telefono_movil;
		private $direccion;
		private $contrasena;
		private $sector;
		private $id_pregunta;
		private $respuesta;
		private $id;
		private $boxy;
		private $senal;
		
		public function getCodigo_abononado(){return $this->codigo_abononado; } 
		public function getCedula(){return $this->cedula; } 
		public function getPrimer_nombre(){return $this->primer_nombre; } 
		public function getSegundo_nombre(){return $this->segundo_nombre; } 
		public function getPrimer_apellido(){return $this->primer_apellido; } 
		public function getSegundo_apellido(){return $this->segundo_apellido; } 
		public function getCorreo(){return $this->correo; } 
		public function getTelefono_fijo(){return $this->telefono_fijo; } 
		public function getTelefono_movil(){return $this->telefono_movil; } 		
		public function getDireccion(){return $this->direccion; } 
		public function getContrasena(){return $this->contrasena; } 
		public function getSector(){return $this->sector; } 
		public function getId_pregunta(){return $this->id_pregunta; } 
		public function getRespuesta(){return $this->respuesta; } 
		public function getId(){return $this->id; } 
		public function getBoxy(){return $this->boxy; } 
		public function getSenal(){return $this->senal; } 
		public function setCodigo_abononado($valor){ $this->codigo_abononado=$valor; } 
		public function setCedula($valor){ $this->cedula=$valor; } 
		public function setPrimer_nombre($valor){ $this->primer_nombre=$valor; } 
		public function setSegundo_nombre($valor){ $this->segundo_nombre=$valor; } 
		public function setPrimer_apellido($valor){ $this->primer_apellido=$valor; } 
		public function setSegundo_apellido($valor){ $this->segundo_apellido=$valor; } 
		public function setCorreo($valor){ $this->correo=$valor; } 
		public function setTelefono_fijo($valor){ $this->telefono_fijo=$valor; } 
		public function setTelefono_movil($valor){ $this->telefono_movil=$valor; } 		
		public function setDireccion($valor){ $this->direccion=$valor; } 
		public function setContrasena($valor){ $this->contrasena=$valor; } 
		public function setSector($valor){ $this->sector=$valor; } 
		public function setId_pregunta($valor){ $this->id_pregunta=$valor; } 
		public function setRespuesta($valor){ $this->respuesta=$valor; } 
		public function setId($valor){ $this->id=$valor; }
		public function setBoxy($valor){ $this->boxy=$valor;}
		public function setSenal($valor){ $this->senal=$valor;}
	}
		
?>