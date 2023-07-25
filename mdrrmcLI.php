
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

}?>
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'floodtiwimap'; // Database Name


$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
  die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}
function fill_location_select_box($conn)
{ 
$output='';
$que=mysqli_query($conn, "Select * from barangay_list");
while($row1=mysqli_fetch_assoc($que)){

echo  $output = '<option value="'.$row1["Barangay_Name"].'">' . $row1["Barangay_Name"] .'</option>' ;
 
}

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
$limit = 10;  
if (isset($_GET["page"])) { 
  $page  = $_GET["page"]; 
} else { 
  $page=1; 
};  
$start_from = ($page-1) * $limit; 
if(isset($_POST['submit'])){
  $br=$_POST['brgy'];
  $sql = "SELECT * FROM mobile_number where Barangay = '$br' LIMIT ".$start_from.", ".$limit."";
}else{
$sql = "SELECT * FROM mobile_number LIMIT ".$start_from.", ".$limit."";
}    
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
                      <a  class="active"  href="mdrrmcLI.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Mobile Number</span>
                      </a>
                     
                  </li>
                    <li class="sub-menu">
                      <a  class=""  href="postmdrrmc.php" >
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
 
  <div class="col"> <h4><i class="fa fa-angle-right"></i>List Section - Mobile Number </h4>
  <hr>

  <form action="" method="POST">                          

    <label for="exampleFormControlSelect1">Select Barangay(One only)</label>
    <select class="form-control form-control-lg" style="padding: 0px 12px" name="brgy">
      <option value="Select">Select</option>
    <?php echo fill_location_select_box($conn); ?>
    </select>
<br>
<button type="submit" class="btn btn-default center-block" name="submit">Submit</button>
</form>
<br> 
 <?php
                                if (mysqli_num_rows($query) > 0) {
                                    $no   = $start_from+1;
                                    echo'  <table class="table">
                              <thead>
                              <tr>
                                  <th>List Number</th>
                                  <th>Mobile Number</th>
                                  
                              </tr>
                              </thead>
                              <tbody>';
                                   while ($row = mysqli_fetch_array($query))
                                {
                                   

                                    
                                  echo ' <tr>
                                  <td>'.$no.'</td>
                                  <td>'.$row['MobileNumber'].'</td>
                                  <td> <a class="btn btn-danger btn-xs" onclick="javascript:confirmationDelete($(this));return false;"" href="deletenum.php?id='.$row['id'].'""><i class="fa fa-trash-o "></i></a></td>
                                  
                              </tr>
                                     ';
                                    $no++;
                                 }   
                          
                             } else{
                                   echo "no database found";
                              }?>

                              
                              </tbody>
                          </table>

                          <?php  
$sql = "SELECT COUNT(id) FROM mobile_number";  
$rs_result = mysql_query($sql);  
$row = mysql_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<a href='mdrrmcLI.php?page=".$i."'>".$i."</a>";  
};  
echo $pagLink . "</div>";  
?>
</div>

 <div class="col"><h4><i class="fa fa-angle-right"></i>Add Section - Mobile Number </h4>
                            <hr>.

                          <div class="container">
   
   <h4 align="center">Enter Cellphone Numbers </h4>
   <br />
   <form method="post" id="insert_form">
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Mobile Number</th>
        <th>Barangay</th>
       
       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
     <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Insert"   />
     </div>
    </div>
   </form>
  </div>
<script type="text/javascript">
  $(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="tel" name="item_name[]" class="form-control item_name" minlength="11" maxlength="11" Placeholder="ex.09154866666"/></td>';
   html += '<td><select name="location[]" class="form-control location"><option value="">Select Location</option><?php echo fill_location_select_box($conn); ?></select></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Mobile Number at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.location').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Mobile Number at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  
  
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
       window.location['reload'](true)
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');

     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});


</script>

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

