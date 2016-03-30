<?php

/**
 * @file
 * Contains \Drupal\headless_restful\Plugin\resource\node\blog\v1\Blogs__1_1.
 */

namespace Drupal\headless_restful\Plugin\resource\node\blog\v1;

use Drupal\restful\Plugin\resource\ResourceInterface;
use Drupal\restful\Plugin\resource\ResourceEntity;

/**
 * Class Blogs__1_1
 * @package Drupal\headless_restful\Plugin\resource
 *
 * @Resource(
 *   name = "blogs:1.1",
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
 *   },
 *   majorVersion = 1,
 *   minorVersion = 1
 * )
 */
class Blogs__1_1 extends ResourceEntity implements ResourceInterface {

  /**
   * {@inheritdoc}
   */
  public function publicFields() {
    $public_fields = parent::publicFields();

    $public_fields['body'] = array(
      'property' => 'body',
      'sub_property' => 'value',
    );

    $public_fields['categories'] = array(
      'property' => 'field_blog_categories_term_tree',
      'resource' => array(
        'name' => 'categories',
        'minorVersion' => 0,
        'majorVersion' => 1,
      ),
    );

    return $public_fields;
  }

}
