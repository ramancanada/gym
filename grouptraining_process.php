<?php  

if(isset($_POST['sub']))  
{  
$host="localhost";//host name  
$username="root"; //database username  
$word="";//database word  
$db_name="try";//database name  
$tbl_name="grouptraining"; //table name  
$con=mysqli_connect("$host", "$username", "$word","$db_name") or die("cannot connect");//connection string  
$checkbox1=$_POST['techno'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  
$in_ch=mysqli_query($con,"INSERT into grouptraining(technology) values ('$chk')");  
if($in_ch==1)  
   {  
      echo'<script>alert("You have Succesfully Applied for these Activities.You can apply for Other activites too.")</script>'; 
        echo "<script type='text/javascript'>window.location.replace('service.html');</script>"; 
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }  
}  
?>  