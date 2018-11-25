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
         return $tokenArray;
    }
    
    function PDFgetFirstName ($tokenArray){
        //foreach ($tokenArray as $key => $value) {
            
        //}
        return $tokenArray[0];
    }
    function cleanToken($token){
        $dirt = ["﻿﻿\r","\n"];
        $cleanToken = str_replace($dirt, '', $token);
        return $cleanToken;
    }
}
