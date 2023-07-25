<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'floodtiwimap'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
  die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}

if(isset($_POST['Filter'])){
   $selocation=$_POST['location'];
}else{
	$selocation = 'Tigbi';
}
$sql=mysqli_query($conn,"Select * from floodAssessment where location = '$selocation' ");
function loc($conn){
	$sql=mysqli_query($conn,"Select * from floodAssessment group by location ");
	if($sql>0){
		while($row=mysqli_fetch_assoc($sql)){
echo $location= '<option value="'.$row["Location"].'">' . $row["Location"] .'</option>' ;
		}
	}else{
		echo "no data";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Flood Assessment</title>
<style>
@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1F2739;
}

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 80%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}


</style>
</head>
<body>

<h1><span class="blue">&lt;</span>Flood Assessment<span class="blue">&gt;</span> <span class="yellow">Infrastracture Assessment</pan></h1>
<h2><br><br><form acton="" method="POST">
<div include="form-input-select()">
 <select name="location" required>
<option value="" hidden >Select a Barangay </option>

 <?php echo loc($conn); ?>
</select>
<input type="submit" name='Filter'>
</form></div></h2>

     <?php
                                if (mysqli_num_rows($sql) > 0) {
                                    $no   = 1;
echo '<table class="container">
	<thead>
		<tr>
		
			<th><h1>Damage Infrastracture</h1></th>
			<th><h1>Location</h1></th>
			<th><h1>Date Occured</h1></th>
			<th><h1>Assessment Description</h1></th>
		</tr>
	</thead>
	<tbody>';
    while ($row = mysqli_fetch_array($sql))
     {echo'
		<tr>
			
			<td>'.$row['Damage_Infra'].'</td>
			<td>'.$row['Location'].'</td>
			<td>'.$row['Date Occured'].'</td>
			<td><p>'.$row['Assessment_Descr'].'</p></td>
		</tr>';

	}
}else{
                                   echo "no database found";
                              }
?>	
	</tbody>
</table>

</body>
</html>