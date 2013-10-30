<?php

/**
 * Tweets a Twitter photo along with a message from the user whose oauth_token
 * and oauth_secret you use.
 *
 * Although this example uses your user token/secret, you can use
 * the oauth_token/secret of any user who has authorised your application.
 *
 * This example is intended to be run from the command line.
 *
 * Instructions:
 * 1) If you don't have one already, create a Twitter application on
 *      https://dev.twitter.com/apps
 * 2) From the application details page copy the consumer key and consumer
 *      secret into the place in this code marked with (YOUR_CONSUMER_KEY
 *      and YOUR_CONSUMER_SECRET)
 * 3) From the application details page copy the access token and access token
 *      secret into the place in this code marked with (A_USER_TOKEN
 *      and A_USER_SECRET)
 * 4) Update $image to point to a real image file on your computer.
 * 5) In a terminal or server type:
 *      php /path/to/here/photo_tweet.php
 *
 * @author themattharris
 */

require 'bin/tmhOAuth-master/tmhOAuth.php';
require 'bin/tmhOAuth-master/tmhUtilities.php';

$tmhOAuth = new tmhOAuth(array(
  'consumer_key'    => 'vy39tPuHppTh4psfX45Ng',
  'consumer_secret' => 'f6ZaY8gTWUlzwXGx3kmLImylnLKLgigjMtZPYOqXvEM',
  'user_token'      => '1447264950-092s4tMBr35goyWTYZJCKHNBl5UfD0YKHELTtoV',
  'user_secret'     => 'aKFlmXbAnzTV7jPmWmy22H8a1FMxlnimfBwjoROZkQ',
));

	
// we're using a hardcoded image path here. You can easily replace this with
// an uploaded image - see images.php in the examples folder for how to do this
// 'image = "@{$_FILES['image']['tmp_name']};type={$_FILES['image']['type']};filename={$_FILES['image']['name']}",

// this is the jpeg file to upload. It should be in the same directory as this file.
$image = 'image.jpg';

$code = $tmhOAuth->request(
  'POST',
  'https://upload.twitter.com/1/statuses/update_with_media.json',
  array(
    'media[]'  => "@{$image};type=image/jpeg;filename={$image}",
    'status'   => 'Picture time',
  ),
  true, // use auth
  true  // multipart
);

if ($code == 200) {
	echo "Success!";
  tmhUtilities::pr(json_decode($tmhOAuth->response['response']));
} else {
	echo "Failure!: ";
  tmhUtilities::pr($tmhOAuth->response['response']);
}
?>