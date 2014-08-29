<?php namespace Omniphx\Forrest\Interfaces;

interface AuthenticationInterface {

	/**
	 * Authenticate with a username and password and return the result
	 * @return mixed
	 */
	public function authenticate();

}