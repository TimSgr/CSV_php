<?php
// $array=array("Nummer der Bestellung","Artikelnummer","Beschreibung des Artikels",
// "Bestellte Anzahl des Artikels", "Zeitpunkt der Bestellung", "Preis des Artikels in britischen Pfund", "Kundennummer",
// "Land aus dem die Bestellung einging");


require_once 'vendor/autoload.php';


use League\Csv\Reader;

//load the CSV document from a file path
$csv = Reader::createFromPath('php://stdin', 'r');
// $reader->preserveInputBOM();
$csv->setHeaderOffset(0);
$csv->setDelimiter(',');
$delimiter = $csv->getDelimiter(); //returns ";"
// echo "$delimiter";

$header = $csv->getHeader(); //returns the CSV header record
$records = $csv->getRecords(); //returns all the CSV records as an Iterator object

// echo $csv->getContent(); //returns the CSV document as a string

echo "Spaltennummer | Spaltenname | Datenniveau | Beschreibung";


echo "\n";
$size = count($header);
for($i=3;$i<$size;$i++){
    echo "---|";
}
echo "--- \n";
// $l=0;
$j=0;

foreach($records as $key => $zeile){
    foreach($zeile as $index => $element){
          if($j<$size){
             echo "$key " . " | ";
             echo " `'".$header[$j] . "'` | ";
             $element = str_replace( [',','.'], '.', "$element" );
             
             if (DateTime::createFromFormat('Y-m-d H:i:s', $element) !== FALSE) echo "kontinuierlich (`datetime`) | ";
                if(is_numeric($element)){
                    round($element,1);
                 // echo "##$number \n";
                 if(ctype_digit($element))     echo  "kontinuierlich (`int`) | "; 
                 else                          echo  "kontinuierlich (`float`) | ";
                 // echo "$element;
             }
                else echo "kategorisch (nominal) | ";
            //  echo $array[$l];
             echo "\n";
             $j++;
             $key++;
            //  $l++;
          }
    }
}


    
// foreach($records as $key => $zeile){
//     echo "$key " . " | ";
//     $size=count($zeile);
//     }

    //  foreach($zeile as $index => $element){
        // $element = str_replace( [',','.'], '.', "$element" );
        // if(is_numeric($element)){
        //     // echo "##$number \n";
        //     if(ctype_digit($element))     echo  "$element(int)"; 
        //     else                          echo  $element . "(double)";
        //     // echo "$element;
        // }
        // else echo "$element(string)";
    //     if ($index != $size - 1) {
    //         echo  " | ";
    //     }
    //     echo "\n";
    // }
    // // var_dump($zeile);

?>