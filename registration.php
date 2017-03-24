<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

$name = $_POST['name'];
$contactnumber =$_POST['contactnumber'];
$user =$_POST['user'];
$email =$_POST['email'];
$pass =md5($_POST['pass']);

///create connection
$link = new mysqli($servername, $username, $password, $dbname);
/////check connection 
if ($link->connect_error) {
    die("Connection Failed: ". $link->connect_error);
}

$sql = "INSERT INTO users (name, tel, username, email, password) VALUES ('$name','$contactnumber','$user','$email','$pass')";
if(mysqli_query($link, $sql)){
     echo'<script>alert("You have Succesfully Registered")</script>';
     echo "<script type='text/javascript'>window.location.replace('login.html');</script>"; 
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


$link->close();
?>