<?php
$sql1=mysql_query("SELECT * FROM parentcategories WHERE subcategory_name='$pid' ");
$faq=mysql_fetch_array($sql1);
$idc=$faq['id'];
$sql2=mysql_query("SELECT * FROM childcategories WHERE parentid='$idc' ");
while ($faq=mysql_fetch_array($sql2)) {
    $ida=$faq["id"];
    $sql3=mysql_query("SELECT * FROM tbl_products WHERE categories=$ida ");
    echo'<div id="productContainer">';
    while ($faq=mysql_fetch_array($sql3)) {
        $price=$faq["Price"];
        $name=$faq['Title'];
        $uploadedby=$faq['uploadedby'];
        $id=$faq['ProductID'];
        $imagename = $faq['imagename'];
        if (empty($imagename)) {
            $imagename="defaultimage/default.jpg";        //if image not found this will display
        }
        echo'<div id="loaderID" style="position:absolute; top:60%; left:53%; z-index:2; opacity:0"><img src="images/ajax-loader.gif" /></div>';
        echo'<div class="grid1_of_4">';
        echo'<div class="content_box">';
        echo"<a href=\"info.php?proid=" .
    urlencode($faq['ProductID'])."\"";
        echo'></a>';
        echo'<img src="book_images/'.$imagename.'" class="img-responsive" alt=""style="width:253px;height:179px;"/>';
        echo'</a>';
        echo'<h4>';
        echo"<a href=\"info.php?proid=" .
    urlencode($faq['ProductID'])."\"";
        echo'style="font-size:8px;">';
        echo($name);
        echo'</a>';
        echo'</h4>';

        echo'<div class="grid_1 simpleCart_shelfItem">';

        echo'<div class="item_add"><span class="item_price"><h6>';
        echo$price." Rs.";
        echo'</h6></span></div>';
        echo'<div class="item_add"><span class="item_price">';
        echo"<a href=\"info.php?proid=" .
    urlencode($faq['ProductID'])."\"";
        echo'>Get sellers info</a>
	</span></div>';
        echo'<div class="fb-like" data-href="http://bookbid.in/info.php?proid='.$id.'" data-width="100px" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>';
        echo'</div>';
        echo'</div>';
        echo'</div>';
    }
    echo'</div>';
}
