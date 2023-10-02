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
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  public function CreateUser($data) {
    $user = $this->entityTypeManager->getStorage('user')->create([
      'name' => $data['name'],
      'mail' => $data['mail'],
      'pass' => $data['pass'],
      'status' => 1,
      'init' => $data['mail'],
      'roles' => ['authenticated'],
    ]);
    $user->save();
    return $user;
  }

}
