function cargarCiudad(){	  

   	 var id = $("#estado option:selected").val();	
	 $('#ciudad').html('<option>Cargando....</option>');
	 $.ajax({  
    		url: '../../ciudad/controlador/Controller_Listas.php',
    		data: 'id='+id,
			timeout:10000,
    		success: function(resp){ 
				if (resp != ""){
    				$('#ciudad').html(resp);
					$('#listOficce').hide('slow');
					$('#oficina').hide('slow');
					//alert(resp);
				}else{
					$('#ciudad').html("")
				}
			},
            error: function(){
				$('#ciudad').html("")
			} 
	  });
	  
	 // alert (id);	  
}// JavaScript Document

function cargarListaOficina(){
	 var id = $("#ciudad option:selected").val();	
	 $.ajax({  
    		url: '../../oficina/controlador/Controller_Listas.php',
    		data: 'id='+id,
			timeout:10000,
    		success: function(resp){ 
				if (resp != ""){
    				$('#OficinaP').hide('slow');
					$('#listOficce').html(resp);
					$('#listOficce').hide('slow');
					$('#listOficce').show('slow');
				}
			},
            error: function(){
				$('#listOficce').html("Error al Procesar la informacion");
			} 
	  });

}

function cargarOficina(id){		
	   
	   $.ajax({  
    		url: '../../oficina/controlador/Controller_Oficina.php',
    		data: 'id='+id,
			timeout:10000,
    		success: function(resp){ 
				if (resp != ""){
					$('#oficina').html(resp);
					$('#oficina').hide('slow');
					$('#oficina').show('slow');
				}
			},
            error: function(){
				$('#oficina').html("Error al Procesar la informacion");
			} 
	  });
}