<?php

/**
 * Tweets a message from the user whose user token and secret you use.
 *
 * Although this example uses your user token/secret, you can use
 * the user token/secret of any user who has authorised your application.
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
 * 4) Visit this page using your web browser.
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

$code = $tmhOAuth->request('POST', $tmhOAuth->url('1/statuses/update'), array(
  'status' => 'Test Tweet from @PaulAlbertson4'
));

if ($code == 200) {
  tmhUtilities::pr(json_decode($tmhOAuth->response['response']));
} else {
  tmhUtilities::pr($tmhOAuth->response['response']);
}
?>