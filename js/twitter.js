var twitter = require('ntwitter');
var credentials = require('./credentials.js');
var fs = require('fs');

var t = new twitter({
    consumer_key: credentials.consumer_key,
    consumer_secret: credentials.consumer_secret,
    access_token_key: credentials.access_token_key,
    access_token_secret: credentials.access_token_secret
});

//var outputFilename = '/json/test.json'

t.stream('statuses/filter',{ track: ['loolooleelee'] },function(stream) {
        stream.on('data', function(tweet) {
            //console.log(tweet.text);
            fs.writeFile('/HAL/Innocean/2013/Beach_Cleanup/Flash/Beach_App/deploy/json/myjson.json', JSON.stringify(tweet, null, 4), function (err) {
			  if (err) throw err;
			  console.log('It\'s saved!');
			});
			console.log(tweet);
        });
    }
);