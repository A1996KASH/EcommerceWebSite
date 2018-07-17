<?php
session_start(); 

    function logged_in()
	{
	  return isset($_SESSION['user_id']);
	  
	}
	function confirm_logged_in()
	{
	      if(!logged_in())
		  {
		     echo "<script>
alert('Please Login to Continue!');
window.location.href='register.php';
</script>";
		
		  }
	}
	
?>