<?php
include('ip2locationlite.class.php');
 
//Load the class
$ipLite = new ip2location_lite;
$ipLite->setKey('571cd27d97279daaba06be47f03304ecbdc4e1d50acb6311b00851cc8c36eac6');
 
//Get errors and locations
$locations = $ipLite->getCity($_SERVER['REMOTE_ADDR']);
$errors = $ipLite->getError();
if (!empty($locations) && is_array($locations)) {
      $state= $locations['regionName'];
$city=  $locations['cityName'];
}
if (!empty($errors) && is_array($errors)) {
  foreach ($errors as $error) {
    echo var_dump($error) . "<br /><br />\n";
  }
}
?>