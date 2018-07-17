<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
<?php
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE HTML>
<html>
   <head>
      <link rel="icon" href="images/logo.png" type="image/png">
      <title>DIBS- The official pocket friendly store</title>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="propeller" content="ff9f14dfd377e48a1365e8e2553b03bd" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Second hand Store" />
      <meta name="keywords" content="books,mobiles,tablets,novels,furniture" />
      <meta name="author" content="Codrops" />
      <link rel="shortcut icon" href="../favicon.ico">
      <link rel="stylesheet" type="text/css" href="css/demo.css" />
      <link rel="stylesheet" type="text/css" href="cssslide/style.css" />
      <link rel="stylesheet" type="text/css" href="cssslide/custom.css" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="jsslide/modernizr.custom.79639.js"></script>
      <noscript>
         <link rel="stylesheet" type="text/css" href="cssslide/styleNoJS.css" />
      </noscript>
      <link rel="stylesheet" type="text/css" href="css/styleNoJS.css" />
      </noscript>
      <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
      <!-- jQuery (necessary JavaScript plugins) -->
      <script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
      <!-- Custom Theme files -->
      <link href="css/style.css" rel='stylesheet' type='text/css' />
      <!-- Custom Theme files -->
      <!--//theme-style-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="robots" content="online book store" />
      <meta name="googlebot" content="secondhand novels" />
      <meta name="googlebot" content="engineering books" />
      <meta name="description" keyword="secondhand book market" content="secondhand books in india" />
      <meta name="description" content="second hand book store - online secondhand book store " />
      <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
      <!-- start menu -->
      <!-- Place this tag in your head or just before your close
       tag. -->
      <script src="https://apis.google.com/js/platform.js" async defer></script>
      <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
      <link rel="stylesheet" href="css/etalage.css">
      <script type="text/javascript" src="js/megamenu.js"></script>
      <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
      <script src="js/jquery.etalage.min.js"></script>
      <script src="js/menu_jquery.js"></script>
      <script>
         jQuery(document).ready(function($){

         	$('#etalage').etalage({
         		thumb_image_width: 300,
         		thumb_image_height: 400,
         		source_image_width: 900,
         		source_image_height: 1200,
         		show_hint: true,
         		click_callback: function(image_anchor, instance_id){
         			alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
         		}
         	});

         });
      </script>
      <script type="application/javascript" src="js/productfilter.js"></script>
      <script>
         $(document).ready(function(){
         	function getresult(url) {
         		$.ajax({
         			url: url,
         			type: "GET",
         			data:  {rowcount:$("#rowcount").val()},
         			beforeSend: function(){
         			$('#loader-icon').show();
         			},
         			complete: function(){
         			$('#loader-icon').hide();
         			},
         			success: function(data){
         			$("#faq-result").append(data);
         			},
         			error: function(){}
         	   });
         	}
         	$(window).scroll(function(){
         		if ($(window).scrollTop() == $(document).height() - $(window).height()){
         			if($(".pagenum:last").val() <= $(".total-page").val()) {
         				var pagenum = parseInt($(".pagenum:last").val()) + 1;
         				getresult('getresult1.php?page='+pagenum);
         			}
         		}
         	});
         });
      </script>
      <style>
         input#show,input#hide{
         display:none;
         }
         span1#content{
         display:none;
         }
         input#show:checked ~ span1#content{
         display:block;
         }
         #target-content {
         position: fixed;
         top: 0;
         right: 0;
         bottom: 0;
         left: 0;
         pointer-events: none;
         opacity: 0;
         -webkit-transition: opacity 200ms;
         transition: opacity 200ms;
         }
         #target-content:target {
         pointer-events: all;
         opacity: 1;
         }
         #target-content #target-inner {
         position: absolute;
         display: block;
         padding: 48px;
         line-height: 1.8;
         width: 53%;
         top: 50%;
         left: 50%;
         border-radius: 67px;
         border: 2px solid orange;
         -webkit-transform: translateX(-50%) translateY(-50%);
         -ms-transform: translateX(-50%) translateY(-50%);
         transform: translateX(-50%) translateY(-50%);
         box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.2);
         background: white;
         color: #34495E;
         }
         #target-content #target-inner h2 { margin-top: 0; }
         #target-content #target-inner code { font-weight: bold; }
         #target-content a.close {
         content: "";
         position: absolute;
         top: 0;
         right: 0;
         bottom: 0;
         left: 0;
         background-color: #34495E;
         opacity: 0.5;
         -webkit-transition: opacity 200ms;
         transition: opacity 200ms;
         }
         #target-content a.close:hover { opacity: 0.4; }
         #button {
         position: absolute;
         top: 26%;
         left: 48%;
         -webkit-transform: translateX(-50%) translateY(-50%);
         -ms-transform: translateX(-50%) translateY(-50%);
         transform: translateX(-50%) translateY(-50%);
         padding: 16px 24px;
         border-radius: 1px;
         text-decoration: none;
         font-size: 24px;
         display: block;
         color: white;
         background-color: orange;
         text-align: center;
         font-weight: 100;
         -webkit-transition: box-shadow 200ms;
         transition: box-shadow 200ms;
         border-radius: 4px;
         }
         #button:hover { box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.2); }
         div.scrollbar{
         background-position: center;
         height: 370px;
         overflow: auto;
         position: relative;
         top: 3px;
         }
         #ex3::-webkit-scrollbar{
         width:8px;
         background-color:#cccccc;
         }#ex3::-webkit-scrollbar-thumb{
         background-color:orange;
         border-radius:3px;
         }
         #ex3::-webkit-scrollbar-thumb:hover{
         background-color:#BF4649;
         border:1px solid #333333;
         }
         #ex3::-webkit-scrollbar-thumb:active{
         background-color:orange;
         border:1px solid #333333;
         }
         .success{
         color:#009900;
         }
         .error{
         color:#F33C21;
         }
         .talign_right{
         text-align:right;
         }
         .username_avail_result{
         display:block;
         width:180px;
         }
         .password_strength {
         display:block;
         width:180px;
         padding:3px;
         text-align:center;
         color:#333;
         font-size:12px;
         backface-visibility:#FFF;
         font-weight:bold;
         }
         /* Password strength indicator classes weak, normal, strong, verystrong*/
         .password_strength.weak{
         background:#e84c3d;
         }
         .password_strength.normal{
         background:#f1c40f;
         }
         .password_strength.strong{
         background:#27ae61;
         }
         .password_strength.verystrong{
         background:#2dcc70;
         color:#FFF;
         }
         #country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:454px;position: absolute;z-index:10;}
         #country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
         #country-list li:hover{background:#ece3d2;cursor: pointer;}
         #search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
      </style>
   </head>
   <body>
          <div id="fb-root"></div>
      <script>(function(d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) return;
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
         fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>
      <?php
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
      <!-- header_top -->
      <div class="top_bg">
         <div class="container">
            <?php
if (isset($_SESSION['user_id'])) {
    include("include/iflogin.php");
} else {
    include("include/wlogin.php");
}
?>
         </div>
      </div>
      <!-- header -->
      <div class="header_bg">
         <div class="container">
            <div class="header">
               <div class="head-t">
                  <div class="logo">
                     <a href="index.php"><img src="images/logo.png" class="img-responsive" alt=""/> </a>
                  </div>
                  <!-- start header_right -->
                  <div class="header_right">
                     <?php
if (isset($_SESSION['user_id'])) {
    include("include/liflogin.php");
} else {
    include("include/lwlogin.php");
}
?>
                     <div class="search">
                        <input type="text" id="search-box" placeholder="search by book name or author name" />
                        <div id="suggesstion-box"></div>
                     </div>
                     <script>
                        $(document).ready(function(){
                        	$("#search-box").keyup(function(){
                        		$.ajax({
                        		type: "POST",
                        		url: "search.php",
                        		data:'keyword='+$(this).val(),
                        		beforeSend: function(){
                        			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                        		},
                        		success: function(data){
                        			$("#suggesstion-box").show();
                        			$("#suggesstion-box").html(data);
                        			$("#search-box").css("background","#FFF");
                        		}
                        		});
                        	});
                        });

                        function selectCountry(val) {
                        $("#search-box").val(val);
                        $("#suggesstion-box").hide();
                        }
                     </script>
                     <div class="clearfix"> </div>
                  </div>
                  <div class="clearfix"> </div>
               </div>
               <!-- start header menu -->
               <ul class="megamenu skyblue">
                  <li class="active grid"><a class="color1" href="index.php">Home</a></li>
                  <?php
$sql = mysql_query("SELECT * FROM parentcategories ");

$i = 2;
while ($found_user = mysql_fetch_array($sql)) {
    $i             = $i + 1;
    $contactnumber = $found_user['subcategory_name'];
    $pid           = $found_user['id']; ?>
                  <li class="grid">
                     <a class="<?php
    echo 'color' . $i; ?>" href="#"> <?php
    echo $contactnumber; ?> </a>
                     <div class="megapanel">
                        <div class="row">
                           <?php
    $sql2 = mysql_query("SELECT * FROM childcategories  WHERE parentid=$pid ");


    while ($found = mysql_fetch_array($sql2)) {
        $contact = $found['categories'];
        $cid     = $found['id']; ?>
                           <div class="col1">
                              <div class="h_nav">



                                 <ul>
                                    <li><a href="producthead.php?cid=<?= $found['id'] ?>"><?php
            echo $contact; ?></a></li>
                                    <?php

?>
                                 </ul>
                              </div>
                           </div>
                           <?php
    } ?>
                        </div>
                     </div>
                  </li>
                  <?php
}
?>
               </ul>
            </div>
         </div>
      </div>
