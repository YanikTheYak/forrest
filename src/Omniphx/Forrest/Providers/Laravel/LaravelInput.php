<?php namespace Omniphx\Forrest\Providers\Laravel;

use Omniphx\Forrest\Interfaces\InputInterface;
use Input;

class LaravelInput implements InputInterface {
	
	public function get($parameter){
		return Input::get($parameter);
	}
}