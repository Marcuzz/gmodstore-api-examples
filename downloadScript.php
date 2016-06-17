<?php

/**
 * Run this file on your web server for an example
 */

$script = 1;
$api_key = '';
$version = ''; # Leave blank for none
$agent = 'My Application Name';

$url = 'https://scriptfodder.com/api/scripts/download/'. $script .'?api_key='. $api_key .'&version=' . $version;

$fp = fopen('test.zip', 'w+');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $agent); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 50);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_FILE, $fp);

if(!$file = curl_exec($ch))
    echo curl_error($ch);

curl_close($ch);
fclose($fp);