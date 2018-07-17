<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
check_password();
?>
<?php
include("include/header.php");
?>



<!-- content -->
<div class="container">
<div class="main">
			<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Requested Books</h2>
						<div>
							<?php
 $sql = "SELECT bookname, author,edison,location FROM requestedbook";
$result =mysql_query($sql);
confirm_query($result);
     echo "<table class='table'><tr><th>Book name</th><th>Author</th><th>Edison</th><th>LOCATION</th></tr>";
     // output data of each row
     while (($row=mysql_fetch_array($result))) {
         echo "<tr><td>" . $row["bookname"]. "</td><td>" . $row["author"]. "</td><td>" . $row["edison"]. "</td><td>" . $row["location"]. "</td></tr>";
     }
     echo "</table>";
            ?>
						</div>
					</div>
	</div>
<?php
include("include/footer.php");
?>
