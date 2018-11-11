<?php

if(isset($_POST["temperature"]) && isset($_POST["humidite"])){
  $my_file = 'log_temp.csv';
  $handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
  $data = "\n" . '\'' . date('H:i') . '\','.$_POST["temperature"] . ',' . $_POST["humidite"];
  fwrite($handle, $data);
}else{
  echo ("Aucune donnée envoyée.");
}

$file="log_temp.csv";
$linecount = 0;
$handle = fopen($file, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
}

fclose($handle);

 function decapitate($filename) {
      $file = file($filename);
      $output = $file[0];
      unset($file[0]);
      file_put_contents($filename, $file);
      return $output;
    }

  if($linecount > 800){
    decapitate("log_temp.csv");
   }else{
  }

    echo ' - ' . $linecount . ' lignes';
?>

