<?php
	session_start();
	require_once 'template/head.php';
	require_once 'template/style_login.php';
?>
<div class="banner">
   	  <div class="container">
   	  	<div class="header_top">
   	  	   <div class="header_top_left">
	  	      <div class="box_11"><a href="checkout.php">
		  	  <?php @$cart_count=count($_SESSION['cart_items']); ?>
		      <h4><p>Cart: (<?php echo @$cart_count; ?> items)</p><img src="images/bag.png" alt=""/><div class="clearfix"> </div></h4>
		      </a></div>
	          <p class="empty"><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
	          <div class="clearfix"> </div>
	       </div>
           <div class="header_top_right">
	           
	           <div class="lang_list">
			   		<div class="dropdown">
				   		<?php 
	                        if ( !isset($_SESSION['user'])){
		                        echo'<a style="color: white;" href="login.php">Log in</a>';
		                        }
		                ?>				   		
				  	</div>
			 </div>
		  	 
			 <ul class="header_user_info">
			  <a class="login" href="login.php">
				<i class="user"> </i> 
				<li class="user_desc">My Account</li>
			  </a>
			  <div class="clearfix"> </div>
		     </ul>
		    <!-- start search-->
				<div class="search-box">
				   <div id="sb-search" class="sb-search">
					  <form>
						 <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
						 <input class="sb-search-submit" type="submit" value="">
						 <span class="sb-icon-search"> </span>
					  </form>
				    </div>
				 </div>
				 <!----search-scripts---->
				 <script src="js/classie1.js"></script>
				 <script src="js/uisearch.js"></script>
				   <script>
					 new UISearch( document.getElementById( 'sb-search' ) );
				   </script>
					<!----//search-scripts---->
		            <div class="clearfix"> </div>
			 </div>
		     <div class="clearfix"> </div>
	  </div>
	  <div class="header_bottom">
	   <div class="logo">
		  <h1><a href="index.html"><span class="m_1">Di</span>amond</a></h1>
	   </div>
   	   
	        <div class="clearfix"> </div>
	        </div>
	    </div>
	   <div class="form">
            <ul class="tab-group">
                <li class="tab">
                    <a href="#signup">Sign Up</a>
                </li>
                <li class="tab active">
                    <a href="#login">Log In</a>
                </li>
            </ul>
            
            <div class="tab-content">
	            <!--Sign Up -->
                <div id="signup" style="display: none;"> 
	                
                    <h1>Sign Up</h1>
                    
                    <form action="core/signup.php" method="post">
	                    
                        <div class="top-row">
	                        
                            <div class="field-wrap">
	                            
                                <label>
                                   User name
                                    <span class="req">*</span>
                                </label>
                                
                                <input name="username" required="" autocomplete="off" type="text">
                            </div>
                            <div class="field-wrap">
                                <label>
                                    Email
                                    <span class="req">*</span>
                                </label>
                                <input name="email" required="" autocomplete="off" type="email">
                            </div>
                        </div>
                        
                         <div class="field-wrap">
                            <label>
                                Set A Password
                                <span class="req">*</span>
                            </label>
                             
                            <input required="" autocomplete="off" name="password" id="password" type="password">
                        </div>
                        

                        <div class="field-wrap">
                            <label>
                                Confirm Password
                                <span class="req">*</span>
                            </label>
                              
                            <input name="confirm_password" id="confirm_password" required="" type="password"><span id="message" style="position: relative;top: 30px;color: green;"></span>
                        </div>
                         
                         
                         <div class="field-wrap">
                            <label>
                                Location
                                <span class="req">*</span>
                            </label>
                              <input required="" autocomplete="off" id="location" name="location" type="text">
                            
                        </div>
                         
                         
						  <div class="field-wrap">
                            <label>
                                Address
                                <span class="req">*</span>
                            </label>
                             
                            <input required="" autocomplete="off" name="address" id="password" type="text">
                        </div>
                          <div class="field-wrap">
                            <label>
                                Phone Number.
                                <span class="req">*</span>
                            </label>
                             
                            <input required="" autocomplete="off" name="phone" id="password" type="text">
                        </div>


                        <button type="submit" class="button button-block" name="signup">Get Started
</button>
                    </form>
                </div>
                <!--End Sign Up -->
                
                <!--Start Log in -->
                <div id="login" style="display: block;">
	                 
                    <h1>Welcome</h1>
                    <form action="core/authenticate.php" method="post">
	                    
                        <div class="field-wrap">
                            <label>
                                Username
                                <span class="req">*</span>
                            </label>
                            <input equired="" autocomplete="off" name="in_email" type="text">
                        </div>
                        <div class="field-wrap">
                            <label>
                                Password
                                <span class="req">*</span>
                            </label>
                            <input equired="" autocomplete="off" name="in_pass" type="password">
                        </div>
                        <p class="forgot"><a href="#">Forgot Password?</a></p>
                        <button class="button button-block" type="submit" name="submit">Log In
</button>
                    </form>
                </div>
                
            </div>
            <!--End Log in -->
           <!-- tab-content -->
		</div>
		<div style="height: 100px;"></div>
   </div>



<script src="js/need.js"></script>
<script>
	$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});

$('#confirm_password').on('keyup', function () {
    if ($(this).val() == $('#password').val()) {
        $('#message').html('Password is Matching').css('color', 'green');
    } else $('#message').html('Password do not Matching').css('color', 'red');
});
</script>
</body>
</html>


