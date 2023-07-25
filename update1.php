<?php
require 'evacuation.php';
   $evac = new TiwiEvac;
   $evac->setEc_id($_REQUEST['ec_id']);
    $evac->setLattitude($_REQUEST['lat']);
     $evac->setLongitude($_REQUEST['long']);
   $status= $evac -> updateEvacltlng();
   if($status == true){
   	echo "Updated";
   }else{
   	echo "failed";
   }
?>
