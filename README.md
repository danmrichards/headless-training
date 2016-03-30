# Headless Drupal Training

Headless Drupal training codebase based on http://www.mirzu.com/headless-training-book/.

The backend of the codebase is powered by Drupal 7. The front end is powered by NodeJS & ExpressJS.

## Drupal Installation

Check the database settings in the `drupal/docroot/sites/default/settings.php` file.

Run the following drush command from the `drupal/docroot` directory:

```
drush site-install headless --site-name=Headless --uri=default
```

## Generate Content

The [devel](https://www.drupal.org/project/devel) module can be used to generate content.

Enable it:

```
drush en devel_generate --uri=default -y
```

Generate some taxonomy terms:

```
drush generate-terms category --uri=default
```

```
drush generate-terms series --uri=default
```

Generate some content:

```
drush generate-content 20 5 --types=blog --uri=default
```

## Frontend Installation

Run the following drush command from the `frontend` directory:

```
npm install
```

Once this has completed you can start the front end server by running:

```
node app.js
```
