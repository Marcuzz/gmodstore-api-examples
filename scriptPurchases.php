<?php

/**
 * Run this file on your web server for an example
 */

$script = 1;
$api_key = '';
$agent = 'My Application Name';

$url = 'https://scriptfodder.com/api/scripts/purchases/'. $script .'?api_key='. $api_key;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $agent); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

if(!$response = curl_exec($ch))
	echo curl_error($ch);

curl_close($ch);

# Decode the retrieved JSON into a PHP array
$purchases = json_decode($response['purchases'], true);
foreach($purchases as $purchase){
	# Do whatever ya want with the purchases here
	print_r($purchase['user_id'] . ', ');
}