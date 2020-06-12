<?php
//require user configuration and database connection parameters
///////////////////////////////////////
//START OF USER CONFIGURATION/////////
/////////////////////////////////////
//Define MySQL database parameters

$username = "tukule";
$password = "tIlNEYbuBHuhE5hs";
$hostname = "41.190.141.49";
$database = "tukule_kwanza";

//Define your canonical domain including trailing slash!, example:
$domain = "http://www.example.com/";

//Define sending email notification to webmaster

$email = 'samuelmariwa@gmail.com';
$subject = 'New user registration notification';
$from = 'samuelmariwa@gmail.com';

//Define Recaptcha parameters
$privatekey = "Your Recaptcha private key";
$publickey = "Your Recaptcha public key";

//Define length of salt,minimum=10, maximum=35
$length_salt = 15;

//Define the maximum number of failed attempts to ban brute force attackers
//minimum is 5
$maxfailedattempt = 5;

//Define session timeout in seconds
//minimum 60 (for one minute)
$sessiontimeout = 60;

////////////////////////////////////
//END OF USER CONFIGURATION/////////
////////////////////////////////////
//DO NOT EDIT ANYTHING BELOW!

$connection = mysqli_connect($hostname,$username, $password, $database)
or die("Unable to connect to Server");
$login_url = 'login.php';
$logout_url = 'logout.php';
$dashboard_url = 'dashboard.php';
?>