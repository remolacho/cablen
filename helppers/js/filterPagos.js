// JavaScript Document
/*maximo de caracteres para un textArea con su respectivo contado*/
$(document).ready(function() {

				var total_letras = 150;

				$('#comentario').keyup(function() {
   			    var longitud = $(this).val().length;
				
    			var resto = total_letras - longitud;
    			$('#numero').html('<div><font color="#999" size="1">'+resto+'</font></div>');
    			if(resto <= 0){
        			$('#comentario').attr("maxlength", 150);
    			}
				});

});

function lista_por_procesar(){
	
	 var parm    = null;
	 var desde   = $("#desde").val();
	 var hasta   = $("#hasta").val();
	 var filtro  = $("input[name='rFilter']:checked").val();
	 var banco   = $("#banco option:selected").val();
	 var abonado = $("#txtAbonado").val();
	 var strUrl  = '../../pago/controlador/Controller_filter_procesar.php'; 
	 parm = 'desde='+desde+'&hasta='+hasta+'&filtro='+filtro+'&banco='+banco+
	 '&abonado='+abonado;	
	//'desde='+desde+'&hasta='+hasta
	 $('#carga').html("<tr><td><h1>Cargando......</h1></td></tr>");
	// $('#carga').show();
	 
	 procesarFiltro(parm,strUrl);
	
}

function listByFilterProcesados(){
	
	 var parm    = null;
	 var desde   = $("#desde").val();
	 var hasta   = $("#hasta").val();
	 var banco   = $("#banco option:selected").val();
	 var strUrl  = '../../historial/controlador/Controller_filter_procesados.php'; 
	 parm = 'desde='+desde+'&hasta='+hasta+'&banco='+banco;	
	//'desde='+desde+'&hasta='+hastas
	 $('#carga').html("<tr><td><h1>Cargando......</h1></td></tr>");
	/* $('#carga').show();
	 $('#tblPagos').hide('slow');*/
	 
	 procesarFiltro(parm,strUrl);
	
}

function historial_por_abonado(){
	
	 var parm    = null;
	 var desde   = $("#desde").val();
	 var hasta   = $("#hasta").val();
	 var strUrl  = '../../historial_abonado/controlador/Controller_servicio_historial.php'; 
	 parm = 'desde='+desde+'&hasta='+hasta;	
	//'desde='+desde+'&hasta='+hastas
	 $('#carga').html("<tr><td><h1>Cargando......</h1></td></tr>");
	 $('#carga').show();
	 $('#tblPagos').hide('slow');
	 $('#imgBanner').hide('slow');
	 
	 procesarFiltro(parm,strUrl);
	
}

function procesarFiltro(parametros,strUrl){
	 $.ajax({  
    		type: "POST",
			url: strUrl,
    		data: parametros,
			timeout:20000,
    		success: function(resp){ 
				if (resp != ""){
    				$('#tblPagos').html(resp);
					$('#tblPagos').show();
					$('#carga').html('');
					
				} 
			},
            error: function(){
	             $('#carga').html("");
				 $('#tblPagos').html
				 ("<tr><td><h3>Estamos Presentando problemas con nuestro servidor ofrecemos disculpas</h3></td></tr>");	    
            } 
	  });	
}

