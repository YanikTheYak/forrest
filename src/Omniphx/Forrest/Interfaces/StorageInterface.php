<?php namespace Omniphx\Forrest\Interfaces;

interface StorageInterface {
	
	public function get($key);

	/**
	 * It's important to encrypt your token, so put logic in this class
	 * @param string $token authentication token
	 * @return Session::put('token',$token);
	 */
	public function putToken($token);

	/**
	 * Retrieve your encrypted token from the session and decrypt it.
	 * @return Crypt::decrypt($token);
	 */
	public function getToken();
	
}