<?php

include 'C:\Users\dimitris negkas\Documents\repos\gemh_mining\DocxToTxt.php';
include 'C:\Users\dimitris negkas\Documents\repos\gemh_mining\textMining.php';

$inputPath = "profiles\linkedIn/docx/";


$files = array_values(array_diff(scandir($inputPath), array('..', '.')));
echo 'files=' . count($files) . PHP_EOL;

foreach ($files as $indexFile => $file) {
    $docx = new DocxToTxt();
     $fullDocx = $docx->docx2text($inputPath . '/' . $file);
     #print_r($fullDocx);
     
     $segmenting1 = new textMining();
     
     $txtFull = $segmenting1->fixEarlyCollatedTokensInTxt($fullDocx);
     
     print_r($txtFull);
     #echo $txtFull.PHP_EOL; 
}