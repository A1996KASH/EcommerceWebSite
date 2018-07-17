<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
check_password();
?>
<?php
@$id="";
@$price="";
        @$name="";
        @$uploadedby="";
@$id= $_GET['proid'];
?>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);

include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();
?>
<?php
include("include/header.php");
?>
				<?php

@$products = $db->allProductsinfo($id);
if (count($products)>0) {
    foreach ($products as $pro) {
        $imagename = $pro['imagename'];
        if (empty($imagename)) {
            $imagename="defaultimage/default.jpg";    //if image not found this will display
        }
        $query2="select categories from childcategories where id='{$pro['categories']}' limit 1";
        $result=mysql_query($query2);
        confirm_query($result);
        $found_user=mysql_fetch_array($result);
        $subcategory=$found_user['categories'];
        $query="select location from locations where id='{$pro['location']}' limit 1";
        $result=mysql_query($query);
        confirm_query($result);
        $found_user=mysql_fetch_array($result);
        @$location=$found_user['location']; ?>
												<?php
    }
}
?>
					<?php
                        $query="select * from users where username='{$pro['uploadedby']}'limit 1";
$result=mysql_query($query);
confirm_query($result);
@$found_user=mysql_fetch_array($result);
@$contactnumber=$found_user['contactnumber'];
@$emailid=$found_user['email'];
@$first_name=$found_user['first_name'];
                        ?>

<!-- content -->
<div class="container">
<div class="women_main">
	<!-- start content -->
			<div class="row single">
				<div class="col-md-9 det">
				  <div class="single_left">
					<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="book_images/<?php echo $imagename;?>" class="img-responsive" />

									<img class="etalage_source_image" src="book_images/<?php echo $imagename;?>"  class="img-responsive" title="" />
								</a>
							</li>
						</ul>
						 <div class="clearfix"></div>
				  </div>
				  <div class="desc1 span_3_of_2">
					<h3><?=strtoupper($pro['Title'])?></h3>
					<span class="brand">Author: <?=strtoupper($pro['author'])?></span><br>
					<span class="code">LOCATION:		 <?php echo @$location;?><br></span>





					<?php
                                    $ap=$pro['act_price'];
                                    if ($ap==0) {
                                        $d=0; ?>
									<span class="code">MRP: NOT AVAILABLE</span>
											<div class="price">
							<span class="text">Price:</span>
							<span class="price-new"><?=$pro['Price']?></span><span class="price-old"></span>
							</div>
									<?php
                                    } else {
                                        ?>




					<span class="code">MRP: <?php echo $ap.' Rs.'; ?></span><br>
						<div class="price">
							<span class="text">Price:</span>
							<span class="price-new"><?=$pro['Price']?></span><span class="price-old"><?php echo $ap.' Rs.'; ?></span> </div>
							<?php

                                $sp=$pro['Price'];
                                        $d= 1-$sp/$ap;
                                        $d=$d*100;
                                    }

                                ?>
								<?php if ($d < 0) {
                                    ?>
									<span class="price-tax"style="color:red;">DISCOUNT: <?php echo round($d, 0);
                                    echo'% off'; ?></span><br>
								<?php
                                } else {
                                    ?>
								<span class="price-tax" style="color:green;">DISCOUNT: <?php echo round($d, 0);
                                    echo'% off'; ?></span><br>
								<?php
                                }
                                ?>
					<form method="POST" action="sendmail.php">
					<h4> Submit Details we will contact you..</h4>
					<input type="text" name ="fname" placeholder="name"class="form-control"/><br/>
					<input type="text" name ="location" placeholder="location" class="form-control"/><br/>
					<input type="email" name="mail" placeholder="Emailid" class="form-control"/><br/>
					<input type="number" name="inform" placeholder="Contact Number"class="form-control"/><br/>
					<input type="hidden" name="bookname" value="<?=strtoupper($pro['Title'])?>"/>
					<br/>
					<button type="submit" class="btn btn-default">Submit</button>
					</form>
			<script type="text/javascript">
$(function() {
$('.showhide').click(function() {
$(".slidediv").slideToggle();
});
});
</script>
				<?php
 if (isset($_SESSION['user_login'])) {
     echo'<label class="btn_form">';
     echo'<a href"#" class="showhide">SELLER INFO</a></label>';
     echo'<div class="slidediv" style="display:none;width: 280px;
    padding: 20px;
    color: rgb(212, 79, 79);
    margin-top: 10px;
    margin-bottom: 19px;
    /* border-bottom-width: 7px; */
    border-bottom-style: solid;
    border-bottom-color: rgb(35, 32, 32);
    background: rgb(58, 53, 53);
    box-shadow: 5px 5px 05px black;">';
     echo'<p style="color:white;"><b>Name:</b>'.ucfirst($first_name).'</p>
<p  style="color:white;"><b>Email:</b>'.$emailid.'</p>
<p style="color:white;"><b>Contact Number:</b>'.$contactnumber.'</p>
';
     echo'</div>'; ?>

 <?php
 } else {
     echo'<label class="btn_form">';
     echo'<a href"#" class="showhide">SELLER INFO</a></label>';
     echo'<div class="slidediv" style="display:none;width: 280px;
    padding: 20px;
    color: rgb(212, 79, 79);
    margin-top: 10px;
    margin-bottom: 19px;
    /* border-bottom-width: 7px; */
    border-bottom-style: solid;
    border-bottom-color: rgb(35, 32, 32);
    background: rgb(58, 53, 53);
    box-shadow: 5px 5px 05px black;">';
     echo'<a href="register.php" style="color:white;">PLEASE LOGIN!!</a>';
     echo'</div>';
 }

 echo'</div>';
echo'</div>';
                    ?>


			   	 </div>
          	    <div class="clearfix"></div>
          	    <div class="col-md-12"	><br><br>
					<h4>Description</h4>
					<p><?=$pro['description']?></p>
</div>	<br><br>
          	   </div>

				<div class="single-bottom2">
					<h6>Related Products</h6>
					<?php
        $sql3=mysql_query("select * from tbl_products where categories='{$pro['categories']}'limit 2");
while ($faq=mysql_fetch_array($sql3)) {
    $price1=$faq["Price"];
    $name=$faq['Title'];
    $uploadedby=$faq['uploadedby'];
    $id=$faq['ProductID'];
    $imagename = $faq['imagename'];
    if (empty($imagename)) {
        $imagename="defaultimage/default.jpg";  //if image not found this will display
    }
    echo'<div class="product">';
    echo'<div class="product-desc">';
    echo'<div class="product-img">';
    echo'<img src="book_images/'.$imagename.'" class="img-responsive" alt="" style="width:149.797px;height:94.0781px;"/>';
    echo' </div>';
    echo' <div class="prod1-desc">';
    echo' <h5>';
    echo"<a href=\"info.php?proid=" .
    urlencode($faq['ProductID'])."\"";
    echo'>';
    echo $name.'</a></h5>';
    echo'<p class="product_descr"> Price -'.$price1.' Rs </p>
							   </div>
							  <div class="clearfix"></div>
					      </div>
						  <div class="product_price">';

    echo"<a href=\"info.php?proid=" .
    urlencode($faq['ProductID'])."\"";
    echo'>';
    echo'<button class="button1"><span>Sellers info</span></button>';
    echo'</a>';
    echo'</div>';
    echo' <div class="clearfix"></div>';
    echo'</div>';
}?>

		   	  </div>
	       </div>

		   <div class="clearfix"></div>
	  </div>
	<!-- end content -->
</div>
</div>
<?php
include("include/footer.php");
?>
