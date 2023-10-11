<?php

namespace Drupal\custom_test\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\custom_test\CustomTestServiceInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Returns responses for custom test routes.
 */
class CustomTestController extends ControllerBase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  protected $request;

  /**
   * The custom_test.service service.
   *
   * @var \Drupal\custom_test\CustomTestServiceInterface
   */
  protected $service;

  /**
   * The controller constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\custom_test\CustomTestServiceInterface $service
   *   The custom_test.service service.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager,
    CustomTestServiceInterface $service, Request $request
  ) {
    $this->entityTypeManager = $entity_type_manager;
    $this->service = $service;
    $this->request = $request;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('custom_test.service'),
      $container->get('request_stack')->getCurrentRequest()
    );
  }

  public function getNodeId() {

    return $this->request->attributes->get('nid');

  }

  /**
   * Builds the response.
   */
  public function build() {
    $nid = $this->getNodeId();
    $nodeExists = $this->service->NodeExist($nid);
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('Node with id @nid exists: @nodeExists', [
        '@nid' => $nid,
        '@nodeExists' => $nodeExists ? 'Yes' : 'No',
      ]),
    ];

    return $build;
  }

}
