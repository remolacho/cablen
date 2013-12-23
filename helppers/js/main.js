 var varIdAnt="";
 
$(document).ready(   
 	function() {
	/*	$("#info1").hide();//css("display", "none");
		$("#info2").hide();//css("display", "none");
		$("#info3").hide();//css("display", "none");*/
});
	
function efectoMenu(id) {   		 		
	mostrar(id);
	ocultar(id);
	acumularIdAnt(id);

}

function mostrar(id){
	$(id).slideToggle();	
}
function ocultar(id){	
	if(varIdAnt != ""){
	   $(varIdAnt).slideToggle();
	}		 		
}
function acumularIdAnt(id){
	varIdAnt = id;	 	
}