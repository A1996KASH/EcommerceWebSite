<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
check_password();
?>
<?php
include("include/header.php");
?>
 
<div class="arriv">
	<div class="container">
		<div class="arriv-top">
			<div class="col-md-6 arriv-left">
				<img src="images/ab.jpg" class="img-responsive" alt="" style="width: 555px ; height: 386px;">
				<div class="arriv-info">
			<h3>All Books</h3>
					<p>REVIVE YOUR WARDROBE WITH CHIC KNITS</p>

					<div class="crt-btn">
						<a href="product.php">SHOP NOW</a>
					</div>
				</div>
			</div>
			<div class="col-md-6 arriv-right">
<img src="images/engineering.jpg" class="img-responsive" alt="" style="width: 555px ; height: 386px;">
				<div class="arriv-info">
					<h3>Engineering</h3>

					<div class="crt-btn">
						<a href="producthead.php?pid=Engineering">TAKE A LOOK</a>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="arriv-bottm">
			<div class="col-md-8 arriv-left1">
					<img src="images/school.jpeg" class="img-responsive" alt="" style="width: 745px ;height: 291px;">
				<div class="arriv-info">
					<h3>School Books</h3>

					<div class="crt-btn">
					<a href="producthead.php?pid=Schools">SHOP NOW</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 arriv-right1">
				<img src="images/school.jpeg" class="img-responsive" alt="" style="height: 291px;">
				<div class="arriv-info2">
					<a href="details.html"><h3>Trekking Shoes<i class="ars"></i></h3></a>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="arriv-las">
			<div class="col-md-4 arriv-left2">
				<img src="images/ce.jpg" class="img-responsive" alt="" style="width: 350px ;height: 269px;">
				<div class="arriv-info2">
					<a href="producthead.php?pid=Competitive Exams"><h3>Competitive Exams<i class="ars"></i></h3></a>
				</div>
			</div>
			<div class="col-md-4 arriv-middle">
					<img src="images/law.jpg" class="img-responsive" alt="" style="width: 350px ;height: 269px;">
				<div class="arriv-info3">
					<h3>Law Books</h3>
					<div class="crt-btn">
					<a href="producthead.php?pid=Law Books">SHOP NOW</a>
					</div>
				</div>


			</div>
			<div class="col-md-4 arriv-right2">
					<img src="images/ce.jpg" class="img-responsive" alt="" style="width: 350px ;height: 269px;">
				<div class="arriv-info2">
					<a href="producthead.php?pid=Competitive Exams"><h3>Competitive Exams<i class="ars"></i></h3></a>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

<div class="special">
	<div class="container">
		<h3>Recently Added</h3>
		<div class="specia-top">


			<ul class="grid_2">
			<?php
            $sql3=mysql_query("SELECT * FROM tbl_products order by ProductID DESC limit 4");
while ($faq=mysql_fetch_array($sql3)) {
    $price=$faq["Price"];
    $name=$faq['Title'];
    $uploadedby=$faq['uploadedby'];
    $id=$faq['ProductID'];
    $imagename = $faq['imagename'];
    if (empty($imagename)) {
        $imagename="defaultimage/default.jpg";       //if image not found this will display
    }

    echo'<li>';
    echo"<a href=\"info.php?proid=" .
    urlencode($faq['ProductID'])."\"";
    echo'>';
    echo'<img src="book_images/'.$imagename.'" class="img-responsive" alt="" style="width:262.188px; height:378.219px"/></a>';
    echo'<div class="special-info grid_1 simpleCart_shelfItem">';
    echo'<h5>'.$name.'</h5>';
    echo'<div class="item_add"><span class="item_price"><h6>'.$price.' Rs.</h6></span></div>';
    echo'<div class="item_add"><span class="item_price">';
    echo"<a href=\"info.php?proid=" .
    urlencode($faq['ProductID'])."\"";
    echo'>';

    echo'Sellers info</a></span>';
    echo'<br><br>&nbsp;<div class="fb-like" data-href="http://bookbid.in/info.php?proid='.$id.'" data-width="100px" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>';

    echo'</div>';

    echo'</div>';

    echo'</li>';
}
        echo'<div class="clearfix"> </div>';
        ?>

	</ul>
		</div>
	</div>


</div>
<?php
include("include/footer.php");
//<a href="http://pdfcrowd.com/url_to_pdf/">Save this page to a PDF</a>
?>
