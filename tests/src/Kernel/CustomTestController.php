<?php

namespace Drupal\Tests\custom_test\Kernel;

use Drupal\KernelTests\KernelTestBase;

/**
 * Test description.
 *
 * @group custom_test
 */
class CustomTestController extends KernelTestBase {

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
   * Test callback.
   */
  public function testSomething() {
    $result = $this->container->get('transliteration')->transliterate('Друпал');
    self::assertSame('Drupal', $result);
  }

}
