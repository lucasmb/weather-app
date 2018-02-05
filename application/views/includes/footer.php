    </main>
    </div>
</div>

 
    <!-- /#wrapper -->

        <!-- Apps Modal -->
        <!-- END Apps Modal -->


 		<script src="/assets/js/core/jquery.min.js"></script>
		
    	<!-- Footer -->
        
    	<!-- END Footer -->

        <!-- main js-->

        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>


        <script src="/assets/js/bootstrap.min.js"></script>

        <script src="/assets/js/app.js"></script>

        <!-- Page JS Plugins -->
        <script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS -->
        <?php
        $render_js = $this->render->get_js(); 
         if($render_js){
        
 			//<!--Render JS bottom-->
 			foreach($render_js as $js):
 			   echo "<script type='text/javascript' src='/assets/js/".$js."'> </script>";
 			endforeach; 
 		}?>

         <!-- Google Maps Api -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsEzwixfOiLCXbPLkTMRWK2Djmn1s11V8&libraries=places"
        async defer></script>

    </body>
</html>