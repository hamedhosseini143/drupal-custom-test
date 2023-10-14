<?php

namespace Drupal\Tests\custom_test\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Test description.
 *
 * @group custom_test
 */
class CustomTestControllerTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['custom_test', 'system', 'user',];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->installConfig(['system', 'user']);
    $this->installSchema('system', ['sequences']);
    $this->installEntitySchema('user');
  }

  /**
   * Test callback.
   */
  public function testCustomController() {

    //test module custom_test is configured correctly.
    $this->installConfig(['custom_test', 'user']);


    // test install test module custom_test.

    $this->installSchema('custom_test', ['custom_test_table']);


    $http_kernel = $this->container->get('http_kernel');

    $request = Request::create('user/login', 'GET');

    $response = $http_kernel->handle($request);

    $this->assertEquals(200, $response->getStatusCode());

  }

}
