<?php

require 'app_tokens.php';

require 'tmhOAuth-master/tmhOAuth.php';

// Create a connection

$connection = new tmhOAuth(array(
	'consumer_key' => $consumer_key,
	'consumer_secret' => $consumer_secret,
	'user_token' => $user_token,
	'user_secret' => $user_secret
));

// retrieve tweets matching #htc

$connection->request('GET', $connection->url('1.1/search/tweets'), 
	array('q' => '#loolooleelee2',
	array('count' => '5',
	)));
	
$response_code = $connection->response['code'];

//$response_data = json_decode($connection->response['response'],true);
	
if ($response_code == 200){
	//print_r($response_data);
	print_r($connection->response['response']);
}else {
	print "Error: $response_code\n";
}
?>