/**
 * @file
 * Main entry point for the 'Headless Training' front end.
 */

var express = require('express');
var app = express();
var hostname = '192.168.56.111';
var port = process.env.PORT || 3000;

app.get('/example', function (req, res) {
  res.send('Hello world.');
});

app.listen(port, hostname);

console.log('App is listening on http://%s:%s', hostname, port);
