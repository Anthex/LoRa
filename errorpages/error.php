<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="errorpages/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
    
  </head>
  <body>
    
    <div id="desc">
    <?php  
    $page = isset($_GET['e']) ? trim(strtolower($_GET['e'])): "home";
    $allowedPages = array(
        '401' => '401.php',
        '404' => '404.php',
        '403' => '403.php',
        '500' => '500.php'
    );

    include( isset($allowedPages[$page]) ? $allowedPages[$page] : $allowedPages["home"] );
    ?>
    <a href="http://to52.dantz.fr/" class="btn">Retour</a>
    </div>
    


    
  </body>
</html>