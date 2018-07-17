<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
check_password();
?>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);

include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();
?>
<?php
include("include/header.php");
?>
<!-- content -->
<div class="container">
<div class="women_main">
	<!-- start sidebar -->
	<div class="col-md-3 s-d">
	  <div class="w_sidebar">
		<!--<div class="w_nav1">
			<a href="product.php"><h4>All BOOKS</h4></a>
			<ul>
				<li><a href="producthead.php?pid=enterance exams">Entrance Exams</a></li>
				<li><a href="producthead.php?pid=law">Law books</a></li>
				<li><a href="producthead.php?pid=engineering">Engineering Books</a></li>
				<li><a href="producthead.php?pid=novels">Novels</a></li>
				<li>	<a href="producthead.php?pid=medical">Medical</a></li>
				<li><a href="producthead.php?pid=school">School Books</a></li>
			</ul>
		</div>--!>
		<h3>filter by</h3>
		<section  class="sky-form">
					<h4>CLASSES</h4>
						<div class="row1 scroll-pane">
				<div class="col col-4">
					<div class="pro_cat_title">
				   		<h1 style="cursor:pointer;"><a></a><span class="spanbrandcls" style="float:right; visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span></h1>
            		</div>
                    <div id="branddivID"><?php include 'pageportion/brands.php';  ?></div>
               </div>



    </div>
						</div>
		</section>
		<section  class="sky-form">
					<h4>LOCATION</h4>
						<div class="row1 scroll-pane">
							<div class="col col-4">

					<div class="pro_cat_title">
						<h1 style="cursor:pointer;"><a></a><span class="spancolorcls" style="float:right; visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span></h1>
					</div>
					<?php include 'pageportion/colors.php';  ?>
							</div>
						</div>
		</section>
		<section class="sky-form">
						<h4>PRICE-RANGE</h4>
						<div class="row1 scroll-pane">

							<div class="col col-4">
									<div class="pro_cat_title">
						<h1 style="cursor:pointer;"><a></a><span class="spanpricecls" style="float:right; visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span></h1>
					</div>
					<?php include 'pageportion/prices.php';  ?>
							</div>
						</div>
		</section>
	</div>
   </div>
	<!-- start content -->
	<div class="col-md-9 w_content">
		<div class="women">
			<a href="#"><h4>available books  </h4></a>

		     <div class="clearfix"></div>
		</div>
		<!-- grids_of_4 -->
		<div class="grids_of_4">
		<?php include 'pageportion/show-filters.php';  ?>
        <?php echo'<div id="faq-result">';
 include('getresult1.php');
echo'</div>';?>

</div>



			<div class="clearfix"></div>
		</div>
		<!-- end grids_of_4 -->


	</div>
	<div class="clearfix"></div>

	<!-- end content -->
</div>
</div>
<?php
include("include/footer.php");
?>
