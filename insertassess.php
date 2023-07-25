<?php


if(isset($_POST["description"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=floodtiwimap", "root", "");

 for($count = 0; $count < count($_POST["description"]); $count++)
 {  
  $query = "INSERT INTO tiwida
  ( DescriptionOFDamage,Location,DateOccured,Estimated_Cost,username,DatePosted) 
  VALUES ( :cat, :descr, :loc,:doc,:eco,:username,NOW())
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
 
    ':descr'  => $_POST["description"][$count], 
    ':loc'  => $_POST["location"][$count], 
    ':doc'  => $_POST["do"][$count], 
    ':eco'  => $_POST["ec"][$count], 
    ':username' => $_POST["user"][$count]

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