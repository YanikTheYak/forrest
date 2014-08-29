<?php namespace Omniphx\Forrest\Providers\Laravel;

use Config;
use Illuminate\Support\ServiceProvider;
use Omniphx\Forrest\RESTClient;

class ForrestServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('omniphx/forrest', null, __DIR__.'/../../../..');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		$this->app['forrest'] = $this->app->share(function($app)
		{
			$settings  = Config::get('forrest::config');

			$client   = new \GuzzleHttp\Client();
			$redirect = new \Omniphx\Forrest\Providers\Laravel\LaravelRedirect();
			$storage  = new \Omniphx\Forrest\Providers\Laravel\LaravelSession();
			$input    = new \Omniphx\Forrest\Providers\Laravel\LaravelInput();

			

			switch ($settings['authenticationFlow']) {
			    case 'WebServer':
			        $authentication = new \Omniphx\Forrest\AuthenticationFlows\WebServer($client, $redirect, $input, $settings);
			        break;
			    case 'UserAgent':
			        $authentication = new \Omniphx\Forrest\AuthenticationFlows\UserAgent();
			        break;
			    case 'UsernamePassword':
			        $authentication = new \Omniphx\Forrest\AuthenticationFlows\UsernamePassword($client, $settings);
			        $storage  = new \Omniphx\Forrest\Providers\Laravel\LaravelCache();
			        break;
			}

			$resource = new \Omniphx\Forrest\Resource($client, $storage, $settings['defaults']);

			return new RESTClient($resource, $client, $storage, $redirect, $authentication, $settings);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}