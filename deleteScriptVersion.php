<?php

/**
 * Run this file on your web server for an example
 */

$script = 1;
$api_key = '';
$version = 1;
$agent = 'My Application Name';

$url = 'https://www.gmodstore.com/api/scripts/version/delete/'. $script .'?api_key='. $api_key .'&version=' . $version;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $agent); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

if(!$response = curl_exec($ch))
	echo curl_error($ch);

echo $response;

curl_close($ch);
