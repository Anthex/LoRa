<?php
function getData()
{
    $formatted_rows="";
    if (($handle = fopen("restricted/log_temp.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
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
}?>