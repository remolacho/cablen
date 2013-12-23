 var varIdAnt="";
 
 $(document).ready(
    
 	function() {

        //Change these values to style your modal popup
		var align = 'center';									//Valid values; left, right, center
		var top = 200; 											//Use an integer (in pixels)
		var width = 570; 										//Use an integer (in pixels)
		var padding = 10;										//Use an integer (in pixels)
		var backgroundColor = '#FFFFFF'; 						//Use any hex code
		var source = '../../img/otros/food-4.jpg'; 				//Refer to any page on your server, external pages	 are not valid e.g. http://www.google.co.uk
		var borderColor = '#006595'; 							//Use any hex code
		var borderWeight = 4; 									//Use an integer (in pixels)
		var borderRadius = 5; 									//Use an integer (in pixels)
		var fadeOutTime = 1500; 									//Use any integer, 0 = no fade
		var disableColor = '#000'; 							//Use any hex code
		var disableOpacity = 50; 								//Valid range 0-100
		var loadingImage = 'lib/release-0.0.1/loading.gif';		//Use relative path from this page


		modalPopup(align, top, width, padding, disableColor, disableOpacity, backgroundColor, borderColor, 	
		borderWeight, borderRadius, fadeOutTime, source, loadingImage);

});