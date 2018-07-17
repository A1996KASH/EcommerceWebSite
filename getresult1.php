<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$perPage = 12;

$sql = "SELECT * from tbl_products order by Price";
$result =mysql_query($sql);
 if(mysql_num_rows($result)>0){
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage; 
$faq = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}
$pages  = ceil($_GET["rowcount"]/$perPage);
$output = '';
if(!empty($faq)) {
$output .= '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />';
$output .= '<div id="productContainer">';
foreach($faq as $k=>$v) {
	$price=$faq[$k]["Price"];
		$name=$faq[$k]['Title'];
		$uploadedby=$faq[$k]['uploadedby'];
		$id=$faq[$k]['ProductID'];
		$imagename = $faq[$k]['imagename'];
		 if(empty($imagename))
    {
        $imagename="defaultimage/default.jpg";      //if image not found this will display
     }
		$output .=	'<div id="loaderID" style="position:absolute; top:60%; left:53%; z-index:2; opacity:0"><img src="images/ajax-loader.gif" /></div>';
$output .=	'<div class="grid1_of_4">';
				$output .=	'<div class="content_box">';
			$output .="<a href=\"info.php?proid=" .
	urlencode($faq[$k]['ProductID'])."\"";$output .='></a>';
			   	   	 $output .='<img src="book_images/'.$imagename.'" class="img-responsive" alt=""style="width:253px;height:179px;"/>';
				   	  $output .='</a>';
				      $output .='<h4>';
					$output .="<a href=\"info.php?proid=" .
	urlencode($faq[$k]['ProductID'])."\"";$output .='style="font-size:8px;">';$output .=($name);
	$output .='</a>';
				$output .='</h4>';
				
					 $output .='<div class="grid_1 simpleCart_shelfItem">';
				    
					 $output .='<div class="item_add"><span class="item_price"><h6>';$output .=($price);
					 $output .=' Rs.</h6>';$output.='</span></div>';
					$output .='<div class="item_add"><span class="item_price">';$output .="<a href=\"info.php?proid=" .
	urlencode($faq[$k]['ProductID'])."\"";
	$output .='>Get sellers info</a>
	</span></div>';
		$output.='<div class="fb-like" data-href="http://bookbid.in/info.php?proid='.$id.'" data-width="100px" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>';
					 $output .='</div>';
			   	$output .='</div>';
			$output .='</div>';
			
}
	$output .='</div>';

}
print $output;
 }
  else{
		 echo"<h2 class='title text-center'>NO BOOK AVAILABLE</h2>";
	 }
		?>					