<?php
ob_start();
include("../include/connect.php");
include("../include/session.php");
include("../include/functions.php");
confirm_logged_in();
check_password();
ob_end_flush();
?>
<?php
ob_start();
$delete_id=strip_tags(@$_GET['del']);
$reqdelete=strip_tags(@$_GET['req']);
if(isset($_GET['del'])){
	{
$sql3=mysql_query("SELECT * FROM tbl_products where ProductID=$delete_id limit 1");
while($faq=mysql_fetch_array($sql3)){
	$imgname=$faq['imagename'];
	confirm_query($faq);
	unlink("../book_images/$imgname");
		
		}
		$query="delete from tbl_products where ProductID='{$delete_id}'";
		$result=mysql_query($query);
confirm_query($result);
		header("location:../profile.php");

}}
if(isset($_GET['req'])){
{
	$query="delete from requestedbook where id='{$reqdelete}'";
		$result=mysql_query($query);
confirm_query($result);
		header("location:../profile.php");
	
}
}
ob_end_flush();
?>