<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <?php include 'chart.php'; ?>
    <script type="text/javascript">
    </script>
  </head>
  <body>
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
  </body>
</html>