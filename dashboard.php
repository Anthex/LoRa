<!DOCTYPE html>
<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    <!-- colorpicker -->
    <script src="colorpicker/jscolor.js"></script>
    
    <!-- CSS -->    
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
    
    <!-- Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <!-- JQuery -->
    <script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

    <?php include 'chart.php'; ?>
  </head>
    <h1>
      Graphique temps réel
    </h1>
    <h3>
      TO52 - LoRa
    </h3>
    <h4>
      Connecté en tant que : <?php echo $_SERVER['REDIRECT_REMOTE_USER'] ; ?>
    </h4>
    <div id="chart_div"></div>
    <div id="controls">
        <a href='javascript:void(0)' class="btn" id = 'li'>Line</a>
        <a href='javascript:void(0)' class="btn" id = 'st'>Colonnes</a>
        <a href='javascript:void(0)' class="btn" id = 'ar'>Area</a>
    </div>
    <div id="colorpicker">
          <?php include 'colorpicker/colorpicker.php' ?>
      </div>
  </body>
</html>