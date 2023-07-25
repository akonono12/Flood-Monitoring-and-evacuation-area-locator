<?php
session_start();
if(!$_SESSION['sid']){
   
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

$id=$_SESSION['sid'];
$result=mysql_query("SELECT * FROM users where id = ".$id."");

  $row=mysql_fetch_array($result);
  $fname=$row['Fname'];
  $lname=$row['Lname'];

}

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

$sql = 'SELECT * FROM evacuation';
    
$query = mysqli_query($conn, $sql);

if (!$query) {
  die ('SQL Error: ' . mysqli_error($conn));
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
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
               
                <!--  notification end -->
            </div>
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
                      <a   href="addEvac.php" href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Add Evacuation</span>
                      </a>
                     
                  </li>

                  <li class="sub-menu">
                      <a  class="active" href="tableEvac.php" href="javascript:;" >
                          <i class="fa fa-th "></i>
                          <span>Evacuation Table</span>
                      </a>
                      
                  

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
                        
                              


                                <?php
                                if (mysqli_num_rows($query) > 0) {
                                    $no   = 1;
                                    echo'<table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Evacuation Table</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Evacuation Id</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Area Name</th>
                                  <th><i class="fa fa-bookmark"></i> Address</th>
                                  <th><i class=" fa fa-edit"></i> Show/Hide</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>';
                                   while ($row = mysqli_fetch_array($query))
                                {
                                    if (($row['Show_Hide']) == 1){
                                    $btn= "btn btn-danger btn-xs";
                                    $link="evacUpdate1";
                                    $tip="Hide";
                                    }else{
                                    $btn= "btn btn-success btn-xs";
                                    $link="evacUpdate";
                                     $tip="Show";

                                    }
                                  echo '<tr>
                                          <td>'.$no.'</td>
                                          <td>'.$row['Area_name'].'</td>
                                           <td>'.$row['address'].'</td>
                                            <td>'. $row['Show_Hide']. '</td>
                                            
                                             <td>
                                            
                                          <a class="'.$btn.'" href="'.$link.'.php?id='.$row['ec_id'].'"><i class="fa fa-check"></i></a>
                                          <span class="TipsName">'.$tip.'</span>
                                          </div>
                                          
                                              <a class="btn btn-primary btn-xs" href="addEvac.php?id='.$row['ec_id'].'"><i class="fa fa-pencil "></i></a>
                                              <span class="TipsName">Update Location</span>
                                              </div>
                                             </td>
                                     </tr>
                                     </tbody>';
                                    $no++;
                                }    
                          
                              }else{
                                   echo "no database found";
                              }?>
                             
                            
                         </table> 
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

  </script>

  </body>
</html>
