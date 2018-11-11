<?php
     $ctt = 0;
    function decapitate($filename) {
      $file = file($filename);
      $output = $file[0];
      unset($file[0]);
      file_put_contents($filename, $file);
      return $output;
    }
    
    function update(){
    global $ctt;
    $formatted_rows="[";
    if (($handle = fopen("restricted/log_temp.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $ctt++;
            
            $formatted_rows = $formatted_rows . '[';
            $row++;
            for ($c=0; $c < $num; $c++) {
              $formatted_rows = $formatted_rows .  $data[$c];
              if($c<$num-1){$formatted_rows = $formatted_rows .  ',';}
            }
            $formatted_rows = $formatted_rows .  ']';
            $formatted_rows = $formatted_rows .  ',';
            }
        fclose($handle);
        }
      return $formatted_rows;
    }
  
  $result = update();
  if($ctt > 1000){
    decapitate("restricted/log_temp.csv");
    $result = update();
   }

  $result = preg_replace('{,$}', '', $result);
  $result = $result .  ']';
  $result =str_replace("'", "\"", $result);
  echo $result;
?>