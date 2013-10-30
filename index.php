<?php
    //phpinfo();
    include 'bin/tmhOAuth-master/tmhOAuth.php';
	include 'bin/tmhOAuth-master/tmhUtilities.php';
	
	
	$tmhOAuth = new tmhOAuth(array(
	  'consumer_key' => 'vy39tPuHppTh4psfX45Ng',
	  'consumer_secret' => 'f6ZaY8gTWUlzwXGx3kmLImylnLKLgigjMtZPYOqXvEM',
	  'user_token' => '1447264950-092s4tMBr35goyWTYZJCKHNBl5UfD0YKHELTtoV',
	  'user_secret' => 'aKFlmXbAnzTV7jPmWmy22H8a1FMxlnimfBwjoROZkQ',
	));
	
	// $response = $tmhOAuth->request('POST', $tmhOAuth->url('1.1/statuses/update'), array(
	  // 'status' => 'This is test 2 tweet from @PaulAlbertson4'
	// ));
	$response = $tmhOAuth->request('GET', $tmhOAuth->url('1.1/search/tweets'), array(
	  'q' => '#htc',
	  'count' => '5'
	));
	
	if ($response != 200) {
	    //Do something if the request was unsuccessful
	    echo $response;
	    echo 'There was an error posting the message.';
	}
?>