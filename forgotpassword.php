<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
if (isset($_SESSION['user_login'])) {
    echo "<script>
alert('You are Already Logged in');
window.location.href='index.php';
</script>";
}


?>

<?php

if (isset($_POST['emailid'])) {
    $em="";
    $em=strip_tags(@$_POST['emailid']);
    $query="select email,first_name,emailcode from users where email='$em' limit 1";
    $result=mysql_query($query);
    confirm_query($result);
    if (mysql_num_rows($result)==1) {
        $found_user=mysql_fetch_array($result);
        $email=$found_user['email'];
        $fn=$found_user['first_name'];
        $emailcode=$found_user['emailcode'];
        $generate_password= substr(md5(rand(999, 999999)), 0, 8);
        if ($email==$em) {
            mail($em, 'Reset Password', "Hello " . ucfirst($fn) ." Your Password is - " . $generate_password . "\n\n-bookshop", "From: support@dibsofficial.in");
            echo("&nbsp&nbsp<h1>Check Your Mail Box To get The password </h1>");
            $pswd= md5($generate_password);

            $query=mysql_query("update users set password='$pswd',passwordreset=1 where email='$em'");
            confirm_query($query);
        }
    } else {
        echo("You are not the Registered member ");
    }
}


         ?>




		 <?php
include("include/header.php");
?>

<!-- content -->
<div class="container">
<div class="main">
	<!-- start registration -->
	<div class="registration">
		<div class="registration_left">
		<h2>Request New <span> Password </span></h2>
		<!-- [if IE]
		    < link rel='stylesheet' type='text/css' href='ie.css'/>
		 [endif] -->

		<!-- [if lt IE 7]>
		    < link rel='stylesheet' type='text/css' href='ie6.css'/>
		<! [endif] -->
		<script>
			(function() {

			// Create input element for testing
			var inputs = document.createElement('input');

			// Create the supports object
			var supports = {};

			supports.autofocus   = 'autofocus' in inputs;
			supports.required    = 'required' in inputs;
			supports.placeholder = 'placeholder' in inputs;

			// Fallback for autofocus attribute
			if(!supports.autofocus) {

			}

			// Fallback for required attribute
			if(!supports.required) {

			}

			// Fallback for placeholder attribute
			if(!supports.placeholder) {

			}

			// Change text inside send button on submit
			var send = document.getElementById('register-submit');
			if(send) {
				send.onclick = function () {
					this.innerHTML = '...Sending';
				}
			}

		})();
		</script>
		 <div class="registration_form">
		 <!-- Form -->
			<form id="registration_form" action="forgotpassword.php" method="post">
				<div>
					<label>
					<input type="email" name="emailid" id="emailid"placeholder="Enter your mail id" />
					</label>
				</div>
				<div>
					<input type="submit" value="change" name="reg" id="register-submit">
				</div>

			</form>
			<!-- /Form -->
		</div>
	</div>
	<div class="clearfix"></div>
	</div>
	<!-- end registration -->
</div>
</div>
<?php
include("include/footer.php");
?>
