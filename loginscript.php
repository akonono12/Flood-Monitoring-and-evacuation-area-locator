<?php
session_start();
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'floodtiwimap'); 
define('DB_USER','root'); 
define('DB_PASSWORD',''); 
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
{ 

$user=$_POST['user'];
$pass=$_POST['pass'];
$result=mysql_query("Select * from users where Username= '$user' and Password='$pass'");
if(mysql_num_rows($result) == 0){
    
	$login="&err=Login Failed";
	echo ($login);
}else{
	$row=mysql_fetch_array($result);
	$id=$row['id'];
	$level=$row['User_level'];
	@$_SESSION['sid'] = $id;
	@$_SESSION['level'] = $level;
	if($level==1){
	
		header('Location:MDRRMC.php');
	}elseif($level==2){
	
		header('Location:BDRRMC.php');
	}elseif($level==3){
	
		header('Location:SafeTips.php');
	}
}
}




?>