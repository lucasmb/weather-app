<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="en"> <!--<![endif]-->
        <head>
        <meta charset="utf-8">

        <title>Weather App</title>

        <meta name="description" content="Weather App - get weather info, simple and easy>
        <meta name="author" content="lucas">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="/assets/img/favicons/favicon.png">

      
        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <!-- Stylesheets -->
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    </head>
    <body>
       

    <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-white mb-4">Welcome to WeatherApp</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <span class="anchor" id="formLogin"></span>
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Please Login</h3>
                        </div>
                        <div class="card-body">

                            <div id="infoMessage" class="error" style="background-color: red"><?php echo $message;?></div>


                            <form class="" role="form" action="/auth/login" method="post" autocomplete="off">
                          
                                <div class="form-group">
                                     <input type="text" class="form-control form-control-lg " id="login-username" name="identity">
                                     <label for="login-username">Username</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg rounded-0" id="login-password" name="password">
                                    <label for="login-password">Password</label>
                                </div>
                                <div>
                                    <label class="custom-control custom-checkbox">
                                    <input type="checkbox" id="login-remember-me" name="rememberme" class="">
                                    <span class="custom-control-description small">Remember me on this computer?</span>
                                    </label>
                                </div>
                           
                                <button type="submit" class="btn btn-success btn-lg float-right">Login</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->



        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>        

        <!-- Footer -->
        <div class="push-10-t text-center animated fadeInUp">
            <small class="text-muted font-w600"><span class=""><?= date("Y")?></span> &copy; WeatherApp</small>
        </div>
        <!-- END Footer -->

   


    </body>
</html>