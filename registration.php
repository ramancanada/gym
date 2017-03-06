<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$name = $_POST['name'];
$contactnumber =$_POST['contactnumber'];
$user =$_POST['user'];
$email =$_POST['email'];
$pass =$_POST['pass'];


///create connection


$link = new mysqli($servername, $username, $password, $dbname);
/////check connection 
if ($link->connect_error) {
    die("Connection Failed: ". $link->connect_error);

}


$sql = "INSERT INTO Details (name, contactnumber, user, email, pass) VALUES ('$name','$contactnumber','$user','$email','$pass')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


$link->close();
?>

