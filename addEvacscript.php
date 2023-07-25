 <?php
 session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'floodtiwimap'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
  die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}
$name=$_POST['name'];
$evactype=$_POST['evacType'];
$lat=number_format($_POST['lat'], 6);
$lng=number_format($_POST['lng'], 6);
$location=$_POST['location'];
$addss=$_POST['addLoc'];
if(isset($_POST['id'])){
$idn=$_POST['id'];
$query=mysqli_query($conn,"Select * from evacuation where Longitude = '$lng' and Lattitude = '$lat' "); 
$count=mysqli_num_rows($query);

  if ( $count>0 ){
  
 

   $msga="Duplicate Entry" ;
 
  header("Location:addEvac.php?msg=$msga"); 
 
        
}else{

if(strpos($location , "Tiwi, Albay, Philippines") === FALSE){
     $msga="&err=Tiwi Area Only";
 
  header("Location:addEvac.php?msg=$msga"); 

  }else{
     
    
        mysqli_query($conn,"Update evacuation set Longitude='$lng',Lattitude='$lat',Area_name='$name',address='$addss' where ec_id='$idn'");
       
            $msg="Success" ;
          header("Location:addEvac.php?msg=$msg");
}

  
    }

}else{
  


$query=mysqli_query($conn,"Select * from evacuation where Longitude = '$lng' and Lattitude = '$lat' "); 
$count=mysqli_num_rows($query);

  if ( $count>0 ){
  
 
   $msga="Duplicate Entry" ;
 
  header("Location:addEvac.php?msg=$msga"); 

        
}else{

if(strpos($location , "Tiwi, Albay, Philippines") === FALSE){
     $msga="&err=Tiwi Area Only";
 
  header("Location:addEvac.php?msg=$msga"); 

  }else{
     
    
        mysqli_query($conn,"INSERT INTO evacuation (Area_name,Lattitude,Longitude,address,EvacType) VALUES ('$name',".$lat.",".$lng.",'$addss','$evactype')");
       
            $msg="Success" ;
          header("Location:addEvac.php?msg=$msg");
}

  
    }

 } 

?>