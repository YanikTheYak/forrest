<?php namespace Omniphx\Forrest\Interfaces;

interface CacheInterface extends StorageInterface{
	
	public function put($key, $value, $minutes);
	
}