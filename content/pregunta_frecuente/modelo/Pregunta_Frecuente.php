<?php

	class Pregunta_Frecuente {
	
		private $id;
		private $pregunta;
		private $respuesta;
		
		public function getId(){ return $this->id;}
		public function getPregunta(){ return $this->pregunta;}
		public function getRespuesta(){ return $this->respuesta;}
		
		public function setId($value){ $this->id = $value;}
		public function setPregunta($value){ $this->pregunta = $value;}
		public function setRespuesta($value){ $this->respuesta = $value;}
			
		
	}

?>