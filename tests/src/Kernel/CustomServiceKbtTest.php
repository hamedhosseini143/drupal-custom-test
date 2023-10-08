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
   * Test node existence.
   */
  public function testNodeExist() {
    $this->assertTrue(TRUE);
  }

}
