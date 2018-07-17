<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
 confirm_logged_in();
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
		<div class="w_nav1">

			<?php
    $username=$_SESSION["user_login"];
$query="select * from users where username='{$username}'limit 1";
$result=mysql_query($query);
confirm_query($result);
@$found_user=mysql_fetch_array($result);
    $imagename = $found_user['profilepic'];
         if (empty($imagename)) {
             $imagename="defaultimage/default.jpg";      //if image not found this will display
         }


    ?>
			<img src="profile_img/<?php echo $imagename;?>" style="width:100px;height:200px;    width: 153px;height: 200px;margin-left: 32px;"/>
					<script type="text/javascript">
$(function() {
$('.showhide').click(function() {
$(".picture").slideToggle();
});
});
</script>
<a href"#" class="showhide"style="font-family: 'Open Sans', sans-serif;
    cursor: pointer;
    border: none;
    outline: none;
    display: inline-block;
    font-size: 1em;
	margin-left:22px;
    padding: 10px 34px;
    background: #ff6978;
    color: #fff;
	    margin-bottom: 30px;
    margin-top: 19px;
    text-decoration: none;
    text-transform: uppercase;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;">Change DP!</a></label>


			<div class="picture"style="display:none;">
					<div class="registration_form">
		 <!-- Form -->
		 <form action="changedp.php"enctype="multipart/form-data"name="myform" id="registration_form" method="post">

				<div>
					<label>
			 <input type="file"name="file" id="fileField"/>
					</label>
				</div>
				<div>

					<input type="submit" value="Upload" name="reg" id="register-submit">
				</div>

			</form>
			<!-- /Form -->
		</div>
	</div>
	<br><br>
			<h4>Dash Board</h4>
			<ul>
				<li><a href="#">Who viewed your Products</a></li>
			</ul>
</div>
		</div>


	</div>
			</div>
	<!-- start content -->
	<div class="col-md-9 w_content">
		<div class="women">
			<a href="#"><h4>Products By You  </h4></a>

		     <div class="clearfix"></div>
		</div>
		<!-- grids_of_4 -->
		<div class="grids_of_4">
		<?php include 'pageportion/show-filters.php';  ?>
        <?php echo'<div id="faq-result">';
 include('profiled.php');
echo'</div>';?>

</div>



			<div class="clearfix"></div>
		</div>
		<!-- end grids_of_4 -->


	</div>
	<div class="clearfix"></div>

	<!-- end content -->
</div>


<?php
include("include/footer.php");
?>
