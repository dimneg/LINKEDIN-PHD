<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rulesPdfLinkedIn
 *
 * @author dimitris negkas
 */
class LinkedIn {
    function PDFcreateTokenArray($txtFull){
         $tokenArray = explode(" ", $txtFull);
         $tokenArray = preg_split("/[\s,]+/", $txtFull);
         return $tokenArray;
    }
    
    function PDFgetFirstName ($tokenArray){
        //foreach ($tokenArray as $key => $value) {
            
        //}
        return $tokenArray[0];
    }
    function PDFgetLastName ($tokenArray){
        //foreach ($tokenArray as $key => $value) {
            
        //}
        return $tokenArray[1];
    }
    function cleanToken($token){
        #$dirt = [chr(145),chr(146),chr(147),chr(148),chr(151), "•","﻿﻿\r\n"];
        $cleanToken = str_replace("\r\n", '', $token);
        #$cleanToken = str_replace($dirt, '', $token);       #  $cleanToken = str_replace("﻿﻿\r", '', $cleanToken);
        return $cleanToken;
    }
     function TxtGetFirstName ($tokenArray){
        //foreach ($tokenArray as $key => $value) {
            
        //}
        return $tokenArray[0];
    }
    function TxtGetLinkedInLink($tokenArray){
        $result ='';      
        $resultArray=[];
        $keywords_af =['﻿(LinkedIn)'];
        $keywords_bf =['﻿﻿Contact'];
        
        foreach ($tokenArray as $key => $row) {
             #if ($tokenArray[$key]==  $keywords_af[0]) {
             if ($this->stringCompare($keywords_af[0], $tokenArray[$key])> 80)  { 
                 echo 'found'.$tokenArray[$key].PHP_EOL;
                 $index = $key - 1;
              #   while ( strpos($tokenArray[$index],  $keywords_bf[0]) === 'false' )  {   
                  while ( $this->stringCompare($keywords_bf[0], $tokenArray[$index])< 80 && $this->isEmail($tokenArray[$index]) === FALSE )  {               
#while ($this->isEmail($tokenArray[$key])===FALSE ||( strpos($tokenArray[$index],  $keywords_bf[0]) ===FALSE ) ) {
                     
                      $resultArray []= $tokenArray[$index];
                      echo 'index='. $index;
                      $index-- ;
                 }
                 #$result = str_replace('www.linkedin.com/in/','',$result );
                 return implode("", array_reverse($resultArray));
             }
             else {
                # echo $tokenArray[$key].' '.$keywords_af[0].' '.  $this->stringCompare(preg_replace('/\s+/', '', $tokenArray[$key]),  preg_replace('/\s+/', '', $keywords_af[0])).PHP_EOL;
             }
            #$result = str_replace('www.linkedin.com/in/','',$tokenArray[1].$tokenArray[2]);
        }
        return $result;
        
    }
    function TxtGetEmail($tokenArray){
        foreach ($tokenArray as $key => $row) {
            if (strpos($row, '@')!==false && strpos($row, '.')!==false){
                 $result = str_replace(' ', '', $row);
                  return $result;
            }
            else {
                
            }
        }
        return '';
        
    }
    
    function getArrayTokensBetween ($tokenArray,$token_bf, $token_af){
         foreach ($tokenArray as $key => $row) {
             
         }
        
    }
    
    function isEmail($string){
        if  (strpos($string, '@')!==false && strpos($string, '.')!==false){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    function readCsv($inputPath,$file){
        $tokenArray=[];
         if (($handle = fopen($inputPath.$file, "r")) !== FALSE){
             while (($row = fgetcsv($handle, 100000, "~")) !== FALSE) {
                  if(!mb_detect_encoding($row[0] , 'utf-8', true)){
                    $row[0]  = utf8_encode($row[0]);
                  }
                  $tokenArray[]=$row[0];
             }
         }
         return $tokenArray;
    }
    
     function stringCompare($string1, $string2) {
        $percentage = 0;
        // similar_text(mb_strtolower($string1,'UTF-8'), mb_strtolower($string2,'UTF-8'), $percentage); 
        similar_text($string1, $string2, $percentage);
        return $percentage;
    }
    
    
}
