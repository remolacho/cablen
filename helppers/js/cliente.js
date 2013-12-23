function solicitarServicio(e){
	tecla =  e.keyCode;

	if (tecla == 13){
		cargarAbonado();	   
	}
	
}

function cargarAbonado(){	  
     var retries =0;
	 var maxRetries=5;
   	 var id = $("#cedula").val();
	 var senal = $("input[name='rSenal']:checked").val();	
	 if (senal != null && id != ""){
	 	$('#tbl').html("<tr><td><h1>Cargando.......</h1><td></tr>");
		$.ajax({  
    		type: "POST",
			url: '../../cliente/controlador/Controller_servicio.php',
    		data: 'id='+id+'&senal='+senal,
			timeout:20000,
    		success: function(resp){ 
				if (resp != ""){
    				$('#tblCliente').html(resp);
					$('#tbl').css("display","none");
				} 
			},
            error: function(){
	             $('#tbl').css("display","none");
				 $('#tblCliente').html
				 ("<tr><td><h1>Estamos Presentando problemas con nuestro servidor ofrecemos disculpas" + 
				  "<tr><td><a href='Registrar.php'>Intentar una vez mas</a></td></tr></h1</td></tr>");	    
            } 
	 	});
	 }else{
		alert("Debes seleccionar un tipo Señal o ingresar la CI");	 
	 } 
}

function enviar(frmCli) { 
	elementos = frmCli.elements;
	//alert (elementos.length);
	var i=0;
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
	for(i=0;i< elementos.length; i++ ){
	
		if(elementos[i].type == 'text' || elementos[i].type == 'password') {
			switch (i)	{			
				case 2:
					break;
				case 4:
					break;
				case 5:
					break;
				default:
				    if(elementos[i].value == "") {
						alert ("El campo " + elementos[i].id + " esta vacio");
						elementos[i].focus();
						elementos[i].onfocus();
					}
					break;
			}
		}
		
		
	}
	
		//valida el formato del correo
	if (reg.test(elementos[7].value) == false){
		alert ("El formato del correo no es valido");
		elementos[7].focus();
		elementos[7].onfocus();
	}
	
	//se realiza esta condicion debido a que es utilizado este helper tanto para registrar y actualizar cliente
	if(elementos.length > 14){ 
		if(elementos[11].value != elementos[12].value) {
			alert ("Verifique que la Contraseña sea igual");
			elementos[12].focus();
			elementos[12].onfocus();	        
		}
	}
	
	frmCli.submit();
	
}
