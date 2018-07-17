<?php 
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
confirm_logged_in();
check_password();

?>
<?php
include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();
if (isset($_POST['name'])) {
    $Title = $_POST['name'];
    $Brand = $_POST['brand'];
    $brand2 =$_POST['brand2'];
    $uploadedby = $_SESSION['user_login'];
    $Color = $_POST['color'];
    $Price = $_POST['price'];
    $edison = $_POST['edison'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    if (!empty($_FILES['file']['name'])) {
        $filecheck = basename($_FILES['file']['name']);
        $ext = strtolower(substr($filecheck, strrpos($filecheck, '.') + 1));
        if (($ext == "jpg" || $ext == "gif" || $ext == "png") && ($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/gif" || $_FILES["file"]["type"] == "image/png")) {
            $changename = explode(".", $_FILES["file"]["name"]);
            $file = rand(1000, 100000)."-".round(microtime(true)) .$_FILES['file']['name'];
            $file_loc = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            $folder="book_images/";
            // new file size in KB
            $new_size = $file_size/1024;
            // new file size in KB

            // make file name in lower case
            $new_file_name = strtolower($file);
            // make file name in lower case
            $final_file=str_replace(' ', '-', $new_file_name);
            move_uploaded_file($file_loc, $folder.$final_file);
        } else {
            echo("please upload only .jpeg,.png format of image only.");
        }
    } else {
        $final_file="";
    }

    if (isset($_POST['actprice'])) {
        $aprice=$_POST['actprice'];
    } else {
        $aprice=0;
    }
    $sql = "INSERT INTO tbl_products VALUES('','$Title','$Brand','$Color','$Price','$uploadedby','$author','$edison','$aprice','$brand2','$final_file','$description')";
    $result3=mysql_query($sql);
    confirm_query($result3); ?>
	<script>
		alert('successfully uploaded');
        window.location.href='index.php?success';
        </script>
	<?php
}

?>
<?php
if (isset($_POST['requestbook'])) {
    $book_name = mysql_real_escape_string($_POST['requestbook']);
    $author = mysql_real_escape_string($_POST['requestauthor']);
    $edison = mysql_real_escape_string($_POST['requestedison']);
    $loc = mysql_real_escape_string($_POST['locationr']);
    $uploadedby = mysql_real_escape_string($_SESSION['user_login']);
    $sql=mysql_query("insert into requestedbook(bookname,author,edison,requestedby,daterequested,location)
	values('$book_name','$author','$edison','$uploadedby',now(),'$loc')");
    header("location:requestedbook.php");
}
?>
<?php
include("include/header.php");
?>
	<script type="text/javascript">
$(document).ready(function() {

	$("#parent_cat").change(function() {
		$(this).after('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" /></div>');
		$.get('loadsubcat.php?parent_cat=' + $(this).val(), function(data) {
			$("#sub_cat").html(data);
			$('#loader').slideUp(200, function() {
				$(this).remove();
			});
		});
    });

});
</script>
	<script type="text/javascript">
$(document).ready(function() {

	$("#sub_cat").change(function() {
		$(this).after('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" /></div>');
		$.get('loadsubcat1.php?parent_cat=' + $(this).val(), function(data) {
			$("#child_cat").html(data);
			$('#loader').slideUp(200, function() {
				$(this).remove();
			});
		});
    });

});
</script>
<!-- content -->
<div class="container">
<div class="main">
	<!-- start registration -->
	<div class="registration">
		<div class="registration_left">
		<h2> <span> Upload Items </span></h2>
		<!-- [if IE]
		    < link rel='stylesheet' type='text/css' href='ie.css'/>
		 [endif] -->

		<!-- [if lt IE 7]>
		    < link rel='stylesheet' type='text/css' href='ie6.css'/>
		<! [endif] -->
		<script>
			(function() {

			// Create input element for testing
			var inputs = document.createElement('input');

			// Create the supports object
			var supports = {};

			supports.autofocus   = 'autofocus' in inputs;
			supports.required    = 'required' in inputs;
			supports.placeholder = 'placeholder' in inputs;

			// Fallback for autofocus attribute
			if(!supports.autofocus) {

			}

			// Fallback for required attribute
			if(!supports.required) {

			}

			// Fallback for placeholder attribute
			if(!supports.placeholder) {

			}

			// Change text inside send button on submit
			var send = document.getElementById('register-submit');
			if(send) {
				send.onclick = function () {
					this.innerHTML = '...Sending';
				}
			}

		})();
		</script>
		 <div class="registration_form">
		 <!-- Form -->
		 <form action="upload_books.php"enctype="multipart/form-data"name="myform" id="registration_form" method="post">
				<div>
					<label>
					<input type="text" name="name" placeholder="name"required />
					</label>
				</div>
				<div>
					<label>
					<textarea name="author"type="text" placeholder="Author"   style="padding: 8px;
    display: block;
    width: 100%;
    outline: none;
    font-family: 'Open Sans', sans-serif;
    font-size: 0.8925em;
    color: #333333;
    -webkit-appearance: none;
    background: #FFFFFF;
    border: 1px solid rgb(231, 231, 231);
    font-weight: normal;
}

input, button, select,"required></textarea>
					</label>
				</div>

					<div>
					<label>
					<textarea name="description"type="text" placeholder="description"   style="padding: 8px;
    display: block;
    width: 100%;
    outline: none;
    font-family: 'Open Sans', sans-serif;
    font-size: 0.8925em;
    color: #333333;
    -webkit-appearance: none;
    background: #FFFFFF;
    border: 1px solid rgb(231, 231, 231);
    font-weight: normal;
}

input, button, select,"required></textarea>
					</label>
				</div>

				<div>
					<label>
	<input name="actprice"type="number" placeholder="Actual Price"/>
					</label>
				</div>
				<div>
					<label>
	<input name="price"type="number" placeholder="Your price"required/>
					</label>
				</div>

				<div>
					<label>
						<input name="edison"type="text" placeholder="NO of year's Used"required/>
					</label>
				</div>

				<div>
					<label>
				<select name="color">
    <?php
        $colorarray = $db->getResults('locations');
        foreach ($colorarray as $color) {
            $pcolor = $color['location']; ?>
		<option value="<?=$color['id']?>"><?=$pcolor?></option>

		<?php
        }
        ?>
		</select>
					</label>
				</div>
				<div>
					<label>
										<?php
$query_parent = mysql_query("SELECT * FROM parentcategories") or die("Query failed: ".mysql_error());
?>

    <select name="categories" id="parent_cat">
	<option value="NULL">SELECT CATEGORIES</option>
        <?php while ($row = mysql_fetch_array($query_parent)): ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['subcategory_name']; ?></option>
        <?php endwhile; ?>
    </select>
					</label>
				</div>
				<div>
					<label>
						   <select name="brand" id="sub_cat"placeholder="subcategory"></select>
					</label>
				</div>
				<div>
					<label>
						   <select name="brand2" id="child_cat"placeholder="subcategory"></select><br>
						   <p>if sub category and sub-sub category are not available leave them blank</p>
					</label>
				</div>
				<div>
					<label>
							<p> * please upload .jpg/.gif/.png/.jpeg format only </p>
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
	<div class="registration_left">
		<h2>Request Books</h2>
		 <div class="registration_form">
		 <!-- Form -->
		 <form action="upload_books.php"enctype="multipart/form-data"name="myform" id="registration_form" method="post">
				<div>
					<label>
						<input name="requestbook"type="text" placeholder="book"required/>
					</label>
				</div>
				<div>
					<label>
						<input name="requestauthor"type="text" placeholder="author" size="12"required/>
					</label>
				</div>
<div>
					<label>
					<input name="requestedison"type="text" placeholder="edison"required/>
					</label>
				</div>
<div>
					<label>
		<?php
$query_parent = mysql_query("SELECT location FROM locations") or die("Query failed: ".mysql_error());
?>

    <select name="locationr" id="location"placeholder="location">
        <?php while ($row = mysql_fetch_array($query_parent)): ?>
        <option value="<?php echo $row['location']; ?>"><?php echo $row['location']; ?></option>
        <?php endwhile; ?>
    </select>
					</label>
				</div>
				<div>
					<input type="submit" value="Request Book" id="register-submit">
				</div>
			</form>
			<!-- /Form -->
			</div>
	</div>
	<div class="clearfix"></div>
	</div>
	<!-- end registration -->
</div>
</div>
<?php
include("include/footer.php");
?>
