<?php 
include("include/connect.php");
include("include/session.php");

include("include/functions.php");

$parent_cat = $_GET['parent_cat'];

$query = mysql_query("SELECT * FROM child WHERE pid = {$parent_cat}");
while($row = mysql_fetch_array($query)) {

	echo "<option value='$row[id]'>$row[name]</option>";
}
?>