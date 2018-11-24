<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$client_id="86or4zg8dooive";
$client_secret="EFHe7aFgfZKGH5Sl";

$str = "https://www.linkedin.com/oauth/v2/authorization?";
$str .="response_type=code&client_id=";
$str .=$client_id;
$str .= "&redirect_uri=";
$str .="http://www.playgroundtheoryband.com/";
$str .="&state=";
$str .="darcy9689d89985654";
$str .="&scope=r_basicprofile";
echo urlencode($str).PHP_EOL;
echo urldecode($str);