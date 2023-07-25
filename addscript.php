<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'floodtiwimap'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
  die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}
$name=$_POST['name'];
$dc=$_POST['dc'];
$bname=$_POST['Bname'];

$query1=mysqli_query($conn,"Select * from damageassessment where Barangay_Name = '$bname' "); 
$count=mysqli_num_rows($query1);
$row=mysqli_fetch_array($query1);


  if ( $count>0 ){
 $query2=mysqli_query($conn,"Update damageassessment SET DamageCost = '$dc' where DA_Id = ".$row['DA_Id']."");
  	header("Location:BDRRMC.php?msg=Success"); 
}else{
$query=mysqli_query($conn,"Insert INTO damageassessment (DA_Cover,DamageCost,Barangay_Name) VALUES ('$name','$dc','$bname')"); 
header("Location:BDRRMC.php?msg=Success"); 
}
?>