<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
check_password();

?>

<?php
include("include/header.php");
?>
<!-- content -->
<div class="container">
<div class="main">
<div class="contact">
				  <div class="contact-form">
			 	  	 	<h2>Contact Us</h2>
			 	 	    <form method="post" action="contactp.php">
					    	<div>
						    	<span><label>Name</label></span>
						    	<span><input name="username" type="text" class="textbox" required></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input name="useremail" type="text" class="textbox"required></span>
						    </div>
						    <div>
						     	<span><label>Mobile</label></span>
						    	<span><input name="userphone" type="text" class="textbox"required></span>
						    </div>
						    <div>
						    	<span><label>Subject</label></span>
						    	<span><textarea name="usermsg"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" class="" value="Submit us"></span>
						  </div>
					    </form>
				    </div>
  				<div class="clearfix"></div>
			  </div>
</div>
</div>
<?php
include("include/footer.php");
?>
