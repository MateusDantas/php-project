<?php

namespace Cache\Repository;

use Memcached;

class MemcachedRepository implements CacheInterface {

  private $cacheObj;

  public function __construct($options = array()) {
    $this->cacheObj = new Memcached;
    $this->cacheObj->addServer(
      isset($options['host']) ? $options['host'] : 'localhost',
      isset($options['port']) ? $options['port'] : 11211
    );
  }

  public function get($key) {
    return $this->cacheObj->get($key);
  }

  public function set($key, $value, $ttl = 0) {
    return $this->cacheObj->set($key, $value, $ttl);
  }

  public function delete($key) {
    return $this->cacheObj->delete($key);
  }

  public function clear() {
    return $this->cacheObj->flush();
  }
}
