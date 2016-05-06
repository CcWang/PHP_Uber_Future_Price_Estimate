
$(document).ready(function(){
	// global variable used in map.js
  // e.g. $.location = [37.4841999, -122.1476206,37.615028, -122.389279];
	$.location = []; 
	$("form").submit(function(){
		$url = $(this).attr("action");
		var data = $(this).serialize();
		$.post($url, data, direction, 'json');
		$url2 = $('#uber').val();
		$.post($url2, data, price, 'json');
		return false;
	});
});

// compare current price with db price, give user suggestion
 $(document).on('click', '.uberName', function(){
 	var name = $(this).html();
 	var data = {location: $.location, select_uber: name};
 	console.log('hei');
 	$.post('/Main/compare',data,function(res){
 		console.log(res);
 		var message = '';
 		if (res.noRoute) {
 			message = res.noRoute;
 		};
 		if (res.noData) {
 			message = res.noData;
 		};
 		if (res.noAlarm) {
 			message = res.noAlarm;
 		};
 		if (res.alarm) {
 			for(var i=0;i<res.alarm.length;i++){
 				message += "Around <span class='teal-text'>" + res.alarm[i].time + "</span>, Your Uber Surge Pricing will increae to <span class='red-text text-darken-2'>" + res.alarm[i].surge+ "!</span> <br>";
 			}
 		};
 		$('#alarm').html(message);
	 	$('#modal1').openModal();
 	},'json');
  });

//get transit direction
function direction(res){
	console.log(res);
	var route = res.routes[0].legs[0];

	// show direction details
	var htmlstr = '';
	if (res.routes.length != 0) {
		htmlstr += "<h6> From <span class = 'grey-text text-darken-3'>"+ route.start_address;
		htmlstr += "</span><br>To <span class = 'grey-text text-darken-3'>" +route.end_address+ "</span></h6>";
		htmlstr += "<h6> Departure Time: " + route.departure_time.text+ "<h6><ol>";
		for (var i = 0; i < route.steps.length; i++) {
			htmlstr += "<li>"+route.steps[i].html_instructions+" <span class = 'grey-text text-darken-3'>  "+route.steps[i].travel_mode+"....."+route.steps[i].duration.text+"</span></li>";
		}
	} else{
		htmlstr = '<p> No routes found.</p>';
	};
	htmlstr +="</ol>";
	htmlstr += "<h6> Arrival Time: " + route.arrival_time.text+ "</h6>";
	if (res.routes[0].fare) {
		htmlstr +="<h6>Total Cost is <span class = 'grey-text text-darken-3'>"+ res.routes[0].fare.text+"</span></h6>";
	} else {
		htmlstr +="<p>No estimate cost.</p>"
	};
	
	if (res.routes[0].warnings) {
		for (var i = 0; i < res.routes[0].warnings.length; i++) {
			htmlstr +="<p><span id ='warnings' class = 'red-text text-darken-3'>"+ res.routes[0].warnings[i]+"</span></p>";
		};
	};

	$('#result').html(htmlstr);

	// repaint map with location
	$.location = [];
	$.location[0] = route.start_location.lat;
  $.location[1] = route.start_location.lng;
  $.location[2] = route.end_location.lat;
  $.location[3] = route.end_location.lng;
  initMap();
}

//get uber price
function price (res) {
	console.log(res);
	var uberPrice = '';
	// uberPrice +='<ul>';

	if (res.prices.length !== 0) {
		for(var i = 0;i < res.prices.length;i++) {
			uberPrice += '<div><a class = "uberName btn" href="#modal1">'+ res.prices[i].display_name+ '</a><br>'+ res.prices[i].estimate
			+'/(time estimate:'+Math.floor(res.prices[i].duration/60)+'mins)';
			if (res.prices[i].surge_multiplier > 1) {
				uberPrice += ' -- Surge Price: '+ res.prices[i].surge_multiplier+"</div>";
			}else {
					uberPrice += '</div>';
			};
			
		}
	} else {
		uberPrice +='Not Found';
	};
	// uberPrice +='</ul>';
	$("#uberResult").html(uberPrice);
			
			
		
}

