<?php
include("../include/header.php");

?>
<h1> Task - 1</h1>
<h4>Passing PHP Variable from one page to another</h4>
<p>
<?php

// page2.php
// session

session_start();
echo 'Welcome to page2 <br />';
echo "i am a session set variable--";
echo $_SESSION['welcomestring'] . "<br />";
echo $_SESSION['set'];
echo "</br></br></br></br>";

// cookies

echo "i am method two the Cookies Cookie is set!<br />";
echo "Value is: " . $_COOKIE["hello_cookies"];

// post method

if (isset($_POST["string"])) {
    $string = strip_tags($_POST["string"]);
   //$string = htmlspecialchars($string1, ENT_QUOTES, 'UTF-8')
    echo "<br /> I am from post method " . $string;
}
else {
    echo "<br /><h2>post method is not set</h2><br />";
}

?>
</p>
</div>

</div>
</body>
</html>


