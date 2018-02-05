
var wicons = {
  Clouds: 'wi wi-day-cloudy',
  Cloudy: 'wi wi-day-cloudy',
  Drizzle: 'wi wi-day-snow-wind',
  Rain: 'wi wi-day-rain',
  chancesleat: 'wi wi-day-sleet',
  chancesnow: 'wi wi-day-snow-wind',
  chancetstorms: 'wi wi-day-thunderstorm',
  Clear: 'wi wi-day-sunny',
  Flurries: 'wi wi-day-snow-wind',
  Haze: 'wi wi-day-haze',
  mostlycloudy: 'wi wi-day-cloudy',
  mostlysunny: 'wi wi-day-sunny',
  partlycloudy: 'wi wi-day-cloudy',
  partlysunny: 'wi wi-day-sunny',
  Rain: 'wi wi-day-rain',
  Sleat: 'wi wi-day-sleet',
  Snow: 'wi wi-day-snow-wind',
  Sunny: 'wi wi-day-sunny',
  Tstorms: 'wi wi-day-thunderstorm',
  unknown: 'wi wi-day-sunny'
}
var lat, lng;
var appId = 'baf40891cc08ca46649faffdb68dba38';
var placeSearch, autocomplete;

    function initSearchAutocomplete() {
       autocomplete = new google.maps.places.Autocomplete(
          (document.getElementById('autocomplete')),
          {types: ['geocode']});

      // get place searched
      autocomplete.addListener('place_changed', searchAddress);
    }

      function searchAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

		 lat = place.geometry.location.lat(),
		 lng = place.geometry.location.lng();

		// test lat-lng
		console.log(lat);
		console.log(lng);

		getWeather(lat,lng, appId, true);

    }


	function getLocation() {
	    if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(showPosition);
	    } else {
	        x.innerHTML = "Geolocation is not supported by this browser.";
	    }
	}

	function showPosition(position) {
	    console.log( "Latitude: " + position.coords.latitude +
	    "<br>Longitude: " + position.coords.longitude);

			lat = position.coords.latitude ;
			lng = position.coords.longitude;

			getWeather(lat,lng,appId, true);

	}

	function getWeather(lat,lng,appId, save) {
		$.LoadingOverlay("show");
	    $.ajax({
			   	url: "http://api.openweathermap.org/data/2.5/weather?lat="+lat+"&lon="+lng+"&units=metric"+"&appid="+appId,  
			    type: "GET",
			   	dataType: 'json',
	  		 })
			.done(function(data) {
				console.log(data);
				show_weather(data);
				show_map(lat,lng);
				//save to db
				if(save == true)
					save_data(data);
			  // alert( "success" );
			})
			.fail(function() {
			  alert( "error" );
			}).always(function(){
				// Show full page LoadingOverlay
				$('#main_info').show();
			    $.LoadingOverlay("hide");
			});

	}


function show_weather(w_data) {
	 if(w_data){
	 	$('.city_name').html(w_data.name);
	 	$('.temp').html(w_data.main.temp);
	 	$('.temp_max').html(w_data.main.temp_max);
	 	$('.temp_min').html(w_data.main.temp_min);
	 	$('.press').html(w_data.main.pressure);
	 	$('.humidity').html(w_data.main.humidity);
	 	$('.wind_speed').html(w_data.wind.speed);
	 	var weather = w_data.weather[0].main;
	 	$('.w_icon i').removeClass('');
	 	console.log('weather:' +weather);
	 	console.log(wicons);
	 	console.log(wicons[weather]);

	 	if(wicons[weather] != 'undefined')
	 		$('.w_icon i').addClass(wicons[weather]);
	 }
	 else{
	 	alert('no Weather data Available');
	 }

}

	function show_map(lat,lng){

	 var myLatlng = new google.maps.LatLng(lat,lng);
		var mapOptions = {
		  zoom: 6,
		  center: myLatlng
		}
		var map = new google.maps.Map(document.getElementById("map"), mapOptions);

		var marker = new google.maps.Marker({
		    position: myLatlng,
		    title:"Location"
		});

		marker.setMap(map);
	}

	function save_data(w_data) {
		w_data.google_coord = {lat: lat, lng: lng};
	   $.ajax({
			   	url: "/site/save_search_data",  
			    type: "POST",
			   	dataType: 'json',
			   	data: {w_data : JSON.stringify(w_data)}
	  		 })
			.done(function(data) {
			  console.log( "data saved" );
			  load_previous();
			})
			.fail(function() {
			  alert( "error" );
			})
			
	}

	function load_previous() {
	$(".table_content").LoadingOverlay("show");
	    $.ajax({
			   	url: "/site/get_previous_search",  
			    type: "POST",
			   	dataType: 'json'
	  		 })
			.done(function(result) {
				 $('tbody').empty();
				 $('tbody').append(result.data);
			})
			.fail(function() {
			  console.log( "no previous" );
			}).always(function() {
				$(".table_content").LoadingOverlay("hide", true);
			});
	}

	function remove_search(search_id, tr) {
		 $.ajax({
			   	url: "/site/remove_search/"+search_id,  
			    type: "POST",
			   	dataType: 'json'
	  		 })
			.done(function(result) {
				 $(tr).remove();
				 alert('data deleted');
			})
			.fail(function() {
			  alert( "error" );
			})
	}

	

//page ready;
$(function(){
    initSearchAutocomplete();
    load_previous();

	$( "tbody" ).on( "click", ".remove_row", function() {
	  var search_id = $(this).closest('tr').data('id');
		console.log(search_id);
		remove_search(search_id, $(this).closest('tr'));
		//$(this).closest('tr').remove();
	});

	$( "tbody" ).on( "click", ".get_w", function() {
	    p_lat = $(this).data('lat');
	    p_lng = $(this).data('lng');
	    lat = p_lat;
	    lng = p_lng;
	    getWeather(p_lat, p_lng, appId, false);
	});

	$(".get_geo").on( "click", function() {
		getLocation();
	});

	$("#full_forecast").on( "click", function() {
		$(location).attr("href", "/forecast/full/"+lat+"/"+lng);
	});

});
