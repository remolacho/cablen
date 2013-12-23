function cargarCuenta(){	  
		
   	 var id = $("#banco option:selected").val();		
	 $('#cuenta').html('<option>Cargando....</option>');
	 $.ajax({  
    		url: '../../cuenta/controlador/Controller_cuenta.php',
    		data: 'id='+id,
			timeout:10000,
    		success: function(resp){ 
				if (resp != ""){
    				$('#cuenta').html(resp)
					//alert(resp);
				}else{
					$('#cuenta').html('')
				}
			},
            error: function(){
				$('#cuenta').html('')
			} 
	  });
	  
	 // alert (id);	  
}


function enviarPago(frm){
	
	elementos = frm.elements;
	var reg = /^(0[1-9]|[12][0-9]|3[01])[-](0[1-9]|1[012])[-](19|20)[0-9]{2}$/;
	var valCuenta = $("#cuenta option:selected").val();
	var valBanco = $("#banco option:selected").val();
	var valBOrigen = $("#bOrigen option:selected").val();

	if (valCuenta == null || valBanco == null){
		    alert ("Debes Selecionar el Banco y la Cuenta");
			//	alert (valBanco);
			elementos[5].focus();
			elementos[5].onfocus();
	}else if(frm.txtMonto.value == "" || frm.txtDeposito.value==""){
		    alert ("Debes cargar el monto y el numero de deposito");
			//	alert (valBanco);
			elementos[7].focus();
			elementos[7].onfocus();
	}
	
	if (valBOrigen == null){
		    alert ("Debes Selecionar el Banco de Origen");
			//	alert (valBanco);
			elementos[4].focus();
			elementos[4].onfocus();
	}

	if (reg.test(frm.txtFecha.value) == false){
		alert ("El formato de la fecha es invalido");
		elementos[11].focus();
		elementos[11].onfocus();
	}
	
	
	if (confirm('El pago a cargar es de ' + frm.txtMonto.value + ' Bs ¿Esta Seguro?')) {
   		frm.submit();
	} else {
    	elementos[7].focus();
		elementos[7].onfocus();
	}
	
		  
		  
}

function udpPago(frm,fila){
	$(fila).children("td").each(
			function (index) {
				if (index == 7){
					if($(this).attr("id") != 1){
						frm.txtPago.value = fila.id;
	                    frm.submit();
					}else {
						alert("El pago ya fue Cargado en sistema y procesado");   
					}
				}			
			}
	);	
}

function procesarPago(frm){
	
	var longitud = $("#comentario").val().length;
	var estatus = $("#estatus option:selected").val();
	
	if (longitud > 150){
		alert("El comentario es mayor de 150 caracteres");
		frm.comentario.focus();
		frm.comentario.onfocus();
	}
	
	if(estatus == 1){
		estatus = "PROCESADO";	
	}else{
		estatus = "ERROR";
	}
	
	if (confirm('El estatus seleccionado es ' + estatus + ' ¿Esta seguro de realizar el cambio?')) {
   		frm.submit();
	} else {
		frm.cmbEstatus.focus();
		frm.cmbEstatus.onfocus();
	}
}

function validarArchivo(file){ 
      var fileInput = file;              
      var sizeFile = 0;
      if ('files' in fileInput) {
            for (var i = 0; i < fileInput.files.length; i++) {
                var file = fileInput.files[i];
                if ('size' in file) {
                     sizeFile = file.size;
                 }
                 else {
                    sizeFile = file.size;
                 }

						
            }
     } 
			
	if (sizeFile > document.frmPago.MAX_FILE_SIZE.value){
		alert("EL TAMANO DEL ARCHIVO ES MAYOR A 300 KB REDUSCALO PARA QUE PUEDA SER ALMACENADO");
		document.frmPago.txtBauche.value = "";	
	}
			
			
}