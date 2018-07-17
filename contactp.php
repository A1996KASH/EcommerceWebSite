<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
?>
<?php
if (isset($_POST['usermsg'])) {
    @$name= $_POST['username'];
    @$email = strtolower($_POST['useremail']);
    @$phone =$_POST['userphone'];
    @$msg = $_POST['usermsg'];
    $sql = "INSERT INTO usercontact VALUES('','$name','$email','$phone','$msg')";
    $result3=mysql_query($sql);
    confirm_query($result3);
    mail($email, 'Receving Notification', "Hello " . ucfirst($name) ." We have recived your message we will contact you soon. - \n\n-bookbid.in"); ?>
	<script>
		alert('Successfully Submitted');
        window.location.href='index.php?success';
        </script>
	<?php
} elseif (isset($_POST['emailsubs'])) {
    @$emailsubs= $_POST['emailsubs'];
    $sql = "INSERT INTO emailsubs VALUES('','$emailsubs')";
    $result3=mysql_query($sql);
    confirm_query($result3);
    mail($emailsubs, 'Email Subscription', "Hello " . $emailsubs ." Thankyou for joining our News letter & recent Updates. - \n\n-bookbid.in"); ?>
	<script>
		alert('Successfully Added');
        window.location.href='index.php?success';
        </script>
	<?php
}


?>
