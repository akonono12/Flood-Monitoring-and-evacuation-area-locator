var city, api, description, currenttemp, mintemp, maxtemp, sendHTML;
var base = "http://api.openweathermap.org/data/2.5/weather?q=Tiwi,PH&units=metric&APPID=b2696ef799919458d2eda938ce968d20";




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
		        currenttemp = data["main"]["temp"];
		        mintemp = data["main"]["temp_min"];
		        maxtemp = data["main"]["temp_max"];
				humidity= data["main"]["humidity"];
				pressure=data["main"]["pressure"];
				Place=data["name"];

		        sendHTML = "<ul>\n" + 
				            "<li>Place: " + Place + "</li>\n" + 
		        			"<li>Description: " + description + "</li>\n" + 
		        			"<li>Current temperature: " + currenttemp + "&deg;C</li>\n" + 
		        			"<li>Minimum temperature: " + mintemp + "&deg;C</li>\n" + 
		        			"<li>Maximum temperature: " + maxtemp + "&deg;C</li>\n" + 
							"<li>Pressure: " + pressure + " PA</li>\n" + 
							"<li>Humidity: " + humidity + "</li>\n" + 
		        			"</ul>";

		        weather.insertAdjacentHTML('afterbegin', sendHTML);

		      });  
		    }  
		  )  
		  .catch(function(err) {  
		    console.log('Fetch Error :-S', err); 
		  });

		 api = base;
	

