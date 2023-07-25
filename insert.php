<?php


if(isset($_POST["item_name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=floodtiwimap", "root", "");

 for($count = 0; $count < count($_POST["item_name"]); $count++)
 {  
  $query = "INSERT INTO mobile_number
  (MobileNumber,Barangay) 
  VALUES (:item_name,:location)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    
    ':item_name'  => $_POST["item_name"][$count], 
     ':location'  => $_POST["location"][$count] 
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}


?>
