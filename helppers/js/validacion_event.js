function solo_numeros(e) { 
	tecla =  e.keyCode;//(document.all) ? e.keyCode : e.which; 
	if (tecla==8 || tecla==9 || (tecla >= 96 && tecla <= 105) || tecla == 13) return true; //Tecla de retroceso (para poder borrar) 
	patron =/[0-9]/; // Solo acepta numeros 
	te = String.fromCharCode(tecla); 
	return patron.test(te); 
	
}

function solo_fechas(e) { 
	tecla =  e.keyCode;//(document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla==9 || (tecla >= 96 && tecla <= 105) || tecla==189 ) return true; //Tecla de retroceso (para poder borrar) 
	patron =/[0-9]/; // Solo acepta numeros 
	te = String.fromCharCode(tecla); 
	return patron.test(te); 
	
}

function solo_montos(e) {
	tecla =  e.keyCode;//(document.all) ? e.keyCode : e.which; 
	if (tecla==8 || tecla==9 || tecla==190 || 
	    tecla==110 || (tecla >= 96 && tecla <= 105) ) 
	return true; //Tecla de retroceso (para poder borrar) 
	
	patron =/[0-9]/; // Solo acepta numeros 
	te = String.fromCharCode(tecla); 
	return patron.test(te); 
	
}

function bloqueo(e) {
	return false;
}


function valOptions(rad1,rad2){
	if (rad1.checked){
		rad2.checked=false;
	}else if (rad2.checked){
		rad1.checked=false;
	}    
}

function validarMail(frm){
	if (frm.nombre.value == ""){
	   alert ("Ingrese el Nombre");
	   frm.nombre.focus();
	   frm.nombre.onfocus();
	}
	
	if (frm.mail.value == ""){
	   alert ("Ingrese el Mail");
	   frm.mail.focus();
	   frm.mail.onfocus();
	}
	
	if (frm.asunto.value == ""){
	   alert ("Ingrese el Asunto");
	   frm.asunto.focus();
	   frm.asunto.onfocus();
	}
		
	frm.submit();
}    
