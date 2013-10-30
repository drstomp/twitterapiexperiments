<?php

require 'app_tokens.php';

require 'tmhOAuth-master/tmhOAuth.php';

// parse username from callback
$userName = $_GET["user"];
$myBuster = $_GET["buster"];
$mytweet = 'Thank you for your tweet. Stay tuned and trash will be picked up on your behalf '.$myBuster;

// Create a connection

$connection = new tmhOAuth(array(
	'consumer_key' => $consumer_key,
	'consumer_secret' => $consumer_secret,
	'user_token' => $user_token,
	'user_secret' => $user_secret
));

//send a tweet

$code = $connection->request('POST',
	$connection->url('1.1/statuses/update'),
	array('status' => $mytweet));
	//print $userName;
	//print $myBuster;
	
if ($code == 200){
	print "Tweet sent";
}else {
	print "Error: $code";
}
?>