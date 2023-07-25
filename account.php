<?php
session_start();
if($_SESSION['sid'] != 1){
   
  header("location:Login.html?warning=Access Denied");// redirects to home.html if $_SESSION['sid'] is empty
}else{
  if($_SESSION['level'] !=  1){
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

$id=$_SESSION['sid'];
$result=mysql_query("SELECT * FROM users where id = ".$id."");

  $row=mysql_fetch_array($result);
  $fname=$row['Fname'];
  $lname=$row['Lname'];
if(isset($_POST['sub'])){
  $sel=$_POST['sel'];
  $sql=mysql_query("Update triggerchange set  changeid_id = '$sel' where id = '1'");
   header("location:postmdrrmc.php");
}
}?>
<?php
$connect = mysqli_connect("localhost", "root", "", "floodtiwimap");

$query1 = "SELECT * FROM triggerchange ";
$result=mysqli_query($connect,$query1);
$row=mysqli_fetch_array($result);
$trigger=$row['changeid_id'];
$msg = '';
if($trigger == 1){
  $msg = 'Low-Moderate rain';
}elseif ($trigger == 2) {
  $msg = 'Very Heavy Rain';
}elseif($trigger == 3)
{
  $msg = 'Normal Weather';
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
 

    <title>MDRRMC</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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


    .row {
  display: flex; /* equal height of the children */
}

.col {
  flex: 1; /* additionally, equal width */
  
  padding: 2em;
 
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
            <a href="" class="logo"><b>MDRRMC Dashboard</b></a>
           
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
                    
                   <li class="sub-menu">
                      <a   href="MDRRMC.php" >
                          <i class="fa fa-desktop"></i>
                          <span>Message</span>
                      </a>
                     
                  </li>
                  

                   <li class="sub-menu">
                      <a  class=""  href="mdrrmcLI.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Mobile Number</span>
                      </a>
                     
                  </li>

                   <li class="sub-menu">
                      <a  class="active"  href="postmdrrmc.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Posting Tiwi Map</span>
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
                           <div class="row">
 
  <div class="col"> <h4><i class="fa fa-angle-right"></i>Account Settings</h4>
  <hr><br><br>
<p>This is the section where the MDRRMC edit his account settings and add barangay accounts.  </p><br><br>

          <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
             Add Account 
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Barangay</h4>
                  </div>
                  <div class="modal-body">
                   <div class="md-form mb-5">
                  
                    <label data-error="wrong" data-success="right" for="orangeForm-name">Barangay Name</label>
                    <input type="text" id="orangeForm-name" class="form-control validate">
                  
                </div>
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="orangeForm-email">Username</label>
                    <input type="email" id="orangeForm-email" class="form-control validate">
                 
                </div>

                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
                    <input type="password" id="orangeForm-pass" class="form-control validate">
                   
                </div>



                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div> 


</div>



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
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
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
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

       function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}



  </script>

  </body>
</html>

