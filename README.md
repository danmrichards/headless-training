# Headless Drupal Training

Headless Drupal training codebase based on http://www.mirzu.com/headless-training-book/

## Installation

Check the database settings in the `docroot/sites/default/settings.php` file.

Run the following drush command from the `docroot` directory:

```
drush site-install headless --site-name=Headless --uri=default
```

## Generate Content

The [devel](https://www.drupal.org/project/devel) module can be used to generate content.

Enable it:

```
drush en devel_generate --uri=default -y
```

Generate some content:

```
drush generate-content 20 5 --types=blog --uri=default
```
