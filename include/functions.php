<?php
function confirm_query($result_set){
if(!$result_set){
	die("database query failed:".mysql_error());
}
}
function get_all_subjects(){

$query = "SELECT * ";
    $query .= "FROM books order by position ASC ";
$subject_set = mysql_query($query);
confirm_query($subject_set);
return $subject_set;

}
function get_pages_for_subject($subject_id){
	$query = "SELECT *";
    $query .= "FROM books ORDER BY position ASC";
$page_set=mysql_query($query);
confirm_query($page_set);
return $page_set;
}
function get_subject_by_id($subject_id){
	$query="SELECT * ";
	$query.="FROM subjects ";
	$query.="WHERE id=".$subject_id;
	$query.=" LIMIT 1";
	$result_set= mysql_query($query);
	confirm_query($result_set);
	//if no row are returned,fetch array will return false
	if($subject=mysql_fetch_array($result_set)){
	return $subject;
	}else{
		return NULL;
	}
	
}
function get_pages_by_id($page_id){
	$query="SELECT * ";
	$query.="FROM pages ";
	$query.="WHERE id=".$page_id;
	$query.=" LIMIT 1";
	$result_set= mysql_query($query);
	confirm_query($result_set);
	//if no row are returned,fetch array will return false
	if($subject=mysql_fetch_array($result_set)){
	return $subject;
	}else{
		return NULL;
	}
	
}
function find_selected_page(){
	global $sel_subject;
	global $sel_pages;

if (isset($_GET['subj'])){
	$sel_subject =get_subject_by_id($_GET['subj']);
	$sel_pages=NULL;
}
elseif
(isset($_GET['page'])){
	$sel_subject=NULL;
	$sel_pages=get_pages_by_id($_GET['page']);

	
}
else{
	$sel_subject=NULL;

	$sel_pages=NULL;

}
}
function navigation($sel_subject,$sel_pages){
	$output="<ul class=\"subjects\">";

	$subject_set=get_all_subjects();
while($subject=mysql_fetch_array($subject_set))
{
	$output.="<li";	
	$output.="><a href=\"content1.php?subj=" .
	urlencode($subject['id'])."\">{$subject["menu_name"]}</a> </li>";
	
   $page_set = get_pages_for_subject($subject["id"]);
$output.= "<ul class=\"pages\">";
while($page =mysql_fetch_array($page_set)) {

	$output.="<li";
	$output.= "><a href=\"content1.php?page=".
	urlencode($page["id"])."\">{$page["menu_name"]}</a> </li>";
                                            }
$output.= "</ul>";
}

echo"</ul>"; 
	return $output;
}
function navigation_student($sel_subject,$sel_pages){
	$output="<ul class=\"subjects\">";
	$subject_set=get_all_subjects();
while($subject=mysql_fetch_array($subject_set))
{
	$output.="<li";
	if($subject["id"]==$sel_subject['id']){
		
	$output.="class=\"selected\"";}
	
	$output.="><a href=\"student.php?subj=" .
	urlencode($subject['id'])."\">{$subject["menu_name"]}</a> </li>";
	
   $page_set = get_pages_for_subject($subject["id"]);
$output.= "<ul class=\"pages\">";
while($page =mysql_fetch_array($page_set)) {

	$output.="<li";
	if($page["id"]==$sel_pages['id']){
		
	$output.="class=\"selected\"";}
	$output.= "><a href=\"student.php?page=".
	urlencode($page["id"])."\">{$page["menu_name"]}</a> </li>";
                                            }
$output.= "</ul>";
}

echo"</ul>"; 
	return $output;
}
function navigation_teacher($sel_subject,$sel_pages){
	
	$output="<ul class=\"subjects\">";

	$subject_set=get_all_subjects();
while($subject=mysql_fetch_array($subject_set))
{
	$output.="<li";
	if($subject["id"]==$sel_subject['id']){
		
	$output.="class=\"selected\"";}
	
	$output.="><a href=\"teacher.php?subj=" .
	urlencode($subject['id'])."\">{$subject["menu_name"]}</a> </li>";
	
   $page_set = get_pages_for_subject($subject["id"]);
$output.= "<ul class=\"pages\">";
while($page =mysql_fetch_array($page_set)) {

	$output.="<li";
	if($page["id"]==$sel_pages['id']){
		
	$output.="class=\"selected\"";}
	$output.= "><a href=\"teacher.php?page=".
	urlencode($page["id"])."\">{$page["menu_name"]}</a> </li>";
                                            }
$output.= "</ul>";
}

echo"</ul>"; 
	return $output;
}
function check_password(){
		if(isset($_SESSION['user_id'])){
			$user_login="";
		$user_login=$_SESSION['user_id'];
		$query="select id,username,passwordreset from users where id='{$user_login}' limit 1";
$result=mysql_query($query);
confirm_query($result);
if(mysql_num_rows($result)==1){
	$found_user=mysql_fetch_array($result);
	$status=$found_user['passwordreset'];
	if($status==1){
	header("location:resetpassword.php");
}
}
		}
		else{
			$name='akash';
		}
		
		
	}
	
	
	function getRealIpAddress()
{
if (!empty($_SERVER['HTTP_CLIENT_IP']))
//check ip from internet
{
$ipadd=$_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
//check ip proxy
{
$ipadd=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
$ipadd=$_SERVER['REMOTE_ADDR'];
}
return $ipadd;
}

?>