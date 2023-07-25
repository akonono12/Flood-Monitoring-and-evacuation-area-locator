<?php
$connect = mysqli_connect("localhost", "root", "", "floodtiwimap");
$query = "SELECT * FROM damageassessment where DamageCost <> 0";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ Barangay_Names:'".$row["Barangay_Name"]."', Flood_Damages:".$row["DamageCost"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Chart Damages</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center"></h2>
   <h3 align="center">Flood Damages(Infrastracture Only)</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
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
