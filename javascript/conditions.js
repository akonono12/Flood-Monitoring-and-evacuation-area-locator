var city, api, description, currenttemp, mintemp, maxtemp,i;
var base = "http://api.openweathermap.org/data/2.5/weather?q=Tiwi&APPID=b2696ef799919458d2eda938ce968d20&units=metric";




	    fetch(base)  
		  .then(  
		    function(response) {  
		      if (response.status !== 200) {  
		        console.log('Looks like there was a problem. Status Code: ' +  
		          response.status);  
		        return;  
		      }

		      // Examine the text in the response  
		      response.json().then(function(data) {  		        
		        // Parse data
		        description = data["weather"][0]["description"];
 
   console.log(description);	
 



          }); 
	    }  
		  )  

		  .catch(function(err) {  
		    console.log('Fetch Error :-S', err); 
		  });
 
		 api = base;
description = "heavy rain";
 
     $.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyDrD5U1rL8o_LwUciZ2WmRcfYvD3wJEadU&callback=initMap");
 if (description == "light rain") {
 console.log("light");
 $.getScript("javascript/tiwimaplights.js");
  
 }else if(description == "moderate rain"){
 	console.log("moderate");
 	 $.getScript("javascript/tiwimapmoderate.js");
    
}else if(description == "heavy rain"){
	console.log("heavy");
	
	$.getScript("javascript/tiwimapheavy.js");
	 
}else  {
console.log("normals");
$.getScript("javascript/tiwimapnormals.js");
	     
 } 
 
	 
