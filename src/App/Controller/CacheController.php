<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class CacheController {

  public function put(Application $app, Request $request, $id) {
    $data = json_decode($request->getContent(), true);
    return $app['cache.instance']()->set($id, $data);;
  }

  public function get(Application $app, $id) {
    return json_encode($app['cache.instance']()->get($id));
  }

  public function delete(Application $app, $id) {
    return $app['cache.instance']()->delete($id);
  }

  public function clear(Application $app) {
    return $app['cache.instance']()->clear();
  }
}
