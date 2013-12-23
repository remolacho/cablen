<?php

     class Pago{
	 
	 	private $id;
		private $codigo_abonado;
		private $monto; 
		private $octeto; 
		private $id_banco; 
		private $num_deposito; 
		private $fecha_deposito; 
		private $fecha_registro;
		private $fecha_modificado;
		private $estatus;
		private $observacion;
		private $bancoOrigen;
		private $img_pago;
		
		public function getId(){
			return $this->id;
		}
		
		public function getCodigo_abonado(){
			return $this->codigo_abonado;
		}
		
		public function getMonto(){
			return $this->monto;
		}
		
		public function getOcteto(){
			return $this->octeto;
		}
		
		public function getId_banco(){
			return $this->id_banco;
		}
		
		public function getNum_deposito(){
			return  $this->num_deposito;
		}
		
		public function getFecha_deposito(){
			 return $this->fecha_deposito;
		}
		 
		public function getFecha_registro(){
			 return $this->fecha_registro;
		} 
		
		public function getFecha_modificado(){
			 return $this->fecha_modificado;
		} 
		
		public function getEstatus(){
			 return $this->estatus;
		} 
		
		public function getObservacion(){
			 return $this->observacion;
		}
		
		public function getImg_pago(){
			 return $this->img_pago;
		} 

		public function setId($valor){
			$this->id = $valor;
		}
		
		public function setCodigo_abonado($valor){
			$this->codigo_abonado = $valor;
		}
		
		public function setMonto($valor){
			 $this->monto = $valor;
		}
		
		public function setOcteto($valor){
			 $this->octeto = $valor;
		}
		
		public function setId_banco($valor){
			 $this->id_banco = $valor;
		}
		
		public function setNum_deposito($valor){
			 $this->num_deposito = $valor;
		}
		
		public function setFecha_deposito($valor){
			 $this->fecha_deposito = $valor;
		}
		 
		public function setFecha_registro($valor){
			 $this->fecha_registro = $valor;
		}
		
		public function setFecha_modificado($valor){
			 $this->fecha_modificado = $valor;
		} 	
		
		public function setEstatus($valor){
			 $this->estatus = $valor;
		}	
		
		public function setObservacion($valor){
			 $this->observacion = $valor;
		}
		
		public function getBancoOrigen(){
			return $this->bancoOrigen;
		}
		
		public function setBancoOrigen($value){
			$this->bancoOrigen=$value;
		}
		
		public function setImg_pago($value){
			$this->img_pago=$value;
		}
	
	 }

?>