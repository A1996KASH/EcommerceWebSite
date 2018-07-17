<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
?>
<?php
$email="";
$emailcode="";
$email=strip_tags(@$_GET['email']);
$emailcode=strip_tags(@$_GET['emailcode']);
if(isset ($email)&&($emailcode))
{
	
$query="select emailcode,email activated from users where email='$email' and emailcode='$emailcode'limit 1";
$result=mysql_query($query);
confirm_query($result);
if(mysql_num_rows($result)==1){
	$found_user=mysql_fetch_array($result);
	$status=$found_user['activated'];
	if($status==0){
		$query="update users set activated='1' where email='$email' and emailcode='$emailcode'";
       $result=mysql_query($query);
       confirm_query($result);
	  echo "<script>
alert('Account Activation Successfull please login to continue');
window.location.href='index.php';
</script>";
	}
	
	elseif($status==1){
		echo "<script>
alert('Your account is already activated please login');
window.location.href='login.php';
</script>";
		
	}
	}
	else{
				echo "<script>
				window.location.href='login.php';
alert('This email account is not registered please click ok to  register! ');

</script>";
	}
}
?>