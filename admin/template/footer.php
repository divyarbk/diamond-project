<section class="content-block-nopad bg-deepocean footer-wrap-1-3" style="background: url(../images/foo.jpg) ;" >
	    <div class="container footer-1-3" >
	        <div class="col-md-4 pull-left">
	            <img src="../images/shipping.png" class="brand-img img-responsive">
	            <ul class="social social-light">
	                <li>
	                    <a href="#"><i class="fa fa-2x fa-facebook"></i></a>
	                </li>
	                <li>
	                    <a href="#"><i class="fa fa-2x fa-twitter"></i></a>
	                </li>
	                <li>
	                    <a href="#"><i class="fa fa-2x fa-google-plus"></i></a>
	                </li>
	                <li>
	                    <a href="#"><i class="fa fa-2x fa-pinterest"></i></a>
	                </li>
	                <li>
	                    <a href="#"><i class="fa fa-2x fa-behance"></i></a>
	                </li>
	                <li>
	                    <a href="#"><i class="fa fa-2x fa-dribbble"></i></a>
	                </li>
	            </ul>
	            <!-- /.social -->
	        </div>
	        <div class="col-md-3 pull-right" >
	            <p class="address-bold-line">We <i class="fa fa-heart pomegranate"></i> our amazing customers</p>
	            <p class="address small">
						123 Anywhere Street,<br>
						London,<br>
						LO4 6ON</p>
	        </div>
	        <div class="col-xs-12 footer-text">
	            <p>© COPYRIGHT 2016 - Khin Kalayar Oo - ALL RIGHTS RESERVED.</p>
	        </div>
	    </div>
	    <!-- /.container -->
	</section>
	
	
	 
 
 
        <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
        <script>
			$(document).ready(function(){
			    $('[data-toggle="tooltip"]').tooltip();
			});
		</script>         
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>         
        <script type="text/javascript" src="../js/plugins.js"></script>        
        <script type="text/javascript" src="../js/bskit-scripts.js"></script>
        <script>
        	
			
			$('#exampleModal2').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var id = button.data('pid')
						 
			   // Extract info from data-* attributes
			  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this)			  
			  modal.find('#id').html(id)
			 
			  
			})
        </script>         
    </body>     
</html>

						