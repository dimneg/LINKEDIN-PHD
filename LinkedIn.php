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
        #foreach ($tokenArray as $key => $value) {
            $result = str_replace('www.linkedin.com/in/','',$tokenArray[1].$tokenArray[2]);
        #}
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
}
