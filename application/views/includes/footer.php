    </main>
    </div>
</div>

    <!-- Footer -->    
    <!-- END Footer -->
 
    <!-- /#wrapper -->

        <!-- Apps Modal -->
        <!-- END Apps Modal -->

        

        <!-- main js-->

        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>


        <script src="/assets/js/bootstrap.min.js"></script>

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

         <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.5.4/src/loadingoverlay.min.js"></script>

    </body>
</html>