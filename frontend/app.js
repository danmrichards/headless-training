/**
 * @file
 * Main entry point for the 'Headless Training' front end.
 */

var express = require('express');
var path = require('path');
var adaro = require('adaro');
var redis = require('redis');
var request = require('request');
var crypto = require('crypto');
var client = redis.createClient();

// Check for redis errors.
client.on('error', function (err) {
  console.log('A Redis error occured ' + err);
});

// Setup the app variables.
var app = express();
var hostname = '192.168.56.111';
var port = process.env.PORT || 3000;
var api = 'http://headless-training.dev/api';
var blogEndpoint = api + '/v1.1/blogs';
var cacheKey;

// Setup adaro.
app.set('views', 'templates');
app.engine('dust', adaro.dust({cache: false}));
app.set('view engine', 'dust');

// Set up the blog route.
app.get('/blog', function (req, res) {
  // Build the cache key.
  cacheKey = crypto.createHash('sha1').update(req.url + port).toString();

  // Check if a cached version of this data already exists.
  client.mget(cacheKey, function (err, results) {
    // We have some cached data so use it.
    if (results[0] !== null) {
      return res.send(JSON.parse(results));
    }
    else {
      // The cache was empty so pull it from Drupal.
      request({
        url: blogEndpoint,
        json: true
      }, function (error, response, body) {
        // Update the cache and show the response.
        client.multi([
          ['set', cacheKey, JSON.stringify(body)],
          ['expire', cacheKey, 800]
        ]).exec(function (err, replies) {
          return res.send(body);
        });
      });
    }
  });
});

// Get things going.
app.listen(port, hostname);
console.log('App is listening on http://%s:%s', hostname, port);
