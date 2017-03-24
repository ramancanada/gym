<?php  
$gtclass = $_POST['gtclass'];


if(isset($_POST['submit']))  
{  
$host="localhost";//host name  
$username="root"; //database username  

$db_name="gym";
$tbl_name="program"; //table name  

 try {
        $link = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        // set the PDO error mode to exception
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $link->prepare("INSERT INTO program(program_id, category_id, program_name, program_days, program_begin_time, program_end_time) VALUES WHERE is_opened='Y'");
        $stmt->execute();

         } catch(PDOException $e) {
        echo "<script type='text/javascript'>alert('Error: " . $e->getMessage() . "');</script>";
        echo $e->getMessage();
        //header("Location:503.html");
    }
?>