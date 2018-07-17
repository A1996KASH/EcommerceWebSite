<?php
require_once("dbcontroller1.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$keywords =$_POST['keyword'];

	$query = "SELECT ProductID,title,author FROM tbl_products WHERE title LIKE '%".$keywords."%'OR author LIKE '%".$keywords."%'";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li><a href="info.php?proid=<?php echo $country['ProductID'];?>"><?php echo $country["title"]." by ".$country["author"]; ?></a></li>
<?php } ?>
</ul>
<?php }
else{ ?>
<ul id="country-list">
<li>No Book Found</li>
</ul>

<?php }

 } ?>