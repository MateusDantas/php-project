<?php

namespace Cache;

use Silex\Application;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Api\BootableProviderInterface;
use Cache\Factory\CacheFactory;

class CacheProvider implements ServiceProviderInterface, BootableProviderInterface {

  public function register(Container $app) {
    $app['cache.factory'] = $app->factory(function ($app) {
      return new CacheFactory();
    });

    $app['cache.instance'] = $app->protect(function () use ($app) {
      $cacheFactory = $app['cache.factory'];
      $cacheDriver = $app['cache.driver'];
      $cacheOptions = $app['cache.options'];

      return $cacheFactory->getCache($cacheDriver, $cacheOptions);
    });
  }

  public function boot(Application $app) {
    
  }
}
