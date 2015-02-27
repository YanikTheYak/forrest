<?php

namespace Omniphx\Forrest\Providers\Laravel;

use Omniphx\Forrest\Interfaces\CacheInterface;
use Omniphx\Forrest\Exceptions\MissingTokenException;
use Omniphx\Forrest\Exceptions\MissingKeyException;
use Cache;
use Crypt;

class LaravelCache implements CacheInterface {

	public function get($key)
	{
		if (Cache::has($key)) {
			return Cache::get($key);
		}
		throw new MissingKeyException(sprintf("No value for requested key: %s",$key));
	}

	public function put($key, $value, $minutes = 30)
	{
		return Cache::put($key, $value, $minutes);
	}

	public function putToken($token)
	{
		$encyptedToken = Crypt::encrypt($token);
		return Cache::put('token', $encyptedToken, 30);
	}

	public function getToken()
	{
		if (Cache::has('token')) {
			return Crypt::decrypt(Cache::get('token'));
		}

		throw new MissingTokenException(sprintf('No token available in Cache'));
	}
}