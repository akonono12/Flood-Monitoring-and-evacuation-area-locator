<?php
session_start();
if($_SESSION['sid'] != 2){
   
  header("location:Login.html?warning=Access Denied");// redirects to home.html if $_SESSION['sid'] is empty
}else{
  if($_SESSION['level'] !=  2){
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

$sql = 'SELECT * FROM damageassessment';
    
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

    <title>BDRRMC</title>
    
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
            <a href="" class="logo"><b>BDRRMC Dashboard</b></a>
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
                      <a  href="BDRRMC.php">
                          <i class="fa fa-desktop"></i>
                          <span>Damage Assessment</span>
                      </a>
                  </li>

                  
                  <li class="sub-menu">
                      <a  class="active" href="tableAssessment.php" href="javascript:;" >
                          <i class="fa fa-th "></i>
                          <span>Damage Assessment Table</span>
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
                                    echo' <table class="table table-hover">
                            <h4><i class="fa fa-angle-right"></i> Hover Table</h4>
                            <hr>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Barangay Name</th>
                                    <th>Cover</th>
                                    <th>Damage Cost</th>
                                </tr>
                                </thead> <tbody>';
                                   while ($row = mysqli_fetch_array($query))
                                {
                                   

                                    
                                  echo '<tr>
                                          <td>'.$no.'</td>
                                          <td>'.$row['Barangay_Name'].'</td>
                                           <td>'.$row['DA_Cover'].'</td>
                                            <td>'. $row['DamageCost']. '</td>
                                            
                                             <td>
                                            <a class="btn btn-danger btn-xs" onclick="javascript:confirmationDelete($(this));return false;"" href="deleteass.php?id='.$row['DA_Id'].'""><i class="fa fa-trash-o "></i></a>
                                        
            
                                             </td>
                                     </tr>
                                     ';
                                    $no++;
                                 }   
                          
                             } else{
                                   echo "no database found";
                              }?>
                             
            
                            </tbody>
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
           --------------  BDRRMC  --------------
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

      function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}

  </script>

  </body>
</html>
