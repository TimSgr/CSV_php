<?php

require_once 'vendor/autoload.php';


use League\Csv\Reader;

//load the CSV document from a file path
$csv = Reader::createFromPath('./beer_rating_data_train.csv', 'r');
$csv->setHeaderOffset(0);
$csv->setDelimiter(';');
$delimiter = $csv->getDelimiter(); //returns ";"
// echo "$delimiter";

$header = $csv->getHeader(); //returns the CSV header record
$records = $csv->getRecords(); //returns all the CSV records as an Iterator object

// echo $csv->getContent(); //returns the CSV document as a string

echo "Zeilennummer | ";

// echo "Zeilennummer";
$size = count($header);
foreach ($header as $index => $spalte) {   
    if ($index != $size - 1) {
        echo $spalte;
        echo  " | ";
    }

}
echo "\n";
for($i=0;$i<$size;$i++){
    echo "---|";
}
echo "--- \n";
foreach($records as $key => $zeile){
    echo "$key " . " | ";
    $size=count($zeile);
    foreach($zeile as $index => $element){
        $element = str_replace( [',','.'], '.', "$element" );
        
        if(is_numeric($element)){
              
            // echo "##$number \n";
                if(ctype_digit($element))     echo  "$element(int)"; 
                else echo  $element . "(double)";
                // echo "$element;
            }
            else echo "$element(string)";
            if ($index != $size - 1) {
            echo  " | ";
        }
    }
    echo "\n";
    // var_dump($zeile);
}
?>