<?php

namespace Drupal\Tests\custom_test\Unit;

use Drupal\Tests\UnitTestCase;

use Drupal\custom_test\CustomTestServiceInterface;

/**
 * Test description.
 *
 * @group custom_test
 */
class CustomServiceTest extends UnitTestCase {

  protected $customTestService;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $this->customTestService = $this->createMock(CustomTestServiceInterface::class);
  }

  /**
   * Tests something.
   */
  public function testUpdateUser() {

    // call customTestService->updateUser(1) and expect it to return 1
    $this->customTestService->expects($this->once())
      ->method('updateUser')
      ->with(1)
      ->willReturn(1);

    $this->assertEquals(1, $this->customTestService->updateUser(1));
  }
}
