<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of similarity
 *
 * @author dimitris negkas
 */
class similarity {
    //put your code here
    
   # Levenshtein distance 
   public static function Levenshtein($string1,$string2){
        return levenshtein($string1,$string2);
    } 
}
//editD: The edit distance value between two strings,
//editDNew: The new edit distance value affected by the length of strings,
//Score: Normalized score,
//AttributeScore: Weighted similarity score between two attributes