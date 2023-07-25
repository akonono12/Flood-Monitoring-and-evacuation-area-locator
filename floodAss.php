<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'floodtiwimap'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
  die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}

function loc_select($conn){
  $location='';
$sql=mysqli_query($conn,"SELECT Location FROM tiwida GROUP by Location");
while($row=mysqli_fetch_assoc($sql)){
echo $location= '<option value="'.$row["Location"].'">' . $row["Location"] .'</option>' ;
 
}
}
if(isset($_POST['sub'])){
   $location=$_POST['location'];
}else{
  $location = 'Tigbi';
}
$query=mysqli_query($conn,"Select * FROM tiwida where location = '$location' ");
if(isset($_POST['sub'])){
  $a="";
  $b="active";
  $c="";
}

?>
<?php
$connect = mysqli_connect("localhost", "root", "", "floodtiwimap");

$query1 = "SELECT * FROM damageassessment where DamageCost <> 0";
$result = mysqli_query($connect, $query1);
$chart_data = '';
while($row1 = mysqli_fetch_array($result))
{
 $chart_data .= "{ Barangay_Names:'".$row1["Barangay_Name"]."', Flood_Damages:".$row1["DamageCost"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

?>
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
   $a="active";
  $b="";
  $c="";
   $selocation=$_POST['selocation'];
}else{
  $selocation = 'Tigbi';
}
$sql=mysqli_query($conn,"Select * from floodAssessment where location = '$selocation' ");
if($sql<=0){
  echo "no data";
}
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
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.7.2, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.7.2, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/15350655-1607468799559433-1178714086290631855-n-122x137.jpg" type="image/x-icon">
  <meta name="description" content="">
  <title>Flood Assessment</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/datatables/data-tables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

   
<style>
@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;

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

#exTab1 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

#exTab2 h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
  border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab3 .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}
</style>

  
  
</head>
<body>
  <section class="menu cid-qRrCGOBOd3" once="menu" id="menu1-k">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    
                         <img src="assets/images/15350655-1607468799559433-1178714086290631855-n-122x137.jpg" alt="Mobirise" title="" style="height: 4.8rem;">
                    
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="https://mobirise.com">Municipality of Tiwi, Albay</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-white display-4" href="index.php">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Home</a>
                </li>
                 <li class="nav-item"><a class="nav-link link text-white display-4" href="weathers.php"><span class="mbri-question mbr-iconfont mbr-iconfont-btn"></span>
                        Tips &amp; Advisory</a></li><li class="nav-item"><a class="nav-link link text-white display-4" href="floodAss.php"><span class="mbri-file mbr-iconfont mbr-iconfont-btn"></span>
                        Flood Assessment &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a></li></ul>
            
        </div>
    </nav>
</section>

<section class="engine"><a href="https://mobirise.me/f">simple site creator</a></section><section class="mbr-section content5 cid-qRrCGP1RZo mbr-parallax-background" id="content5-l">

    

    

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-2">Flood Prone Management and Evacuation Area Locator</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">Flood Assessment - Infrastracture</h3>
                
                
            </div>
        </div>
    </div>
</section>
<br>
<br>
<div id="exTab2" class="container"> 
<ul class="nav nav-tabs">
      <li class="<?php echo $a;?> ">
        <a  href="#1" data-toggle="tab" style="margin-right: 15px" >Assessment Description</a>
      </li>
      <li class="<?php echo $b;?> "><a href="#2" data-toggle="tab" style="margin-right: 15px" >Damage Assessment</a>
      </li>
   
    </ul>

      <div class="tab-content ">
        <div class="tab-pane <?php echo $a;?> " id="1">
         <br> <h1><span class="blue">&lt;</span>Flood Assessment<span class="blue">&gt;</span> <span class="yellow">Assessment Description</pan></h1><h2><br><br><form acton="" method="POST">
<div include="form-input-select()">
 <select name="selocation" required>
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


        </div>
        <div class="tab-pane <?php echo $b;?> " id="2">
         <br> <h1><span class="blue">&lt;</span>Flood Assessment<span class="blue">&gt;</span> <span class="yellow"> Barangay Damage Assessment</pan></h1><h2><br><br><form acton="" method="POST">
<div include="form-input-select()">
 <select name="location" required>
<option value="" hidden >Select a Barangay </option>

 <?php echo loc_select($conn); ?>
</select>
<input type="submit" name='sub'>
</form></div></h2>

     <?php
                                if (mysqli_num_rows($query) > 0) {
                                    $no   = 1;
echo '<table class="container">
  <thead>
    <tr>
    
      <th><h1>Description Of Damage</h1></th>
      <th><h1>Location</h1></th>
                                    <th><h1>Date Occured</h1></th>
                                    <th><h1>Estimated Cost</h1></th>
    </tr>
  </thead>
  <tbody>';
    while ($data = mysqli_fetch_array($query))
     {echo'
    <tr>
      
      <td>'.$data['DescriptionOFDamage'].'</td>
      <td>'.$data['Location'].'</td>
      <td>'.$data['DateOccured'].'</td>
      <td><p>Php'.  $data['Estimated_Cost'].'</p></td>
    </tr>';

  }
}else{
                                   echo "no database found";
                              }
?>  
  </tbody>
</table>
        </div>
        <div class="tab-pane <?php echo $c;?> " id="3">
            <div class="container" style="width:900px;">
   <h2 align="center"></h2>
   <h3 align="center">Flood Damages(Infrastracture Only)</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
    
        </div>
      </div>
  </div>

<hr></hr>


<section class="cid-qRrCGQlDpO" id="footer1-n">

    

    

    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-md-3">
                <div class="media-wrap">
                    
                        <img src="assets/images/15350655-1607468799559433-1178714086290631855-n-122x137.jpg" alt="Mobirise" title="">
                    
                </div>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">Address</h5>
                <p class="mbr-text">Tigbi, Tiwi, Albay<br>Front of the Town Plaza</p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">Contacts
                </h5>
                <p class="mbr-text">
                    Email:&nbsp;<br>Phone: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>Fax:</p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3"><br><br><br>
                </h5>
                <p class="mbr-text"></p>
            </div>
        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="media-container-row mbr-white">
                <div class="col-sm-6 copyright">
                    <p class="mbr-text mbr-fonts-style display-7">
                        © Copyright 2018 - All Rights Reserved
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="social-list align-right">
                        <div class="soc-item">
                            <a href="https://www.facebook.com/pg/municipalityoftiwi2016" target="_blank">
                                <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon"></span>
                            </a>
                        </div>
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/mbr-tabs/mbr-tabs.js"></script>
  <script src="assets/datatables/jquery.data-tables.min.js"></script>
  <script src="assets/datatables/data-tables.bootstrap4.min.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>
</html>
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Barangay_Names',
 ykeys:['Flood_Damages'],
 labels:['Flood Damages Php'],
 hideHover:'auto',
 stacked:true
});
</script>