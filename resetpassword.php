<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
 confirm_logged_in();
?>
<?php
$pswd="";
$pswd2="";
$pswd=strip_tags(@$_POST['cpassword']);
$pswd2=strip_tags(@$_POST['rcpassword']);
$username=$_SESSION['user_login'];
if ($pswd&&$pswd2) {
    if ($pswd==$pswd2) {
        if (strlen($pswd)>30||strlen($pswd)<5) {
            echo"your password must be between 5 to 30 character long !";
        } else {
            $pswd= md5($pswd);
            $pswd2=md5($pswd2);
            $query=mysql_query("update users set password='$pswd',passwordreset=0 where username='$username'");
            confirm_query($query);
            echo "<script>
alert('Change Made successfull');
window.location.href='index.php';
</script>";
        }
    } else {
        echo("your password did'nt match");
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
		<h2>Change <span> Password </span></h2>
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
			<form id="registration_form" action="#" method="post">
				<div>
					<label>
					<input type="password" name="cpassword" id="password"placeholder="New Password" />
							<span class="password_strength" id="password_strength"></span>
					</label>
				</div>
				<div>
					<label>
							<input type="password" name="rcpassword"placeholder="repeate new Password"required/>
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
