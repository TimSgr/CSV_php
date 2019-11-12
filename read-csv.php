<?php

require_once 'vendor/autoload.php';


use League\Csv\Reader;

//load the CSV document from a file path
$csv = Reader::createFromPath('./test.csv', 'r');
$csv->setHeaderOffset(0);

$header = $csv->getHeader(); //returns the CSV header record
$records = $csv->getRecords(); //returns all the CSV records as an Iterator object

// echo $csv->getContent(); //returns the CSV document as a string

echo "Zeilennummer | ";
// var_dump($header);
// echo "Zeilennummer";
$size = count($header);
foreach ($header as $index => $spalte) {
    echo "$spalte";
    if ($index != $size - 1) {
        echo  " | ";
    }

}
echo "\n";
for($i=0;$i<$size;$i++){
    echo "---|";
}
echo "--- \n";

foreach($records as $key => $zeile){
    echo "$key" . " | ";
    $size=count($zeile);
    foreach($zeile as $index => $element){
        echo "$element";
        if ($index != $size - 1) {
            echo  " | ";
        }
    }
    echo "\n";

    // var_dump($zeile);

}
