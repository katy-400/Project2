<?php
class csvTABLE {
    
    public function readCSV($file, $headings = false){ 
    
      $f = fopen($file, "r");
      $t .= '<table border = "3" >';
      
      if($headings){
        $text = fgetcsv($f);
        $t .= '<tr>';
        foreach($text as $headers){
          $t .= "<th> $headers </th>";
        }
        $t .= '</tr>';
      }
      
      
      while ($line = fgetcsv($f)) {
            $t .= '<tr>';
            foreach ($line as $cell) {
                $t .= "<td> $cell </td>";
            }
            $t .= '</tr>';
      } 
      $t .= '</table>';
      fclose($f);
      return $t;
  }
}
  
?>