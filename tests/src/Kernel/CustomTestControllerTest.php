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
  public function testCustomController() {

    //test module custom_test is configured correctly.

    $this->installConfig(['custom_test']);


    // test install test module custom_test.

    $this->installSchema('custom_test', ['custom_test_table']);


    $http_kernel = $this->container->get('http_kernel');

    $request = Request::create('custom-test/custom-route/1', 'GET');

    $response = $http_kernel->handle($request);

    $this->assertEquals(403, $response->getStatusCode());

  }

}
