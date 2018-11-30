<?php

include 'C:\Users\dimitris negkas\Documents\repos\gemh_mining\DocxToTxt.php';
include 'C:\Users\dimitris negkas\Documents\repos\gemh_mining\textMining.php';
include 'LinkedIn.php';
include 'DocxConversion.php';

$inputPath = "profiles\linkedIn/txt/";


$files = array_values(array_diff(scandir($inputPath), array('..', '.')));
echo 'files=' . count($files) . PHP_EOL;

foreach ($files as $indexFile => $file) {
    $linkedIn = new LinkedIn();
   # $docx = new DocxToTxt();
   # $fullDocx = $docx->docx2text($inputPath . '/' . $file);
     #print_r($fullDocx);
    # $docObj  = new DocxConversion($inputPath.$file);
     #echo
     #$docText= $docObj->convertToText();
    # $segmenting1 = new textMining();
     
     #$txtFull = $segmenting1->fixEarlyCollatedTokensInTxt($fullDocx);
#     $tokenArray = $linkedIn->PDFcreateTokenArray($docText);
     $tokenArray = $linkedIn->readCsv($inputPath, $file) ;
     print_r($tokenArray);
     
     #print_r($txtFull);
     $profile[$indexFile]['index'] = $indexFile ; 
     $profile[$indexFile]['fileName'] = $file ; 
     $profile[$indexFile]['firstName'] = ''; 
     $profile[$indexFile]['lastName'] = ''; 
     $profile[$indexFile]['linkedInLink'] =$linkedIn->TxtGetLinkedInLink($tokenArray); 
     $profile[$indexFile]['email'] = $linkedIn->TxtGetEmail($tokenArray); 
     $profile[$indexFile]['allContactsInfo'] = []; //array
     $profile[$indexFile]['topSkills'] = []; //array
     $profile[$indexFile]['languages'] = []; //array
     $profile[$indexFile]['experience'] = []; //array
     $profile[$indexFile]['education'] = []; //array
     $profile[$indexFile]['headline'] = ''; 
     $profile[$indexFile]['location'] = ''; 
     
     #echo $txtFull.PHP_EOL; 
}
$json=json_encode( $profile,JSON_UNESCAPED_UNICODE);
print_r($json);
#saveCsv($profile, 'profiles.csv');
function saveCsv($tableName,$fileName){
        $fp = fopen($fileName, 'w');
        foreach ($tableName as $fields) {
            fputcsv($fp, $fields,",");		
        }
        fclose($fp);	
    }