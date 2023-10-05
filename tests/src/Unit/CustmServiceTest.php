<?php

namespace Drupal\Tests\custom_test\Unit;

use Drupal\Tests\UnitTestCase;

/**
 * Test description.
 *
 * @group custom_test
 */
class CustmServiceTest extends UnitTestCase {

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    // @todo Mock required classes here.
  }

  /**
   * Test sumNum
   */

  public function testSumNum() {
    $sumNumTest = $this->getMockBuilder('Drupal\custom_test\CustomTestService')
      ->disableOriginalConstructor()
      ->getMock();

    $sumNumTest->expects($this->any())
      ->method('sumNum')
      ->will($this->returnValue(5));

    $this->assertEquals(5, $sumNumTest->sumNum(2, 3));
  }

}
