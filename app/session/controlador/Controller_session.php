<?php
		session_name("loginUsuario"); 
		session_start(); 
		
		include_once("../../../app/session/modelo/SessionDao.php");
		include_once("../../../app/session/modelo/PreguntaDao.php");
		include_once("../../../app/session/modelo/Pregunta.php");

	
	class ControllerSession {
		
		private $login;
		private $pass;
		private $objCliente;
		private $objSession;
		
		public function validarUsuario($ced,$cla){
			
			$objSession  = new SessionDao();
			$objCliente = $objSession->buscar($ced);
			
			if ($objCliente != null){
				
				$login = $objCliente->getCedula();
				$pass = $objCliente->getContrasena();
			
				unset($objSession);
			
				if ($login == $ced && $pass == $cla){
					$_SESSION[´abonado´] = $objCliente->getCodigo_abononado(); 
			   	 	$_SESSION[´nombre´] = $objCliente->getPrimer_nombre(); 
					$_SESSION[´apellido´] =  $objCliente->getPrimer_apellido(); 
					$_SESSION[´id´] =  $objCliente->getId(); 
					$_SESSION[´cedula´] = $objCliente->getCedula();
					$_SESSION[´boxy´] = $objCliente->getBoxy();
                    $_SESSION[´correo´] = $objCliente->getCorreo();
					unset($objCliente);
					return true; //header("Location: ../index.php");
				}else{ 
					unset($objCliente);
			   		return false; // header("Location: ../../session/vista/InicioSession.php");  
				}
			}	
		}
		
		public function validarCambioClave($abo,$ced,$rep,$newPass){
			
			$objSession  = new SessionDao();
			$objCliente = $objSession->buscar($ced);
			
			if ($objCliente != null){
				
				$cedula = $objCliente->getCedula();
			    $abonado = $objCliente->getCodigo_abononado();
				$repuesta = $objCliente->getRespuesta();
			
				if (($cedula == $ced && $abonado == $abo) && $repuesta==$rep){
					$objCliente->setContrasena($newPass);
					$objSession->actualizar($objCliente);
					unset($objCliente);
					unset($objSession);
					return true; 
				}else{ 
					unset($objCliente);
					unset($objSession);
			   		return false; 
				}
			}	
		}
		
		public function secretQ($ced){
			
			$objSession  = new SessionDao();
			$objCliente = $objSession->buscar($ced);
			
			if ($objCliente != null){	
				$objPregntaDao = new PreguntaDao();
				$idResp = $objCliente->getId_pregunta();
				$objPregunta = $objPregntaDao->buscar($idResp);
				unset($objPregntaDao);
				unset($objSession);
				return $objPregunta->getPregunta();
			}else{
				unset($objSession);
				unset($objCliente);
			    return "";
			}	
			
		}
				
	}

?>