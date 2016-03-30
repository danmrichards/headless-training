<?php

/**
 * @file
 * Contains \Drupal\headless_restful\Plugin\resource\Categories__1_0.
 */

namespace Drupal\headless_restful\Plugin\resource;

use Drupal\restful\Plugin\resource\DataInterpreter\DataInterpreterInterface;
use Drupal\restful\Plugin\resource\Field\ResourceFieldInterface;
use Drupal\restful\Plugin\resource\ResourceEntity;
use Drupal\restful\Plugin\resource\ResourceInterface;

/**
 * Class Categories__1_0
 * @package Drupal\headless_restful\Plugin\resource
 *
 * @Resource(
 *   name = "categories:1.0",
 *   resource = "categories",
 *   label = "Categories",
 *   description = "Export the category taxonomy term.",
 *   authenticationTypes = TRUE,
 *   authenticationOptional = TRUE,
 *   dataProvider = {
 *     "entityType": "taxonomy_term",
 *     "bundles": {
 *       "category"
 *     },
 *   },
 *   majorVersion = 1,
 *   minorVersion = 0
 * )
 */
class Categories__1_0 extends ResourceEntity implements ResourceInterface {}
