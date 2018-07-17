<?php
include("../include/header.php");

?>
<div class="col-md-8">
<h1> Task - 1</h1>
<h4>Passing PHP Variable from one page to another</h4>
<p>
<?php

// page1.php

session_start();
echo 'Welcome to page #1<br />';
echo "session Method<br />";
$_SESSION['welcomestring'] = 'hello welcome to session';
$_SESSION['set'] = true;
echo '<br /><a href="page2.php">page 2</a><br />';

//
// using cookies

echo "Cookie Method </br>";
$cookie_string = "hello_cookies";
$cookie_value = "Hello welcome to cookie";
setcookie($cookie_string, $cookie_value, time() + 3600); //for 1 hour
echo '<br /><a href="page2.php">page 2</a>';
?>
</p>
<form action="page2.php" method="POST">
    <div class="form-group">
      <label for="text">text:</label>
      <input type="text" class="form-control" placeholder="enter any thing to pass by post method" name="string">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</div>
</body>
</html>