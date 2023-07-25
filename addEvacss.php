<html>
  <head>
    <title>TiwiMap-Add Evacuation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 80%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
       margin: auto;
    width: 60%;
    
    padding: 10px;
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
    </style>
</head>
<body>
 
<div class="container">
  <div class="row"><div class="col-lg-6 alert alert-info">Add Evacuation</div></div>
  <form method="POST" action="addEvacscript.php">
    <div class="row">
              <div class="col col-lg-6">
                  Name
                  <input type="text" name="name" class="form-control" id="names"><br>

                <input type="hidden" name="lat" id="lat">
                <input type="hidden" name="lng" id="lng">
                <input type="hidden" name="location" id="location">

                  <input id="pac-input" class="controls" type="text"
              placeholder="Enter a location">
          <div id="type-selector" class="controls">
            <input type="radio" name="type" id="changetype-all" checked="checked">
            <label for="changetype-all">All</label>

            
          </div>
          <div id="map" style="height: 400px;width: 600px"></div>

          <input type="submit" name="submit" value="Save" class="form-control btn btn-primary">
            </div>
      </div><!--End of row-->
  </form>
</div>
 <script type="text/javascript" src="javascript/map.js"></script><!--End of container-->
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR5PFyvraK8Cqbu-vQu7UAR-NkcABHNuw&libraries=places&callback=initMap"
        async defer></script>

  </body>
</html>