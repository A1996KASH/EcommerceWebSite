<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>SECONDHAND BOOKS</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="online book store" />
<meta name="googlebot" content="secondhand novels" />
<meta name="googlebot" content="engineering books" />

<meta name="description" keyword="secondhand book market" content="secondhand books in india" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
<!-- start menu -->
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer></script>
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/etalage.css">
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/jquery.etalage.min.js"></script>
<script src="js/menu_jquery.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
	<script type="application/javascript" src="js/productfilter.js"></script>	
<script>
$(document).ready(function(){
	function getresult(url) {
		$.ajax({
			url: url,
			type: "GET",
			data:  {rowcount:$("#rowcount").val()},
			beforeSend: function(){
			$('#loader-icon').show();
			},
			complete: function(){
			$('#loader-icon').hide();
			},
			success: function(data){
			$("#faq-result").append(data);
			},
			error: function(){} 	        
	   });
	}
	$(window).scroll(function(){
		if ($(window).scrollTop() == $(document).height() - $(window).height()){
			if($(".pagenum:last").val() <= $(".total-page").val()) {
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				getresult('getresult1.php?page='+pagenum);
			}
		}
	}); 
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#username').keyup(function(){ // Keyup function for check the user action in input
		var Username = $(this).val(); // Get the username textbox using $(this) or you can use directly $('#username')
		var UsernameAvailResult = $('#username_avail_result'); // Get the ID of the result where we gonna display the results
		if(Username.length > 2) { // check if greater than 2 (minimum 3)
			UsernameAvailResult.html('Loading..'); // Preloader, use can use loading animation here
			var UrlToPass = 'action=username_availability&username='+Username;
			$.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'checker.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					UsernameAvailResult.html('<span class="success">Username name available</span>');
				}
				else if(responseText > 0){
					UsernameAvailResult.html('<span class="error">*Username already taken</span>');
				}
				else{
					alert('Problem with sql query');
				}
			}
			});
		}else{
			UsernameAvailResult.html('Enter atleast 3 characters');
		}
		if(Username.length == 0) {
			UsernameAvailResult.html('');
		}
	});
	
	$('#password, #username').keydown(function(e) { // Dont allow users to enter spaces for their username and passwords
		if (e.which == 32) {
			return false;
  		}
	});
	$('#password').keyup(function() { // As same using keyup function for get user action in input
		var PasswordLength = $(this).val().length; // Get the password input using $(this)
		var PasswordStrength = $('#password_strength'); // Get the id of the password indicator display area
		
		if(PasswordLength <= 0) { // Check is less than 0
			PasswordStrength.html(''); // Empty the HTML
			PasswordStrength.removeClass('normal weak strong verystrong'); //Remove all the indicator classes
		}
		if(PasswordLength > 0 && PasswordLength < 4) { // If string length less than 4 add 'weak' class
			PasswordStrength.html('weak');
			PasswordStrength.removeClass('normal strong verystrong').addClass('weak');
		}
		if(PasswordLength > 4 && PasswordLength < 8) { // If string length greater than 4 and less than 8 add 'normal' class
			PasswordStrength.html('Normal');
			PasswordStrength.removeClass('weak strong verystrong').addClass('normal');			
		}	
		if(PasswordLength >= 8 && PasswordLength < 12) { // If string length greater than 8 and less than 12 add 'strong' class
			PasswordStrength.html('Strong');
			PasswordStrength.removeClass('weak normal verystrong').addClass('strong');
		}
		if(PasswordLength >= 12) { // If string length greater than 12 add 'verystrong' class
			PasswordStrength.html('Very Strong');
			PasswordStrength.removeClass('weak normal strong').addClass('verystrong');
		}
	});
});
</script>

<style>
input#show,input#hide{
display:none;
}
span1#content{
display:none;
}
input#show:checked ~ span1#content{
display:block;
}

#target-content {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  pointer-events: none;
  opacity: 0;
  -webkit-transition: opacity 200ms;
  transition: opacity 200ms;
}

#target-content:target {
  pointer-events: all;
  opacity: 1;
}

#target-content #target-inner {
  position: absolute;
  display: block;
  padding: 48px;
  line-height: 1.8;
 width: 53%;
  top: 50%;
  left: 50%;
  border-radius: 67px;
  border: 2px solid orange;
  -webkit-transform: translateX(-50%) translateY(-50%);
  -ms-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.2);
  background: white;
  color: #34495E;
}

#target-content #target-inner h2 { margin-top: 0; }

#target-content #target-inner code { font-weight: bold; }

#target-content a.close {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: #34495E;
  opacity: 0.5;
  -webkit-transition: opacity 200ms;
  transition: opacity 200ms;
}

#target-content a.close:hover { opacity: 0.4; }


#button {
  position: absolute;
  top: 26%;
  left: 48%;
  -webkit-transform: translateX(-50%) translateY(-50%);
  -ms-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
  padding: 16px 24px;
  border-radius: 1px;
  text-decoration: none;
  font-size: 24px;
  display: block;
  color: white;
  background-color: orange;
  text-align: center;
  font-weight: 100;
  -webkit-transition: box-shadow 200ms;
  transition: box-shadow 200ms;
  border-radius: 4px;
}

#button:hover { box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.2); }
div.scrollbar{
        
					  background-position: center;
  height: 370px;
  overflow: auto;
  position: relative;
  top: 3px;
}
#ex3::-webkit-scrollbar{
width:8px;
background-color:#cccccc;
}#ex3::-webkit-scrollbar-thumb{
background-color:orange;
border-radius:3px;
}
#ex3::-webkit-scrollbar-thumb:hover{
background-color:#BF4649;
border:1px solid #333333;
}
#ex3::-webkit-scrollbar-thumb:active{
background-color:orange;
border:1px solid #333333;
}
table { 
color: #333; /* Lighten up font color */
font-family: Helvetica, Arial, sans-serif; /* Nicer font */
width: 300px; 
border-collapse: 
collapse; border-spacing: 0;
  font-size: 20px;
  font-family: Arial, Helvetica, sans-serif; 
    position: relative;
  left: 42px;
  text-transform:uppercase;
}

td, th { border: 1px solid #CCC;
			height: 30px; } /* Make cells a bit taller */

th {
 background-color:rgb(179, 242, 218); /* Light grey background */
font-weight: bold; /* Make sure they're bold */
}
td {
background: #FAFAFA; /* Lighter grey background */
text-align: center; /* Center our text */
}

.success{
	color:#009900;
}
.error{
	color:#F33C21;
}
.talign_right{
	text-align:right;
}
.username_avail_result{
	display:block;
	width:180px;
}
.password_strength {
	display:block;
	width:180px;
	padding:3px;
	text-align:center;
	color:#333;
	font-size:12px;
	backface-visibility:#FFF;
	font-weight:bold;
}
/* Password strength indicator classes weak, normal, strong, verystrong*/
.password_strength.weak{
	background:#e84c3d;
}
.password_strength.normal{
	background:#f1c40f;
}
.password_strength.strong{
	background:#27ae61;
}
.password_strength.verystrong{
	background:#2dcc70;
	color:#FFF;
}
</style>
</head>
<body>

<!-- header_top -->
<div class="top_bg">
	<div class="container">
							<?php
					if(isset($_SESSION['user_id']))
					{
						include("include/iflogin.php");
					}
					else{
						include("include/wlogin.php");
					}
					?>
	</div>
</div>
<!-- header -->
<div class="header_bg">
<div class="container">
	<div class="header">
	<div class="head-t">
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" class="img-responsive" alt=""/> </a>
		</div>
		<!-- start header_right -->
		<div class="header_right">
<?php
					if(isset($_SESSION['user_id']))
					{
						include("include/liflogin.php");
					}
					else{
						include("include/lwlogin.php");
					}
					?>
					

		<div class="search">
		
			    <form role="form" method="post">
		    	<input type="text"  id="keyword" value="" placeholder="search...">
				<input type="submit" value="">
			</form>
		
		 
		</form>
		</div>
		<ul id="content"></ul>
    <script type="text/javascript">
	$(document).ready(function() {
		$('#keyword').on('input', function() {
			var searchKeyword = $(this).val();
			if (searchKeyword.length >= 1) {
				$.post('search.php', { keywords: searchKeyword }, function(data) {
					$('ul#content').empty()
					$.each(data, function() {
						$('ul#content').append('<li><a href="info.php?proid=' + this.id + '">' + this.title + '</a></li>');
					});
				}, "json");
			}
		});
	});
	</script>
		<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
		<!-- start header menu -->
			<ul class="megamenu skyblue">
			<li class="active grid"><a class="color1" href="index.php">Home</a></li>
			<?php 
			    $sql=mysql_query("SELECT * FROM parentcategories ");
				
                $i=2;
			while($found_user=mysql_fetch_array($sql)){
              $i=$i+1;			
			  $contactnumber=$found_user['subcategory_name'];
				$pid =$found_user['id'];

			  ?>
			 
			<li class="grid"><a class="<?php echo'color'.$i;?>" href="#"> <?php echo $contactnumber; ?> </a>
				<div class="megapanel">
					<div class="row">
						
															<?php 
			                         $sql2=mysql_query("SELECT * FROM childcategories  WHERE parentid=$pid ");
				                    
                
			                         while($found=mysql_fetch_array($sql2)){	
			                         $contact=$found['categories']; 
									 $cid =$found['id'];?>
						<div class="col1">
							<div class="h_nav">
									
								<h4><?php echo $contact ?></h4>
								<ul>
								<?php 
			                         $sql3=mysql_query("SELECT * FROM child  WHERE pid=$cid ");
				                    
                
			                         while($f=mysql_fetch_array($sql3)){	
			                         $con=$f['name']; ?>
									<li><a href="producthead.php?cid=<?=$f['id']?>"><?php echo $con ?></a></li>
									
									<?php } ?>
								</ul>
                              								
							</div>							
						</div>
						
						<?php } ?>
						
						
						
					</div>
					
    				</div>
				</li>
				<?php } ?>
			
				
		 </ul> 
	</div>
</div>
</div>