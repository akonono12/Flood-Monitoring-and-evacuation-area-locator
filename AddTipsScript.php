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
$msg=$_POST['message'];

$query=mysqli_query($conn,"Insert INTO safetytips (lddrmc_id,Name,Dateposted,Time,Safety_Tips_content) VALUES ('3','$name',NOW(),NOW(),'$msg')"); 
header("Location:Safetips.php?msg=Success"); 
?>