				<?php

$products = $db->allProductsinfo($id);
if(count($products)>0) {
	foreach($products as $pro) {
		$imagename = $pro['ProductID'] . '.jpg';
$query2="select categories from childcategories where id='{$pro['categories']}' limit 1";
							$result=mysql_query($query2);
confirm_query($result);
$found_user=mysql_fetch_array($result);
$subcategory=$found_user['categories'];
$query="select location from locations where id='{$pro['location']}' limit 1";
							$result=mysql_query($query);
confirm_query($result);
$found_user=mysql_fetch_array($result);
$location=$found_user['location'];
		?>
												<?php
	}
}
?>
					<?php
						$query="select * from users where username='{$pro['uploadedby']}'limit 1";
$result=mysql_query($query);
confirm_query($result);
$found_user=mysql_fetch_array($result);
$contactnumber=$found_user['contactnumber'];
$emailid=$found_user['email'];
$first_name=$found_user['first_name'];
						?>