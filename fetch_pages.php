<?php
/* Title : Ajax Pagination with jQuery & PHP
Example URL : http://www.sanwebe.com/2013/03/ajax-pagination-with-jquery-php */

//continue only if $_POST is set and it is a Ajax request
if (isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    include("config.inc.php");  //include config file
    //Get page number from Ajax POST
    if (isset($_POST["page"])) {
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if (!is_numeric($page_number)) {
            die('Invalid page number!');
        } //incase of invalid page number
    } else {
        $page_number = 1; //if there's no page number, set it to 1
    }

    //get total number of records from database for pagination
    $results = $mysqli->query("SELECT COUNT(*) FROM tbl_products");
    $get_total_rows = $results->fetch_row(); //hold total records in variable
    //break records into pages
    $total_pages = ceil($get_total_rows[0]/$item_per_page);

    //get starting position to fetch the records
    $page_position = (($page_number-1) * $item_per_page);


    //Limit our results within a specified range.
    $results = $mysqli->prepare("SELECT ProductID,Title,Price FROM tbl_products ORDER BY ProductID ASC LIMIT $page_position, $item_per_page");
    $results->execute(); //Execute prepared Query
    $results->bind_result($id, $name, $price); //bind variables to prepared statement

    //Display records fetched from database.
    echo'<div id="loaderID" class="contents" style="position:absolute; top:60%; left:53%; z-index:2; opacity:0"><img src="images/ajax-loader.gif" /></div>';
    while ($results->fetch()) { //fetch values
        $imagename = $id . '.jpg';

        echo    '<div class="grid1_of_4">';
        echo    '<div class="content_box">';
        echo"<a href=\"info.php?proid=" .
    urlencode($id)."\"";
        echo'>';

        echo'<img src="book_images/'.$imagename.'" class="img-responsive" alt=""style="width:253px;height:179px;"/>';
        echo'</a>';
        echo'<h4>';
        echo"<a href=\"info.php?proid=" .
    urlencode($id)."\"";
        echo'>';
        echo($name);
        echo'</a>';
        echo'</h4>';
        echo'<p>It is a long established fact that</p>';
        echo'<div class="grid_1 simpleCart_shelfItem">';

        echo'<div class="item_add"><span class="item_price"><h6>';
        echo($price);
        echo'</h6></span></div>';
        echo'<div class="item_add"><span class="item_price">';
        echo"<a href=\"info.php?proid=" .
    urlencode($id)."\"";
        echo'>Get sellers info</a>
	</span></div>';
        echo'</div>';
        echo'</div>';
        echo'</div>';


        echo'</div>';
    }


    echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us.
    As you can see I have passed several parameters to the function. */
    echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
    echo '</div>';

    exit;
}
################ pagination function #########################################
function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{
    $pagination = '';
    if ($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages) { //verify total pages and current page number
        $pagination .= '<ul class="pagination">';

        $right_links    = $current_page + 3;
        $previous       = $current_page - 3; //previous link
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link

        if ($current_page > 1) {
            $previous_link = ($previous==0)? 1: $previous;
            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for ($i = ($current_page-2); $i < $current_page; $i++) { //Create left-hand side links
                    if ($i > 0) {
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }
            $first_link = false; //set first link to false
        }

        if ($first_link) { //if current active page is first link
            $pagination .= '<li class="first active">'.$current_page.'</li>';
        } elseif ($current_page == $total_pages) { //if it's the last active link
            $pagination .= '<li class="last active">'.$current_page.'</li>';
        } else { //regular current link
            $pagination .= '<li class="active">'.$current_page.'</li>';
        }

        for ($i = $current_page+1; $i < $right_links ; $i++) { //create right-hand side links
            if ($i<=$total_pages) {
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if ($current_page < $total_pages) {
            $next_link = ($i > $total_pages) ? $total_pages : $i;
            $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }

        $pagination .= '</ul>';
    }
    return $pagination; //return pagination links
}

?>
