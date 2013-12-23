function cargarGrilla(){
         
		 var senal = $("#senal option:selected").val(); 
		 var ciudad = $("#ciudad option:selected").val();
		
		 $('#carga').show();
		 $('#carga').html('<h1>Cargando.....</h1');
		 $('#formulario').html('');
		 
		 $.ajax({  
    		type: "POST",
			url: '../../producto/controlador/Controller_filter_senal.php',
    		data: 'senal='+senal+'&ciudad='+ciudad,
			timeout:20000,
    		success: function(resp){ 
				if (resp != ""){			
					$('#carga').hide('slow');
					$('#formulario').html(resp);	
				} 
			},
            error: function(){
				 $('#carga').hide('slow');
				 $('#formulario').html
				 ("<h3>Estamos Presentando problemas con nuestro servidor ofrecemos disculpas</h3>");	    
            } 
	  });
	
}// JavaScript Document