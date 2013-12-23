function enviar(form){
	form.sw.value = "iniciar";
	form.submit();
}s

function questionSecret(ced){	 
	 
	 if(ced != ""){
		$.ajax({  
    		url: '../../session/controlador/Controller_pregunta.php',
    		data: 'id='+ced,
    		success: function(resp){ 
				if (resp != ""){
    				$('#qs').html(resp)
				} 
			} 
		});
	}else{
		alert("Debes Ingresar la Cedula");
	}
}