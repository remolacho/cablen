<?php

	class Usuario{
	
		private $id;
		private $cedula;
		private $nombre;
		private $apellido;
		private $correo;
		private $telefono;
		private $pass;
		private $estatus;
		private $privilegio;
		private $err;
		private $decErr;
		
		public function getId(){return $this->id;}
		public function getCedula(){return $this->cedula;}
		public function getNombre(){return $this->nombre;}
		public function getApellido(){return $this->apellido;}
		public function getCorreo(){return $this->correo;}
		public function getTelefono(){return $this->telefono;}
		public function getPass(){return $this->pass;}
		public function getEstatus(){return $this->estatus;}
		public function getPrivilegio(){return $this->privilegio;}

				
		public function setId($valor){$this->id=$valor;}
		public function setCedula($valor){$this->cedula=$valor;}
		public function setNombre($valor){$this->nombre=$valor;}
		public function setApellido($valor){$this->apellido=$valor;}
		public function setCorreo($valor){$this->correo=$valor;}
		public function setTelefono($valor){$this->telefono=$valor;}
		public function setPass($valor){$this->pass=$valor;}
		public function setEstatus($valor){$this->estatus=$valor;}
		public function setPrivilegio($valor){$this->privilegio=$valor;}

		
	}

?>