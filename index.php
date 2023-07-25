<?php
$connect = mysqli_connect("localhost", "root", "", "floodtiwimap");

$query1 = "SELECT * FROM triggerchange ";
$result=mysqli_query($connect,$query1);
$row=mysqli_fetch_array($result);
echo $trigger=$row['changeid_id'];
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
  <title>Home</title>

  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  <style>
html, body {
    height:100%;
    padding:0
       }
     #frame-container {
    background-color: white;
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
</style>
  
</head>
<body>
  <section class="menu cid-qRrgLejV2v" once="menu" id="menu1-1">

    

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
                        Flood Assessment </a></li></ul>
            
        </div>
    </nav>
</section>

<section class="engine"><a href="https://mobirise.me/a">Mobirise review</a></section><section class="mbr-section content5 cid-qRrnGBTfuH mbr-parallax-background" id="content5-6">

    

    

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-2">
                    Flood Prone Management and Evacuation Area LocatorTiwi Map</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">Tiwi Map</h3>
                
                
            </div>
        </div>
    </div>
</section>



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
         
 <div style="width: 30%; height: 100%; float:left">
  
  <a href="https://www.accuweather.com/en/ph/legazpi-city/261774/weather-forecast/261774" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1526034975753" class="aw-widget-current"  data-locationkey="" data-unit="f" data-language="en-us" data-useip="true" data-uid="awcc1526034975753"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
   <p><h4 align="center">&nbsp;&nbsp;How to use the map</h4></p>
   <ul>
     <li>
  <p> &nbsp;&nbsp;Press ctrl + mouse wheel to zoom in and out the map . Hold left mouse click to pan the map</p>
</li>
    <li>
  <p> &nbsp;&nbsp;Click on the markers to know where it is located</p>
</li>
  
</ul>
  <table ><tr><td colspan="2" align="center" >   <p><h4>Flood Colors</h4></p></td></tr>
     <tr>
     <td>
      &nbsp;&nbsp;&nbsp;<img src="images/stop-red-icon.png">

     </td>
     <td>
      Means high level<br>
      2 meters of flood level
    </td>
     </tr>
<tr>
     <td>
      &nbsp;&nbsp;&nbsp;<img src="images/a947bd4c1348.png">

     </td>
     <td>
      Means medium level<br>
      1 meter of flood level
    </td>
     </tr>

<tr>
     <td>
      &nbsp;&nbsp;&nbsp;<img src="images/64.png">

     </td>
     <td>
      Means low level<br>
      0.5 meter of flood level
    </td>
     </tr>
     </table>   


</div>  

  <div id="map-container" style="width: 70%; float:right" > 
 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrD5U1rL8o_LwUciZ2WmRcfYvD3wJEadU&callback=initMap">
    </script>
<?php
if($trigger == 1){
  echo '<script src="javascript/tiwimapheavy.js"></script>';
}elseif ($trigger == 2) {
  echo '<script src="javascript/tiwimaplights.js"></script>';
}elseif($trigger == 3)
{
  echo '<script src="javascript/tiwimapnormals.js"></script>';
}




?>
       </div>
   <div id="legend"><h3 align="center">Map Legends</h3>
    <div id="evac"><h5>Evacuation Centers</h5></div>
  </div>
   
  </div>








<section class="cid-qRrqP5R0XU" id="footer1-d">

    

    

    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-md-3">
                <div class="media-wrap">
                    <a href="https://mobirise.com/">
                        <img src="assets/images/15350655-1607468799559433-1178714086290631855-n-122x137.jpg" alt="Mobirise" title="">
                    </a>
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


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>
</html>