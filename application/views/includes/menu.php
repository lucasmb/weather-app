 <? $auth_username = $this->session->userdata('username'); ?>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
   
      <a class="navbar-brand" href="/">WeatherApp</a>
         <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        
        <?if($auth_username): ?>
          <span class="navbar-text pr-2">
            	 Welcome <?=($auth_username)?>  
          </span>
         <a href="/logout" class="btn btn-sm btn-danger"> Logout</a>
        <?endif;?>
      </div>
    </nav>

    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-1 pt-3">
