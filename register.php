<?php
include("include/connect.php");
include("include/session.php");
include("include/functions.php");
if (isset($_SESSION['user_login'])) {
    echo "<script>
alert('You are Already Logged in');
window.location.href='index.php';
</script>";
}
?>
<?php
$reg = @ $_POST['reg'];
$fn = strip_tags(@ $_POST['fname']);
$ln = strip_tags(@ $_POST['lname']);
$un = strip_tags(@ $_POST['username']);
$em = strip_tags(@ $_POST['email']);
$em2 = strip_tags(@ $_POST['email2']);
$pswd = strip_tags(@ $_POST['password']);
$pswd2 = strip_tags(@ $_POST['password2']);
$d = date("y-m-d");
$emailcode = md5(@ $_POST['username'] + microtime());
$phone = strip_tags(@ $_POST['phoneno']);
include("ip.php");
if ($reg) {
    $u_check = mysql_query("SELECT email FROM users WHERE email='$em'");
    $check = mysql_num_rows($u_check);
    if ($check == 1) {
        echo('email is registered');
    } else {
        if ($em == $em2) {
            $u_check = mysql_query("SELECT username,contactnumber FROM users WHERE username='$un'");
            $check = mysql_num_rows($u_check);
            if ($check == 0) {
                if ($fn && $ln && $un && $em && $em2 && $pswd && $pswd2) {
                    if ($pswd == $pswd2) {
                        if (strlen($un) > 25 || strlen($fn) > 25 || strlen($ln) > 25) {
                            echo "maximum size limit is 25";
                        } else {
                            if (strlen($pswd) > 30 || strlen($pswd) < 5) {
                                echo "your password must be between 5 to 30 character long !";
                            } else {
                                $pswd = md5($pswd);
                                $pswd2 = md5($pswd2);
                                $ip = getRealIpAddress(); // display IP address
                                $query = mysql_query("INSERT INTO users VALUES('','$un','$fn','$ln','$em','$pswd','$d','0',$phone,'$emailcode',CURRENT_TIMESTAMP,'$ip','0','1','','$state','$city',0)");
                                confirm_query($query);
                                mail($em, 'Activate your account', "Hello " . ucfirst($fn) . " you need to activate your account ,so use the link:\n\n http://dibsofficial.in/active.php?email=" . $em . "&emailcode=" . $emailcode . "\n\n-bookshop", "From: support@dibsofficial.in");
                                echo("<h4>welcome to dibsofficial.in  Verify  Your Email address by clicking the link you recived in your inbox.</h4> ");
                            }
                        }
                    } else {
                        echo "your password don't match !";
                    }
                } else {
                    echo "please fill all the fields";
                }
            } else {
                echo "USERNAME or contact number already REGISTERED";
            }
        } else {
            echo "email doesn,t match";
        }
    }
}
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
    $user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]);
    $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]);
    $password_login_md5 = md5($password_login);
    $query = "select id,username,email,activated,admin from users where(username='{$user_login}' and password='{$password_login_md5}') OR (contactnumber='{$user_login}' and password='{$password_login_md5}') limit 1";
    $result = mysql_query($query);
    confirm_query($result);
    if (mysql_num_rows($result) == 1) {
        $found_user = mysql_fetch_array($result);
        $status = $found_user['activated'];
        if ($status == 0) {
            echo("your account is not activated please verify the link you recived in your email account");
        } else {
            $ip = getRealIpAddress();
            $query = "update users set LOGINTIME=CURRENT_TIMESTAMP,ipaddress='$ip',loginstate='$state',logincity='$city' where username='{$user_login}' and password='{$password_login_md5}' limit 1";
            $result = mysql_query($query);
            confirm_query($result);
            $_SESSION['user_id'] = $found_user['id'];
            $_SESSION['user_login'] = $found_user['username'];
            $_SESSION['admin'] = $found_user['admin'];
            $_SESSION['email'] = $found_user['email'];
            $SESSION['user_password'] = $password_login_md5;
            $user_login = $_SESSION['user_id'];
            $query = "select id,username,passwordreset from users where id='{$user_login}' limit 1";
            $result = mysql_query($query);
            confirm_query($result);
            if (mysql_num_rows($result) == 1) {
                $found_user = mysql_fetch_array($result);
                $status = $found_user['passwordreset'];
                if ($status == 1) {
                    header("location:resetpassword.php");
                } else {
                    if (isset($_SESSION['url'])) {
                        $url = $_SESSION['url'];
                    } // holds url for last page visited.
                    else {
                        $url = "index.php";
                    } // default page for
          header("Location: $url"); // perform correct redirect.
                }
            }
        }
    } else {
        echo "<p>username/pass word incorrect</p>";
    }
}
?>
<?php
include("include/headerr.php");
?>

<!-- content -->
<div class="container">
<div class="main">
    <!-- start registration -->
    <div class="registration">
        <div class="registration_left">
        <h2>new user? <span> create an account </span></h2>
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
            <form id="registration_form" action="#" method="post">
                <div>
                    <label>
                        <input type="text"name="fname" placeholder="First Name" required autofocous>
                    </label>
                </div>
                <div>
                    <label>
                    <input type="text"name="lname" placeholder="Last Name"required autofocous>
                    </label>
                </div>
                <div>
                    <label>
                    <input type="text" name="username" id="username" placeholder="Username"/>
                            <span id="username_avail_result"></span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="email" name="email"placeholder="Email Address"required/>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="email" name="email2"placeholder="Repeate Email Address"required/>
                    </label>
                </div>
                <div>
                    <label>
                    <input type="password" name="password" id="password"placeholder="Password" />
                            <span class="password_strength" id="password_strength"></span>
                    </label>
                </div>
                <div>
                    <label>
                            <input type="password" name="password2"placeholder="Repeate Password"required/>
                    </label>
                </div>
                <div>
                    <label>
                            <input type="number" name="phoneno"placeholder="Contact number" required/>
                    </label>
                </div>
                <div>
                <div class="sky-form">
                    <i></i>On submit you agree to bookbid.in terms & conditions &nbsp;<a class="terms" href="tc.php"> Please Read terms of service</a> Before Registering .</label>
                </div>
                    <input type="submit" value="create an account" name="reg" id="register-submit">
                </div>

            </form>
            <!-- /Form -->
        </div>
    </div>
    <div class="registration_left">
        <h2>existing user</h2>
         <div class="registration_form">
         <!-- Form -->
            <form id="registration_form" action="register.php" method="post">
                <div>
                    <label>
                        <input type="text" name="user_login"  placeholder="User name / Contact number" required/>
                    </label>
                </div>
                <div>
                    <label>
                <input type="password"name="password_login"  placeholder="Passsword" required/>
                    </label>
                </div>
                <div>
                    <input type="submit" value="sign in" id="register-submit">
                </div>
                <div class="forget">
                    <a href="forgotpassword.php">forgot your password</a>
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
