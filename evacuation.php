<?php
	class TiwiEvac{
private $ec_id;
private $Longitude;
private $Lattitude;
private $Area_name;
private $address;
private $connection;
private $table="evacuation";
private $table1="brpolygons";


function setEc_id($ec_id) { $this->ec_id = $ec_id; }
function getEc_id() { return $this->ec_id; }
function setLongitude($Longitude) { $this->Longitude = $Longitude; }
function getLongitude() { return $this->Longitude; }
function setLattitude($Lattitude) { $this->Lattitude = $Lattitude; }
function getLattitude() { return $this->Lattitude; }
function setArea_name($Area_name) { $this->Area_name = $Area_name; }
function getArea_name() { return $this->Area_name; }
function setAddress($address) { $this->address = $address; }
function getAddress() { return $this->address; }

		public Function __construct(){
			require_once('dbconMap/connection.php');
			$connection= new DbConn;
			$this->TiwiEvac = $connection->connect();
		}
 
      public function Evacuationlatlong(){
      	$sql="Select * from $this->table where Lattitude IS NULL and Longitude IS NULL";

      	$statement=$this->TiwiEvac->prepare($sql);
      	$statement->execute();
      	 return $evac = $statement->fetchAll(PDO::FETCH_ASSOC);
      }
      public function ShowEvacuationlatlong(){
      	$sql="Select * from $this->table where Show_Hide = 1  ";

      	$statement=$this->TiwiEvac->prepare($sql);
      	$statement->execute();
      	 return $evac = $statement->fetchAll(PDO::FETCH_ASSOC);
      }

        public function Showlatlong(){
            $sql="Select * from $this->table1 ";

            $statement=$this->TiwiEvac->prepare($sql);
            $statement->execute();
             return $evac = $statement->fetchAll(PDO::FETCH_ASSOC);
      }

       
      public function updateEvacltlng(){
      	$sql="Update $this->table set Lattitude = :lat, Longitude= :long where ec_id = :id ";
      	$statement = $this->TiwiEvac->prepare($sql);
      	$statement->bindParam(':lat', $this->Lattitude);
      	$statement->bindParam(':long', $this->Longitude);
      	$statement->bindParam(':id', $this->ec_id);

      	if($statement->execute()){
      		return true;

      	}else{
      		return false;
      	}
      }

}
?>