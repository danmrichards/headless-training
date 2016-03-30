<?php

/**
 * @file
 * Contains \Drupal\headless_restful\Plugin\resource\node\blog\v1\Blogs__1_0.
 */

namespace Drupal\headless_restful\Plugin\resource\node\blog\v1;

use Drupal\restful\Plugin\resource\ResourceInterface;
use Drupal\restful\Plugin\resource\ResourceNode;

/**
 * Class Blogs__1_0
 * @package Drupal\headless_restful\Plugin\resource
 *
 * @Resource(
 *   name = "blogs:1.0",
 *   resource = "blogs",
 *   label = "Blogs",
 *   description = "Export the blog content type.",
 *   authenticationTypes = TRUE,
 *   authenticationOptional = TRUE,
 *   dataProvider = {
 *     "entityType": "node",
 *     "bundles": {
 *       "blog"
 *     },
 *     "viewMode" = {
 *       "name": "default",
 *       "fieldMap": {
 *         "body": "body",
 *         "field_lead_image": "image",
 *         "field_blog_categories_term_tree": "categories",
 *       }
 *     }
 *   },
 *   majorVersion = 1,
 *   minorVersion = 0
 * )
 */
class Blogs__1_0 extends ResourceNode implements ResourceInterface {}
