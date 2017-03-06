<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";
$link = new mysqli($servername, $username, $password, $dbname);
/////check connection 
if ($link->connect_error) {
     echo "Connection Failed";
    die("Connection Failed: ". $link->connect_error);

}
$myusername = NULL;
$mypassword = NULL;

if (isset($_POST['submit'])){
    $myusername =  ($_POST['user']);
    $mypassword = ($_POST['pass']);
}
$result1 = mysql_query("SELECT user, pass FROM data.abc WHERE user='$myusername' ");

if($result1 === FALSE) { 
    echo "Login Failed";
    die(mysql_error()); // TODO: better error handling
}

while($row = mysql_fetch_array($result))
{
    echo "you are logged in";
}

$link->close();
?>