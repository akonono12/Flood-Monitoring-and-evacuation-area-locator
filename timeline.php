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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Precuationary Measures</title>
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
  <link href="https://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/timeline.css">
</head>
<body>
  
    <span class="first"> 
     Tiwi Newsfeed
     
    </span>
    <ul class="timeline">

     
       <?php
                                    
                  while ($row = mysqli_fetch_array($query))
                                {
                                   
                                    
                                  echo ' <li>
    <div class="avatar">
                                        <img src="http://www.croop.cl/UI/twitter/images/carl.jpg">
                                        <div class="hover">
                                      <div class="icon-twitter"></div>
                                        </div>
                                           </div>
                                 <div class="bubble-container">
                                <div class="bubble">
                                
                                <h3>@'.$row['Name'].'</h3><br/>
                                '.$row['Safety_Tips_content'].'<br/>
                                <h4>Date:'.$row['Dateposted'].'   Time:'.$row['Time'].' </h4>
                                 
            </div>
          </div>
          <div class="arrow"></div>
        </div>
      </li>';
                                    
                                }?>
 
  
      
    </ul>

  </div>
</body>
</html>