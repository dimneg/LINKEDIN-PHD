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
        foreach ($tokenArray as $key => $row) {
            $words = explode(' ', $row);
            #echo $this->TxtGetLinkedInLink($tokenArray).' '.
           if ((strpos($this->TxtGetLinkedInLink($tokenArray),$row) !== FALSE ||  strpos($this->TxtGetLinkedInLink($tokenArray),$words[0]) !== FALSE ) && strpos($row,'LINKED') === FALSE  && strpos($row,'-') === FALSE  && strpos($row,'SKILLS') === FALSE ){
               if (count($words)>1) {
                   return $words[0] ;
               }
               else {
                    return $row;
               }
              
           }
           else {
                
                 #if (strpos($this->TxtGetLinkedInLink($tokenArray),$words[0]) !== FALSE && strpos($row,'TOP') === FALSE  && strpos($row,'LINKED') === FALSE  ){
                   #   return $row;
               #  }
           }
        }
        
    }
    function TxtGetLastName ($tokenArray){
        foreach ($tokenArray as $key => $row) {
            $words = explode(' ', $row);
             if (count($words)>1) {
                 
                  if ( (strpos($this->TxtGetLinkedInLink($tokenArray),$words[1]) !== FALSE && strlen($words[1]) > 3)){
                      # if (strlen($words[1] > 3)){
                            return $words[1] ;
                       #}
                  
               
             
             }
             else {
                
             }
            #echo $this->TxtGetLinkedInLink($tokenArray).' '.
          
              
           }
           else {
                
                  if ((strpos($this->TxtGetLinkedInLink($tokenArray),$row) !== FALSE  ) && strpos($row,'LINKED') === FALSE  && strpos($row,'-') === FALSE  && strpos($row,'SKILLS') === FALSE ){
                      return $tokenArray[$key + 1];
                  }
           }
        }
        
    }
    function TxtGetLinkedInLink($tokenArray){
        #$result ='';      
        $resultArray=[];
        $keywords_af =['﻿(LINKEDIN)'];
        $keywords_bf =['﻿﻿CONTACT'];
        
        foreach ($tokenArray as $key => $row) {
             #if ($tokenArray[$key]==  $keywords_af[0]) {
             if ($this->stringCompare($keywords_af[0], $tokenArray[$key])> 80)  { 
                 #echo 'found'.$tokenArray[$key].PHP_EOL;
                 $index = $key - 1;
              #   while ( strpos($tokenArray[$index],  $keywords_bf[0]) === 'false' )  {   
                  while ( $this->stringCompare($keywords_bf[0], $tokenArray[$index])< 80 && $this->isEmail($tokenArray[$index]) === FALSE )  {               
#while ($this->isEmail($tokenArray[$key])===FALSE ||( strpos($tokenArray[$index],  $keywords_bf[0]) ===FALSE ) ) {
                     
                      $resultArray []= $tokenArray[$index];
                      #echo 'index='. $index;
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
       # return $result;
        
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
    
    function txtGetLanguages($tokenArray){
       $languagesArray =[[]];
       $keywords_bf =['﻿LANGUAGES'];
       $keywords_af =['﻿PUBLICATIONS'];
        foreach ($tokenArray as $key => $row) {
           if ($this->stringCompare($keywords_af[0], $tokenArray[$key])> 80  )  { 
               echo 'languages after: '.PHP_EOL;
               $index = $key - 1;
               while ( $this->stringCompare($keywords_bf[0], $tokenArray[$index])< 80) {
                    echo 'anguages before'.PHP_EOL;
                    if (!empty($tokenArray[$index]) && $tokenArray[$index]!='' && $tokenArray[$index]!=[]){
                         $languagesArray[]=$tokenArray[$index];
                    }
                  
                   $index--;
               }
           }
           else {
               #return [];
           }
              #
                  
              
        }
        
       return  array_reverse( $languagesArray);
    }
    function txtGetTopSkills($tokenArray){
       $topSkillsArray =[[]];
       $keywords_bf =['﻿TOP SKILLS'];
       $keywords_af =['﻿LANGUAGES'];
        foreach ($tokenArray as $key => $row) {
           if ($this->stringCompare($keywords_af[0], $tokenArray[$key])> 80 || $this->stringCompare($this->TxtGetFirstName($tokenArray),$row)>80 )  { 
               #echo 'skills after: '.PHP_EOL;
               $index = $key - 1;
               while ( $this->stringCompare($keywords_bf[0], $tokenArray[$index])< 80) {
                   # echo 'skills before'.PHP_EOL;
                    if (!empty($tokenArray[$index]) && $tokenArray[$index]!='' && $tokenArray[$index]!=[]){
                         $topSkillsArray[]=$tokenArray[$index];
                    }
                  
                   $index--;
               }
           }
              #
                  
              
        }
        
       return  array_reverse($topSkillsArray);
    }
    
    function txtGetAllContacts($tokenArray){
       # if (isset($this->TxtGetLinkedInLink($tokenArray))){
         if ($this->TxtGetLinkedInLink($tokenArray)){
            $contactsArray['linkedin']=$this->TxtGetLinkedInLink($tokenArray);
        }
        if ($this->TxtGetEmail($tokenArray)){
            $contactsArray['email']=$this->TxtGetEmail($tokenArray);
        }
        if ($this->txtGetCompanyContact($tokenArray)){
            $contactsArray['company']=$this->txtGetCompanyContact($tokenArray);
        }
        if ($this->txtGetPersonalContact($tokenArray)){
            $contactsArray['personal']=$this->txtGetPersonalContact($tokenArray);
        }
        
        return $contactsArray;
    }
    
    function txtGetCompanyContact($tokenArray){
        $keywords_wt =['﻿(COMPANY)','WWW'];
       
        foreach ($tokenArray as $key => $row) {
              if (strpos($row,  '(COMPANY)')!==false ){
             #if (substr($row,-18)==  $keywords_wt[0]) {
                  #echo 'if (strpos($row,  $keywords_wt[0])!==false'.PHP_EOL;
                    if (strpos($row,  '.')!==false  ){
                        if (strpos($row, $keywords_wt[1])!==false  ){
                            $tokenArray = explode(' ', $row);
                            if (isset($tokenArray[0])){
                                return $tokenArray[0];
                            }
                        }
                    }
              }
              #else echo $row.'<>'.$keywords_wt[0].PHP_EOL;
        }
    }
    function txtGetPersonalContact($tokenArray){
        $keywords_wt =['﻿(PERSONAL)','WWW'];
       
        foreach ($tokenArray as $key => $row) {
              if (strpos($row ,  '(PERSONAL)')!==false ){
             #if (substr($row,-18)==  $keywords_wt[0]) {
               #   echo 'if (strpos($row,  $keywords_wt[0])!==false'.PHP_EOL;
                    if (strpos($tokenArray[$key - 1],  '.')!==false  ){
                        if (strpos($tokenArray[$key - 1] , $keywords_wt[1])!==false  ){
                            #$tokenArray = explode(' ', $row);
                            #if (isset($tokenArray[0])){
                             #   return $tokenArray[0];
                            #}
                           # else {
                            return $tokenArray[$key - 1] ;
                           # }
                        }
                    }
              }
              #else echo $row.'<>'.$keywords_wt[0].PHP_EOL;
        }
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
                  $tokenArray[]=  mb_strtoupper($row[0],'utf-8');
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
