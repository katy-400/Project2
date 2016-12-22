<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);
  
  //use code\core
  //use code\core\autoloader
  //use code\core\addressbook
  //use code\core\mailer
  //use code\core\sanitation
  //use code\core\readCSV
  ////use code\core\Curl

  echo "<pre>";
  include "code/bootstrap.php";
  $mailer = new Mailer();
  echo "<br><br>";
  echo "<h4>Email has been sent by user.</h4>";
  $mailer->addRecipient('kn12@mailinator.com');
  $mailer->addRecipient('kmn@mailinator.com');
  $mailer->addRecipient('poop@example.com');
  $mailer->send('This message has been sent to 3 recipients');
  echo "</pre>";
  
  //Sanitation
  $name = 'kn96';
  $ID = '123456789';
  $email = 'kn96@njit.edu';
  $name = Sanitation::genFields($name);
  $ID = Sanitation::numFields($ID);
  $email = Sanitation::emailFields($email);
  echo "<h4>User: </h4>";
  echo $name . "<br>";
  echo $ID . "<br>";
  echo $email . "<br><br>";
  
//Table
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
echo "<h4> User List: </h4>";
$obj = new csvTABLE;
echo $obj -> readCSV("Names.csv", true);

//Curl
echo "<hr></hr>";
$ch = curl_init("https://www.google.com/#q=penguins&btnK=Google+Search");
$fp = fopen("http://www.google.com/", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);

?>