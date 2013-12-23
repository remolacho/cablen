function paginarEvent(id){	
	var strUrl = '../../historial/controlador/Controller_pag_event.php';	
	var parm = 'pag='+id;
	paginar(parm,strUrl);
	
}

function paginarPagosByAbonado(id){	
	var strUrl = '../../pago/controlador/Controller_pag_pagos_by_abo.php';
	var parm = 'pag='+id;
	paginar(parm,strUrl);
}


function paginarServHistByAbonado(id){	
	var strUrl = '../../historial_abonado/controlador/Controller_servicio_historial.php';
	var parm = 'pag='+id;
	paginar(parm,strUrl);
}

function paginarGrilla(id){	

	var senal = $("#senal option:selected").val(); 
	var ciudad = $("#ciudad option:selected").val();
	
	var strUrl = '../../producto/controlador/Controller_filter_senal.php';
	var parm = 'pag='+id+'&senal='+senal+'&ciudad='+ciudad;
	           
	//alert (parm);
	paginar(parm,strUrl);
}


function paginar(parm,strUrl){
	$.ajax({  
    		type: "POST",
			url: strUrl,
    		data: parm,
			timeout:20000,
    		success: function(resp){ 
				if (resp != ""){
    				$('#formulario').html(resp);
				} 
			},
            error: function(){
				 $('#formulario').html
				 ("<tr><td><h1>Estamos Presentando problemas con nuestro servidor ofrecemos disculpas" + 
				  "<tr><td><a href='Registrar.php'>Intentar una vez mas</a></td></tr></h1</td></tr>");	    
            } 
	});

}