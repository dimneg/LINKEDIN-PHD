<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of twitter
 *
 * @author dimitris negkas
 */
class twitter {
    public static function getProfileDataFromJson($jsonProfile){
        $profile= [[]];
        $json = json_decode($jsonProfile,true);
        if(isset ($json['name'])) {
           $profile['name'] = $json['name'];
        }
        return $profile;
    }
    
    function readJsonFile($file){
        #$file= 'profiles/twitters/janag.json' 
        if (($handle = fopen($file, "r")) !== FALSE){
            
        }
    }
}
