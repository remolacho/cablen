<?php
     
	 class Conexion {
	 
 		public function objConexion(){
			$conexion = new mysqli("localhost","valentinasRoot","12345","cablenor_cableN");
            
			if ($conexion->connect_error) {
               die('Error de Conexión (' . $conexion->connect_errno . ') '
                   . $conexion->connect_error);
            }


			return $conexion;
		}
 	}
?>