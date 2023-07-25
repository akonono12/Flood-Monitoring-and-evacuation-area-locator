<?php
session_start();

if($_SESSION['sid'] != 3){
   
  header("location:Login.html?warning=Access Denied");// redirects to home.html if $_SESSION['sid'] is empty
}else{
  if($_SESSION['level'] !=  3){
  header("location:Login.html?warning=Access Denied");
  }
}
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'floodtiwimap'); 
define('DB_USER','root'); 
define('DB_PASSWORD',''); 
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
{ 
if(isset($_GET['id'])){
$ecid=$_GET['id'];
}
$id=$_SESSION['sid'];
$result=mysql_query("SELECT * FROM users where id = ".$id."");

  $row=mysql_fetch_array($result);
  $fname=$row['Fname'];
  $lname=$row['Lname'];
if(isset($ecid)){
$sql=mysql_query("SELECT * FROM evacuation where ec_id = ".$ecid."");
$data=mysql_fetch_array($sql);
$long=$data['Longitude'];
$lat=$data['Lattitude'];
$name=$data['Area_name'];
$add=$data['address'];
$evac=$data['EvacType'];
}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>LDRRMC</title>
<style> 
      /* Optional: Makes the sample page fill the window. */
      #map {
        height: 500px;  
        margin-left:auto; 
        margin-right:auto;
        align-content: center;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
    </style>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="" class="logo"><b>LDRRMC Dashboard</b></a>
           
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                 <h5 class="centered">Fullname:</h5>
                  <h5 class="centered"><?php echo $fname. "  ".$lname; ?></h5>
                    
                  <li class="mt">
                      <a  href="SafeTips.php">
                          <i class="fa fa-tasks"></i>
                          <span>Safety Tips</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a  class="active" href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Add Evacuation</span>
                      </a>
                     
                  </li>

                  <li class="sub-menu">
                      <a   href="tableEvac.php" href="javascript:;" >
                          <i class="fa fa-th "></i>
                          <span>Evacuation Table</span>
                      </a>
                      
                  </li>
                  
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
         <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> Add Evacuation</h4>

<?php 
if(isset($_GET['msg'])){        

if($_GET['msg'] =="Success"){                 
echo '<div class="alert success">
  <span class="closebtn">&times;</span>  
  <strong>Success!</strong>The data was successfully added.
</div>';
}else{
echo '<div class="alert info">
  <span class="closebtn">&times;</span>  
  <strong>Info!</strong> The data has a duplicate value or data should be in Tiwi Area Only.
</div>';
} }
?>
                        
                <?php

                
                if(isset($ecid)){
                  echo '<form method="POST" action="addEvacscript.php" id="myform" >
                  Name
                  <input type="text" name="name" class="form-control round-form" id="names" value="'.$name.'" ><br>
                  Select Evacuation type
 <select name="evacType" required>
 <option value='.$evac.'>'.$evac.'</option>
 <option value="School">School</option>
 <option value="Gymnasium">Gymnasium</option>
 </select>
                <input type="hidden" name="id" id="idn" value='.$ecid.'>
                <input type="hidden" name="lat" id="lat" value='.$lat.'>
                <input type="hidden" name="lng" id="lng" value='.$long.'>
                <input type="hidden" name="location" id="location" value="'.$add.'"">
                <input id="pac-input" class="controls" type="text"  name="addLoc" placeholder="Enter a location" value="'.$name.','.$add.'"  autofocus >';
              

}else{
echo  '<form method="POST" action="addEvacscript.php">
Name
                  <input type="text" name="name" class="form-control round-form" id="names" required="" ><br>
 Select Evacuation type
 <select name="evacType" required>
 <option value="">Select Here</option>
 <option value="School">School</option>
 <option value="Gymnasium">Gymnasium</option>
 </select>
                <input type="hidden" name="lat" id="lat" >
                <input type="hidden" name="lng" id="lng" >
                <input type="hidden" name="location" id="location" >
                <input id="pac-input" class="controls" type="text" name="addLoc" placeholder="Enter a location" >';
}


?>
                  
          <div id="type-selector" class="controls">
            <input type="radio" name="type" id="changetype-all" checked="checked">
            <label for="changetype-all">All</label>

            
          </div>
          <div id="map" style="height: 800px;width: 1000px  margin: auto "></div>

          <input type="submit" name="submit" value="Save" class="btn btn-primary btn-lg btn-block">
     <!--End of row-->
  </form>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
            <div class="row mt">
              <div class="col-lg-12">
           
              </div>
            </div>
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
           --------------  LDRRMC  --------------
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
<script type="text/javascript" src="javascript/map.js"></script><!--End of container-->
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR5PFyvraK8Cqbu-vQu7UAR-NkcABHNuw&libraries=places&callback=initMap"
        async defer></script>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
  <script type="text/javascript"> 

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
      
  var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}

   document.getElementById("myform").submit();


  </script>

  </body>
</html>
