<?php

namespace Drupal\custom_test\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for custom test routes.
 */
class CustomTestController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
