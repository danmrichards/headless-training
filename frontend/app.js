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

// Get things going.
app.listen(port, hostname);
console.log('App is listening on http://%s:%s', hostname, port);
