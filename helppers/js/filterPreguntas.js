function cargarPreguntas(){
         
		 var filtro = $("#filtro").val();
		
		 $('#principal').hide('slow');
		 $('#carga').show();
		 $('#carga').html('<h1>Cargando.....</h1');
		 $('#secundario').html('');
		 
		 $.ajax({  
    		type: "POST",
			url: '../../pregunta_frecuente/controlador/Controller_filter.php',
    		data: 'filtro='+filtro,
			timeout:20000,
    		success: function(resp){ 
				if (resp != ""){			
					$('#carga').hide('slow');
					$('#secundario').html(resp);	
				} 
			},
            error: function(){
				 $('#carga').hide('slow');
				 $('#secundario').html
				 ("<h3>Estamos Presentando problemas con nuestro servidor ofrecemos disculpas</h3>");	    
            } 
	  });
	
}// JavaScript Document