<?php

/**
 * @file
 * Contains \Drupal\headless_restful\Plugin\resource\Series__1_0.
 */

namespace Drupal\headless_restful\Plugin\resource;

use Drupal\restful\Plugin\resource\DataInterpreter\DataInterpreterInterface;
use Drupal\restful\Plugin\resource\Field\ResourceFieldInterface;
use Drupal\restful\Plugin\resource\ResourceEntity;
use Drupal\restful\Plugin\resource\ResourceInterface;

/**
 * Class Series__1_0
 * @package Drupal\headless_restful\Plugin\resource
 *
 * @Resource(
 *   name = "series:1.0",
 *   resource = "series",
 *   label = "Series",
 *   description = "Export the series taxonomy term.",
 *   authenticationTypes = TRUE,
 *   authenticationOptional = TRUE,
 *   dataProvider = {
 *     "entityType": "taxonomy_term",
 *     "bundles": {
 *       "series"
 *     },
 *   },
 *   majorVersion = 1,
 *   minorVersion = 0
 * )
 */
class Series__1_0 extends ResourceEntity implements ResourceInterface {}
