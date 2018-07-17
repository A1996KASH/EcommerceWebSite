<?php
session_start();
if(isset($_SESSION["userData"])){
if(isset($_POST["key"])){
$key = implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
$conn = new mysqli('localhost','bookbidi_akash','9993164199','bookbidi_zeblok');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userData = array();
$userData = $_SESSION['userData'];
$provider = $userData['oauth_provider'];
$oauthid  = $userData['oauth_uid'];
$sql = "UPDATE users set apikey ='$key' WHERE oauth_provider = '$provider' AND oauth_uid = '$oauthid'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header('Location:index.php');

}
}
else{
    echo "please Login";
}
$conn->close();
?>