<?php

/**
 * Run this file on your web server for an example
 */

$script = 1;
$api_key = '';
$agent = 'My Application Name';

$url = 'https://scriptfodder.com/api/scripts/version/edit/'. $script .'?api_key='. $api_key;

if(isset($_POST['submit'])){	
	$file = false;
	if(isset($_FILES['file']) && !empty($_FILES['file']['tmp_name']))
		$file = curl_file_create($_FILES['file']['tmp_name'], $_FILES['file']['type'], basename($_FILES['file']['name']));

	$array = [
		'version' => $_POST['version'],
		'name' => $_POST['name'],
		'changes' => $_POST['changes'],
		'file' => $file
	];

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, count($array));
	curl_setopt(
		$ch,
		CURLOPT_POSTFIELDS,
		$array
	);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 50);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	if(!$response = curl_exec($ch))
		echo curl_error($ch);

	echo $response;

	curl_close($ch);
}

?>

<html>
	<body>
		<form method="post" enctype="multipart/form-data">
		  Version: <br>
		  <input type="text" name="version"><br>
		  Name: <br>
		  <input type="text" name="name"><br>
		  Changes: <br>
		  <textarea name="changes"></textarea><br>
		  File: <input type="file" name="file"><br>
		  <input type="submit" name="submit" value="Submit">
		</form>
	</body>
</html>