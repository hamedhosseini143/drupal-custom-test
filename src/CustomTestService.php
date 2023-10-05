<?php

namespace Drupal\custom_test;

use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Service description.
 */
class CustomTestService implements CustomTestServiceInterface {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a CustomTestService object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entityTypeManager) {
    $this->entityTypeManager = $entityTypeManager;
  }

  public function sumNum($a, $b) {
    return $a + $b;
  }

}
