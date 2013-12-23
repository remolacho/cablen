<?php

	class Abonado{
		private  $abonado;
		private $nombre;
		private $apellido;
		private $boxy;
		private $descError;
		private $error;
		private $sector;
	
		public function getSector() {
			return $sector;
		}
		public function setSector($sector) {
			$this->sector = $sector;
		}
		public function getError() {
			return $this->$error;
		}
		public function setError($error) {
			$this->error = $error;
		}
		public function getAbonado() {
			return $abonado;
		}
		public function setAbonado($abonado) {
			$this->abonado = $abonado;
		}
		public function getNombre() {
			return $nombre;
		}
		public function setNombre( $nombre) {
			$this->nombre = $nombre;
		}
		public function getApellido() {
			return $apellido;
		}
		public function setApellido($apellido) {
			$this->apellido = $apellido;
		}
		public function getBoxy() {
			return $boxy;
		}
		public function setBoxy($boxy) {
			$this->boxy = $boxy;
		}
		public function getDescError() {
			return $descError;
		}
		public function setDescError($descError) {
			$this->descError = $descError;
		}
	}
		
?>