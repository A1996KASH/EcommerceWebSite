<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");

$parent_cat = $_GET['parent_cat'];

$query = mysql_query("SELECT * FROM childcategories WHERE parentid = {$parent_cat}");
	echo "<option value='0'>Select subcategories</option>";
while($row = mysql_fetch_array($query)) {
	echo "<option value='$row[id]'>$row[categories]</option>";
}
?>