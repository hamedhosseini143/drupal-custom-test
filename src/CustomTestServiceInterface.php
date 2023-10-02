<?php

namespace Drupal\custom_test;

/**
 * Interface CustomTestServiceInterface.
 */
interface CustomTestServiceInterface {

  public function createCustomUser($data): array;

  public function updateUser($id);

}
