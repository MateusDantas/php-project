<?php

namespace Cache\Repository;

interface CacheInterface {

  /**
   * Reads a value from the cache store
   * @return mixed Returns the value read from the cache store
   */
  public function get($key);

  /**
   * Sets a value onto the cache store with an expiration time
   * If ttl is set to 0, then the value will never expire.
   * @return bool Returns true if successful, false otherwise
   */
  public function set($key, $value, $ttl = 0);

  /**
   * Deletes a value from the cache store
   * @return bool Returns true if successful, false otherwise
   */
  public function delete($key);

  /**
   * Clear all the pre-existing key,value from the cache store.
   */
  public function clear();

}
