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

// Blog route.
app.get('/blog', function (req, res) {
  res.render('posts', posts);
});

// Article route.
app.get('/blog/:id', function (req, res) {
  var post = getPostByID(req.params.id);

  // Render the post if we find one with a matching ID.
  if (post) {
    res.render('post', post);
  }
  else {
    // There is no matching post.
    res.status(404).send('404 - Article not found');
  }
});

// Get things going.
app.listen(port, hostname);
console.log('App is listening on http://%s:%s', hostname, port);

/**
 * Load a blog post by it's ID.
 *
 * @param mixed id
 *   The ID of the blog post to display. Will be converted to an int if
 *   not one already.
 *
 * @return mixed
 *   JSON object representing the post or false if one cannot be found.
 */
function getPostByID(id) {
  // Loop through the posts.
  for (var i = 0; i < posts.posts.length; i++) {
    // Check for a matching ID.
    if (parseInt(id) === posts.posts[i].id) {
      return posts.posts[i];
    }
  }

  return false;
}
