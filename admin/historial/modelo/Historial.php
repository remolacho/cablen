<?php

	include("../../../app/pago/modelo/PagoDao.php");
	include("../../../app//banco/modelo/BancoDao.php");
	include("../../../admin/usuario/modelo/UsuarioDao.php");
	
	class Historial{
	
		private $id;
		private $cedula;
		private $idPago;
		private $fechaR;
		private $fechaM;
		private $observacion;
		private $objBanco;
		private $objUser;
		private $estatus;
		private $id_banco;
		private $fechaDep;
		private $monto;
		private $cuenta;
		private $numDep;
		
		
		public function getId(){return $this->id;}
		public function getCedula(){return $this->cedula;}
		public function getIdPago(){return $this->idPago;}
		public function getFechaR(){return $this->fechaR;}
		public function getFechaM(){return $this->fechaM;}
		public function getObjBanco(){return $this->objBanco;}
		public function getObjUser(){return $this->objUser;}
		public function getObservacion(){return $this->observacion;}
		public function getEstatus(){return $this->estatus;}
		public function getIdBanco(){return $this->id_banco;}
		public function getFechaDep(){return $this->fechaDep;}
		public function getMonto(){return $this->monto;}
		public function getCuenta(){return $this->cuenta;}
		public function getNumDep(){return $this->numDep;}
					
		public function setId($value){$this->id=$value;}
		public function setCedula($value){$this->cedula=$value;}
		public function setIdPago($value){$this->idPago=$value;}
		public function setFechaR($value){$this->fechaR=$value;}
		public function setFechaM($value){$this->fechaM=$value;}
		public function setObjBanco($value){$this->objBanco=$value;}
		public function setObjUser($value){$this->objUser=$value;}
		public function setObservacion($value){$this->observacion=$value;}		
		public function setEstatus($value){$this->estatus=$value;}	
		public function setIdBanco($value){$this->id_banco=$value;}
		public function setFechaDep($value){$this->fechaDep=$value;}
		public function setMonto($value){$this->monto=$value;}
		public function setCuenta($value){$this->cuenta=$value;}
		public function setNumDep($value){$this->numDep=$value;}
		
	}

?>