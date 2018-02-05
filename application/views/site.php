<div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
    		<h2>Search a city</h2>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" id="autocomplete" class="form-control input-lg" placeholder="Buscar" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                          <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
          <div class="col-md-3">
          </br>
           </br>
            
            <label>Allow Geolocation?</label>
             <button class="get_geo btn btn-primary btn-sm" type="button">
             <i class="fa fa-globe"></i>
            </button>
        </div>
	</div>


    <div class="row mt-3">
        <div class="col-md-6 ">
            <div class="weather">
                <div class="current">
                    <div class="info">
                        <div></div>
                        <div class="city_d"><small>CITY:</small> <span class="city_name"></div>
                        <div class="temp_d"><small>TEMP:</small><span class="temp"></span>&deg; <small>C</small></div>
                        <div class="maxmin_temp"><small>MAX</small><span class="temp_max"></span>&deg;   <small>C</small> - <small>MIN</small> <span class="temp_min"></span>&deg; <small>C</small></div>
                        <div class="press_d"><small><small>PRESSURE:</small></small> <span class="press"> </span> hPa</div>
                        <div class="humidity_d"><small><small>HUMIDITY:</small></small> <span class="humidity"> </span>%</div>

                        <div class="wind_d"><small><small>WIND:</small></small> <span class="wind_speed"> </span>km/h</div>
                        <div>&nbsp;</div>
                    </div>
                    <div id="w_icon" class="w_icon">
                        <i class="wi wi-day-sunny"></i>
                    
                    </div>
                </div>
                <div class="future">
                   <a href="/weather/full">Full Forecast</a>
                </div>
            </div>
        </div>
         <div class="col-md-6 ">
            <div id="map">
              </div>
         </div>
    </div>

<div class="row mt-3">
    <h4>Previous Search</h4>
</div>
<div class="row mt-3">
<div class="col-md-6 ">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">City name</th>
      <th scope="col">Time</th>
      <th scope="col">Actions</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table> 
</div>
</div>


</div>
