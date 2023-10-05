<?php

namespace Drupal\Tests\custom_test\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\custom_test\CustomTestService;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\node\NodeStorage;

/**
 * Test description.
 *
 * @group custom_test
 */
class CustmServiceTest extends UnitTestCase {

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

  /**
   * Test NodeExist
   */

  public function testNodeExist() {
    $entityTypeManager = $this->getMockBuilder('\Drupal\Core\Entity\EntityTypeManager')
      ->disableOriginalConstructor()
      ->getMock();

    $entityStorage = $this->getMockBuilder('\Drupal\node\NodeStorage')
      ->disableOriginalConstructor()
      ->getMock();

    $node = $this->getMockBuilder('\Drupal\node\NodeInterface')
      ->disableOriginalConstructor()
      ->getMock();

    $entityTypeManager->expects($this->once())
      ->method('getStorage')
      ->with('node')
      ->willReturn($entityStorage);

    $entityStorage->expects($this->once())
      ->method('load')
      ->with(1)
      ->willReturn($node);

    $myService = new CustomTestService($entityTypeManager);

    $result = $myService->NodeExist(1);

    $this->assertTrue($result);
  }

  /**
   * Test createNode
   */

  public function testCreateNode() {
    $entityTypeManager = $this->getMockBuilder(EntityTypeManager::class)
      ->disableOriginalConstructor()
      ->getMock();

    $nodeStorage = $this->getMockBuilder(NodeStorage::class)
      ->disableOriginalConstructor()
      ->getMock();

    $node = $this->getMockBuilder('\Drupal\node\NodeInterface')
      ->getMock();

    $entityTypeManager->expects($this->once())
      ->method('getStorage')
      ->with('node')
      ->willReturn($nodeStorage);

    $nodeStorage->expects($this->once())
      ->method('create')
      ->willReturn($node);

    $myService = new CustomTestService($entityTypeManager);

    $data = ['type' => 'article', 'title' => 'Test Node'];
    $result = $myService->createNode($data);

    $this->assertInstanceOf('\Drupal\node\NodeInterface', $result);
  }

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    // @todo Mock required classes here.
  }

}
