<?php

namespace Cache\Factory;

use Cache\Repository\MemcachedRepository;

class CacheFactory {
  public function getCache($cacheDriver, $options = array()) {
    switch ($cacheDriver) {
      case 'memcache':
        return new MemcachedRepository($options);
      default:
        throw new CacheFactoryException('The driver '.$cacheDriver.' does not exist.');
    }
  }
}
