<?php

namespace Drupal\Tests\custom_test\Kernel;

use Drupal\KernelTests\KernelTestBase;

/**
 * Test description.
 *
 * @group custom_test
 */
class CustomServiceKbtTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['custom_test'];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    // Mock required services here.
  }

  /**
   * Test  not empty.
   */

  public function  testNodeExist() {
    $test_variable = "Not Empty";
    $this->assertNotEmpty($test_variable, "This variable shouldn't be empty.");
  }

}
