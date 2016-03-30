/**
 * @file
 * Main entry point for the 'Headless Training' front end.
 */

var express = require('express');
var app = express();
var port = process.env.PORT || 3000;

app.listen(port);

console.log('App is listening on %s', port);
