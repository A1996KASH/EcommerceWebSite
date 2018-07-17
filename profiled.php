<?php
$username=$_SESSION["user_login"];
$products = $db->allProductsinfouser($username);
if (count($products)>0) {
    echo'<div id="productContainer">';
    foreach ($products as $faq) {
        $imagename = $faq['imagename'];
        if (empty($imagename)) {
            $imagename="defaultimage/default.jpg";      //if image not found this will display
        }
        $price=$faq["Price"];
        $name=$faq['Title'];
        $uploadedby=$faq['uploadedby'];
        $id=$faq['ProductID'];
        echo'<div id="loaderID" style="position:absolute; top:60%; left:53%; z-index:2; opacity:0"><img src="images/ajax-loader.gif" /></div>';
        echo'<div class="grid1_of_4">';
        echo'<div class="content_box">';
        echo"<a href=\"delete/delete.php?del=" .
    urlencode($faq['ProductID'])."\"";
        echo'></a>';
        echo'<img src="book_images/'.$imagename.'" class="img-responsive" alt=""style="width:253px;height:179px;"/>';
        echo'</a>';
        echo'<h4>';
        echo"<a href=\"info.php?proid=" .
    urlencode($faq['ProductID'])."\"";
        echo'style="font-size:10px;">';
        echo($name);
        echo'</a>';
        echo'</h4>';

        echo'<div class="grid_1 simpleCart_shelfItem">';

        echo'<div class="item_add"><span class="item_price"><h6>';
        echo($price);
        echo'</h6></span></div>';
        echo'<div class="item_add"><span class="item_price">';
        echo"<a href=\"delete/delete.php?del=" .
    urlencode($faq['ProductID'])."\"";
        echo'>Delete</a>
	</span></div><br><br>';
        echo'<div class="fb-like" data-href="http://bookbid.in/info.php?proid='.$id.'" data-width="100px" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>';
        echo'</div>';
        echo'</div>';
        echo'</div>';
    }
}
    echo'</div>';
