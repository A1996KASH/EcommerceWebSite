<?php
if(isset($_POST['inform'])){
$number = $_POST['inform'];
$bookname = $_POST['bookname'];
$name =$_POST['fname'];
$location = $_POST['location'];
$mail = $_POST['mail'];
$to = "dibs.official2@gmail.com";
$subject = "One User Requested Book";
$txt = $name." requested ".$bookname." on site his contact number is ".$number." Email -ID-".$mail." Location " . $location;
$headers = "From: support@dibsofficial.in";

mail($to,$subject,$txt,$headers);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>