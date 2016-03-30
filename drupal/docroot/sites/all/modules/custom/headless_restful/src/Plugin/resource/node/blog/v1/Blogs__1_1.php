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

    $public_fields['lead_image'] = array(
      'property' => 'field_lead_image',
      'process_callbacks' => array(
        array($this, 'headlessImageProcess'),
      ),
      'image_styles' => array(
        'thumbnail',
        'medium',
        'large',
      ),
    );

    // The 'resource' key has to match the machine name of an existing
    // RESTful API resource. The version number can be specified too.
    $public_fields['categories'] = array(
      'property' => 'field_blog_categories_term_tree',
      'resource' => array(
        'name' => 'categories',
        'minorVersion' => 0,
        'majorVersion' => 1,
      ),
    );

    $public_fields['series'] = array(
      'property' => 'field_blog_series_term_tree',
      'resource' => array(
        'name' => 'series',
        'minorVersion' => 0,
        'majorVersion' => 1,
      ),
    );

    $public_fields['user'] = array(
      'property' => 'author',
      'resource' => array(
        // This is a RESTful core resource.
        'name' => 'users',
        // Determines if the entire resource should appear, or only the ID.
        'fullView' => TRUE,
        'majorVersion' => 1,
        'minorVersion' => 0,
      ),
    );

    return $public_fields;
  }

  /**
   * Process callback, Remove Drupal specific items from the image array.
   *
   * @param array $value
   *   The image array.
   *
   * @return array
   *   A cleaned image array.
   */
  public function headlessImageProcess(array $value) {
    return array(
      'id' => $value['fid'],
      'self' => file_create_url($value['uri']),
      'filemime' => $value['filemime'],
      'filesize' => $value['filesize'],
      'width' => $value['width'],
      'height' => $value['height'],
      'styles' => $value['image_styles'],
    );
  }

}
