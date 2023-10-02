<?php

namespace Drupal\Tests\custom_test\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\custom_test\CustomTestService;

/**
 * Test description.
 *
 * @group custom_test
 */
class CustomCreateUserTest extends UnitTestCase {

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    // @todo Mock required classes here.
  }

  /**
   * Test the createCustomUser method.
   */
  public function testCreateCustomUser() {


    // Mock the EntityTypeManagerInterface and EntityStorageInterface for users.
    $entityTypeManager = $this->createMock(EntityTypeManagerInterface::class);
    $userStorage = $this->createMock(EntityStorageInterface::class);

    // Create an instance of the class you want to test with the mock dependency.
    $customTestService = new CustomTestService($entityTypeManager);


    $userData = [
          'name' => 'testuser',
          'mail' => 'test@example.com',
          'pass' => 'password',
    ];

    // Set up expectations for the EntityTypeManager.
    $entityTypeManager->expects($this->once())
      ->method('getStorage')
      ->with('user')
      ->willReturn($userStorage);

    // Set up expectations for the UserStorage.
    $userEntity = $this->getMockBuilder(\Drupal\user\UserInterface::class)
      ->disableOriginalConstructor()
      ->getMock();

    $userStorage->expects($this->once())
      ->method('create')
      ->with($userData)
      ->willReturn($userEntity);

    $userEntity->expects($this->once())
      ->method('save');

    // Call the method to be tested.
    $result = $customTestService->createCustomUser($userData);

    // Assert that the result is an array.
    $this->assertIsArray($result);
  }

}
