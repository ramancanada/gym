<html>
	<head>
	<title>Retrieve data of Activites </title>
	</head>
	<body>


<?php
$host="localhost";//host name  
$username="root"; //database username  
$word="";//database word  
$db_name="gym";//database name  
$con=mysqli_connect("$host", "$username", "$word","$db_name") or die("cannot connect");//connection string  
	// SQL query
	$result = mysqli_query($con,"SELECT * FROM YOGA");

echo "<table border='1'>";

$i = 0;
while($row = $result->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
	
	</body>
	</html>