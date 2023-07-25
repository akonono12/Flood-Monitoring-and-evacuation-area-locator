<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'floodtiwimap'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
  die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}
$id=$_GET['id'];
$sql = "Delete from damageassessment WHERE DA_Id=".$id."";
 if (mysqli_query($conn, $sql)) {     
 	$msg="success";
header("Location:tableAssessment.php?msg=$msg");
} else {
	$msg="Failed";
   header("Location:tableAssessment.php?msg=$msg");
}

mysqli_close($conn);
?>