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
           $profile['name'] = mb_strtoupper($json['name'], 'UTF-8');
           $profile['url'] =  mb_strtoupper($json['entities']['url']['urls'][0]['display_url'], 'UTF-8');
        }
        #print_r($profile);
        return $profile;
    }
    
    function readJsonFile($file){
        #$file= 'profiles/twitters/janag.json' 
        if (($handle = fopen($file, "r")) !== FALSE){
            
        }
    }
}
