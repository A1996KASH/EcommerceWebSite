<?php 
  confirm_logged_in();
 $user= $_SESSION["user_login"];
?>
<div class="header_top">
			<div class="top_right">
				<ul>
					
					<li><a href="#">Hi!&nbsp;&nbsp;<?php echo($user)?></a></li>|
					<li><a href="profile.php">Profile</a></li>|
								<li><a href="requestedbook.php"><i class="fa fa-star"></i> Wishlist</a></li>|
								<li><a href="upload_books.php"> Upload Products/Request BookS</a></li>|
								
								<li><a href="resetpassword.php"> Reset Password</a></li>|
								
				</ul>
			</div>
			<div class="top_left">
				<h2><a href="logout.php" style="color:white;decoration:none;"> Logout!&nbsp;(<?php echo($user)?>)</a></h2>
				<div id="google_translate_element"style="width:10px;"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    
			</div>
				<div class="clearfix"> </div>
		</div>