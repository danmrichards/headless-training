/**
 * @file
 * Main entry point for the 'Headless Training' front end.
 */

var express = require('express');
var adaro = require('adaro');

// Setup the app variables.
var app = express();
var hostname = '192.168.56.111';
var port = process.env.PORT || 3000;

// Setup adaro.
app.set('views', 'templates');
app.engine('dust', adaro.dust({cache: false}));
app.set('view engine', 'dust');

// Example model.
var model = {
  name: 'my-name',
  location: 'my-location',
  vice: 'Coffee'
};

// Example content.
var posts = require('./mock/posts.js');

// Home route.
app.get('/', function (req, res) {
  res.render('index', model);
});

// API route.
app.get('/api', function (req, res) {
  res.send(model);
});

// Articles route.
app.get('/articles', function (req, res) {
  res.render('articles', posts);
});

// Get things going.
app.listen(port, hostname);
console.log('App is listening on http://%s:%s', hostname, port);
