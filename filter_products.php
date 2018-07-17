<?php
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();

$bcheck = $_REQUEST['bcheck'];
$scheck = $_REQUEST['scheck'];
$ccheck = $_REQUEST['ccheck'];
$price_range = $_REQUEST['price_range'];

$WHERE = array(); $inner = $w = '';

if (!empty($price_range)) {
    $data3 = explode('-', $price_range);
    $WHERE[] = "(t1.Price between $data3[0] and $data3[1])";
}

if (!empty($bcheck)) {
    if (strstr($bcheck, ',')) {
        $data1 = explode(',', $bcheck);
        $barray = array();
        foreach ($data1 as $c) {
            $barray[] = "t1.categories = $c";
        }
        $WHERE[] = '('.implode(' OR ', $barray).')';
    } else {
        $WHERE[] = '(t1.categories = '.$bcheck.')';
    }
}

if (!empty($ccheck)) {
    if (strstr($ccheck, ',')) {
        $data2 = explode(',', $ccheck);
        $carray = array();
        foreach ($data2 as $c) {
            $carray[] = "t1.location = $c";
        }
        $WHERE[] = '('.implode(' OR ', $carray).')';
    } else {
        $WHERE[] = '(t1.location = '.$ccheck.')';
    }
}

if (!empty($scheck)) {
    if (strstr($scheck, ',')) {
        $data3 = explode(',', $scheck);
        $sarray = array();
        foreach ($data3 as $c) {
            $sarray[] = "t2.sizeID = $c";
        }
        $WHERE[] = '('.implode(' OR ', $sarray).')';
    } else {
        $WHERE[] = '(t2.sizeID = '.$scheck.')';
    }

    $inner = 'INNER JOIN tbl_productsizes AS t2 ON t1.ProductID = t2.ProductID';
}
    $w = implode(' AND ', $WHERE);
    if (!empty($w)) {
        $w = 'WHERE '.$w;
    }



    //echo "SELECT DISTINCT  t1 . * FROM  `tbl_products` AS t1 $inner $w";
    $query = mysql_query("SELECT DISTINCT  t1 . * FROM  `tbl_products` AS t1 $inner $w");
    if (mysql_num_rows($query)>0) {
        while ($pro = mysql_fetch_assoc($query)) {
            $imagename = $pro['imagename'];
            $id=$pro['ProductID'];
            if (empty($imagename)) {
                $imagename="defaultimage/default.jpg";       //if image not found this will display
            } ?>

		<!------------------------------------------------------------------------------------------------------------------------------------------------->
			<div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
			   	<img src="book_images/<?php echo $imagename; ?>" alt=""style="width:179px;height:179px;"/>

				   	  </a>
				    <h4><a href="info.php?proid=<?=$pro['ProductID']?>"style="font-size:8px;"><?=$pro['Title']?></a></h4>

					 <div class="grid_1 simpleCart_shelfItem">

					 <div class="item_add"><span class="item_price"><h6><?=$pro['Price']?> Rs. </h6></span></div>
					<div class="item_add"><span class="item_price"><a href="info.php?proid=<?=$pro['ProductID']?>">Get Sellers info</a></span></div>
					<?php echo'<div class="fb-like" data-href="http://bookbid.in/info.php?proid='.$id.'" data-width="100px" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>'; ?>
					 </div>
			   	</div>
			</div>



		<!------------------------------------------------------------------------------------------------------------------------------------------------->


		<?php
        }
    } else {
        ?>
        <div align="center"><h2 style="font-family:'Arial Black', Gadget, sans-serif;font-size:30px;color:#0099FF;">No book found</h2></div>
        <?php
    }
?>
