<?php namespace Omniphx\Forrest\Interfaces;

interface SessionInterface extends StorageInterface{
	
	public function put($key, $value);
	
}