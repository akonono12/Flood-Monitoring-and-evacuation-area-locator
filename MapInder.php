
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'floodtiwimap'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
  die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}

$sql = 'SELECT * FROM safetytips ORDER BY `safetytips`.`PM_id` DESC';
  
$query = mysqli_query($conn, $sql);

if (!$query) {
  die ('SQL Error: ' . mysqli_error($conn));
}






?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
   <script type="text/javascript" src="javascript/jquery-3.3.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Latest compiled JavaScript -->
<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
  <link href="https://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/timeline.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Tiwi_Map</title>
    <style>
      html, body {
    height:100%;
    padding:0
       }
     #frame-container {
    background-color: #607D8B;
    position: relative;
    height: 100%;
    width: 100%;
    border:10px solid gray;
    -moz-box-sizing:border-box;
    -webkit-box-sizing:border-boxx
    box-sizing:border-box;
   }
  
    #map-container {
    height: 100%;
    width: 100%;

   }
   #legend {
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;
      }
      #legend h3 {
        margin-top: 0;
      }
      #legend img {
        vertical-align: middle;
      }
  #bar-top,#bar-right,#bar-bottom,#bar-left{
    position:absolute;    
  }
#bar-top,#bar-bottom{left:-30px;right:-30px;height:30px;background:gray}
#bar-top{top:-30px}
#bar-bottom{bottom:-30px}
#bar-left,#bar-right{top:0px;bottom:0px;width:30px;background:  #B2BEB5;}
#bar-left{left:-30px}
#bar-right{right:-30px;}
body { 
  margin: 0;
  font-family: Arial;
}

.header {
  overflow: hidden;
  background-color: silver;
  padding: 5px 5px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}
.modal-header-info {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #5bc0de;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
h3{
    text-align: center;
}

    </style>
  </head>
  <body>
  <div class="header">
  <a href="Login.html" class="logo">Tiwi-Map</a>
  <div class="header-right">
    <a class="active" href="sss.php">Home</a>
    <a href="tiwiweather.html">Weather</a>
    <a href="#about">About</a>
  </div>
</div>

<div style="padding-left:20px">
 </div>

    <div id="frame-container">  <!-- Button trigger modal -->
         
          
  <?php
   require 'evacuation.php';
   $evac = new TiwiEvac;
   $call = $evac -> Evacuationlatlong();
   $call = json_encode($call, true);
   echo '<div id="data" style="display:none" >' . $call . '</div>';

   $allData = $evac -> ShowEvacuationlatlong();
   $allData = json_encode($allData, true);
   echo '<div id="allData" style="display:none" >' . $allData . '</div>';


   $allDatas = $evac -> Showlatlong();
   $allDatas = json_encode($allDatas, true);


    
   echo '<div id="allDatas" style="display:none" >' . $allDatas . '</div>';
  ?>
         
         
  <div id="map-container"> 
 <script type="text/javascript" src="javascript/conditions.js"></script>

       </div>
   <div id="legend"><h3 align="center">Map Legends</h3>
    <div id="evac"><h5>Evacuation Centers</h5></div>
  </div>
   
  </div>

<div id="left-panel">
  <a href="#" onclick="showLeftPanel();" class="controller">&gt;</a>
  </br>
  </br>
  </br>
  </br></br></br>
  <table align="center">
    <tr><td >dfdfdf</td></tr>
    <tr><td >dfdfdf</td></tr>
  </table>    

</div>    
</div>    


<script type="text/javascript" src="javascript/leftpn.js"></script>
<link rel="stylesheet" type="text/css" href="css/left-panel.css">   

	
  </body>
</html>