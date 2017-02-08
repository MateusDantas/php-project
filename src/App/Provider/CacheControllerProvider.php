<?php

namespace App\Provider;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Silex\Api\BootableProviderInterface;

class CacheControllerProvider implements ControllerProviderInterface {

  public function connect(Application $app) {
    $controllers = $app['controllers_factory'];

    $controllers->get('/{id}', "App\Controller\CacheController::get");
    $controllers->put('/{id}', "App\Controller\CacheController::put");
    $controllers->delete('/{id}', "App\Controller\CacheController::delete");
    $controllers->post('/clear', "App\Controller\CacheController::clear");

    return $controllers;
  }

}
