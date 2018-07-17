<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
 confirm_logged_in();
check_password();
?>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);

include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();
$user_login=$_SESSION['user_login'];
	$username=$_SESSION["user_login"];
$query="select * from users where username='{$username}'limit 1";
$result=mysql_query($query);
confirm_query($result);
@$found_user=mysql_fetch_array($result);
	$imagename = $found_user['profilepic'];
if (!empty($_FILES['file']['name'])) {
		$filecheck = basename($_FILES['file']['name']);
$ext = strtolower(substr($filecheck, strrpos($filecheck, '.') + 1));
if (($ext == "jpg" || $ext == "gif" || $ext == "png") && ($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/gif" || $_FILES["file"]["type"] == "image/png")){
	$changename = explode(".", $_FILES["file"]["name"]);
$file = rand(1000,100000)."-".round(microtime(true)) .$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="profile_img/";
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	$final_file=str_replace(' ','-',$new_file_name);
move_uploaded_file($file_loc,$folder.$final_file);
$sql = "update users set profilepic='$final_file'where username='{$user_login}'";
	unlink("profile_img/$imagename");
	$result3=mysql_query($sql);
	confirm_query($result3);
	?>
	<script>
		alert('successfully uploaded');
        window.location.href='profile.php?success';
        </script>
	<?php

	}
	else{
?>
		<script>
		alert('please upload only .jpeg,.png format of image only.');
        window.location.href='profile.php?success';
        </script>
		<?php
		
	}
		
	}
	else{
		?>
		<script>
		alert('please Select an image.');
        window.location.href='profile.php?success';
        </script>
	
		<?php
	}
	
?>