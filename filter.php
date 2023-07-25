
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'floodtiwimap'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
  die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}
function date_select($conn){
	$date='';
$sql=mysqli_query($conn,"SELECT DateOccured FROM tiwida GROUP by DateOccured ");
while($row=mysqli_fetch_assoc($sql)){
echo $date= '<option value="'.$row["DateOccured"].'">' . $row["DateOccured"] .'</option>' ;
 
}
}
function loc_select($conn){
	$location='';
$sql=mysqli_query($conn,"SELECT Location FROM tiwida GROUP by Location");
while($row=mysqli_fetch_assoc($sql)){
echo $location= '<option value="'.$row["Location"].'">' . $row["Location"] .'</option>' ;
 
}
}
if(isset($_POST['Sub'])){
$location=$_POST['loc'];
$date=$_POST['date'];
if($_POST['loc'] == "Select All"){
$query="SELECT * FROM tiwida where DateOccured = '$date'";
}elseif($date == "All dates"){
$query="SELECT * FROM tiwida  where Location = '$location'";
}elseif($location == "Select All" AND $date == "All dates"){

$query="SELECT * FROM tiwida";

}elseif($location != "Select All" AND $date != "All dates"){
$query="SELECT * FROM tiwida where Location = '$location' and DateOccured = '$date' ";	
}

	
}else{
	$query="SELECT * FROM tiwida";
}
 $sql1 = mysqli_query($conn,$query);


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div align="center">
		<form action="" method="POST">
		Location  <select name="loc" class="form-control "><option value="Select All">Select All</option><?php echo loc_select($conn); ?></select>  Date Occured <select name="date" class="form-control "><option value="All dates">All dates</option><?php echo date_select($conn); ?></select> 
  <input type="submit" value="Filter" name="Sub">

</form>
<div class="col-md-12 mt">
	                  	<div class="content-panel">
	                          <table class="table table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Table: Flood Assessment(Infrastracture)</h4>
	                  	  	  
	                  	  	   <?php
                                
                                    $no   = 1;
                                    echo'<hr>
	                              <thead>
	                              <tr>
	                                  <th>#</th>
	               
	                                  <th>Description Of Damage</th>
	                                  <th>Location</th>
	                                  <th>Date Occured</th>
	                                  <th>Estimated Cost</th>
	                              </tr>
	                              </thead>  <tbody>';
	                                while ($data = mysqli_fetch_array($sql1))
                                { 
                                	echo'
	                            
	                              <tr>
	                               <td>'.$no.'</td>
	                   
	                                   <td>'.$data['DescriptionOFDamage'].'</td>
	                                    <td>'.$data['Location'].'</td>
	                                     <td>'.$data['DateOccured'].'</td>
	                                      <td>'.$data['Estimated_Cost'].'</td>
	                                      
	                              </tr>';
	                               $no++;
	                          }
	                     
	                          ?>
	                              
	                              </tbody>
	                          </table>
	                  	  </div>
	                  </div><!-- /col-md-12 -->


     </div>
 
</body>
</html>