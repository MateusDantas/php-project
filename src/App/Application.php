<?php

use Silex\Application;

use Cache\CacheProvider;
use App\Provider\CacheControllerProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new CacheProvider(), array(
  'cache.driver' => 'memcache',
  'cache.options' => array(
    'host' => 'localhost',
    'port' => 8000
  ),
));

$app->mount('/cache', new CacheControllerProvider());

$app->run();
