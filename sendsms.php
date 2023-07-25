<?php

define('DB_HOST', 'localhost'); 
define('DB_NAME', 'floodtiwimap'); 
define('DB_USER','root'); 
define('DB_PASSWORD',''); 
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
{ 
$msg=$_POST['message'];
$br=$_POST['brgy'];
$result=mysql_query("SELECT * FROM 	mobile_number where Barangay='$br'");
$cnt=mysql_num_rows($result);
 while($row=mysql_fetch_array($result)){




$ch = curl_init();
$parameters = array(
    'apikey' => '9002dc343c906d2e0204d730abdf26c1', //Your API KEY
    'number' => $row['MobileNumber'],
    'message' => $msg,
    'sendername' => 'SEMAPHORE'
);
curl_setopt( $ch, CURLOPT_URL,'http://api.semaphore.co/api/v4/messages' );
curl_setopt( $ch, CURLOPT_POST, 1 );

//Send the parameters set above with the request
curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

// Receive response from server
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close ($ch);

//Show the server response
echo $output;

}
header("location:MDRRMC.php");
}
?>